<?php
/**
 *
 */


/**
 * Game embed Shortcode
 *
 * @param type $atts
 * @return string
 */
function mc_shortcode_game( $atts ) {

	$atts = shortcode_atts( array(
		'id' => 0,
	), $atts );

	extract( $atts );

	// nothing to do so lets go
	if ( empty( $id ) ) {
		return;
	}

	$mc_games = new miniclip_games();
	return $mc_games->embed_game( $id );

}

add_shortcode( 'game', 'mc_shortcode_game' );



/**
 * Game Category
 *
 * @param type $atts
 * @return type
 */
function mc_shortcode_category( $atts ) {

	$quantity = 5;

	$atts = shortcode_atts( array(
		'id' => 0,
	), $atts );

	extract( $atts );

	// nothing to do so lets go
	if ( empty( $id ) ) {
		return;
	}

	$category_id = (int) $id;

	$mc_games = new miniclip_games();

	$category = $mc_games->get_category( $category_id );

	if ( $category && ! is_wp_error( $category ) ) {

		$count = 0;
		$html = '';

		foreach( $category as $game ) {
			if ( '1' == $game['is_webmaster_game'] ) {
				$html .= $mc_games->embed_game( $game['game_id'] );
				$count ++;
			}

			if ( $count >= $quantity ) {
				break;
			}
		}

		return $html;

	}

	return '';

}

add_shortcode( 'game-category', 'mc_shortcode_category' );