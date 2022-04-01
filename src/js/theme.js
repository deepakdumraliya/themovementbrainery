(function($) {
$(document).ready(function() {
    //SEO Friendly card click function
    $('.div-link').each(function () {
        var cardLink = $(this).find('.card-click');
        cardLink.click(function (e) {
            e.preventDefault();
        });
        var modalTarget = cardLink.attr('data-target');
        if (modalTarget) {
            $(this).click(function (e) {
                $(modalTarget).modal('toggle');
            })
        } else {
            var divLink = cardLink.attr('href');
            var divTarget = cardLink.attr('target') ? cardLink.attr('target') : '_self' ;
            $(this).click(function () {
                window.open(divLink, divTarget);
            });
        }
    });
//Selectors for scroll function
    var newsFilter = $('#news-filter');
    //check for news page and query
    if(newsFilter.length) {
        var newsQuery = getUrlVars();
        var searchParams = new URL(document.location);
        if(newsQuery.has('category') || searchParams.pathname.split('/').indexOf('page') > 0) {
            scrollUpToItem('#post-news', 500, -500);
        }
    }
    //check for url query vars and create object of the parameters
    function getUrlVars()
    {
        return new URLSearchParams(window.location.search);
    }
    //scroll to function
    function scrollUpToItem(id, time, offset) {
        $('html, body').animate({
            scrollTop: $(id).offset().top - offset
        }, time);
    }
    //Scroll to anchor link function
    $('a.scroll-link').click(function(e) {
        e.preventDefault();
        var anchor = $(this).prop('hash');
        scrollUpToItem(anchor, 500, 100);
    });
    //function to close all open faqs before opening another
    function unCheckRotated (div) {
        var toggledFAQs = '';
        var rotated = '';
        if(div.hasClass('sub')) {
            var subBlock = div.parent().parent();
            console.log(subBlock);
            toggledFAQs =  subBlock.find('.collapse.show');
            rotated = subBlock.find('.rotated');
        } else {
            var block = div.parents('.faq-block');
            toggledFAQs =  block.find('.collapse.show');
            rotated = block.find('.rotated');
        }
        if(toggledFAQs.length) {
            toggledFAQs.each(function(){
                $(this).toggleClass('show');
            });
            rotated.each(function(){
                $(this).toggleClass('rotated');
            });
        }
    }
    //rotate arrow span
    $('.faq-question').click(function() {
        var arrowSpan = $(this).find('.arrow-span');
        if(!arrowSpan.hasClass('rotated')) {
            unCheckRotated($(this));
        }
        arrowSpan.toggleClass('rotated');
        $('html, body').animate({
            scrollTop: (arrowSpan.offset().top - 100)
        }, 500);
    });
});
})(jQuery);