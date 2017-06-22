<?php
if( !class_exists( 'TLPportSupport' ) ) :

	class TLPportSupport {

		function verifyNonce( ){
            global $TLPportfolio;
            $nonce      = !empty($_REQUEST['tlp_nonce']) ? $_REQUEST['tlp_nonce'] : null;
            $nonceText  = $TLPportfolio->nonceText();
            if( !wp_verify_nonce( $nonce, $nonceText ) ) die('Security check');
            return true;
        }

        function nonceText(){
        	return "tlp_portfolio_nonce";
        }

        function socialLink(){
            return array(
                    'facebook' => 'Facebook',
                    'twitter'   => 'Twitter',
                    'linkedin' => 'LinkedIn'
                );
        }

        function owl_property(){
            return array(
                    'auto_play' => __('Auto Play','tlp-portfolio'),
                    'navigation'   => __('Navigation','tlp-portfolio'),
                    'pagination'   => __('Pagination','tlp-portfolio'),
                    'stop_hover'    => __('Stop Hover','tlp-portfolio'),
                    'responsive'    => __('Responsive','tlp-portfolio'),
                    'auto_height'   => __('Auto Height','tlp-portfolio'),
                    'lazy_load'     => __('Lazy Load','tlp-portfolio')
                );
        }

        function TLPhex2rgba($color, $opacity = false) {
            $default = 'rgb(0,0,0)';

            //Return default if no color provided
            if(empty($color))
                return $default;

            //Sanitize $color if "#" is provided
            if ($color[0] == '#' ) {
                $color = substr( $color, 1 );
            }

            //Check if color has 6 or 3 characters and get values
            if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
            } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
            } else {
                return $default;
            }

            //Convert hexadec to rgb
            $rgb =  array_map('hexdec', $hex);

            //Check if opacity is set(rgba or rgb)
            if($opacity){
                if(abs($opacity) > 1)
                    $opacity = 1.0;
                $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
            } else {
                $output = 'rgb('.implode(",",$rgb).')';
            }

            //Return rgb(a) color string
            return $output;
        }

        function singlePortfolioMeta($id = null)
        {
            global $TLPportfolio;
            $id = (!$id ? get_the_ID() : $id);
            if (!$id) return;

            $project_url = get_post_meta($id, 'project_url', true);
            $tools = get_post_meta(get_the_ID(), 'tools', true);
            $categories = strip_tags(get_the_term_list($id, $TLPportfolio->taxonomies['category'], __('Categories: ','tlp-portfolio'), ', '));
            $tags = strip_tags(get_the_term_list($id, $TLPportfolio->taxonomies['tag'], 'Tags: ', ', '));

            $html = null;
            $html.= '<ul class="single-item-meta">';
            if ($project_url) {
                $html .= '<li>'.__('Project URL', 'tlp-portfolio').': <a  href="' . $project_url . '" target="_blank">'.$project_url.'</a></li>';
            }
            if ($categories) {
                $html .= '<li class="categories">' . $categories . '</li>';
            }
            if ($tools) {
                $html .= '<li class="tools">'.__('Tools', 'tlp-portfolio').': ' . $tools . '</li>';
            }
            if ($tags) {
                $html .= '<li class="tags">' . $tags . '</li>';
            }
            $html .= "</ul>";
            if($html){
                $html = "<ul class='single-item-meta'>{$html}</ul>";
            }

            return $html;
        }

        function socialShare($pLink){
            $html = null;
            $html .="<div class='single-portfolio-share'>
                        <div class='fb-share'>
                            <div class='fb-share-button' data-href='{$pLink}' data-layout='button_count'></div>
                        </div>
                        <div class='twitter-share'>
                            <a href='{$pLink}' class='twitter-share-button'{count} data-url='https://about.twitter.com/resources/buttons#tweet'>Tweet</a>
                        </div>
                        
                        <div class='linkedin-share'>
                            <script type='IN/Share' data-counter='right'></script>
                        </div>
                        <div class='googleplus-share'>
                            <div class='g-plusone'></div>
                        </div>
                   </div>";
            $html .= '<div id="fb-root"></div>
            <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, "script", "facebook-jssdk"));</script>';
            $html .="<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
            <script>window.___gcfg = { lang: 'en-US', parsetags: 'onload', };</script>";
            $html .= "<script src='https://apis.google.com/js/platform.js' async defer></script>";
            $html .='<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>';
            $html .='<script async defer src="//assets.pinterest.com/js/pinit.js"></script>';

            return $html;
        }

	}
endif;
