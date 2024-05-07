<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include( 'variables/style.php' );


$css = '';


$css .= '
	#notification-' . $id . ' {
	' . $location . '
	border-radius: ' . $border_radius . ';
	' . $box_shadow . '
	}
';

// Close Button
$css .= '
	#notification-' . $id . ' .notification-close {
		font-size: ' . $close_size . 'px;
		color:     ' . $close_color . ';
	}
';

// Icon Block
$css .= '
	#notification-' . $id . ' .notification-img{
		width:         ' . $icon_width . ';
		background:    ' . $icon_background . ';
		border-radius: ' . $border_radius . ' 0 0 ' . $border_radius . ';
		border-top:    ' . $border . ';
		border-bottom: ' . $border . ';
		border-left:   ' . $border . ';
	}
';

// Custom Image width
$css .= '
	#notification-' . $id . ' .notification-img img {
		width: ' . $icon_size . 'px;
	}
';

// Icon
$css .= '
	#notification-' . $id . ' .notification-img span {
		font-size: ' . $icon_size . ';
		color:     ' . $icon_color . ';
	}
';

// Content Block
$css .= '
	#notification-' . $id . ' .notification-text-block {
		background:    ' . $background . ';
		width:         ' . $content_width . ';
		height:        ' . $content_height . ';
		border-radius: 0 ' . $border_radius . ' ' . $border_radius . ' 0;
		border-top:    ' . $border . ';
		border-bottom: ' . $border . ';
		border-right:  ' . $border . ';
	}
';

// Title
$css .= '
	#notification-' . $id . ' .notification-title {
		font-family: ' . $title_font . ';
		font-size:   ' . $title_size . ';
		font-weight: ' . $title_font_weight . ';
		font-style:  ' . $title_font_style . ';
		line-height: ' . $title_line_height . ';
		text-align:  ' . $title_align . ';
		color:       ' . $title_color . ';
	}
';

// Content
$css .= '
	#notification-' . $id . ' .notification-text {
		font-family: ' . $content_font . ';
		font-size:   ' . $content_size . ';
		line-height: ' . $content_line_height . ';
		color:       ' . $text_color . ';
	}
';

if ( ! empty( $include_mobile ) ) {
	$css .= '
			@media only screen and (max-width: ' . $screen . 'px){
			#notification-' . $id . ' {
					display:none !important;
				}
			}
		';
}

if ( ! empty( $include_more_screen ) ) {
	$css .= '
			@media only screen and (min-width: ' . $screen_more . 'px){
			#notification-' . $id . ' {
					display:none !important;
				}
			}
		';
}

$css = trim( preg_replace( '~\s+~s', ' ', $css ) );
