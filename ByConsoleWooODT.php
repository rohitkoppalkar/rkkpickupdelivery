<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly /** 

/*

 * Plugin Name: RKK Order Delivery or Pickup

 * Plugin URI: http://www.prestoorder.com

 * Description: Let your buyers choose if order is for deliver or pickup.

 * Version: 2.0.3.1

 * Author: RKK

 * Author URI: http://ruff.com

 * Text Domain: rkk-order-delivery-pickup

 * Domain Path: /languages

 * License: GPL2 

 */ 

 



include('inc/admin.php');

global $woocommerce;



// load plugin's text domaim

add_action('plugins_loaded','byconsolewooodt_load_text_domain');

function byconsolewooodt_load_text_domain(){

	load_plugin_textdomain( 'byconsole-woo-order-delivery-time', false, 'byconsole-woo-order-delivery-time/languages' );

}

// we need cookie so lets have a safe and confirm way

add_action('init', 'byconsolewooodtSetCookie', 1);

function byconsolewooodtSetCookie() {

	// set default values if empty to avoid undefined index issue using cookies

	if(empty($_COOKIE['byconsolewooodt_delivery_widget_cookie'])){

		$byconsolewooodt_delivery_widget=array(

														'byconsolewooodt_widget_date_field'=>'',

														'byconsolewooodt_widget_time_field'=>'',

														'byconsolewooodt_widget_type_field'=>'levering'

														); 

		$json_byconsolewooodt_delivery_widget=json_encode($byconsolewooodt_delivery_widget);

		setcookie('byconsolewooodt_delivery_widget_cookie',$json_byconsolewooodt_delivery_widget,time() + 60 * 60 * 24 *1,'/');

    }

} 



// front-end widget 

