<?php
include_once("class/dbc_class.php");
	$dbc=new Dbc;
	
//delete product
if (isset($_REQUEST['id'])) 
{
	 	$id = $_REQUEST['id'];
	
		$sd1 = "select image_url from home_banner where id='$id'";
		$qd1 = $dbc -> query($sd1);
		while ($row3 = $dbc -> fetch($qd1))
		{
			unlink($row3['image_url']);
		}
 
  		$s1="delete from home_banner where id='$id'";
	    $q1=$dbc->query($s1);
	
	 echo "<script>window.location='administrator.php?option=slider';</script>";
	
}

	
?>
 	  <div class="order_results">
    
       <div class="hd_con" style="float:left; width:100%;">
         
         <nav class="breadcrumbs">
		 	<a href="administrator.php"><span class="d-icon"><i class="fi-home"></i></span></a>
      <a class="current" href="#">slider</a>
		 </nav>
		         
      </div>

    </div>
    
 	<div class="columns">
<div class="order_results">

            
     <div class="dash_bg">
     <h3><span class="iconcommon"></span>Home Slider</h3>
        <ul class="formBox">
          <div id="projects_area">
            <table class="dataTable" width="100%" cellpadding="0" cellspacing="0" border="0">
              <tbody>
                  <tr>
                 <th>IMAGES</th>
                  <th>ACTION</th>
				 
                  </tr>
				  <?php
				  $select01="select * from home_banner limit 0,3";
				  $query01=$dbc->query($select01);
				  $num01 = $dbc ->getNumRows($query01);
                while($array01=$dbc->fetch($query01))
				{
					
					?>
				
        		<tr>
                <td><img width="200" src="<?php echo $array01['image_url'];?>" /></td>
                <td>
               <a class="ad_edit" href="phpfiles/administrator/manage_slider.php?id=<?php echo $array01['id']; ?>&type=slider" onclick="javascript&#58;
	window.open(this.href, this.target, 'width=500,height=450,screenX=400,screenY=100,resizable,scrollbars');return false;"><span class="a_d_icon"><i class="fi-widget"></i></span> Edit</a>
	</td>
			   </tr>
			   <?php
				}
				?>
				<tr>
				<td colspan="2"></td>
				</tr>
				<?php
				  $select02="select * from home_banner limit 3,2";
				  $query02=$dbc->query($select02);
                while($array02=$dbc->fetch($query02))
				{
					
					?>
				
        		<tr>
                <td><img width="400" src="<?php echo $array02['image_url'];?>" /></td>
                <td>
               <a class="ad_edit" href="phpfiles/administrator/manage_slider.php?id=<?php echo $array02['id']; ?>&type=banner" onclick="javascript&#58;
	window.open(this.href, this.target, 'width=500,height=450,screenX=400,screenY=100,resizable,scrollbars');return false;"><span class="a_d_icon"><i class="fi-widget"></i></span> Edit</a>

               </td>
			   </tr>
			   <?php
				}
				?>
                </tbody>
               
            </table>
          </div>
        </ul>
      </div>
  <script>
 function del()
 {
	
var r=confirm('Are you sure you want to delete this category ?');
return r;
 }
</script>
