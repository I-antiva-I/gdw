<?php

// Add Vote for rating post
add_action( 'wp_ajax_nopriv_iknow_voting', 'iknow_voting' );
add_action( 'wp_ajax_iknow_voting', 'iknow_voting' );

function iknow_voting() {
	// Check for nonce security

	$nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) ) {
		die ( 'Busted!' );
	}

	if ( isset( $_POST['vote'] ) ) {
		// Retrieve user IP address
		$ip      = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
		$post_id = isset( $_POST['post_id'] ) ? absint( wp_unslash( $_POST['post_id'] ) ) : 0;
		$vote    = isset( $_POST['vote'] ) ? sanitize_text_field( wp_unslash( $_POST['vote'] ) ) : 0;

		$meta_vote = get_post_meta( $post_id, $ip, true );

		if ( ! empty( $meta_vote ) ) {
			if ( $meta_vote === $vote ) {
				$response['status']  = 'false';
				$response['message'] = '<span class="has-text-danger">' . esc_html__( 'You have already submitted your vote!', 'iknow-extra' ) . '</span>';
			} else {
				$response['status'] = 'change';
				if ( $vote === 'vote_yea' ) {
					$count_yea = get_post_meta( $post_id, "vote_yea", true );
					$count_ney = get_post_meta( $post_id, "vote_nay", true );

					$count_yea = ! empty( $count_yea ) ? $count_yea : 0;
					$count_yea = $count_yea + 1;

					$count_ney = ! empty( $count_ney ) ? $count_ney : 0;
					$count_ney = $count_ney - 1;

					update_post_meta( $post_id, "vote_yea", $count_yea );
					update_post_meta( $post_id, "vote_nay", $count_ney );
					update_post_meta( $post_id, $ip, 'vote_yea' );

					$response['change_down'] = 'vote_nay';
					$response['change_up']   = 'vote_yea';

				} elseif ( $vote == 'vote_nay' ) {
					$count_ney = get_post_meta( $post_id, "vote_nay", true );
					$count_ney = ! empty( $count_ney ) ? $count_ney : 0;
					$count_ney = $count_ney + 1;


					$count_yea = get_post_meta( $post_id, "vote_yea", true );
					$count_yea = ! empty( $count_yea ) ? $count_yea : 0;
					$count_yea = $count_yea - 1;
					update_post_meta( $post_id, "vote_yea", $count_yea );
					update_post_meta( $post_id, "vote_nay", $count_ney );
					update_post_meta( $post_id, $ip, 'vote_nay' );

					$response['change_down'] = 'vote_yea';
					$response['change_up']   = 'vote_nay';
				}
				$response['message'] = '<span class="has-text-success">' . esc_html__( 'You have successfully changed your mind!', 'iknow-extra' ) . '</span>';
			}
		} else {
			update_post_meta( $post_id, $ip, $vote );
			$response['status'] = 'new';
			if ( $vote == 'vote_yea' ) {
				$meta_count = get_post_meta( $post_id, "vote_yea", true );
				$count      = ! empty( $meta_count ) ? $meta_count + 1 : 1;
				update_post_meta( $post_id, "vote_yea", $count );
				$response['vote'] = 'vote_yea';
			} elseif ( $vote == 'vote_nay' ) {
				$meta_count = get_post_meta( $post_id, "vote_nay", true );
				$count      = ! empty( $meta_count ) ? $meta_count + 1 : 1;
				update_post_meta( $post_id, "vote_nay", $count );
				$response['vote'] = 'vote_nay';
			}
			$response['message'] = '<span class="has-text-success">' . esc_html__( 'Thanks for your vote! You can leave a comment about your experience', 'iknow-extra' ) . '</span>';
		}

		wp_send_json( $response );
		wp_die();
	}
}

// Add Vote for rating comment
add_action( 'wp_ajax_nopriv_iknow_comment_voting', 'iknow_comment_voting' );
add_action( 'wp_ajax_iknow_comment_voting', 'iknow_comment_voting' );

