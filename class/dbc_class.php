<?php

//include("config.php");
	class Dbc
	{
		function Dbc()
		{
			$connect=mysql_connect('localhost','crtsmarg_margin','m@rgin123fr@@')or die(mysql_error());
			$db=mysql_select_db('crtsmarg_marginfree')or die(mysql_error());
		}
		function query($sql)
		{
			$result=mysql_query($sql) or die(mysql_error());
			return($result);
		}
		function fetch($result)
		{
			$row=array();
			while($row=mysql_fetch_array($result))
			{
				return $row;
			}
		}
		function getNumRows($result)
		{
			$numrows = mysql_num_rows($result);
			return $numrows;
		}
		function getAffectedRows()
		{
			return mysql_affected_rows();
		}
		function cleaner($vals)
		{
			$final_data=mysql_real_escape_string(htmlentities($vals,ENT_QUOTES,'UTF-8'));
			return $final_data;
		}
		function disable_right_click()
		{
			echo '<SCRIPT TYPE="text/javascript">

					var message="Sorry, right-click has been disabled";
					
					function clickIE() {if (document.all) {(message);return false;}}
					function clickNS(e) {if
					(document.layers||(document.getElementById&&!document.all)) {
					if (e.which==2||e.which==3) {(message);return false;}}}
					if (document.layers)
					{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
					else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
					document.oncontextmenu=new Function("return false")
					
				</SCRIPT>';
		}
		 function clean_up( $txt )
			 {
				$unwanted = array("'"); 
				return str_ireplace( $unwanted, '', $txt );
			 }
			 
			 	function runQuery($query) {
		$result = mysql_query($query);
		while($row=mysql_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	}
?>