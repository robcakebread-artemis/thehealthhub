<?php

if (!defined('ABSPATH')) die('No direct access allowed');

/*****************************************************/
/* Add Custom Text Widget                            */
/*****************************************************/

// Creating the widget 
class aws_enhanced_text extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'aws_enhanced_text', 

		// Widget name will appear in UI
		__('AWS Enhanced Text', 'aws_enhanced_text_domain'), 

		// Widget description
		array( 'description' => __( 'This is an enhanced version of the basic text widget', 'aws_enhanced_text_domain' ), ) 
		);
	}

	/**
	 * Outputs the content for the current Text widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Text widget instance.
	 */
	function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$widget_text = ! empty( $instance['text'] ) ? $instance['text'] : '';
		$class = ! empty( $instance['class'] ) ? $instance['class'].' ' : '';
		$title_link = ! empty( $instance['title_link'] ) ? $instance['title_link'].' ' : '';
		
		

		/**
		 * Filter the content of the Text widget.
		 *
		 * @since 2.3.0
		 * @since 4.4.0 Added the `$this` parameter.
		 *
		 * @param string         $widget_text The widget content.
		 * @param array          $instance    Array of settings for the current widget.
		 * @param WP_Widget_Text $this        Current Text widget instance.
		 */
		$text = apply_filters( 'widget_text', $widget_text, $instance, $this );
		$before_widget = $args['before_widget'];
		$before_widget = str_replace('class="', 'class="'. $class, $before_widget);
		
		//echo $args['before_widget'];
		echo $before_widget;
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . ($title_link == '' ? '' : '<a href="'.$title_link.'">') . $title. ($title_link == '' ? '' : '</a href="'.$title_link.'">') . $args['after_title'];
		} ?>
			<div class="textwidget"><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Handles updating settings for the current Text widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Settings to save or bool false to cancel saving.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['class'] = sanitize_text_field( $new_instance['class'] );
		$instance['title_link'] = sanitize_text_field( $new_instance['title_link'] );
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = wp_kses_post( stripslashes( $new_instance['text'] ) );
		$instance['filter'] = ! empty( $new_instance['filter'] );
		return $instance;
	}

	/**
	 * Outputs the Text widget settings form.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'class' => '', 'title_link' => '') );
		$filter = isset( $instance['filter'] ) ? $instance['filter'] : 0;
		$title = sanitize_text_field( $instance['title'] );
		$class = sanitize_text_field( $instance['class'] );
		$title_link = sanitize_text_field( $instance['title_link'] );
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('class'); ?>"><?php _e('Extra Class(es):'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('class'); ?>" name="<?php echo $this->get_field_name('class'); ?>" type="text" value="<?php echo esc_attr($class); ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('title_link'); ?>"><?php _e('Title Link:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title_link'); ?>" name="<?php echo $this->get_field_name('title_link'); ?>" type="text" value="<?php echo esc_attr($title_link); ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Content:' ); ?></label>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea( $instance['text'] ); ?></textarea></p>

		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox"<?php checked( $filter ); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs'); ?></label></p>
		<?php
	}
} // Class aws_enhanced_text ends here


/*****************************************************/
/* Add Custom Contact Widget                            */
/*****************************************************/

// Creating the widget 
class aws_contact_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'aws_contact_widget', 

		// Widget name will appear in UI
		__('AWS Contact Widget', 'aws_contact_widget_domain'), 

		// Widget description
		array( 'description' => __( 'This is a widget for adding contact details with icons', 'aws_contact_widget_domain' ), ) 
		);
	}

	/**
	 * Outputs the content for the current Text widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Text widget instance.
	 */
	function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$phone = ! empty( $instance['phone'] ) ? $instance['phone'] : '';
		$email = ! empty( $instance['email'] ) ? $instance['email'].' ' : '';
		$address = ! empty( $instance['address'] ) ? $instance['address'].' ' : '';
		$hours = ! empty( $instance['hours'] ) ? $instance['hours'].' ' : '';
		
		

		/**
		 * Filter the content of the Text widget.
		 *
		 * @since 2.3.0
		 * @since 4.4.0 Added the `$this` parameter.
		 *
		 * @param string         $widget_text The widget content.
		 * @param array          $instance    Array of settings for the current widget.
		 * @param WP_Widget_Text $this        Current Text widget instance.
		 */
		//$text = apply_filters( 'widget_text', $widget_text, $instance, $this );
		$before_widget = $args['before_widget'];
		$before_widget = str_replace('class="', 'class="'. $class, $before_widget);
		
		//echo $args['before_widget'];
		echo $before_widget;
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . ($title_link == '' ? '' : '<a href="'.$title_link.'">') . $title. ($title_link == '' ? '' : '</a href="'.$title_link.'">') . $args['after_title'];
		} ?>
			<div class="contactwidget">
                <?= ($address ? '<div class="cw-address cw-grid"><div class="cw-icon">'.get_icon('office').'</div><div class="cw-text">'.wpautop(do_shortcode($address)).'</div></div>' : ''); ?>                
                <?= ($phone ? '<div class="cw-phone cw-grid"><div class="cw-icon">'.get_icon('phone-alt').'</div><div class="cw-text">'.do_shortcode($phone).'</div></div>' : ''); ?>
                <?= ($email ? '<div class="cw-email cw-grid"><div class="cw-icon">'.get_icon('mail-alt').'</div><div class="cw-text">'.do_shortcode($email).'</div></div>' : ''); ?>
                <?= ($hours ? '<div class="cw-hours cw-grid"><div class="cw-icon"><i class="far fa-clock"></i></div><div class="cw-text">'.do_shortcode($hours).'</div></div>' : ''); ?>
            </div>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Handles updating settings for the current Text widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Settings to save or bool false to cancel saving.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['phone'] = sanitize_text_field( $new_instance['phone'] );
		$instance['email'] = sanitize_text_field( $new_instance['email'] );
		$instance['address'] = $new_instance['address'];
		$instance['hours'] = $new_instance['hours'];
		return $instance;
	}

	/**
	 * Outputs the Text widget settings form.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'phone' => '', 'email' => '', 'address' => '', 'hours' => '') );
		$filter = isset( $instance['filter'] ) ? $instance['filter'] : 0;
		$title = sanitize_text_field( $instance['title'] );
		$phone = sanitize_text_field( $instance['phone'] );
		$email = sanitize_text_field( $instance['email'] );
		$address = sanitize_text_field( $instance['address'] );
		$hours = sanitize_text_field( $instance['hours'] );
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone Number:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo esc_attr($phone); ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email Address:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo esc_attr($email); ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address:' ); ?></label>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>"><?php echo esc_textarea( $instance['address'] ); ?></textarea></p>

		<p><label for="<?php echo $this->get_field_id( 'hours' ); ?>"><?php _e( 'Opening Hours:' ); ?></label>
        <textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('hours'); ?>" name="<?php echo $this->get_field_name('hours'); ?>"><?php echo esc_textarea( $instance['hours'] ); ?></textarea></p>
        
		<?php
	}
} // Class aws_enhanced_text ends here


// Register and load the widget
function aws_load_widget() {
	register_widget( 'aws_enhanced_text' );
	register_widget( 'aws_contact_widget' );
}
add_action( 'widgets_init', 'aws_load_widget' );