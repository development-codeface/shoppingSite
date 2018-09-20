<?php include_once('includes/header_links.php'); ?>	
	
	
<title>About Us</title>

	
	<div class="container about_us">
	
	<?php include_once('includes/header_content.php'); ?>	
	<?php include_once('res_menu.php'); ?>	

	<section class="content_section_main">
			<div class="row">
			<div class="large-12 columns">
			<div class="large-5 columns abt_content">
			
			<img src="images/about_img1.jpg">
		</div>
		<div class="large-7 columns abt_img">
			<h2 class="page_title">MARGIN FREE MARKET</h2> 
			<p class="page_content">
			MFREEM (Margin Free Market) margin-free market chain that works under Consumer Protection and Guidance Society (T. 477/93), aims at sensitizing consumers about the food items they eat and giving them consumer products at lowest prices.
			MFREEM has radically changed the consumer concepts of ordinary people of Kerala, giving them more control over their money.
			Consumer Protection and Guidance Society (T. 477/93) Thiruvananthapuram, Kerala will have administrative control over the whole business activity.
			</p>
			
			<h2 class="page_title">MARGINFREEMARKETONLINE.COM </h2> 
			<p class="page_content">
					You will find everything you are looking for. Right from fresh Fruits and Vegetables, Rice and Dals, Spices and Seasonings to Packaged products, Beverages, Personal care products, Meats – we have it all.
		Choose from a wide range of options in every category, exclusively handpicked to help you find the best quality available at the lowest prices. Select a time slot for delivery and your order will be delivered right to your doorstep, you can pay using your debit / credit card or by cash / sodexo on delivery. We guarantee on time delivery, and the best quality!

		Happy Shopping
			</p>
			
			<h2 class="page_title">Why should I use marginfreemarketonline.com?</h2> 
			<p class="page_content">
					Marginfreemarketonline.com allows you to walk away from the drudgery of grocery shopping and welcome an easy relaxed way of browsing and shopping for groceries. Discover new products and shop for all your food and grocery needs from the comfort of your home or office. No more getting stuck in traffic jams, paying for parking, standing in long queues and carrying heavy bags – get everything you need, when you need, right at your doorstep. Food shopping online is now easy as every product on your monthly shopping list, is now available online at bigbasket.com, India’s best online grocery store.
			</p>
		</div>
		</div>

		</div>
		</section>

	<?php include_once('includes/header_content.php'); ?>	
			
	</div>
	<?php include_once('includes/footer_module.php'); ?>
	<?php include_once('includes/footer_content.php'); ?>	


	
<!-- <link rel="stylesheet" type="text/css" href="http://www.jqueryscript.net/demo/Bootstrap-Style-Vertical-Accordion-Menu-with-jQuery-CSS3-bs-leftnavi/css/bs_leftnavi.css">
<script src="http://www.jqueryscript.net/demo/Bootstrap-Style-Vertical-Accordion-Menu-with-jQuery-CSS3-bs-leftnavi/js/bs_leftnavi.js"></script> -->

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
	
	
 
