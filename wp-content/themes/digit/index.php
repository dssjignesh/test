<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<?php if( function_exists('cyclone_slider') ) cyclone_slider('home-slider'); ?>
<div class="container">
	<?php if ( is_active_sidebar( 'home-about' ) ) : ?>
	<div class="second front-widgets">
		<?php dynamic_sidebar( 'home-about' ); ?>
	</div><!-- .second -->
	<?php endif; ?>
</div>
	
    <div id="features" class="bg--lightgray">
        <div class="container">
            <div class="section-title">
                <h2>OUR SERVICES</h2>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 feature--item">
                    <div class="feature--icon">
                        <div class="vc-parent">
                            <div class="vc-child">
                            	<img class="img-responsive center-block" alt="" src="<?=get_site_url();?>/images/webdevelopment.png" width="65">
                            </div>
                        </div>
                    </div>
                    <div class="feature--content">
                        <h4>Web Development</h4>
                        <p>A website may be the first interaction point between the client and the company.</p>
                        <a class="btn btn-custom" href="#">View Details</a> 
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 feature--item">
                    <div class="feature--icon">
                        <div class="vc-parent">
                            <div class="vc-child">
                            	<img class="img-responsive center-block" alt="" src="<?=get_site_url();?>/images/Webdesign.png" width="65">
                            </div>
                        </div>
                    </div>
                    <div class="feature--content">
                        <h4>Web Design</h4>
                        <p>Web Design Firm who can do many tasks for you, such as Flat Web Designs etc.</p>
                        <a class="btn btn-custom" href="#">View Details</a> 
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 feature--item">
                    <div class="feature--icon">
                        <div class="vc-parent">
                            <div class="vc-child">
                            	<img class="img-responsive center-block" alt="" src="<?=get_site_url();?>/images/wordpress.png" width="65">
                            </div>
                        </div>
                    </div>
                    <div class="feature--content">
                        <h4>Wordpress</h4>
                        <p>We are one of leading WordPress Development company in India.</p>
                        <a class="btn btn-custom" href="#">View Details</a> 
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 feature--item">
                    <div class="feature--icon">
                        <div class="vc-parent">
                            <div class="vc-child">
                            	<img class="img-responsive center-block" alt="" src="<?=get_site_url();?>/images/magento.png" width="65">
                            </div>
                        </div>
                    </div>
                    <div class="feature--content">
                        <h4>Magento</h4>
                        <p>Magento is considered to be the best option when it comes to taking your eStore.</p>
                        <a class="btn btn-custom" href="#">View Details</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="features">
    	<div class="container">
        	<div class="section-title">
                <h2>OUR RECENT WORK</h2>
            </div>
        	<?php echo do_shortcode( ' [tlpportfolio col="4" number="4" orderby="id" order="ASC" layout="3"] ' ); ?>
        	<img class="img-responsive center-block" alt="DIGIT SOFTWARE TECHNOLOGIES" src="<?=get_site_url();?>/images/technologies.png">
        </div>
    </div>    
</div>
<?php get_footer(); ?>
