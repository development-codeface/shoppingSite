<?php include_once('includes/header_links.php'); ?>	
	
	
<title>About Us</title>

	
	<div class="container">
	
	<?php include_once('includes/header_content.php'); ?>	

	<section class="content_section_main privacy_policy_block">
			<div class="row">
			<div class="large-12 columns">
	
		
			<h2 class="page_title">Terms and Conditions</h2> 
			<p class="page_content">
			Welcome to Margiin Free Market Online Pvt Ltd. Margiin Free Market Online Private Limited, hereafter referred to as Margiin Free Market is and Online Supermarket whose registered office is at Trivandrum, Kerala. In using the Margiin Free Market shopping service, the user is deemed to have accepted the terms and conditions listed below. Margiin Free Market reserves the right to modify these terms and conditions at any time. 

			</p>
			
			<ul class="cookie_list_li">
   <li >Margiin Free Market will try to deliver the products as per  the order placed by the user. We will start to process the order as soon as you  place the order successfully with us. </li>
   <li >When you opt for Cash On Delivery we always  try make a confirmation about the over phone before delivery. </li>
    <li >Every care shall be taken to deliver the goods  to the intended recipient. But Margiin Free Market shall not be held responsible for any wrong  delivery of the product based on the address given by the customer or if any  person imposes to be the actual recipient and takes delivery of goods.</li>
   <li >All prices and availability  of products are subject to change without prior notice</li>
   <li >Any request for  cancellations of orders once duly placed on the site, shall not be entertained.</li>
  <li >The product/services  provided on this site are without warranties of any kind either expressed or  implied and Margiin Free Market disclaims all or any of them to the fullest extent. Any  warranties or After Sale Services if any offered by the Manufacturers/Vendors  on any product shall be serviced directly by such Manufacturer/Vendor and Margiin Free Market  shall not be under any obligation to ensure compliance or handle complaints.</li>
</ul>



			<h1 class="privacy_title_li">Return Policy and Cancellation</h1>
			
			<ul class="cookie_list_li">
  <li >If order is processed and delivered the items  won't be taken back or replaced unless there is a reasonable manufacturing  issue.</li>
 <li >If the delivery is not executed during first  attempt due to incorrect or insufficient address, recipient not at home,  address found locked or refusal to accept, the customer shall still be charged  for the order. No refunds would be entertained for such items.</li>
 <li >Please note that  cancellations have to be made within 1 hour after placing an order. For  canceling your order, you will have to get in touch with our customer support  executive by sending an email to Margiin Free Marketindia@gmail.com and giving the reference  of your order number. In case we receive a cancellation notice and till that  time the order has already been processed by us, the order cannot be cancelled.  Margiin Free Market has complete right to decide whether an order has been processed or not.  The customer agrees not to dispute the decision made by Margiin Free Market and accept Margiin Free Market  decision regarding the cancellation.</li>
</ul>
<h1 class="privacy_title_li">Return Policy and Cancellation</h1>

	<ul class="cookie_list_li">
	 <li>Once an item(s) is returned or found missing in an order <b>at the time of delivery</b>, a refund will be raised that time itself. The final payment collected from the customer will be the one after deducting the specific amount from the total order amount. It can be cash / card / Sodexo. In the case of bank transfer / online payment, the specific amount will be added as credit against the concerned customer account held with <a href="#">marinfreemarket.in</a>.</li>
  <li>If an item(s) is found missing or returned <b>at a later point of time</b>, a communication will be received by you regarding the same. If a refund is raised, the specific amount will be credited to your bank account with the facility of NEFT/RTGS at the earliest slot possible. Normally we follow no question asked return/refund policy.</li>
  
    <li>If you haven't received the benefit of refund amount for two orders following the issue order, please feel free to get in touch with our Customer Service Manager at <a href="mailto:support@marginfreemarket.com">support@marginfreemarket</a> or +91-9876543210.</li>

</ul>
			

		</div>
		</div>
		</section>

	<?php include_once('includes/header_content.php'); ?>	
			
	</div>
	
	<?php include_once('includes/footer_content.php'); ?>	


<!-- <link rel="stylesheet" type="text/css" href="http://www.jqueryscript.net/demo/Bootstrap-Style-Vertical-Accordion-Menu-with-jQuery-CSS3-bs-leftnavi/css/bs_leftnavi.css">
<script src="http://www.jqueryscript.net/demo/Bootstrap-Style-Vertical-Accordion-Menu-with-jQuery-CSS3-bs-leftnavi/js/bs_leftnavi.js"></script> -->
<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/jquery.typeahead.min.js"></script>
<script>
var data = {
            "Grocery": [
                "Potato", "Rice", "Onion"
            ],
            "Vegetables": [
                 "Apple", "Orange", "Cucumber", "Tomato" 
            ],
            "Personal": [
                  "Bath and Body care", "Dental Care"
            ],
            "Organic": [
               "Organic Non Products", "Organic Products"
            ]
        };

        $('#q').typeahead({
            minLength: 1,
            maxItem: 15,
            order: "asc",
            hint: true,
            group: [true, "{{group}} Categories!"],
            maxItemPerGroup: 5,
            backdrop: {
                "background-color": "#fff"
            },
            href: "/Categories/{{group}}/{{display}}/",
            dropdownFilter: "All Categories",
            emptyTemplate: 'No result for "{{query}}"',
            source: {
                Grocery: {
                    data: data.Grocery
                },
                "Vegetables and Fruits": {
                    data: data.Vegetables
                },
                "Personal Care": {
                    data: data.Personal
                },
                Organic: {
                    data: data.Organic
                }
            },
            callback: {
                onClickAfter: function (node, a, item, event) {

                    // href key gets added inside item from options.href configuration
                    alert(item.href);

                }
            },
            debug: true
        });

    </script>
	
	
 