function iknow_comment_voting() {
	$nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) ) {
		die ( 'Busted!' );
	}

	if ( isset( $_POST['vote'] ) ) {
		// Retrieve user IP address
		$ip         = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
		$comment_id = isset( $_POST['comment_id'] ) ? absint( wp_unslash( $_POST['comment_id'] ) ) : 0;
		$vote       = isset( $_POST['vote'] ) ? sanitize_text_field( wp_unslash( $_POST['vote'] ) ) : 0;

		$meta_vote = get_comment_meta( $comment_id, $ip, true );

		if ( ! empty( $meta_vote ) ) {
			if ( $meta_vote === $vote ) {
				$response['status'] = 'false';
			} else {
				$response['status'] = 'change';
				if ( $vote === 'vote_yea' ) {
					$count_yea = get_comment_meta( $comment_id, "vote_yea", true );
					$count_ney = get_comment_meta( $comment_id, "vote_nay", true );

					$count_yea = ! empty( $count_yea ) ? $count_yea : 0;
					$count_yea = $count_yea + 1;

					$count_ney = ! empty( $count_ney ) ? $count_ney : 0;
					$count_ney = $count_ney - 1;

					update_comment_meta( $comment_id, "vote_yea", $count_yea );
					update_comment_meta( $comment_id, "vote_nay", $count_ney );
					update_comment_meta( $comment_id, $ip, 'vote_yea' );

					$response['change_down'] = 'vote_nay';
					$response['change_up']   = 'vote_yea';

				} elseif ( $vote == 'vote_nay' ) {
					$count_ney = get_comment_meta( $comment_id, "vote_nay", true );
					$count_ney = ! empty( $count_ney ) ? $count_ney : 0;
					$count_ney = $count_ney + 1;


					$count_yea = get_comment_meta( $comment_id, "vote_yea", true );
					$count_yea = ! empty( $count_yea ) ? $count_yea : 0;
					$count_yea = $count_yea - 1;
					update_comment_meta( $comment_id, "vote_yea", $count_yea );
					update_comment_meta( $comment_id, "vote_nay", $count_ney );
					update_comment_meta( $comment_id, $ip, 'vote_nay' );

					$response['change_down'] = 'vote_yea';
					$response['change_up']   = 'vote_nay';
				}
			}
		} else {
			update_comment_meta( $comment_id, $ip, $vote );
			$response['status'] = 'new';
			if ( $vote == 'vote_yea' ) {
				$meta_count = get_comment_meta( $comment_id, "vote_yea", true );
				$count      = ! empty( $meta_count ) ? $meta_count + 1 : 1;
				update_comment_meta( $comment_id, "vote_yea", $count );
				$response['vote'] = 'vote_yea';
			} elseif ( $vote == 'vote_nay' ) {
				$meta_count = get_comment_meta( $comment_id, "vote_nay", true );
				$count      = ! empty( $meta_count ) ? $meta_count + 1 : 1;
				update_comment_meta( $comment_id, "vote_nay", $count );
				$response['vote'] = 'vote_nay';
			}
		}
		$response['comment_id'] = $comment_id;
		wp_send_json( $response );
		wp_die();
	}
}

