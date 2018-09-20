	
	  <ul id="accordion" class="footer_mod_cus_block">

	
  <li><div>Page Links</div>
<ul class="menu_list">
		    					<li><a href="about.php" title="About Us">About Us</a> </li>
								<li><a href="contact.php" title="Contact Us">Contact Us</a></li>
								<li><a href="locations.php" title="Locations">Locations</a></li>
								<li><a href="privacy_policy.php" title="privacy policy">Privacy Policy</a></li>
							 	
									
 
		    				</ul>
  </li>


</ul>
	
 <!-- <script src="js/foundation.min.js"></script>-->
	<script type="text/javascript">//<![CDATA[
$(window).load(function(){
 $("#accordion > li > div").click(function () {
   $('#accordion').find('ul').not($(this).next()).slideUp(300);
  $('.active').not(this).removeClass('active');
  
  $(this).toggleClass('active');
  $(this).next().slideToggle(300);
              });
              
              var animationIsOff = $.fx.off;
              $.fx.off = true;
              $('#accordion > li > div:eq(0)').click()
              $.fx.off = animationIsOff;
});//]]> 

</script>

    <script>

      $(document).foundation().foundation('joyride', 'start');
    </script>
    
    
    
    
    
    <script type="text/javascript" src="js/jquery-ui.js"></script>    
<script type="text/javascript">
 $(function() {

 
 
 
  $(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
	//alert(scroll);
	if(scroll>=101)
	{
		$(".search_block_section").css({"position":"fixed","width":"100%","top":"0","z-index":"10000"})
	}
	else
	{
		$(".search_block_section").css({"position":"inherit","width":"100%","top":"auto"})
	}
    // Do something
});



 //autocomplete
 $('#search_cat_id').change(function() {
	var cat_id =  $('#search_cat_id :selected').val();
  $('#select_cat').val(cat_id);
 });
 

 $('#search_keyword').keyup(function() {
	var category_id =  $('#select_cat').val();
   
    $(".auto").autocomplete({
        source: "includes/search_keyword.php?category_id="+category_id,
        minLength: 1
    }); 
	
 });         

}); 
</script>

