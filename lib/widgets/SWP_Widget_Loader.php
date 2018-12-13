<?php

/**
* A class designed to queue up and register this plugins widgets.
*
* @package   SocialWarfare\Functions\Widgets
* @copyright Copyright (c) 2018, Warfare Plugins, LLC
* @license   GPL-3.0+
* @since     3.0.0 | 22 FEB 2018 | Class Created
*
*/
class SWP_Widget_Loder {


	/**
	 * The magic method used to instantiate this class.
	 *
	 * @since  3.0.0
	 * @param  none
	 * @return none
	 * @access public
	 *
	 */
	public function __construct() {
		add_action( 'widgets_init', array( $this , 'register_widgets' ) );
	}


	/**
	 * The function that runs on the widgets_init hook and registers
	 * our widget with WordPress.
	 *
	 * @since  3.0.0
	 * @param  none
	 * @return none
	 */
	function register_widgets() {
		$widgets = apply_filters( 'swp_widgets', array() );
        // Apply default values after filtering to guarantee ours are included.
		$widgets = array_merge(array( 'swp_popular_posts_widget' ), $widgets );

		foreach( $widgets as $widget ) {
			
		}

		register_widget(  );
	}
}