class byconsolewooodt_widget extends WP_Widget {

function __construct() {

parent::__construct(

// Base ID of our widget

'byconsolewooodt_widget', 

// Widget name will appear in UI

__('Order delivery time widget', 'byconsole-woo-order-delivery-time'), 

// Widget description

array( 'description' => __( 'Widget for users to choose time and date of delivery', 'byconsole-woo-order-delivery-time' ), ) 

);

}

// Creating widget front-end

// This is where the action happens

public function widget( $args, $instance ) {

	

		echo $args['before_widget'];

		if ( ! empty( $instance['byconsolewooodt_widget_title'] ) ) {

			echo $args['before_title'] . apply_filters( 'widget_title', $instance['byconsolewooodt_widget_title'] ) . $args['after_title'];

		}

		//echo __( esc_attr( 'Enter your delivery date and time' ), 'byconsole-woo-order-delivery-time' );

		echo $args['after_widget'];


$stripped_out_byconsolewooodt_delivery_widget_cookie=stripslashes($_COOKIE['byconsolewooodt_delivery_widget_cookie']);
$byconsolewooodt_delivery_widget_cookie_array=json_decode($stripped_out_byconsolewooodt_delivery_widget_cookie,true);



$byconsolewooodt_delivery_date = ! empty( $byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_date_field'] ) ? $byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_date_field'] : false;

$byconsolewooodt_delivery_time = ! empty( $byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_time_field'] ) ? $byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_time_field'] : false;

$byconsolewooodt_delivery_type = ! empty( $byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_type_field'] ) ? $byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_type_field'] : false;
?>

<form action="" method="post">

<input type="radio" name="byconsolewooodt_widget_type_field" value="take_away"<?php if($byconsolewooodt_delivery_type=='take_away'){echo ' checked="checked"';}?> /> Takeout

<input type="radio" name="byconsolewooodt_widget_type_field" value="levering"<?php if($byconsolewooodt_delivery_type=='levering'){echo ' checked="checked"';}?> />Delivery

<br />

<input type="text" name="byconsolewooodt_widget_date_field" class="byconsolewooodt_widget_date_field" readonly="readonly" value="<?php echo $byconsolewooodt_delivery_date;?>" />

<input type="text" name="byconsolewooodt_widget_time_field" class="byconsolewooodt_widget_time_field" value="<?php echo $byconsolewooodt_delivery_time;?>" />

<br />

<?php 

 if($byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_type_field']=='levering'){?>

<p class="min-shipping-time"><img src="<?php echo plugins_url('images/min-shipping-time.png', __FILE__)?>" alt="Minimum shipping time" /> &nbsp; <?php echo get_option('byconsolewooodt_delivery_times');?></p>

<?php }?>

<input type="submit" name="byconsolewooodt_widget_submit" value="Save" />

</form>

<?php

echo $args['after_widget'];

//pre-order settings
?>
<script>

jQuery(document).ready(function(){
delivery_opening_time="<?php echo get_option('byconsolewooodt_delivery_hours_from'); ?>";
pickup_opening_time="<?php echo get_option('byconsolewooodt_opening_hours_from'); ?>";
delivery_ending_time="<?php echo get_option('byconsolewooodt_delivery_hours_to'); ?>";
pickup_ending_time="<?php echo get_option('byconsolewooodt_opening_hours_to'); ?>";
<?php
if(get_option('byconsolewooodt_preorder_days')==''){// if no pre-order date is not set in settings page
?>
jQuery(".byconsolewooodt_widget_date_field").datepicker({

		minDate: 0,

		showAnim: "slideDown", 
		
		onSelect: function(){jQuery(".byconsolewooodt_widget_time_field").timepicker("remove"); jQuery(".byconsolewooodt_widget_time_field").val(''); ByconsolewooodtDeliveryWidgetTimePopulate(".byconsolewooodt_widget_date_field",".byconsolewooodt_widget_time_field");} // reset timepicker on date selection to get new time value depending date selected here AND THEN call call time population function

	});
<?php
}else{//if no pre-order date is set in settings page do the date selection restriction
?>
jQuery( ".byconsolewooodt_widget_date_field" ).datepicker({ 

		minDate: 0, 

		maxDate: "<?php echo get_option('byconsolewooodt_preorder_days');?>+D", 

		showOtherMonths: true,

		selectOtherMonths: true,

		showAnim: "slideDown",
		
		onSelect: function(){jQuery(".byconsolewooodt_widget_time_field").timepicker("remove"); jQuery(".byconsolewooodt_widget_time_field").val(''); ByconsolewooodtDeliveryWidgetTimePopulate(".byconsolewooodt_widget_date_field",".byconsolewooodt_widget_time_field");} // reset timepicker on date selection to get new time value depending date selected here AND THEN call call time population function

	});


	<?php }	
	

//synchornize both the delivery type radio button in widget and in checkout field in simple way

	if($byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_type_field']=='levering'){
?>
	jQuery("#byconsolewooodt_delivery_type_levering").prop("checked", true);

	<?php	}

	if($byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_type_field']=='take_away'){
?>
	jQuery("#byconsolewooodt_delivery_type_take_away").prop("checked", true);

	<?php	} ?>

	jQuery("input#byconsolewooodt_delivery_date").val("<?php echo $byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_date_field'];?>");

	jQuery("input#byconsolewooodt_delivery_time").val("<?php echo $byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_time_field'];?>");

	})
	
    </script>
<?php
}

// Widget Backend 

public function form( $instance ) {

if ( isset( $instance[ 'byconsolewooodt_widget_title' ] ) ) {

$title = $instance[ 'byconsolewooodt_widget_title' ];

}

else {

$title = __( 'New title', 'byconsole-woo-order-delivery-time' );

}

// Widget admin form

?>

<p>

<label for="<?php echo $this->get_field_id( 'byconsolewooodt_widget_title' ); ?>"><?php __( 'Title:','byconsole-woo-order-delivery-time' ); ?></label> 

<input class="widefat" id="<?php echo $this->get_field_id( 'byconsolewooodt_widget_title' ); ?>" name="<?php echo $this->get_field_name( 'byconsolewooodt_widget_title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />

</p>

<?php 

}

// Updating widget replacing old instances with new

public function update( $new_instance, $old_instance ) {

$instance = array();

$instance['byconsolewooodt_widget_title'] = ( ! empty( $new_instance['byconsolewooodt_widget_title'] ) ) ? strip_tags( $new_instance['byconsolewooodt_widget_title'] ) : '';

return $instance;

}

/*****************************************************/

} // Class byconsolewooodt_widget ends here

