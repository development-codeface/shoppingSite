<?php

include("../../class/dbc_class.php");
$dbc=new Dbc;
$e2=$_POST['sub2'];
$se="select * from slider_image where main_category_id='$e2'";
$x=$dbc->query($se);
$count=$dbc->getNumrows($x);
?>


<?php
if($count>='5')
{?>
	<li class="form_cnt_con">
                  <li class="form_cnt_con">
                  <label class="formLabels">
                  
                  	<input type="checkbox" name="latest"  id="latest" value="latest" disabled=""/>
                  		
                  	</label> 
                  	<p style="color:#555555; font-size:14px; padding:5px;">Latest Release</p>
               
                  <div class="form_btm_line"></div>
                </li>
<?php
}
else {?>
	
	<li class="form_cnt_con">
                  <label class="formLabels">
                  
                  	<input type="checkbox" name="latest"  id="latest" value="latest" onchange="slider();"/>
                  		
                  	</label> 
                  	<p style="color:#555555; font-size:14px; padding:5px;">Latest Release</p>
               
                  <div class="form_btm_line"></div>
                </li>
                
	<?php
	
}

?>

