<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package Everest_Agency
 * @subpackage Everest_Agency_Core
 */
?>

    <!-- Footer -->
	<footer class="mainfooter">
        <div class="container-fluid py-5">
            <div class="row footer-row">
                <?php
                $footerLogo = get_field('footer_logo', 'option') ?: get_field('site_logo_primary', 'option');
                $footerLogo = is_array($footerLogo) ? $footerLogo['url'] : $footerLogo;
                $phoneNumber = get_field('phone_number', 'option');
                $address1 = get_field('address_line_1', 'option');
                $address2 = get_field('address_line_2', 'option');
                $email = get_field('footer_email', 'option');
                $summary = get_field('footer_summary', 'option');
                $social_links = ea_get_header_social_links();
                if($footerLogo || $summary ) { ?>
                    <div class="col-lg-4 col-md-6 col-12 logo-col">
                    <?php if($footerLogo) {
                        ea_lazy_load_image($footerLogo, 'Footer Logo','img-fluid footer-logo');
                    }
                    if($summary) { ?>
                        <p class="mb-0 mb-md-5"><?php echo $summary; ?></p>
                    <?php } ?>
                    </div>
                <?php }
                if(has_nav_menu('footer_column_1')) { ?>
                <div class="col-lg-3 col-md-6 col-12">
                    <h5>Quick Links</h5>
                    <ul>
                        <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'footer_column_1',
                            'depth'             => 2,
                            'container'         => false,
                            'items_wrap'        => '%3$s'
                        ) );
                        ?>
                    </ul>
                </div>
                <?php }
                if($phoneNumber || $address1 || $address2 || $email) { ?>
                    <div class="col-lg-3 col-md-6 col-12 address-col">
                        <h5>Contact</h5>
                        <address>
                            <?php
                            if($address1) { ?>
                                <p class="mb-0"><?php echo $address1?></p>
                            <?php }
                            if($address2) { ?>
                                <p><?php echo $address2?></p>
                            <?php }
                            if($phoneNumber) {
                                $phone_title = 'Phone';
                                $num =  ea_phone_number($phoneNumber);
                                ?>
                                <p><a title="<?php echo esc_attr($phone_title); ?>" href="callto:<?php echo $num['number']; ?>"><?php echo $num['readableNumber']; ?></a></p>
                            <?php }
                            if($email) {
                                $email_title = 'Email';
                                ?>
                                <p><a title="<?php echo esc_attr($email_title); ?>" href="mailto:<?php echo esc_attr($email); ?>"><?php echo $email; ?></a></p>
                            <?php } ?>
                        </address>
                    </div>
                <?php }
                if(count($social_links) > 0 ) { ?>
                    <div class="col-lg-2 col-md-6 col-12">
                        <h5>Connect</h5>
                        <ul class="socicons">
                            <?php foreach($social_links as $social_link){ ?>
                                <li><?php echo $social_link; ?></li>
                            <?php }; ?>
                        </ul>
                    </div>
                    <?php } ?>
            </div>
        </div>
        <div class="subfooter">
            <div class="container">
                <div class="row centered-row">
                    <div class="col-12 col">
                        <?php $privacyPolicy = get_field('privacy_policy', 'option') ?: 'Privacy Policy'?>
                        <p>Copyright &copy; <?php echo date("Y") ?> <?php echo $privacyPolicy; ?></p>
                        <?php
                        if(get_field('privacy_policy_link', 'option')) {
                            $privacyLink = get_field('privacy_policy_link', 'option');
                            $privacyLink = trim($privacyLink['url']);
                            ?>
                            <a target="_blank" href="<?php echo esc_url($privacyLink); ?>" title="Privacy Page">Privacy Policy</a>
                        <?php } ?>
                        <p>Designed by <a href="https://www.carimus.com/" title="Carimus Website" class="carimus-link" target="_blank">Carimus</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Third-party javascript is enqueued in everest-agency-core/inc/core.php -->

	<?php wp_footer(); ?>

    <script>
        (function ($) {
            $(window).scroll(function () {
                var sticky = $('body'),
                    scroll = $(window).scrollTop();

                if (scroll >= 150) sticky.addClass('scrolling');
                else sticky.removeClass('scrolling');
            });


            $(function () {
                $('.dropdown').hover(function () {
                        $(this).addClass('open');
                    },
                    function () {
                        $(this).removeClass('open');
                    });
            });
        })(jQuery);
    </script>

  </body>
</html>
