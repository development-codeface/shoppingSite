<?php
include ("../class/dbc_class.php");
$dbc = new Dbc;

 
 $status=$_GET['term'];

  $cat=$_GET['category_id'];
  if($cat=='all')
  {
	    $query = $dbc->query("select * from product where keywords like '%$status%'");
  }
  else
  {
	 // $query = $dbc->query("select * from product where name like '%$status%'");
	  
	  
	 $query = $dbc->query("select d.name,d.brand from main_category a join category b join sub_category c 
	  join product d  on a.id = b.main_id and b.id = c.category_id and c.id = d.subcategory_id 
	  where a.id = '$cat' and  (d.keywords like '%$status%')");

  }


 $c =$dbc->getNumRows($query);
$result = array();
            
while($row = mysql_fetch_assoc($query)){                          
                                      
            $result[] =    $row['brand']." ". $row['name'] ;                      
 //array_push($result, json_encode(array("seriesname" => utf8_encode($row['name']))));
}
									  
		//$final=	implode(",", $result);						  
									  
//echo $final;
print_r(json_encode($result));
//print_r(json_encode($result));

?>