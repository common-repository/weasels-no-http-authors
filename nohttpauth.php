<?php
/*
Plugin Name: Weasel's No HTTP Author
Plugin URI: http://www.thedailyblitz.org/weasels-no-http-author-plugin
Description: Checks to see if the author name in your comments contains "HTTP:" to help filter out spam. This only sets the "spam" flag on the comment; Akismet does the dirty work and actually removes and reports the comment.
Author: Andy Moore
Version: 1.0
Author URI: http://www.thedailyblitz.org
*/

function wz_check_comment( $comment ) {

	$ucase = 'Leader'.strtoupper($comment['comment_author']); // ### adds "leader" so strpos works proper
	$isspammy = strpos($ucase,'HTTP:'); // ### converts username to upper case then checks for the string HTTP:.
	if (!$isspammy) $isspammy = strpos($ucase,'GOODWORK'); // ### Kills any comment with the username containing "goodwork" (common spam)

	if ($isspammy) { 
		add_filter('pre_comment_approved', create_function('$a', 'return \'spam\';'));
		update_option( 'akismet_spam_count', get_option('akismet_spam_count') + 1 );

		$post = get_post( $comment['comment_post_ID'] );
		$last_updated = strtotime( $post->post_modified_gmt );
		$diff = time() - $last_updated;
		$diff = $diff / 86400;

		if ( $post->post_type == 'post' && $diff > 30 && get_option( 'akismet_discard_month' ) == 'true' )
			die;
	}
	return $comment;
}

add_action('preprocess_comment', 'wz_check_comment', 1);

?>
