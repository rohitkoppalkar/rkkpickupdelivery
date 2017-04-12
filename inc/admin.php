<?php



// add mmenu



add_action('admin_menu','byconsolewooodt_add_plugin_menu');



function byconsolewooodt_add_plugin_menu(){



	add_menu_page( 'ByConsole Order Delivery Time', 'Order Delivery Time management', 'manage_options', 'byconsolewooodt_general_settings', 'byconsolewooodt_admin_general_settings_form' );



	}



		function byconsolewooodt_admin_general_settings_form()



	{



		?>



			<div class="wrap">



			<h1>ByConsole Woocommerce Order Delivery Time management settings pannel</h1>



            <div class="" style="width:20%; float:right;">



            <input type="button" value="Get Pro version" onClick="getproFunction()"  id="byconsolewooodt_get_pro_version" style="background-color:#ffa500; color:#fff; font-size:18px; cursor: pointer;"/>

			<style>

			#byconsolewooodt_get_pro_version:hover{background-color:#fff !important; color:#ffa500 !important; border:1px solid #ffa500;}

            </style>

            <div class="">



            <ul>



            <li><?php echo __('The pro version includes:','byconsole-woo-order-delivery-time');?><li>

            <li><?php echo __('1) Set multiple delivery/pickup locations as many as you wish.','byconsole-woo-order-delivery-time');?></li>

            <li><?php echo __('2) Disable/enable multiple delivery/pickup locations.','byconsole-woo-order-delivery-time');?></li>

            <li><?php echo __('3) Set shop closing days based on week/week-end days like (every Sunday/Monday/../..)','byconsole-woo-order-delivery-time');?></li>

            <li><?php echo __('4) Set casual holidays on each month calendar.','byconsole-woo-order-delivery-time');?></li>

            <li><?php echo __('5) Set National/public holiday.','byconsole-woo-order-delivery-time');?></li>

            <li><?php echo __('6) Set delivery/pickup break time.','byconsole-woo-order-delivery-time');?></li>

            <li><?php echo __('7) Disable/enable delivery/pickup.','byconsole-woo-order-delivery-time');?></li>

            <li><?php echo __('8) Minimum lead time / wait time.','byconsole-woo-order-delivery-time');?></li>

            <li><?php echo __('9) Free support on up to three domains.','byconsole-woo-order-delivery-time');?></li>

            <li><?php echo __('10) Set on which day(s) you will allow pickup.','byconsole-woo-order-delivery-time');?></li>

            <li><?php echo __('11) Set on which day(s) you will allow delivery.','byconsole-woo-order-delivery-time');?></li>
                        
			<li><?php echo __('12) Different delivery times for each delivery location (from v-1.0.3.0).','byconsole-woo-order-delivery-time');?></li>
            
            <li><?php echo __('13) Different pickup times for each pick up location (from v-1.0.3.0).','byconsole-woo-order-delivery-time');?></li>
            
            <li><?php echo __('14) Set minimum order value for each delivery location (from v-1.0.3.0).','byconsole-woo-order-delivery-time');?></li>
            
            <li><?php echo __('15)Set minimum order value for each pickup location (from v-1.0.3.0).','byconsole-woo-order-delivery-time');?></li>

			<li><?php echo __('16) Get customized/more extended copy to suit your all needs(may be paid).','byconsole-woo-order-delivery-time');?></li>
            </ul>



            </div>

            <input type="button" value="Get Pro version" onClick="getproFunction()"  id="byconsolewooodt_get_pro_version" style="background-color:#ffa500; color:#fff; font-size:18px; cursor: pointer;"/>



            </div>



            <script>



            function getproFunction() {



            window.open("http://plugins.byconsole.com/product/byconsole-wooodt-extended/");



            }



            </script>



            <div class="" style="width:80%; float:left;">



			<form method="post" class="form_byconsolewooodt_plugin_settings" action="options.php">



				<?php



					settings_fields("section");



					do_settings_sections("byconsolewooodt_plugin_options");      



					submit_button(); 



				?>          



			</form>



			</div>



<?php 

}







	function byconsolewooodt_chekout_page_section_heading()



	{



?>



 



 <input type="text" name="byconsolewooodt_chekout_page_section_heading" id="byconsolewooodt_chekout_page_section_heading" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_chekout_page_section_heading')); ?>"/>



 <label><?php echo __('Texts to display on checkout page as section heading.','byconsole-woo-order-delivery-time');?></label><br />



 <span style="color:#a0a5aa">(Eg: Desired delivery date and time)</span>



<?php



	}







	function byconsolewooodt_chekout_page_date_lebel()



	{



?>



 



 <input type="text" name="byconsolewooodt_chekout_page_date_lebel" id="byconsolewooodt_chekout_page_date_lebel" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_chekout_page_date_lebel')); ?>"/>



 <label><?php echo __('displayed as calendar lebel on checkout page.','byconsole-woo-order-delivery-time');?></label><br />



 <span style="color:#a0a5aa">(Eg: Select date)</span>



<?php



	}







	function byconsolewooodt_chekout_page_time_lebel()



	{



?>



 



 <input type="text" name="byconsolewooodt_chekout_page_time_lebel" id="byconsolewooodt_chekout_page_time_lebel" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_chekout_page_time_lebel')); ?>"/>



 <label><?php echo __('displayed as time drop-down lebel on checkout page.','byconsole-woo-order-delivery-time');?></label><br />



 <span style="color:#a0a5aa">(Eg: Select time)</span>



<?php



	}



	function byconsolewooodt_chekout_page_order_type_lebel()



	{



?>



 



 <input type="text" name="byconsolewooodt_chekout_page_order_type_lebel" id="byconsolewooodt_chekout_page_order_type_lebel" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_chekout_page_order_type_lebel')); ?>"/>



 <label><?php echo __('displayed as time drop-down lebel on checkout page.','byconsole-woo-order-delivery-time');?></label><br />



 <span style="color:#a0a5aa">(Eg: Select order type)</span>



<?php



	}



	function byconsolewooodt_hours_format()



	{                                        



?>



 <select id="byconsolewooodt_hours_format" name="byconsolewooodt_hours_format" style="width:35%;" >



  <option   value="H:i:s" <?php if( get_option('byconsolewooodt_hours_format')=='H:i:s'){?> selected="selected"<?php }?> >24 hours</option>



  <option   value="h:i A"<?php if( get_option('byconsolewooodt_hours_format')=='h:i A'){?> selected="selected"<?php }?> >12 hours</option>



 </select>



 <label><?php echo __('24 hours or 12 hours with AM / PM.','byconsole-woo-order-delivery-time');?> </label>



<?php



	}



	function byconsolewooodt_preorder_days()



	{



?>



 



 <input type="number" name="byconsolewooodt_preorder_days" id="byconsolewooodt_preorder_days" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_preorder_days')); ?>"/>



 <label><?php echo __('Leave blank to not set and pre-order days,This is number of days customar can pre order.','byconsole-woo-order-delivery-time');?></label><br />



 <span style="color:#a0a5aa">(Eg: 10 Only number)</span>



<?php



	}



	function byconsolewooodt_opening_hours()



	{



?>



 <label><?php echo __('From','byconsole-woo-order-delivery-time');?></label>



 <input type="time" name="byconsolewooodt_opening_hours_from" id="byconsolewooodt_opening_hours_from" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_opening_hours_from')); ?>" />



 <label><?php echo __('To','byconsole-woo-order-delivery-time');?></label>



 <input type="time" name="byconsolewooodt_opening_hours_to" id="byconsolewooodt_opening_hours_to" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_opening_hours_to')); ?>" />



 <label><?php echo __('Allowbale Pickup Time.','byconsole-woo-order-delivery-time');?></label>



<?php



	}



	function byconsolewooodt_delivery_hours()



	{



?>



 <label><?php echo __('From','byconsole-woo-order-delivery-time');?></label>



 <input type="time" name="byconsolewooodt_delivery_hours_from" id="byconsolewooodt_delivery_hours_from" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_delivery_hours_from')); ?>" />



 <label><?php echo __('To','byconsole-woo-order-delivery-time');?></label>



 <input type="time" name="byconsolewooodt_delivery_hours_to" id="byconsolewooodt_delivery_hours_to" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_delivery_hours_to')); ?>" />



 <label><?php echo __('Allowbale Delivery Time.','byconsole-woo-order-delivery-time');?></label>



<?php



	}



	function byconsolewooodt_delivery_times()



	{



?>



 <input type="text" name="byconsolewooodt_delivery_times" id="byconsolewooodt_delivery_times" style="width:30%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_delivery_times')); ?>" />



 <label> <?php echo __('This is visible on widget front end if customer has choosen delivery.','byconsole-woo-order-delivery-time');?></label><br />



 <span style="color:#a0a5aa">(Eg: 30 Minutes)</span>



<?php



	}



	function byconsolewooodt_orders_delivered()



	{



?>



 <input type="text" name="byconsolewooodt_orders_delivered" id="byconsolewooodt_orders_delivered" style="width:50%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_orders_delivered')); ?>" />



 <label> <?php echo __('This is the text showed in Order Delivered page.','byconsole-woo-order-delivery-time');?></label><br />



 <span style="color:#a0a5aa">(<?php echo __('Eg: The order will be delivered on','byconsole-woo-order-delivery-time');?>  [deliver_date] <?php echo __('at','byconsole-woo-order-delivery-time');?>   [deliver_time])</span>



<?php



	}



	function byconsolewooodt_orders_pick_up()



	{



?>



 <input type="text" name="byconsolewooodt_orders_pick_up" id="byconsolewooodt_orders_pick_up" style="width:50%; padding:7px;" value="<?php printf( __('%s','byconsole-woo-order-delivery-time'),get_option('byconsolewooodt_orders_pick_up')); ?>" />



 <label> <?php echo __('This is the text showed in Order Picked Up page.','byconsole-woo-order-delivery-time');?></label><br />



 <span style="color:#a0a5aa">(<?php echo __('Eg: The order can be Picked Up on','byconsole-woo-order-delivery-time');?>  [pickup_date] <?php echo __('at','byconsole-woo-order-delivery-time');?>  [pickup_time])</span>



<?php



	}



	function byconsolewooodt_widget_field_position()



	{                                        



?>



 <select id="byconsolewooodt_widget_field_position" name="byconsolewooodt_widget_field_position" style="width:35%;" >



  <option   value="top" <?php if( get_option('byconsolewooodt_widget_field_position')=='top'){?> selected="selected"<?php }?> >Show on top</option>



  <option   value="bottom"<?php if( get_option('byconsolewooodt_widget_field_position')=='bottom'){?> selected="selected"<?php }?> >Show on Bottom</option>



 </select>



 <label><?php echo __('Choose if tracking text have to be shown on top(before order product list) or bottom(after product list).','byconsole-woo-order-delivery-time');?> </label>







<?php } 