// Register and load the widget

function byconsolewooodt_load_widget() {

	register_widget( 'byconsolewooodt_widget' );

}

add_action( 'widgets_init', 'byconsolewooodt_load_widget' );//save frontend widget data in cookie, so we need to do it before any output, hence hook it on init

function byconsolewooodt_savefrontend_widget_data(){

	// save thwe widget data in in cookie	

if(isset($_POST['byconsolewooodt_widget_submit'])){

	$byconsolewooodt_delivery_widget_post_array = array(

		'byconsolewooodt_widget_date_field'   => $_POST['byconsolewooodt_widget_date_field'],

		'byconsolewooodt_widget_time_field'   => $_POST['byconsolewooodt_widget_time_field'],

		'byconsolewooodt_widget_type_field'   => $_POST['byconsolewooodt_widget_type_field'],

	);

	//set cookie

	$json_byconsolewooodt_delivery_widget_post_array=json_encode($byconsolewooodt_delivery_widget_post_array);

	setcookie('byconsolewooodt_delivery_widget_cookie',$json_byconsolewooodt_delivery_widget_post_array , time() + 60 * 60 * 24 * 1, '/');

	$_COOKIE['byconsolewooodt_delivery_widget_cookie'] = $json_byconsolewooodt_delivery_widget_post_array;// for immediate access in widget

	}

}// end of byconsolewooodt_savefrontend_widget_data

add_action('init','byconsolewooodt_savefrontend_widget_data');// Add the field to the checkout

 add_action( 'woocommerce_after_order_notes', 'byconsolewooodt_checkout_field' );

function byconsolewooodt_checkout_field( $checkout ) {

	// get cookie as array

	$stripped_out_byconsolewooodt_delivery_widget_cookie=stripslashes($_COOKIE['byconsolewooodt_delivery_widget_cookie']);

	$byconsolewooodt_delivery_widget_cookie_array=json_decode($stripped_out_byconsolewooodt_delivery_widget_cookie,true);

    echo '<div id="byconsolewooodt_checkout_field"><h2>'.get_option('byconsolewooodt_chekout_page_section_heading') . '</h2>';

    woocommerce_form_field( 'byconsolewooodt_delivery_type', array(

        'type'          => 'radio',

        'class'         => array('byconsolewooodt_delivery_type'),

        'label'         => get_option('byconsolewooodt_chekout_page_order_type_lebel'),

        'placeholder'   => __('Select delivery type','byconsole-woo-order-delivery-time'),

		'default'		=> $byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_type_field'],

		'checked'		=> 'checked',

		'options'		=> array(

								'take_away' => 'Takeout',

								'levering' => 'Delivery', 

								),

        ), $checkout->get_value( 'byconsolewooodt_delivery_type' ));

	woocommerce_form_field( 'byconsolewooodt_delivery_date', array(

        'type'          => 'text',

        'class'         => array('byconsolewooodt_delivery_date'),

        'label'         => get_option('byconsolewooodt_chekout_page_date_lebel'),

        'placeholder'   => __('Enter delivery date','byconsole-woo-order-delivery-time'),

		'default'		=> $byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_date_field'],

        ), $checkout->get_value( 'byconsolewooodt_delivery_date' ));

	woocommerce_form_field( 'byconsolewooodt_delivery_time', array(

        'type'          => 'text',

        'class'         => array('byconsolewooodt_delivery_time'),

        'label'         => get_option('byconsolewooodt_chekout_page_time_lebel'),

        'placeholder'   => __('Enter delivery time','byconsole-woo-order-delivery-time'),

		'default'		=> $byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_time_field'],

        ), $checkout->get_value( 'byconsolewooodt_delivery_time' ));

    echo '</div>';



}

