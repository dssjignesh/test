<?php
    global $TLPportfolio;
    $settings = get_option($TLPportfolio->options['settings']);
?>
<div class="wrap">

    <div id="upf-icon-edit-pages" class="icon32 icon32-posts-page"><br /></div>
    <h2><?php _e('TLP Portfolio Settings', 'tlp-portfolio') ?></h2>
    <div class="tlp-content-holder">
        <div class="tch-left">
            <form id="tlp-settings" onsubmit="tlpPortfolioSettings(this); return false;">

            <h3><?php _e('General settings','tlp-portfolio');?></h3>

            <table class="form-table">

                <tr>
                    <th scope="row"><label for="primary-color"><?php _e('Primary Color','tlp-portfolio');?></label></th>
                    <td class="">
                        <input name="primary_color" id="primary_color" type="text" value="<?php echo (isset($settings['primary_color']) ? ($settings['primary_color'] ? $settings['primary_color'] : '#0367bf') : '#0367bf'); ?>" class="tlp-color">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="imgWidth"><?php _e('Image Size','tlp-portfolio');?></label></th>
                    <td><input name="feature_img[width]" type="text" value="<?php echo (isset($settings['feature_img']['width']) ? ($settings['feature_img']['width'] ? intval($settings['feature_img']['width']) : 350 ) : 350); ?>" size="4" class=""> * <input name="feature_img[height]" type="text" value="<?php echo (isset($settings['feature_img']['height']) ? ($settings['feature_img']['height'] ? intval($settings['feature_img']['height']) : 250 ) : 250); ?>" size="4" class=""> <?php _e('(Width * Height)','tlp-portfolio'); ?></td>
                </tr>
                <tr>
                    <th scope="row"><label for="slug"><?php _e('Slug','tlp-portfolio');?></label></th>
                    <td class="">
                        <input name="slug" id="slug" type="text" value="<?php echo (isset($settings['slug']) ? ($settings['slug'] ? sanitize_title_with_dashes($settings['slug']) : 'portfolio' ) : 'portfolio'); ?>" size="8" class="">
                        <p class="description"><?php _e('Slug configuration','tlp-portfolio');?></p>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="link_detail_page"><?php _e('Link To Detail Page','tlp-portfolio');?></label></th>
                    <td class="">
                        <fieldset>
                            <legend class="screen-reader-text"><span>Link To Detail Page</span></legend>
                            <?php
                            $opt = array('yes'=>"Yes", 'no'=>"No");
                            $i = 0;
                            $pds = (isset($settings['link_detail_page']) ? ($settings['link_detail_page'] ? $settings['link_detail_page'] : 'yes') : 'yes');
                            foreach ($opt as $key => $value) {
                                $select = (($pds == $key) ? 'checked="checked"' : null);
                                echo "<label title='$value'><input type='radio' $select name='link_detail_page' value='$key' > $value</label>";
                                if($i == 0) echo "<br>";
                                $i++;
                            }
                            ?>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="css"><?php _e('Custom Css','tlp-portfolio');?></label></th>
                    <td>
                        <textarea name="custom_css" cols="40" rows="6"><?php echo (isset($settings['custom_css']) ? ($settings['custom_css'] ? $settings['custom_css'] : null) : null); ?></textarea>
                    </td>
                </tr>

            </table>
            <p class="submit"><input type="submit" name="submit" id="tlpSaveButton" class="button button-primary" value="<?php _e('Save Changes', 'tlp-portfolio'); ?>"></p>

            <?php wp_nonce_field( $TLPportfolio->nonceText(), 'tlp_nonce' ); ?>
            </form>
            <div id="response" class="updated"></div>
        </div>
        <div class="tch-right">
            <div id="pro-feature" class="postbox">
                <div class="handlediv" title="Click to toggle"><br></div><h3 class="hndle ui-sortable-handle"><span>TLP Portfolio Pro</span></h3>
                <div class="inside">
                    <p><strong>Pro Feature</strong></p>
                    <ol>
                        <li>Full Responsive & Mobile Friendly</li>
                        <li>57 Layouts (Even Grid, Masonry Grid, Even Isotope, Masonry Isotope & Carousel Slider)</li>
                        <li>Unlimited Layouts Variation</li>
                        <li>Unlimited Colors</li>
                        <li>Unlimited ShortCode Generator</li>
                        <li>Drag & Drop Ordering</li>
                        <li>Drag & Drop Taxonomy ie Category Ordering</li>
                        <li>Gutter / Padding Control</li>
                        <li>Dynamic image Re-size & Custom image size</li>
                        <li>Detail page with popup next preview button and normal view</li>
                        <li>Device wise Item View Control</li>
                        <li>Visual Composer Compatibility</li>
                        <li> 4 Types of Pagination Normal number, AJAX number Pagination, AJAX Load More & Auto Load on Scroll</li>
                        <li>Layout Preview Under ShortCode Generator</li>
                        <li>Count for Isotope Button</li>
                        <li>Search for Isotope Layouts</li>
                        <li>All Fields Control show/hide</li>
                        <li>RTL Added for Carousel Slider</li>
                        <li>All text color, Size and Text align control</li>
                        <li>Related Portfolio</li>
                    </ol>
                    <p></p><a href="https://radiustheme.com/tlp-portfolio-pro-for-wordpress/" class="button button-primary" target="_blank">Get Pro Version</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="tlp-help">
        <p style="font-weight: bold"><?php _e('Short Code', 'tlp-portfolio' );?> :</p>
        <code>[tlpportfolio col="2" number="4" cat="5,78"  orderby="title" order="ASC" layout="1"]</code><br>
        <p><?php _e('col = The number of column you want to create (1,2,3,4)', 'tlp-portfolio' );?></p>
        <p><?php _e('number = The number of the portfolio, you want to display', 'tlp-portfolio' );?></p>
        <p><?php _e('orderby = Orderby (title , date, menu_order)', 'tlp-portfolio' );?></p>
        <p><?php _e('layout = Layout (1,2,3,isotope)', 'tlp-portfolio' );?></p>
        <p><?php _e('cat = Category id', 'tlp-portfolio' );?></p>
        <p><?php _e('order = ASC, DESC', 'tlp-portfolio' );?></p>
        <p class="tlp-help-link"><a class="button-primary" href="http://demo.radiustheme.com/wordpress/plugins/tlp-portfolio/" target="_blank"><?php _e('Demo', 'tlp-portfolio' );?></a> <a class="button-primary" href="https://radiustheme.com/how-to-setup-and-configure-tlp-portfolio-free-version-for-wordpress/" target="_blank"><?php _e('Documentation', 'tlp-portfolio' );?></a> </p>

    </div>

</div>