add_action('admin_init', 'byconsolewooodt_plugin_settings_fields');



function byconsolewooodt_plugin_settings_fields()



	{



	add_settings_section("section", "All Settings", null, "byconsolewooodt_plugin_options");



	



	add_settings_field("byconsolewooodt_preorder_days", "Preorder Days:", "byconsolewooodt_preorder_days", "byconsolewooodt_plugin_options", "section");



	add_settings_field("byconsolewooodt_opening_hours", "Opening Hours:", "byconsolewooodt_opening_hours", "byconsolewooodt_plugin_options", "section");



	add_settings_field("byconsolewooodt_delivery_hours", "Delivery Hours:", "byconsolewooodt_delivery_hours", "byconsolewooodt_plugin_options", "section");



	add_settings_field("byconsolewooodt_delivery_times", "Delivery Times:", "byconsolewooodt_delivery_times", "byconsolewooodt_plugin_options", "section");



	add_settings_field("byconsolewooodt_orders_delivered", "The order will be delivered:", "byconsolewooodt_orders_delivered", "byconsolewooodt_plugin_options", "section");



	add_settings_field("byconsolewooodt_orders_pick_up", "The order can be Pickup:", "byconsolewooodt_orders_pick_up", "byconsolewooodt_plugin_options", "section");



	add_settings_field("byconsolewooodt_widget_field_position", "Position of the text in the orders page:", "byconsolewooodt_widget_field_position", "byconsolewooodt_plugin_options", "section");



	add_settings_field("byconsolewooodt_chekout_page_section_heading", "Checkout page section heading", "byconsolewooodt_chekout_page_section_heading", "byconsolewooodt_plugin_options", "section");



	add_settings_field("byconsolewooodt_chekout_page_order_type_lebel", "Order type lebel on checkout page:", "byconsolewooodt_chekout_page_order_type_lebel", "byconsolewooodt_plugin_options", "section");



	add_settings_field("byconsolewooodt_chekout_page_date_lebel", "Calendar lebel on checkout page:", "byconsolewooodt_chekout_page_date_lebel", "byconsolewooodt_plugin_options", "section");



	add_settings_field("byconsolewooodt_chekout_page_time_lebel", "Time select lebel on checkout page:", "byconsolewooodt_chekout_page_time_lebel", "byconsolewooodt_plugin_options", "section");



	add_settings_field("byconsolewooodt_hours_format", "Time format:", "byconsolewooodt_hours_format", "byconsolewooodt_plugin_options", "section");



	



	



    



	register_setting("section", "byconsolewooodt_preorder_days");



	register_setting("section", "byconsolewooodt_opening_hours_from");



	register_setting("section", "byconsolewooodt_opening_hours_to");



	register_setting("section", "byconsolewooodt_delivery_hours_from");



	register_setting("section", "byconsolewooodt_delivery_hours_to");



	register_setting("section", "byconsolewooodt_delivery_times");



	register_setting("section", "byconsolewooodt_orders_delivered");



	register_setting("section", "byconsolewooodt_orders_pick_up");



	register_setting("section", "byconsolewooodt_widget_field_position");



	register_setting("section", "byconsolewooodt_chekout_page_section_heading");



	register_setting("section", "byconsolewooodt_chekout_page_order_type_lebel");



	register_setting("section", "byconsolewooodt_chekout_page_date_lebel");



	register_setting("section", "byconsolewooodt_chekout_page_time_lebel");



	register_setting("section", "byconsolewooodt_hours_format");



	}



	



?>