// Validate the custom field.

add_action('woocommerce_checkout_process', 'byconsolewooodt_checkout_field_process');

function byconsolewooodt_checkout_field_process() {

    // Check if set, if its not set add an error.

    if ( ! $_POST['byconsolewooodt_delivery_date'] )

        wc_add_notice( __( 'Enter your desired delivery date.','byconsole-woo-order-delivery-time' ), 'error' );

    if ( ! $_POST['byconsolewooodt_delivery_time'] )

        wc_add_notice( __( 'Enter your desired delivery time.','byconsole-woo-order-delivery-time' ), 'error' );

}

//Save the order meta with field value

add_action( 'woocommerce_checkout_update_order_meta', 'byconsolewooodt_checkout_field_update_order_meta' );

function byconsolewooodt_checkout_field_update_order_meta( $order_id ) {

    if ( ! empty( $_POST['byconsolewooodt_delivery_date'] ) ) {

        update_post_meta( $order_id, 'byconsolewooodt_delivery_date', sanitize_text_field( $_POST['byconsolewooodt_delivery_date'] ) );

    }

	if ( ! empty( $_POST['byconsolewooodt_delivery_time'] ) ) {

        update_post_meta( $order_id, 'byconsolewooodt_delivery_time', sanitize_text_field( $_POST['byconsolewooodt_delivery_time'] ) );

    }

	if ( ! empty( $_POST['byconsolewooodt_delivery_type'] ) ) {

        update_post_meta( $order_id, 'byconsolewooodt_delivery_type', $_POST['byconsolewooodt_delivery_type'] );

    }

}

//Display field value on the order edit page

add_action( 'woocommerce_admin_order_data_after_shipping_address', 'byconsolewooodt_checkout_field_display_admin_order_meta', 10, 1 );

function byconsolewooodt_checkout_field_display_admin_order_meta($order){

	if(get_post_meta( $order->id, 'byconsolewooodt_delivery_type', true )=='take_away'){

		$order_delivery_type='Takeout';

		}

	if(get_post_meta( $order->id, 'byconsolewooodt_delivery_type', true )=='levering'){

		$order_delivery_type='Delivery';

		}

    echo '<p><strong>'.__('Delivery date','byconsole-woo-order-delivery-time').':</strong> ' . get_post_meta( $order->id, 'byconsolewooodt_delivery_date', true ) . '</p>';

	echo '<p><strong>'.__('Delivery time','byconsole-woo-order-delivery-time').':</strong> ' . get_post_meta( $order->id, 'byconsolewooodt_delivery_time', true ) . '</p>';

	echo '<p><strong>'.__('Delivery type','byconsole-woo-order-delivery-time').':</strong> ' . $order_delivery_type . '</p>';

}

// Display order meta in order details section

if(get_option('byconsolewooodt_widget_field_position')=='top'){ //hook here if it is set to show on top in admin settings page

//add_action( 'woocommerce_view_order', 'byconsolewooodt_checkout_field_display_user_order_meta', 10, 1 );

add_action( 'woocommerce_order_items_table', 'byconsolewooodt_checkout_field_display_user_order_meta', 10, 1 );

}

if(get_option('byconsolewooodt_widget_field_position')=='bottom'){  //hook here if it is set to show on bottom in admin settings page

add_action( 'woocommerce_order_details_after_order_table', 'byconsolewooodt_checkout_field_display_user_order_meta', 10, 1 );

}

