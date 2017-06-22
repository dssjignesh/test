<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<div id="contactInfo">
    <div class="container">
        <div class="row reset-gutter">
            <!-- Contact Info Item Start -->
            <div class="contact-info--item col-md-3 col-xs-6">
                <a href="javascript:void(0);"><i class="fa fa-headphones"></i>24/7 Customer Support</a>
            </div>
            <div class="contact-info--item col-md-3 col-xs-6">
                <a href="javascript:void(0);"><i class="fa fa-envelope-o"></i>info@digitsoftsol.com</a>
            </div>
            <div class="contact-info--item col-md-3 col-xs-6">
                <a href="javascript:void(0);"><i class="fa fa-comments-o"></i>Click Here To Live Chat</a>
            </div>
            <div class="contact-info--item col-md-3 col-xs-6">
                <a href="javascript:void(0);"><i class="fa fa-phone"></i>+91 95588-47447</a>
            </div>
        </div>
    </div>
</div>
<!-- Footer Area Start -->
<div id="footer">
    <div class="container">
        <div class="row">
            <!-- Footer Widget Start -->
            <div class="col-md-3 col-sm-6 footer-widget">
                <!-- Footer Title Start -->
                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<?php dynamic_sidebar( 'footer-1' ); ?>
                <?php endif; ?>
                
            </div>
            <!-- Footer Widget End -->
            
            <!-- Footer Widget Start -->
            <div class="col-md-3 col-sm-6 footer-widget">
                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<?php dynamic_sidebar( 'footer-2' ); ?>
                <?php endif; ?>
            </div>
            <!-- Footer Widget End -->
            
            <!-- Footer Widget Start -->
            <div class="col-md-3 col-sm-6 footer-widget">
                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<?php dynamic_sidebar( 'footer-3' ); ?>
                <?php endif; ?>
            </div>
            <!-- Footer Widget End -->
            
            <!-- Footer Widget Start -->
            <div class="col-md-3 col-sm-6 footer-widget">
                <!-- Footer Title Start -->
                <h4>Subscribe</h4>
                <!-- Footer Title End -->
                
                <!-- Footer Subscribe Widget Start -->
                <div class="footer--subscribe-widget" data-form-validation="true">
                    <form action="#" method="post" name="subscribe" novalidate="novalidate">
                        <input type="email" id="email" value="" name="email" placeholder="Enter your email address" class="form-control" required>
                        <input type="button" value="SUBSCRIBE" class="btn btn-custom-reverse" onclick="return subscribe();">
                    </form>
                </div>
                <!-- Footer Subscribe Widget End -->
                
                <!-- Footer Social Widget Start -->
                <div class="footer--social-widget">
                    <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
						<?php dynamic_sidebar( 'footer-4' ); ?>
                    <?php endif; ?>
                </div>
                <!-- Footer Social Widget End -->
            </div>
            <!-- Footer Widget End -->
        </div>
    </div>
</div>
<!-- Footer Area End -->
<!-- Copyright Area Start -->
<div id="copyright">
    <div class="container">
        <p class="center">Copyright &copy; 2014 <a href="javascript:void(0);">Digit Software Solutions</a>. All Rights Reserved.</p>
    </div>
</div>
<!-- Copyright Area End -->
<!-- Theme Scripts -->
<script src="<?=get_site_url();?>/js/jquery.sticky.js"></script>
<script src="<?=get_site_url();?>/js/main.js"></script>
</body>
</html>

<?php wp_footer(); ?>
</body>
</html>