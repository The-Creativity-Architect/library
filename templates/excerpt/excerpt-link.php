<?php
/**
 * Show the appropriate content for the Link post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage creativity_architect
 * @since Narrative Architect 1.0
 */

// Print the 1st instance of a paragraph block. If none is found, print the content.
if ( has_block( 'core/paragraph', get_the_content() ) ) {

	creativity_architect_print_first_instance_of_block( 'core/paragraph', get_the_content() );
} else {

	the_content();
}