function byconsolewooodt_checkout_field_display_user_order_meta($order){

	if(get_post_meta( $order->id, 'byconsolewooodt_delivery_type', true )=='take_away'){

		$order_delivery_type='Takeout';

		}

	if(get_post_meta( $order->id, 'byconsolewooodt_delivery_type', true )=='levering'){

		$order_delivery_type='Delivery';

		}

    echo '<p><strong>'.__('Delivery date','byconsole-woo-order-delivery-time').':</strong> ' . get_post_meta( $order->id, 'byconsolewooodt_delivery_date', true ) . '</p>';

	echo '<p><strong>'.__('Delivery time','byconsole-woo-order-delivery-time').':</strong> ' . get_post_meta( $order->id, 'byconsolewooodt_delivery_time', true ) . '</p>';

	echo '<p><strong>'.__('Delivery type','byconsole-woo-order-delivery-time').':</strong> ' . $order_delivery_type . '</p>';

	if(get_post_meta( $order->id, 'byconsolewooodt_delivery_type', true )=='levering'){

	$prepare_shipping_text= str_replace('[deliver_date]','<b>'.get_post_meta( $order->id, 'byconsolewooodt_delivery_date', true ).'</b>',get_option('byconsolewooodt_orders_delivered'));

	echo '<p>'.str_replace('[deliver_time]','<b>'.get_post_meta( $order->id, 'byconsolewooodt_delivery_time', true ).'</b>',$prepare_shipping_text).'</p>';

	}

	if(get_post_meta( $order->id, 'byconsolewooodt_delivery_type', true )=='take_away'){

	$prepare_shipping_text= str_replace('[pickup_date]','<b>'.get_post_meta( $order->id, 'byconsolewooodt_delivery_date', true ).'</b>',get_option('byconsolewooodt_orders_pick_up'));

	echo '<p>'.str_replace('[pickup_time]','<b>'.get_post_meta( $order->id, 'byconsolewooodt_delivery_time', true ).'</b>',$prepare_shipping_text).'</p>';	

	}}

//include the custom order meta to woocommerce mail

add_action( "woocommerce_email_after_order_table", "byconsolewooodt_woocommerce_email_after_order_table", 10, 1);

function byconsolewooodt_woocommerce_email_after_order_table( $order ) {

	if(get_post_meta( $order->id, 'byconsolewooodt_delivery_type', true )=='take_away'){

		$order_delivery_type='Takeout';

		}

	if(get_post_meta( $order->id, 'byconsolewooodt_delivery_type', true )=='levering'){

		$order_delivery_type='Delivery';

		}

    echo '<p></p><p><strong>'.__('Delivery date','byconsole-woo-order-delivery-time').':</strong> ' . get_post_meta( $order->id, 'byconsolewooodt_delivery_date', true ) . '</p>';

	echo '<p><strong>'.__('Delivery time','byconsole-woo-order-delivery-time').':</strong> ' . get_post_meta( $order->id, 'byconsolewooodt_delivery_time', true ) . '</p>';

	echo '<p><strong>'.__('Delivery type','byconsole-woo-order-delivery-time').':</strong> ' . $order_delivery_type . '</p>';

}

// add our styles and js

function byconsolewooodt_add_scripts() {

wp_enqueue_script('jquery-ui-datepicker');

wp_register_script('byconsolewooodt_script_2', plugins_url('js/jquery.timepicker.min.js', __FILE__), array('jquery'),'1.12', true);

wp_register_script('byconsolewooodt_script_3', plugins_url('js/byconsolewooodt.js', __FILE__), array('jquery'),'1.12', true);

wp_enqueue_script('byconsolewooodt_script_2');

wp_enqueue_script('byconsolewooodt_script_3');

}

add_action( 'wp_enqueue_scripts', 'byconsolewooodt_add_scripts' ); 

//add styles

