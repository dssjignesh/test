<?php

if ( ! class_exists( 'TLPportShortCode' ) ):

	/**
	 *
	 */
	class TLPportShortCode {

		function __construct() {
			add_shortcode( 'tlpportfolio', array( $this, 'portfolio_shortcode' ) );
		}

		function portfolio_shortcode( $atts, $content = "" ) {
			global $TLPportfolio;
			wp_enqueue_style( 'tlpportfolio-fontawsome', $TLPportfolio->assetsUrl . 'vendor/font-awesome/css/font-awesome.min.css' );
			wp_enqueue_script( 'tlpportfolio-magnific', $TLPportfolio->assetsUrl . 'vendor/jquery.magnific-popup.min.js', array( 'jquery' ), null, true );
			wp_enqueue_script( 'tlpportfolio-isotope-image', $TLPportfolio->assetsUrl . 'vendor/isotope/imagesloaded.pkgd.min.js', array( 'jquery' ), null, true );
			wp_enqueue_script( 'tlpportfolio-isotope', $TLPportfolio->assetsUrl . 'vendor/isotope/isotope.pkgd.min.js', array(
				'jquery',
				'tlpportfolio-isotope-image'
			), null, true );
			wp_enqueue_script( 'tlpportfolio-js', $TLPportfolio->assetsUrl . 'js/tlpportfolio.js', array( 'jquery' ), null, true );

			$atts = shortcode_atts( array(
				'orderby' => 'date',
				'order'   => 'DESC',
				'number'  => 4,
				'col'     => 3,
				'layout'  => 1,
				'cat'     => null,
			), $atts, 'tlpportfolio' );

			if ( ! in_array( $atts['col'], array( 1, 2, 3, 4, 6 ) ) ) {
				$atts['col'] = 3;
			}
			if ( ! in_array( $atts['layout'], array( 1, 2, 3, 'isotope' ) ) ) {
				$atts['layout'] = 1;
			}
			$grid1 = $atts['col'];
			$grid  = 12 / $grid1;
			if ( $atts['col'] == 2 ) {
				$image_area   = "tlp-col-lg-5 tlp-col-md-5 tlp-col-sm-6 tlp-col-xs-12 ";
				$content_area = "tlp-col-lg-7 tlp-col-md-7 tlp-col-sm-6 tlp-col-xs-12 ";
			} else {
				$image_area   = "tlp-col-lg-3 tlp-col-md-3 tlp-col-sm-6 tlp-col-xs-12 ";
				$content_area = "tlp-col-lg-9 tlp-col-md-9 tlp-col-sm-6 tlp-col-xs-12 ";
			}

			$html = null;
			$rand = rand( 1, 10 );
			$args = array(
				'post_type'      => $TLPportfolio->post_type,
				'post_status'    => 'publish',
				'posts_per_page' => $atts['number'],
				'orderby'        => $atts['orderby'],
				'order'          => $atts['order']
			);
			if ( is_user_logged_in() && is_super_admin() ) {
				$args['post_status'] = array( 'publish', 'private' );
			}

			if ( ! empty( $atts['cat'] ) ) {
				$ids = explode(",", $atts['cat']);
				$args['tax_query'] = array(
					array(
						'taxonomy' => $TLPportfolio->taxonomies['category'],
						'field'    => 'term_id',
						'terms'    => $ids,
						'operator'  => 'IN'
					),
				);
			}

			$teamQuery = new WP_Query( $args );

			$html .= '<div class="container-fluid tlp-portfolio ">';
			$html .= '<div class="row layout' . $atts['layout'] . '">';
			if ( $teamQuery->have_posts() ) {
				if ( $atts['layout'] == 'isotope' ) {
					$terms = get_terms( $TLPportfolio->taxonomies['category'], array(
						'orderby'    => 'name',
						'order'      => 'ASC',
						'hide_empty' => false,
					) );
					$html .= '<div id="tlp-portfolio-isotope-button" class="button-group filter-button-group option-set">
											<button data-filter="*" class="selected">Show all</button>';
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
						foreach ( $terms as $term ) {
							$html .= "<button data-filter='.{$term->slug}'>" . $term->name . "</button>";
						}
					}
					$html .= '</div>';
					$html .= '<div class="tlp-portfolio-isotope">';
				}

				while ( $teamQuery->have_posts() ) : $teamQuery->the_post();

					$title       = get_the_title();
					$iID         = get_the_ID();
					$$project_url       = get_permalink();
					$short_d     = get_post_meta( $iID, 'short_description', true );
					$plink = get_post_meta( $iID, 'project_url', true );
					$tools       = get_post_meta( $iID, 'tools', true );
					$categories  = get_the_term_list( $iID, $TLPportfolio->taxonomies['category'], 'Category : ', ',' );
					$tags        = get_the_term_list( $iID, $TLPportfolio->taxonomies['tag'], 'Tags : ', ',' );

					$catClass  = null;
					$catAs     = wp_get_post_terms( $iID, $TLPportfolio->taxonomies['category'], array( "fields" => "all" ) );
					$deptClass = null;
					if ( ! empty( $catAs ) ) {
						foreach ( $catAs as $cat ) {
							$catClass .= " " . $cat->slug;
						}
					}
					$img     = null;
					$imgFull = null;
					if ( has_post_thumbnail() ) {
						$image     = wp_get_attachment_image_src( get_post_thumbnail_id( $iID ), $TLPportfolio->options['feature_img_size'] );
						$img       = $image[0];
						$imageFull = wp_get_attachment_image_src( get_post_thumbnail_id( $iID ), 'full' );
						$imgFull   = $imageFull[0];
					} else {
						$img = $TLPportfolio->assetsUrl . 'images/demo.jpg';
					}
					if ( ! $imgFull ) {
						$imgFull = $img;
					}
					$itemArg             = array();
					$itemArg['title']    = $title;
					$itemArg['plink']    = $plink;
					$itemArg['img']      = $img;
					$itemArg['imgFull']  = $imgFull;
					$itemArg['short_d']  = $short_d;
					$itemArg['grid']     = $grid;
					$itemArg['rand']     = $rand;
					$itemArg['catClass'] = $catClass;
					if ( $atts['layout'] ) {
						switch ( $atts['layout'] ) {
							case 1:
								$html .= $this->templateOne( $title, $plink, $img, $imgFull, $short_d, $grid );
								break;

							case 2:
								$html .= $this->templateTwo( $title, $plink, $img, $imgFull, $short_d, $grid, $image_area, $content_area );
								break;

							case 3:
								$html .= $this->templateThree( $title, $plink, $img, $imgFull, $short_d, $grid );
								break;

							case 'isotope':
								$html .= $this->layoutIsotope( $itemArg );
								break;

							default:
								# code...
								break;
						}
					}
				endwhile;
				wp_reset_postdata();
				if ( $atts['layout'] == 'isotope' ) {
					$html .= '</div>'; // end tlp-team-isotope
				}
			} else {
				$html .= "<p>No portfolio found</p>";
			}
			$html .= '</div>'; // end row
			$html .= '</div>'; // end container

			return $html;
		}


		function templateOne( $title, $plink, $img, $imgFull, $short_d, $grid ) {
			$html = null;
			$html .= "<div class='tlp-col-lg-{$grid} tlp-col-md-{$grid} tlp-col-sm-6 tlp-col-xs-12 tlp-equal-height'>";
			$html .= '<div class="tlp-portfolio-item">';
			$html .= '<div class="tlp-portfolio-thum tlp-item">';
			$html .= '<img class="img-responsive" src="' . $img . '" alt="' . $title . '"/>';
			$html .= '<div class="tlp-overlay">';
			$html .= '<p class="link-icon">';
			$html .= '<a class="tlp-zoom" href="' . $imgFull . '"><i class="fa fa-search-plus"></i></a>';
			$html .= '<a target="_blank" href="' . $plink . '"><i class="fa fa-external-link"></i></a>';
			$html .= '</p>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '<div class="tlp-content">';
			$html .= '<div class="tlp-content-holder">';
			$html .= '<h3><a href="' . $plink . '">' . $title . '</a></h3>';
			$html .= '<p>' . substr( $short_d, 0, 100 ) . ' </p>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';

			return $html;
		}

		function templateTwo( $title, $plink, $img, $imgFull, $short_d, $grid, $image_area, $content_area ) {
			$html = null;
			$html .= "<div class='tlp-col-lg-{$grid} tlp-col-md-{$grid} tlp-col-sm-6 tlp-col-xs-12 tlp-equal-height'>";
			$html .= '<div class="tlp-portfolio-item">';
			$html .= '<div class="tlp-portfolio-thum tlp-item ' . $image_area . '">';
			if ( $img ) {
				$html .= '<figure>';
				$html .= '<img class="img-responsive" src="' . $img . '" alt="' . $title . '"/>';
				$html .= '</figure>';
			}
			$html .= '<div class="tlp-overlay">';
			$html .= '<ul class="link-icon">';
			$html .= '<a class="tlp-zoom" href="' . $imgFull . '"><i class="fa fa-search-plus"></i></a>';
			$html .= '<a target="_blank" href="' . $plink . '"><i class="fa fa-external-link"></i></a>';
			$html . '</ul>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '<div class="tlp-content2 ' . $content_area . '">';
			$html .= '<div class="tlp-content-holder">';
			$html .= '<h3><a href="' . $plink . '">' . $title . '</a></h3>';
			$html .= '<p>' . substr( $short_d, 0, 100 ) . ' </p>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';

			return $html;
		}

		function templateThree( $title, $plink, $img, $imgFull, $short_d, $grid ) {
			$html = null;
			$html .= "<div class='tlp-col-lg-{$grid} tlp-col-md-{$grid} tlp-col-sm-6 tlp-col-xs-12 tlp-equal-height'>";

			$html .= '<div class="tlp-portfolio-item">';
			$html .= '<div class="tlp-portfolio-thum tlp-item">';
			if ( $img ) {
				$html .= '<figure>';
				$html .= '<img class="img-responsive" src="' . $img . '" alt="' . $title . '"/>';
				$html .= '</figure>';
			}
			$html .= '<div class="tlp-overlay">';
			$html .= '<p class="link-icon">';
			$html .= '<a class="tlp-zoom" href="' . $imgFull . '"><i class="fa fa-search-plus"></i></a>';
			$html .= '<a target="_blank" href="' . $plink . '"><i class="fa fa-external-link"></i></a>';
			$html .= '</p>';
			$html .= '</div>';
			$html .= '</div>';

			$html .= '<div class="tlp-content2">';
			$html .= '<div class="tlp-content-holder">';
			$html .= '<h3><a href="' . $plink . '">' . $title . '</a></h3>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';

			$html .= '</div>';

			return $html;
		}

		function layoutIsotope( $itemArg ) {
			extract( $itemArg );
			$html = null;
			$html .= "<div class='tlp-item tlp-single-item tlp-equal-height tlp-col-lg-{$grid} tlp-col-md-{$grid} tlp-col-sm-6 tlp-col-xs-12 {$catClass}'>";
			$html .= '<div class="tlp-portfolio-item">';
			$html .= '<div class="tlp-portfolio-thum tlp-item">';
			$html .= '<img class="img-responsive" src="' . $img . '" alt="' . $title . '"/>';
			$html .= '<div class="tlp-overlay">';
			$html .= '<p class="link-icon">';
			$html .= '<a class="tlp-zoom" href="' . $imgFull . '"><i class="fa fa-search-plus"></i></a>';
			$html .= '<a target="_blank" href="' . $plink . '"><i class="fa fa-external-link"></i></a>';
			$html .= '</p>';
			$html .= '</div>';
			$html .= '</div>';

			$html .= '<div class="tlp-content">';
			$html .= '<div class="tlp-content-holder">';
			$html .= '<h3><a href="' . $plink . '">' . $title . '</a></h3>';
			$html .= '<p>' . substr( $short_d, 0, 100 ) . ' </p>';

			$html .= '</div>';
			$html .= '</div>';

			$html .= '</div>';


			$html .= '</div>';

			return $html;
		}
	}


endif;