// Show Votes on the Post
function iknow_get_post_voted() {

	$post_id   = get_the_ID();
	$ip        = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
	$meta_vote = get_post_meta( $post_id, $ip, true );

	$yea_disabled = ( $meta_vote === 'vote_yea' ) ? ' disabled="disabled"' : '';
	$nay_disabled = ( $meta_vote === 'vote_nay' ) ? ' disabled="disabled"' : '';

	$count_yea = get_post_meta( $post_id, "vote_yea", true );
	$count_yea = ! empty( $count_yea ) ? $count_yea : 0;

	$count_ney = get_post_meta( $post_id, "vote_nay", true );
	$count_ney = ! empty( $count_ney ) ? $count_ney : 0;

	$yea_button = '<button class="button is-success is-rounded is-outlined vote" data-vote="vote_yea" data-post="' . absint( $post_id ) . '" ' . $yea_disabled . '>';
	$yea_button .= '<span class="icon"><i class="icon-vote-up"></i></span>';
	$yea_button .= '<span>' . esc_attr__( 'Yes', 'iknow-extra' ) . '</span>';
	$yea_button .= '</button>';

	$nay_button = '<button class="button is-danger is-rounded is-outlined vote" data-vote="vote_nay" data-post="' . absint( $post_id ) . '" ' . $nay_disabled . '>';
	$nay_button .= '<span>' . esc_attr__( 'No', 'iknow-extra' ) . '</span>';
	$nay_button .= '<span class="icon"><i class="icon-vote-down"></i></span>';
	$nay_button .= '</button>';

	$yea_bold = ( $count_yea > $count_ney ) ? ' has-text-weight-bold' : '';
	$ney_bold = ( $count_yea < $count_ney ) ? ' has-text-weight-bold' : '';

	$total = $count_yea + $count_ney;
	if ( $total === 0 ) {
		$positive = 0;
	} else {
		$positive = round( $count_yea / $total * 100 );
	}

	$out = '	
	<section class="section voting" id="voting">
	<div class="level">
		<div class="level-left">
			<div class="level-item">
				<p class="subtitle is-size-5">
					' . esc_attr__( 'Was this helpful', 'iknow-extra' ) . '?
				</p>
			</div>
			<div class="level-item">							
				<p class="buttons has-addons">
					' . $yea_button . $nay_button . '
				</p>				
			</div>
		</div>
		<div class="level-right has-text-centered">
			<div>
				<p class="heading is-marginless">
					<span id="vote_yea" class="has-text-success' . esc_attr( $yea_bold ) . '">' . absint( $count_yea ) . '</span> / 
					<span id="vote_nay" class="has-text-danger' . esc_attr( $ney_bold ) . '">' . absint( $count_ney ) . '</span>
				</p>
				<progress class="progress is-small is-success " id="vote-progress" value="' . absint( $positive ) . '" max="100"></progress>
				
			</div>
		</div>
		</div>
		<div class="has-text-centered"><span id="vote-response"></span></div>
	</section>';

	return $out;
}

// Function using in archive and search pages.
function iknow_get_helpful( $post_id = 0 ) {
	$post_id = ! empty( $post_id ) ? $post_id : get_the_ID();

	$count_yea = get_post_meta( $post_id, "vote_yea", true );
	$count_yea = ! empty( $count_yea ) ? $count_yea : 0;

	$count_ney = get_post_meta( $post_id, "vote_nay", true );
	$count_ney = ! empty( $count_ney ) ? $count_ney : 0;

	$total = $count_yea + $count_ney;
	if ( $total === 0 ) {
		$result = 0;
	} else {
		$result = round( $count_yea / $total * 100 );
	}
	$out = '';
	if ( $result > 50 ) {
		$out = '<span class="has-text-success">' . absint( $result ) . '%</span>';
	} elseif ( $result < 50 ) {
		$out = '<span class="has-text-danger">' . absint( $result ) . '%</span>';

	} else {
		$out = '<span>' . absint( $result ) . '%</span>';
	}

	echo wp_kses_post( $out );
}