function byconsolewooodt_add_styles() {

wp_enqueue_style('byconsolewooodt_stylesheet', plugins_url('css/style.css', __FILE__));

wp_enqueue_style('byconsolewooodt_stylesheet_2', plugins_url('css/jquery-ui.min.css', __FILE__));

wp_enqueue_style('byconsolewooodt_stylesheet_3', plugins_url('css/jquery-ui.theme.min.css', __FILE__));

wp_enqueue_style('byconsolewooodt_stylesheet_4', plugins_url('css/jquery-ui.structure.min.css', __FILE__));

wp_enqueue_style('byconsolewooodt_stylesheet_5', plugins_url('css/jquery.timepicker.css', __FILE__));

}

add_action( 'wp_enqueue_scripts', 'byconsolewooodt_add_styles' ); 



// refreshing the cart on page load

/** Break html5 cart caching */

	add_action('wp_enqueue_scripts', 'cartcache_enqueue_scripts', 100);

	function cartcache_enqueue_scripts()

	{

		wp_deregister_script('wc-cart-fragments');

		wp_enqueue_script( 'wc-cart-fragments', plugins_url( 'js/cart-fragments.js', __FILE__ ), array( 'jquery', 'jquery-cookie' ), '1.12', true );

	}

	

// show only store pickup when take_away is selected	

add_filter('woocommerce_package_rates', 'byconsolewooodt_shipping_according_widget_input', 10, 2);



function byconsolewooodt_shipping_according_widget_input($rates, $package)

{

	// get cookie as array

	$stripped_out_byconsolewooodt_delivery_widget_cookie=stripslashes($_COOKIE['byconsolewooodt_delivery_widget_cookie']);

	$byconsolewooodt_delivery_widget_cookie_array=json_decode($stripped_out_byconsolewooodt_delivery_widget_cookie,true);



	global $woocommerce;

	$version = "2.6";

	if (version_compare($woocommerce->version, $version, ">=")) {

		$new_rates = array();

		/*echo '<hr />';

		print_r($rates);*/

		if($byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_type_field']=='take_away'){

		foreach($rates as $key => $rate) {

			if ('local_pickup' === $rate->method_id || 'legacy_local_pickup' === $rate->method_id) {

				$new_rates[$key] = $rates[$key];

			}

		}

		/*print_r($new_rates);

		print_r($rates);*/

		}elseif($byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_type_field']=='levering'){

		foreach($rates as $key => $rate) {

			/*print_r($rate);

			echo '<hr />';*/

			if ('local_pickup' != $rate->method_id && 'legacy_local_pickup' != $rate->method_id ) {

				$new_rates[$key] = $rates[$key];

				//unset($rates['local_pickup']);

			}

		}

		}else{

			//

			}

		return empty($new_rates) ? $rates : $new_rates;

		/*echo '<hr />';

		print_r($new_rates);*/

	}

	else {

		if ($byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_type_field']=='take_away') {

  		$predefined_shipping          = $rates['local_pickup'];

  		$rates                  = array();

  		$rates['local_pickup'] = $predefined_shipping;

		}

		if ($byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_type_field']=='levering') {

  		$predefined_shipping          = $rates['flat_rate'];

  		$rates                  = array();

  		$rates['flat_rate'] = $predefined_shipping;

		}

	}

	return $rates;

}

// check if checkout page



// do the JS to populate date and time field paqrameter



