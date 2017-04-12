//synchornization of widget radior selection to caheout field radio selection	
jQuery(document).ready(function () {
		jQuery('input[name="byconsolewooodt_delivery_type"]').on('click',function(){
       
        // Get the element index , which one we click on
        var indx = jQuery(this).index('input[name="byconsolewooodt_delivery_type"]');
        
        // Trigger a click on the same index in the second radio set
        
        jQuery('input[name="byconsolewooodt_widget_type_field"]')[indx].click();
		
		//save the widget form
		jQuery('input[name="byconsolewooodt_widget_submit"]').click();
    });
	
	//to avoid wrong parameters for time drop-down when the delivery type radio selection has changed
	jQuery('input[name="byconsolewooodt_widget_type_field"]').on('click',function(){
		//remove the value relected for previous option
		jQuery('input[name="byconsolewooodt_widget_time_field"]').val('');
		//reload the widget to get new values for time drop-down from admin settings
		jQuery('input[name="byconsolewooodt_widget_submit"]').click();
		});

	//synchornize check out date time field value with widget date time field value
		jQuery('input[name="byconsolewooodt_widget_date_field"]').on('change',function(){
		jQuery('input[name="byconsolewooodt_delivery_date"]').val(jQuery(this).val());
		});
		jQuery('input[name="byconsolewooodt_widget_time_field"]').on('change',function(){
		jQuery('input[name="byconsolewooodt_delivery_time"]').val(jQuery(this).val());
		});
		jQuery('input[name="byconsolewooodt_delivery_date"]').on('change',function(){
		jQuery('input[name="byconsolewooodt_widget_date_field"]').val(jQuery(this).val());
		});
		jQuery('input[name="byconsolewooodt_delivery_time"]').on('change',function(){
		jQuery('input[name="byconsolewooodt_widget_time_field"]').val(jQuery(this).val());
		});
		
		jQuery('.byconsolewooodt_widget_time_field').on('click',function(){
			if(! jQuery('.byconsolewooodt_widget_time_field').hasClass('ui-timepicker-input')){
				alert("Please select date first");
				}
			});
		jQuery('#byconsolewooodt_delivery_time').on('click',function(){
			if(! jQuery('#byconsolewooodt_delivery_time').hasClass('ui-timepicker-input')){
				alert("Please select checkout date first");
				}
			})

	
});