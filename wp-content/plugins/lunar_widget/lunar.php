<?php
/**
 * Plugin Name: Widget hiển thị Lịch Vạn Niên
 * Plugin URI: https://desngon.com
 * Description: Tạo widget hiển thị lịch vạn niên.
 * Version: 2.0 
 * Author: Design Ngon
 * Author URI: https://desngon.com 
 * License: GPLv2 or later
 */

define( 'LUNAR_URL', plugin_dir_url( __FILE__ ) ); // Đường dẫn URL của plugin
define( 'LUNAR_PATH', plugin_dir_path( __FILE__ ) ); // Đường dẫn tuyệt đối của plugin

class Lich_Van_Nien_Widget extends WP_Widget {
  
  public function __construct() {
    $widget_options = array( 
      'classname'   => 'lich_van_nien_widget',
      'description' => 'Widget hiển thị lịch vạn niên',
    );
    parent::__construct( 'lich_van_nien_widget', 'Widget Lịch Vạn Niên', $widget_options );
  }

  public function widget( $args, $instance ) {
    $title = !empty( $instance['title'] ) ? $instance['title'] : '';
    echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>
    <div id="amlich-calendar"></div>
    <link rel="stylesheet" href="<?php echo LUNAR_URL ;?>/assets/css/jquery.amlich.css">
    <script src="<?php echo LUNAR_URL;?>/assets/js/jquery-2.1.0.min.js"></script>
    <script src="<?php echo LUNAR_URL;?>/assets/css/jquery.amlich.min.js"></script>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $('#amlich-calendar').amLich({
          type: 'calendar',
          tableWidth: '100%'
        });
      });
    </script>
    <?php echo $args['after_widget'];
  }

  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
    
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Tiêu đề:</label>
      <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php 
  }

  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    return $instance;
  }
}

function register_lich_van_nien_widget() { 
  register_widget( 'Lich_Van_Nien_Widget' );
}
add_action( 'widgets_init', 'register_lich_van_nien_widget' );
?>
