<?php

	$numrows = $total_count;
// number of rows to show per page
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
   // cast var as int
   $page = (int) $_GET['page'];
} else {
   // default page num
   $page = 1;
} // end if

// if current page is greater than total pages...
if ($page > $totalpages) {
   // set current page to last page
   $page = $totalpages;
} // end if
// if current page is less than first page...
if ($page < 1) {
   // set current page to first page
   $page = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($page - 1) * $rowsperpage;



/******  build the pagination links ******/
// range of num links to show
$range = 1;

// if not on page 1, don't show back links
if ($page > 1) {
   // show << link to go back to page 1
   echo "<a href='$targetpath&page=1' style='text-decoration:none'><span class='common'>First&nbsp;</span></a> ";
   // get previous page num
   $prevpage = $page - 1;
   // show < link to go back to 1 page
   echo " <a href='$targetpath&page=$prevpage' style='text-decoration:none'><span class='common'>Pre&nbsp;<span></a> ";
} // end if 

// loop to show links to range of pages around current page
for ($x = ($page - $range); $x < (($page + $range) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages)) {
      // if we're on current page...
      if ($x == $page) {
		   if($numrows>=$rowsperpage)
		  {
         // 'highlight' it but don't make a link
         echo"<span class='current'> <b> $x </b></span> ";
      // if not current page...
      } 
	  }else {
         // make it a link
         echo " <a href='$targetpath&page=$x' style='text-decoration:none'>&nbsp;$x&nbsp; </a> ";
      } // end else
   } // end if 
} // end for
                 
// if not on last page, show forward and last page links        
if ($page != $totalpages) {
   // get next page
   $nextpage = $page + 1;
    // echo forward link for next page 
   echo " <a href='$targetpath&page=$nextpage' style='text-decoration:none'><span class='common'>&nbsp;Next&nbsp;</span></a> ";
   // echo forward link for lastpage
   echo " <a href='$targetpath&page=$totalpages' style='text-decoration:none'><span class='common'>Last</span></a> ";
} // end if
/****** end build pagination links ******/

?>