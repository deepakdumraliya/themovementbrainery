( function( $ ) {
//Function to create options for a slider block
function createOwl(selector, extra = {}) {
    var classes = $(selector).attr('class').split(' ');
    //default options
    var options = {
        loop: false,
        autoplay: false,
        nav: false,
        dots: false,
        dotsEach: true,
        margin: 2,
        autoplayHoverPause: true,
    };
    const breakpoints = {
        xs: 0,
        sm: 640,
        md: 768,
        lg: 1024,
        xl: 1280,
    }
    const breakPointArray = Object.keys(breakpoints);
    const defaultResponsive = {
            0:{
                items:1,
            },
    }
    //check each class as a option and toggle the option if it is false
    classes.forEach(function(option) {
        if(options[option] === false) {
            options[option] = true;
        }
        //get the number of slides passed through the slides-* class
        if(option.includes('slides-')) {
            // get number slides
            const slides = parseInt(option.split('-')[1]);
            // create object to hold media queries
            const responsive = {};
            // add queries for each
            for(let i = slides; i >= 0; i-- ) {
                const bpKey = breakPointArray[i - 1];
                if(bpKey) {
                    const bpValue = breakpoints[bpKey];
                    responsive[bpValue] = {
                        items: i
                    }
                }
            }
            options['responsive'] = responsive;
            // options['responsive'][1200]['items'] = parseInt(slides);
        }
        //get the margin passed through the margin-* class
        if(option.includes('margin-')) {
            const margin = option.split('-')[1];
            options['margin'] = parseInt(margin);
        }
    });
    if(! 'responsive' in options) {
        options['responsive'] = defaultResponsive;
    }
    //merge in additional options
    const mergedOptions =  {...options, ...extra};
    //initialize the slider with the options
    selector.owlCarousel(mergedOptions);
}
//search for any owl slider blocks and intiate with options passed from attached classes
$(".owl-carousel.block-owl-section").each(function(){
    createOwl($(this));
});
//search for any testimonial blocks and intiate with options passed from attached classes
$(".owl-carousel.testimonial-owl-block").each(function(){
    createOwl($(this), {center: true});
});

} )( jQuery );