function iknow_get_comment_voted( $comment_id ) {
	$ip        = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
	$meta_vote = get_comment_meta( $comment_id, $ip, true );

	$yea_disabled = ( $meta_vote === 'vote_yea' ) ? ' disabled="disabled"' : '';
	$nay_disabled = ( $meta_vote === 'vote_nay' ) ? ' disabled="disabled"' : '';

	$count_yea = get_comment_meta( $comment_id, "vote_yea", true );
	$count_yea = ! empty( $count_yea ) ? $count_yea : 0;

	$count_ney = get_comment_meta( $comment_id, "vote_nay", true );
	$count_ney = ! empty( $count_ney ) ? $count_ney : 0;

	$yea_button = '<button class="button is-small is-success is-outlined vote-comment" id="comment_vote_yea_' . absint( $comment_id ) . '" data-vote-value="vote_yea" data-vote-type="comment" data-vote-id="' . absint( $comment_id ) . '" ' . $yea_disabled . '>';
	$yea_button .= '<span class="icon"><i class="icon-vote-up"></i></span>';
	$yea_button .= '<span class="comment-vote-count">' . absint( $count_yea ) . '</span>';
	$yea_button .= '</button>';

	$nay_button = '<button class="button is-small is-danger is-outlined vote-comment" id="comment_vote_nay_' . absint( $comment_id ) . '" data-vote-value="vote_nay" data-vote-type="comment" data-vote-id="' . absint( $comment_id ) . '" ' . $nay_disabled . '>';
	$nay_button .= '<span class="comment-vote-count">' . absint( $count_ney ) . '</span>';
	$nay_button .= '<span class="icon"><i class="icon-vote-down"></i></span>';
	$nay_button .= '</button>';


	$out = '	
	<p class="buttons has-addons">
		' . $yea_button . $nay_button . '
     </p>';

	echo wp_kses_post( $out );
}

// Add voiting into single post content
add_filter( 'the_content', 'iknow_post_content_voting' );
function iknow_post_content_voting( $content ) {
	if ( ! is_singular( 'post' ) ) {
		return $content;
	}
	$voting = iknow_get_post_voted();

	return $content . $voting;
}


// Add new column to the Posts list
add_filter( 'manage_posts_columns', 'iknow_post_columns_vote_head', 4 );
function iknow_post_columns_vote_head( $defaults ) {
	$new = array();

	foreach ( $defaults as $key => $value ) {
		if ( $key === 'date' ) {
			$new['voting'] = esc_attr( 'Voting', 'iknow-extra' );
		}
		$new[ $key ] = $value;
	}

	return $new;
}


// Show the voting result
add_action( 'manage_post_posts_custom_column', 'iknow_post_columns_vote_content', 5, 2 );
function iknow_post_columns_vote_content( $column_name, $post_ID ) {
	if ( $column_name == 'voting' ) {

		$count_yea = get_post_meta( $post_ID, "vote_yea", true );
		$count_yea = ! empty( $count_yea ) ? $count_yea : 0;

		$count_ney = get_post_meta( $post_ID, "vote_nay", true );
		$count_ney = ! empty( $count_ney ) ? $count_ney : 0;
		?>

		<span style="color:#37c781;"><i class="icon-vote-up"></i> <?php echo esc_attr( $count_yea ); ?></span> /
		<span style="color:#f14668;"><?php echo esc_html( $count_ney ); ?> <i class="icon-vote-down"></i></span>
		<?php

	}
}

// Add new column to the Comment list
add_filter( 'manage_edit-comments_columns', 'iknow_comment_columns' );
function iknow_comment_columns( $columns ) {
	$new = array();

	foreach ( $columns as $key => $value ) {
		if ( $key === 'date' ) {
			$new['voting'] = esc_attr( 'Voting', 'iknow-extra' );
		}
		$new[ $key ] = $value;
	}

	return $new;

}

// Show the voting result on Comment
add_filter( 'manage_comments_custom_column', 'iknow_comment_column_content', 10, 2 );
function iknow_comment_column_content( $column, $comment_ID ) {

	if ( $column == 'voting' ) {

		$count_yea = get_comment_meta( $comment_ID, "vote_yea", true );
		$count_yea = ! empty( $count_yea ) ? $count_yea : 0;

		$count_ney = get_comment_meta( $comment_ID, "vote_nay", true );
		$count_ney = ! empty( $count_ney ) ? $count_ney : 0;

		?>

		<span style="color:#37c781;"><i class="icon-vote-up"></i> <?php echo esc_attr( $count_yea ); ?></span> /
		<span style="color:#f14668;"><?php echo esc_html( $count_ney ); ?> <i class="icon-vote-down"></i></span>
		<?php
	}
}