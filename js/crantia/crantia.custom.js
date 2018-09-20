$(window).load(function(){
 	

	
	
 	


 	
  var owl = $("#owl-example9");
  

 
  // Custom Navigation Events
  jQuery(".next").click(function(){
    owl.trigger('owl.next');
  })
  jQuery(".prev").click(function(){
    owl.trigger('owl.prev');
  })
  
  
  
    
      jQuery("#owl-example2").owlCarousel({
     
         
     
          items : 4,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : [979,3]
     
      });


     
      jQuery("#owl-example4").owlCarousel({
     
        
     
          items : 4,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : [979,3]
     
      });
     


     
      jQuery("#owl-example3").owlCarousel({
     
      
     
          items : 4,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : [979,3]
     
      });
     





 
 /*testimonials start*/
 
      jQuery("#owl-example5").owlCarousel({
     
         navigation : false,
      pagination : true,
          items : 1,
          itemsDesktop : [1199, 1],
        itemsDesktopSmall : [979, 1],
        itemsTablet : [768, 1],
        itemsTabletSmall : false,
        itemsMobile : [479, 1],
     
      });
     
	        jQuery("#owl-example6").owlCarousel({
     
         navigation : false,
      pagination : true,
          items : 1,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : [979,3]
     
      });
 
 /*testimonials End*/
   /*Main Banner Start*/
    	

            jQuery("#owl-example").owlCarousel({
     
         navigation : false,
      pagination : true,
autoPlay: 3000,

          items : 1,
           itemsDesktop : [1199, 1],
        itemsDesktopSmall : [979, 1],
        itemsTablet : [768, 1],
        itemsTabletSmall : false,
        itemsMobile : [479, 1]
		
     
      });
    


   /*Main Banner End*/

    jQuery("#owl-example1").owlCarousel({
	 
	 
	   items : 1,
           itemsDesktop : [1199, 1],
        itemsDesktopSmall : [979, 1],
        itemsTablet : [768, 1],
        itemsTabletSmall : false,
        itemsMobile : [479, 1],
	 
	 
	 });
	 
	 
	  	


	 
    });
	
	


  