function byconsolewooodt_footer_script(){
	
	// get cookie as array

	$stripped_out_byconsolewooodt_delivery_widget_cookie=stripslashes($_COOKIE['byconsolewooodt_delivery_widget_cookie']);

	$byconsolewooodt_delivery_widget_cookie_array=json_decode($stripped_out_byconsolewooodt_delivery_widget_cookie,true);

	
	?>
<script>
function ByConsoleWooODTStartTimeByInterval(cur_hour,cur_minute){
if(cur_minute > 0 && cur_minute < 15){
var start_minute=15;
}else if(cur_minute >= 15 && cur_minute < 30){
var start_minute=30;
}else if(cur_minute >= 30 && cur_minute < 45){
var start_minute=45;
}else if(cur_minute >= 45 && cur_minute < 59){
var start_minute=59;
}else{}
if(start_minute==59){
var next_hour=parseInt(cur_hour)+1;
var start_time_updated=next_hour+":"+"00";
}else{
var start_time_updated=cur_hour+":"+start_minute;
}
return start_time_updated;
} // end of ByConsoleWooODTtimeInterval



function ByconsolewooodtDeliveryWidgetTimePopulate(date_field_identifier,time_field_identifier){ 

// lock the time selection based on admin settings for delivery time

//echo 'var curtime_to_compare=new Date().toLocaleTimeString();';

var curtime= new Date().toLocaleTimeString("en-US", { hour12: false, hour: "numeric", minute: "numeric"});
//echo 'alert(curtime_to_compare+"|"+curtime);
// get local minute
var cur_minute= new Date().toLocaleTimeString("en-US", { hour12: false, minute: "numeric"});
// get local hour
var cur_hour= new Date().toLocaleTimeString("en-US", { hour12: false, hour: "numeric"});											 


ByConsoleWooODTStartTimeByInterval(cur_hour,cur_minute); // check this function in wp-footer

//populate time field based on date selection (call this function onSelect event of datepicker)

/*var selected_date=jQuery(".byconsolewooodt_widget_date_field").datepicker( "getDate" );*/
 selected_date=jQuery(date_field_identifier).datepicker().val();
 todays_date=new Date();
 todays_date_month=(todays_date.getMonth()+1);
 todays_date_date=todays_date.getDate();
 todays_date_year=todays_date.getFullYear();

if( todays_date_month < 10){
 todays_date_month='0' + todays_date_month;
}
if(todays_date_date < 10){
 todays_date_date='0' + todays_date_date;
}
 todays_formated_date= todays_date_month + "/" + todays_date_date + "/" + todays_date_year;
 //alert(selected_date+"|"+todays_formated_date);	
 
 if( Date.parse(selected_date) != Date.parse(todays_formated_date) ){
  
  <?php if($byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_type_field']=='take_away'){?>
  start_time_updated_as_per_selected_date = pickup_opening_time;
  <?php }
  if($byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_type_field']=='levering'){?>
  start_time_updated_as_per_selected_date = delivery_opening_time;
  <?php }?>
 //alert('Different date, so starting time is store openning time '+delivery_opening_time + pickup_opening_time);
 }else if( Date.parse(selected_date) == Date.parse(todays_formated_date) ){
 //if current time is grater than openning time then show current time
 <?php if($byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_type_field']=='take_away'){?>
 //alert(curtime +"||"+ pickup_opening_time);
 if(curtime <= pickup_opening_time){
 start_time_updated_as_per_selected_date = pickup_opening_time;
 }
 if(curtime > pickup_opening_time){
 start_time_updated_as_per_selected_date = ByConsoleWooODTStartTimeByInterval(cur_hour,cur_minute); // check this function in wp_footer
 }
 <?php }
 if($byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_type_field']=='levering'){?>
 if(curtime <= delivery_opening_time){
 start_time_updated_as_per_selected_date = delivery_opening_time;
 }
 if(curtime > delivery_opening_time){
 start_time_updated_as_per_selected_date = ByConsoleWooODTStartTimeByInterval(cur_hour,cur_minute); // check this function in wp_footer
 }
 <?php }?>
 
 //alert('equal date, so starting time is current time '+start_time_updated_as_per_selected_date)
 }else{
 alert('You have bug in this version of plugin, please update the plugin');
 }



<?php
if($byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_type_field']=='levering'){
?>

/*
echo 'if(curtime > "'.get_option('byconsolewooodt_delivery_hours_from').'"){';

echo 'var start_time=curtime;';

echo '}else{';

echo 'var start_time="'.get_option('byconsolewooodt_delivery_hours_from').'";}';

//echo 'alert(start_time);';
*/

jQuery(time_field_identifier).timepicker({

//if it is not today's date selected in dateicker then do not do the past time resriction 
//if(jQuery(".byconsolewooodt_widget_date_field").datepicker( "getDate" )!= new Date();

"minTime": start_time_updated_as_per_selected_date,

"maxTime": "<?php echo get_option('byconsolewooodt_delivery_hours_to');?>",

"disableTextInput": "true",

"disableTouchKeyboard": "true",

"scrollDefault": "now",

"step": "15",

"selectOnBlur": "true",

"timeFormat": "<?php echo get_option('byconsolewooodt_hours_format');?>"

});
<?php
}

// lock the time selection based on admin settings for pickup time

if($byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_type_field']=='take_away'){
?>

jQuery(time_field_identifier).timepicker({

"minTime": start_time_updated_as_per_selected_date,

"maxTime": "<?php echo get_option('byconsolewooodt_opening_hours_to');?>",

"disableTextInput": "true",

"disableTouchKeyboard": "true",

"scrollDefault": "now",

"step": "15",

"selectOnBlur": "true",

"timeFormat": "<?php echo get_option('byconsolewooodt_hours_format');?>"

});
<?php
}

// if no delivery type is not selected then show all times

if($byconsolewooodt_delivery_widget_cookie_array['byconsolewooodt_widget_type_field']==''){
?>
jQuery(time_field_identifier).timepicker({

"disableTextInput": "true",

"disableTouchKeyboard": "true",

"scrollDefault": "now",

"step": "15",

"selectOnBlur": "true",

"timeFormat": "<?php echo get_option('byconsolewooodt_hours_format');?>"

});
<?php
}	
?>
} // End of function ByconsolewooodtDeliveryWidgetTimePopulate

</script>
	
	<?php
	if(is_checkout()){// execute on woocommerce check out page only
//date and time fields population by plugin settings page
?>


<script>

jQuery(document).ready(function(){
<?php
if(get_option('byconsolewooodt_preorder_days')==''){// if no pre-order date is not set in settings page
?>
jQuery("#byconsolewooodt_delivery_date").datepicker({

minDate: 0,

showAnim: "slideDown",

onSelect: function(){jQuery("#byconsolewooodt_delivery_time").timepicker("remove"); jQuery("#byconsolewooodt_delivery_time").val(''); ByconsolewooodtDeliveryWidgetTimePopulate("#byconsolewooodt_delivery_date","#byconsolewooodt_delivery_time");} // reset timepicker on date selection to get new time value depending date selected here AND THEN call call time population function
});
<?php
}else{//if no pre-order date is set in settings page do the date selection restriction
?>
jQuery( "#byconsolewooodt_delivery_date" ).datepicker({ 

minDate: 0,

maxDate: "<?php echo get_option('byconsolewooodt_preorder_days');?>D",

showOtherMonths: true,

selectOtherMonths: true,

showAnim: "slideDown",

onSelect: function(){jQuery("#byconsolewooodt_delivery_time").timepicker("remove"); jQuery("#byconsolewooodt_delivery_time").val(''); ByconsolewooodtDeliveryWidgetTimePopulate("#byconsolewooodt_delivery_date","#byconsolewooodt_delivery_time");} // reset timepicker on date selection to get new time value depending date selected here AND THEN call call time population function
});


<?php	}	?>

})

</script>
<?php

// refresh the page once delivery type is changed and if the checkout page dont have the widget present (if it has widget present it will be refresh by widget itself)

//check if it is checkout page

//check if widget is present on checkout page

if ( !is_active_widget( false, false, 'byconsolewooodt_widget', true ) ) {

	//if widget is not present create it and make it hide

	echo '<div style="display:none;">';

	the_widget( 'byconsolewooodt_widget' );

	echo '</div>';

}

}// !is_checkout



} //byconsolewooodt_footer_script



add_action('wp_footer','byconsolewooodt_footer_script');
?>