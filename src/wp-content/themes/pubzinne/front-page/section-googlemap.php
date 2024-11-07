<div class="front_page_section front_page_section_googlemap<?php
	$pubzinne_scheme = pubzinne_get_theme_option( 'front_page_googlemap_scheme' );
	if ( ! empty( $pubzinne_scheme ) && ! pubzinne_is_inherit( $pubzinne_scheme ) ) {
		echo ' scheme_' . esc_attr( $pubzinne_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( pubzinne_get_theme_option( 'front_page_googlemap_paddings' ) );
	if ( pubzinne_get_theme_option( 'front_page_googlemap_stack' ) ) {
		echo ' sc_stack_section_on';
	}
?>"
		<?php
		$pubzinne_css      = '';
		$pubzinne_bg_image = pubzinne_get_theme_option( 'front_page_googlemap_bg_image' );
		if ( ! empty( $pubzinne_bg_image ) ) {
			$pubzinne_css .= 'background-image: url(' . esc_url( pubzinne_get_attachment_url( $pubzinne_bg_image ) ) . ');';
		}
		if ( ! empty( $pubzinne_css ) ) {
			echo ' style="' . esc_attr( $pubzinne_css ) . '"';
		}
		?>
>
<?php
	// Add anchor
	$pubzinne_anchor_icon = pubzinne_get_theme_option( 'front_page_googlemap_anchor_icon' );
	$pubzinne_anchor_text = pubzinne_get_theme_option( 'front_page_googlemap_anchor_text' );
if ( ( ! empty( $pubzinne_anchor_icon ) || ! empty( $pubzinne_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_googlemap"'
									. ( ! empty( $pubzinne_anchor_icon ) ? ' icon="' . esc_attr( $pubzinne_anchor_icon ) . '"' : '' )
									. ( ! empty( $pubzinne_anchor_text ) ? ' title="' . esc_attr( $pubzinne_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_googlemap_inner
		<?php
		$pubzinne_layout = pubzinne_get_theme_option( 'front_page_googlemap_layout' );
		echo ' front_page_section_layout_' . esc_attr( $pubzinne_layout );
		if ( pubzinne_get_theme_option( 'front_page_googlemap_fullheight' ) ) {
			echo ' pubzinne-full-height sc_layouts_flex sc_layouts_columns_middle';
		}
		?>
		"
			<?php
			$pubzinne_css      = '';
			$pubzinne_bg_mask  = pubzinne_get_theme_option( 'front_page_googlemap_bg_mask' );
			$pubzinne_bg_color_type = pubzinne_get_theme_option( 'front_page_googlemap_bg_color_type' );
			if ( 'custom' == $pubzinne_bg_color_type ) {
				$pubzinne_bg_color = pubzinne_get_theme_option( 'front_page_googlemap_bg_color' );
			} elseif ( 'scheme_bg_color' == $pubzinne_bg_color_type ) {
				$pubzinne_bg_color = pubzinne_get_scheme_color( 'bg_color', $pubzinne_scheme );
			} else {
				$pubzinne_bg_color = '';
			}
			if ( ! empty( $pubzinne_bg_color ) && $pubzinne_bg_mask > 0 ) {
				$pubzinne_css .= 'background-color: ' . esc_attr(
					1 == $pubzinne_bg_mask ? $pubzinne_bg_color : pubzinne_hex2rgba( $pubzinne_bg_color, $pubzinne_bg_mask )
				) . ';';
			}
			if ( ! empty( $pubzinne_css ) ) {
				echo ' style="' . esc_attr( $pubzinne_css ) . '"';
			}
			?>
	>
		<div class="front_page_section_content_wrap front_page_section_googlemap_content_wrap
		<?php
		if ( 'fullwidth' != $pubzinne_layout ) {
			echo ' content_wrap';
		}
		?>
		">
			<?php
			// Content wrap with title and description
			$pubzinne_caption     = pubzinne_get_theme_option( 'front_page_googlemap_caption' );
			$pubzinne_description = pubzinne_get_theme_option( 'front_page_googlemap_description' );
			if ( ! empty( $pubzinne_caption ) || ! empty( $pubzinne_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				if ( 'fullwidth' == $pubzinne_layout ) {
					?>
					<div class="content_wrap">
					<?php
				}
					// Caption
				if ( ! empty( $pubzinne_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h2 class="front_page_section_caption front_page_section_googlemap_caption front_page_block_<?php echo ! empty( $pubzinne_caption ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses( $pubzinne_caption, 'pubzinne_kses_content' );
					?>
					</h2>
					<?php
				}

					// Description (text)
				if ( ! empty( $pubzinne_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_googlemap_description front_page_block_<?php echo ! empty( $pubzinne_description ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses( wpautop( $pubzinne_description ), 'pubzinne_kses_content' );
					?>
					</div>
					<?php
				}
				if ( 'fullwidth' == $pubzinne_layout ) {
					?>
					</div>
					<?php
				}
			}

			// Content (text)
			$pubzinne_content = pubzinne_get_theme_option( 'front_page_googlemap_content' );
			if ( ! empty( $pubzinne_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				if ( 'columns' == $pubzinne_layout ) {
					?>
					<div class="front_page_section_columns front_page_section_googlemap_columns columns_wrap">
						<div class="column-1_3">
					<?php
				} elseif ( 'fullwidth' == $pubzinne_layout ) {
					?>
					<div class="content_wrap">
					<?php
				}

				?>
				<div class="front_page_section_content front_page_section_googlemap_content front_page_block_<?php echo ! empty( $pubzinne_content ) ? 'filled' : 'empty'; ?>">
				<?php
					echo wp_kses( $pubzinne_content, 'pubzinne_kses_content' );
				?>
				</div>
				<?php

				if ( 'columns' == $pubzinne_layout ) {
					?>
					</div><div class="column-2_3">
					<?php
				} elseif ( 'fullwidth' == $pubzinne_layout ) {
					?>
					</div>
					<?php
				}
			}

			// Widgets output
			?>
			<div class="front_page_section_output front_page_section_googlemap_output">
				<?php
				if ( is_active_sidebar( 'front_page_googlemap_widgets' ) ) {
					dynamic_sidebar( 'front_page_googlemap_widgets' );
				} elseif ( current_user_can( 'edit_theme_options' ) ) {
					if ( ! pubzinne_exists_trx_addons() ) {
						pubzinne_customizer_need_trx_addons_message();
					} else {
						pubzinne_customizer_need_widgets_message( 'front_page_googlemap_caption', 'ThemeREX Addons - Google map' );
					}
				}
				?>
			</div>
			<?php

			if ( 'columns' == $pubzinne_layout && ( ! empty( $pubzinne_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div></div>
				<?php
			}
			?>
		</div>
	</div>
</div>
