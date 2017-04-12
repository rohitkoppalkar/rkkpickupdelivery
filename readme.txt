=== Woocommerce order delivery or pickup with date and time ===
Contributors: mdalabar
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MZZCSP2WRCYT2
Tags: woocommerce, order delivery date and time, order pickup date and time, woocommerce delivery date time, woocommerce pickup date time, order delivery date time widget, order pickup date time widget, ecommerce delivery calendar, ecommerce pickup calendar, e-commerce delivery calendar, e-commerce pickup calendar, delivery calendar, pickup calendar, cart calendar, storefront calendar, calendar, checkout, checkout calendar, delivery date, pickup date, delivery time, pickup time, order delivery calendar, order pickup calendar, woocommerce delivery date, woocommerce pickup date, delivery calendar, pickup calendar, woocommerce pickup date, woocommerce pickup time, woocommerce delvery date, woocommerce delvery time, customer delivery date, delivery date time selection, customer pickup date time selection, food ordering system, food ordering, restaurant ordering system, food ordering widget, fast food ordering, woocommerce food ordering, woocommerce food ordering plugin, woocommerce food ordering widget, widget
Requires at least: 3.5
Tested up to: 4.7
Stable tag: 1.0.3.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Let you customers to choose order type as deliverable or self pickup along with their desired  date and  time.
== Description ==

Woocommerce order delivery or pickup with date and time is a plugin that allow your customers to choose their desired delivery/pickup date and time for Woocommerce's orders through a front-end widget.

= Control number of days allowed to place an order =
You can set allowable days for pre-order in plugin settings page and customers will be able to pickup a date from widget calendar from within your specified date range only.

= Control delivery hours to choose =
You can set delivery hours in plugin settings page and customers will be allowed to select delivery time from your specified time range only.

= Control pickup hours to choose =
You can set pickup hours in plugin settings page and customers will be allowed to select pickup time from your specified time range only.

= Set minimum time to get deliver =
You can set minimum delivery time in plugin settings page and this info will be visible in widget.

= Allow customers to choose delivery or pickup of orders =
Customer can select whether they will pickup their orders from you store or they need a delivery for their order.

= Automated shipping based on order type selection =
It have a automated shipping selection, ie; if customer choose pickup instead of delivery then the Store Pickup shipping is automatically applied same as if deliver option is selected from widget then it will show your available shipping methods except the Store Pickup one.

= Control what texts to show on order details page with date and time =
This plugin show the desired delivery/pickup date and time on order details page on front-end and you can control the texts to be shown there with their chosen date and time.

= Control where to place delivery/pickup info =
You can control where to show this delivery/pickup date and time on customer order page, two option is available as before item list or after item list.

= Control and show delivery/pickup date time on email =
Same info is shown on customers email also, while placing an order and you can control what texts to show with delivery/pickup date and time

= Get delivery/pickup data on admin order details page =
All info is also shown on admin order details page, ie; order type: delivery/pickup, Delivery/pickup date and delivery/pickup time.

= Control all the texts/lebels =
You can change text/label of each fields as per your need

= Get pro version here =
<a href="http://plugins.byconsole.com/product/byconsole-wooodt-extended/" target="_blank">Get Pro version</a>

= Features in pro version =
1)Set Pre-order days

2) Disable/enable delivery/pickup or keep both

3) Minimum lead time / wait time

4) Set allowable delivery hours

5) Set allowable pickup hours

6) Set delivery break time

7) Set pickup break time

8) Set allowable delivery days

9) Set allowable pickup days

10) Create delivery location list

11) Create pickup location list

12) Disable/enable location list feature for delivery

13) Disable/enable location list feature for pickup

14) Display minimum time to get delivered

15) Automated shipping based on customer's order type selection

16) Set time format

17) Customizable text block to show on customer's my account page

18) Customizable text block to show on customer's email

19) Select Position of texts block on customer's my account page

20) Select Position of texts block on customer's email

21) Set shop closing days based on days like (every Sunday/Monday/../..)

22) Set casual holidays on each month's calendar

23) Set National/public holiday on calendar

24) Get customized/more extended copy to suit your all needs.

= NB =
If you enjoy this plugin please put a review, that will encourage me to bring some more ...

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly by uploading zip through "Upload Plugin" button in "Plugins" -> "Add New" screen of wp-admin area.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Wp admin menu -> Order Delivery Time management screen to configure the plugin
4. Use the Wp admin menu -> Appearance -> Widgets -> Order delivery time widget and place it on your desired sidebar

OR

Search for "Woocommerce order delivery or pickup with date and time" in "Plugins" -> "Add New" screen within your WordPress wp-admin area and click install button


== Frequently Asked Questions ==

= Will this plugin works with Woocommerce 2.6 and above? =

Yes this plugin is tested on Woocommerce 2.6.2.

= Why I am getting two flat rate / store pickup shipping? =

This happen when you update your woocommerce version to 2.6 or later and using shipping zone, but did not remove the old shipping methods (Legacy), so once you remove the deprecated shipping method it will show shipping methods used in zone.

= Will this plugin works with Woocommerce version below 2.6 =

Yes this plugin will work on Woocommerce version 2.2.0 too, its tested already.

== Screenshots ==

1. Pickup/Delivery date selection on widget

2. Pickup/Delivery time selection on widget

3. Frontend widget

4. Admin setting page

5. Delivery/pickup info with date time in admin order details page

6. Order details with delivery type, date and time on frontend customer profile

7. Customer email copy with delivery type, date and time

8. Widget produced by this plugin

9. date selection from allowable dates on checkout page

10. Time selection from allowable time range on checkout page

== Changelog ==

= 1.0.1.0 =
Added calendar and time drop-down on checkout field too on checkout page.
Synchronizing the widget date time field value while changing date time field value in checkout field on checkout page

= 1.0.1.5 =
Fixed: Warning: Cannot modify header information
(Reported by @charleshahn)

= 1.0.1.6 =
Fixed: Make automated shipping selection work on checkout page without having to have the widget
Fixed: Undefined variable php notice, while wp debug is on. 

= 1.0.2.0 =
Language support added
Settings provided for customization of heading, lebels and texts.

= 1.0.2.1 =
Restricted of selection past time of the day in time drop-down on widget and checkout page

= 1.0.2.2 =
Header output warning fixed

= 1.0.3.0 =
Delivery time for other than current day bug fixed (reported by @jaysim)
structure updated

= 1.0.3.1 =
Calendar issue fixed in case of pre-order days settings field leaved as empty
Possible error for new/next year date selection has been fixed

== Upgrade Notice ==

= 1.01.4 =
Date picker and time drop-down added on checkout field too, so update to avoid manual/invalid date/time input on checkout page(Previously it was only on widget)  
Some text changed
= 1.0.1.5 =
Fixed: Warning: Cannot modify header information
= 1.0.1.6 =
Fixed: Make automated shipping selection work on checkout page without having to have the widget
= 1.0.2.0 =
Language support added
Settings provided for customization of heading, labels and texts.
= 1.0.2.1 =
Restricted of selection past time of the day in time drop-down on widget and checkout page
= 1.0.2.2 =
Header output warning fixed
= 1.0.3.0 =
Delivery time for other than current day bug fixed
structure updated
= 1.0.3.1 =
Calendar issue fixed in case of pre-order days settings field leaved as empty
Possible error for new/next year date selection has been fixed

== Features ==

1. Control number of days allowed to place an order 
2. Control delivery hours to choose 
3. Control pickup hours to choose 
4. Set minimum time to get deliver 
5. Allow customers to choose delivery or pickup of orders 
6. Automated shipping based on order type selection 
7. Control what texts to show on order details page with date and time
8. Control where to place delivery/pickup info 
9. Control and show delivery/pickup date time on email 
10. Get delivery/pickup data on admin order details page 
11. Language supported through .po and .mo file
12. all texts, labels and headings are open to customize.

