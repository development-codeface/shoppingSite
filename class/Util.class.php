

 <?php

class Util
{
		function Util()
		{
		}
		function getRandomWord($len) 
		{
    		$word = array_merge(range('a', 'z'), range('A', 'Z'), range('1','9'));
   		 	shuffle($word);
			return substr(implode($word), 0, $len);
		}
		
		/*
		
		takes end date as input
		returns 0 or 1
		0 - Ongoing
		1 - Pending
		
		*/
		function getStatus($end_date)
		{
			
			$current_date = new DateTime(date('Y-m-d')); // for date comparison
			if($current_date <= $end_date)
			{
				return 0;		
			}
			else
			{
				return 1;
			}
			
		}
		
		/*
		
		takes date and format as input
		returns formated date
		
		*/
		function getFormatedDate($format,$date)
		{
			$formated_date = "";
			if($date != NULL)
			{
				$formated_date = date($format,strtotime($date));
			}
			return $formated_date;
		}
		
		function getCurrentUtl()
		{
			$pageURL = 'http';
			//if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
			$pageURL .= "://";
			if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
			} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			}
			return $pageURL;
		}
		function createThumbs( $pathToImages, $pathToThumbs) 
		{
			$info = pathinfo($pathToImages);
			switch ( strtolower($info['extension'])) 
    		{
			case 'jpg':
     		

     			 // load image and get image size
      			$img = imagecreatefromjpeg( "{$pathToImages}" );
      			$width = imagesx( $img );
      			$height = imagesy( $img );

     			 // calculate thumbnail size

list($width, $height, $type, $attr) = getimagesize($pathToImages); 
if($width>$height)
{
$new_width  = 149;
$new_height = 220;

}
else if($width<$height)
{
	$new_width  = 149;
	$new_height = 220;
	
}
else
{
	$new_width  = 149;
	$new_height = 220;
	
}
if ($width > $height) {
  $image_height = floor(($height/$width)*$new_width);
  $image_width  = $new_width;
} 
else {
  $image_width  = floor(($width/$height)*$new_height);
  $image_height = $new_height;
}

      			// create a new tempopary image
      			$tmp_img = imagecreatetruecolor( $image_width, $image_height );

      			// copy and resize old image into new image 
      			imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $image_width, $image_height, $width, $height );

      			// save thumbnail into a file
      			imagejpeg( $tmp_img, "{$pathToThumbs}",100);
			break;
			case 'jpeg':
     		

     			 // load image and get image size
      			$img = imagecreatefromjpeg( "{$pathToImages}" );
      			$width = imagesx( $img );
      			$height = imagesy( $img );

     			 // calculate thumbnail size
      			list($width, $height, $type, $attr) = getimagesize($pathToImages); 
if($width>$height)
{
$new_width  = 149;
$new_height = 220;

}
else if($width<$height)
{
	$new_width  = 149;
	$new_height = 220;
	
}
else
{
	$new_width  = 149;
	$new_height = 220;
	
}
if ($width > $height) {
  $image_height = floor(($height/$width)*$new_width);
  $image_width  = $new_width;
} 
else {
  $image_width  = floor(($width/$height)*$new_height);
  $image_height = $new_height;
}

      			// create a new tempopary image
      			$tmp_img = imagecreatetruecolor( $image_width, $image_height );

      			// copy and resize old image into new image 
      			imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $image_width, $image_height, $width, $height );


      			// save thumbnail into a file
      			imagejpeg( $tmp_img, "{$pathToThumbs}",100);
			break;
			case 'gif':
     			

     			 // load image and get image size
      			$img = imagecreatefromgif( "{$pathToImages}" );
      			$width = imagesx( $img );
      			$height = imagesy( $img );

     			 // calculate thumbnail size
      			list($width, $height, $type, $attr) = getimagesize($pathToImages); 
if($width>$height)
{
$new_width  = 149;
$new_height = 220;

}
else if($width<$height)
{
	$new_width  = 149;
	$new_height = 220;
	
}


else
{
	$new_width  = 149;
	$new_height = 220;
	
}
if ($width > $height) {
  $image_height = floor(($height/$width)*$new_width);
  $image_width  = $new_width;
} 
else {
  $image_width  = floor(($width/$height)*$new_height);
  $image_height = $new_height;
}

      			// create a new tempopary image
      			$tmp_img = imagecreatetruecolor( $image_width, $image_height );

      			// copy and resize old image into new image 
      			imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $image_width, $image_height, $width, $height );


      			// save thumbnail into a file
      			imagegif( $tmp_img, "{$pathToThumbs}",100);
			break;
			case 'png':
     			

     			 // load image and get image size
      			$img = imagecreatefrompng( "{$pathToImages}" );
      			$width = imagesx( $img );
      			$height = imagesy( $img );

     			 // calculate thumbnail size
      			list($width, $height, $type, $attr) = getimagesize($pathToImages); 
if($width>$height)
{
$new_width  = 149;
$new_height = 220;

}
else if($width<$height)
{
	$new_width  = 149;
	$new_height = 220;
	
}
else
{
	$new_width  = 149;
	$new_height = 220;
	
}
if ($width > $height) {
  $image_height = floor(($height/$width)*$new_width);
  $image_width  = $new_width;
} 
else {
  $image_width  = floor(($width/$height)*$new_height);
  $image_height = $new_height;
}

      			// create a new tempopary image
      			$tmp_img = imagecreatetruecolor( $image_width, $image_height );

      			// copy and resize old image into new image 
      			imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $image_width, $image_height, $width, $height );


      			// save thumbnail into a file
      			imagepng( $tmp_img, "{$pathToThumbs}");
			break;
    		}
		}

function createpopup( $pathToImages, $pathToThumbs) 
		{
			$info = pathinfo($pathToImages);
			switch ( strtolower($info['extension'])) 
    		{
			case 'jpg':
     		

     			 // load image and get image size
      			$img = imagecreatefromjpeg( "{$pathToImages}" );
      			$width = imagesx( $img );
      			$height = imagesy( $img );

     			 // calculate thumbnail size

list($width, $height, $type, $attr) = getimagesize($pathToImages); 
if($width>$height)
{
$new_width  = 427;
$new_height = 279;

}
else if($width<$height)
{
	$new_width  = 279;
	$new_height = 427;
	
}
else
{
	$new_width  = 400;
	$new_height = 400;
	
}
if ($width > $height) {
  $image_height = floor(($height/$width)*$new_width);
  $image_width  = $new_width;
} 
else {
  $image_width  = floor(($width/$height)*$new_height);
  $image_height = $new_height;
}

      			// create a new tempopary image
      			$tmp_img = imagecreatetruecolor( $image_width, $image_height );

      			// copy and resize old image into new image 
      			imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $image_width, $image_height, $width, $height );

      			// save thumbnail into a file
      			imagejpeg( $tmp_img, "{$pathToThumbs}",100);
			break;
			case 'jpeg':
     		

     			 // load image and get image size
      			$img = imagecreatefromjpeg( "{$pathToImages}" );
      			$width = imagesx( $img );
      			$height = imagesy( $img );

     			 // calculate thumbnail size
      			list($width, $height, $type, $attr) = getimagesize($pathToImages); 
if($width>$height)
{
$new_width  = 427;
$new_height = 279;

}
else if($width<$height)
{
	$new_width  = 279;
	$new_height = 427;
	
}
else
{
	$new_width  = 400;
	$new_height = 400;
	
}
if ($width > $height) {
  $image_height = floor(($height/$width)*$new_width);
  $image_width  = $new_width;
} 
else {
  $image_width  = floor(($width/$height)*$new_height);
  $image_height = $new_height;
}

      			// create a new tempopary image
      			$tmp_img = imagecreatetruecolor( $image_width, $image_height );

      			// copy and resize old image into new image 
      			imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $image_width, $image_height, $width, $height );


      			// save thumbnail into a file
      			imagejpeg( $tmp_img, "{$pathToThumbs}",100);
			break;
			case 'gif':
     			

     			 // load image and get image size
      			$img = imagecreatefromgif( "{$pathToImages}" );
      			$width = imagesx( $img );
      			$height = imagesy( $img );

     			 // calculate thumbnail size
      			list($width, $height, $type, $attr) = getimagesize($pathToImages); 
if($width>$height)
{
$new_width  = 427;
$new_height = 279;

}
else if($width<$height)
{
	$new_width  = 279;
	$new_height = 427;
	
}
else
{
	$new_width  = 400;
	$new_height = 400;
	
}
if ($width > $height) {
  $image_height = floor(($height/$width)*$new_width);
  $image_width  = $new_width;
} 
else {
  $image_width  = floor(($width/$height)*$new_height);
  $image_height = $new_height;
}

      			// create a new tempopary image
      			$tmp_img = imagecreatetruecolor( $image_width, $image_height );

      			// copy and resize old image into new image 
      			imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $image_width, $image_height, $width, $height );


      			// save thumbnail into a file
      			imagegif( $tmp_img, "{$pathToThumbs}",100);
			break;
			case 'png':
     			

     			 // load image and get image size
      			$img = imagecreatefrompng( "{$pathToImages}" );
      			$width = imagesx( $img );
      			$height = imagesy( $img );

     			 // calculate thumbnail size
      			list($width, $height, $type, $attr) = getimagesize($pathToImages); 
if($width>$height)
{
$new_width  = 427;
$new_height = 279;

}
else if($width<$height)
{
	$new_width  = 279;
	$new_height = 427;
	
}
else
{
	$new_width  = 400;
	$new_height = 400;
	
}
if ($width > $height) {
  $image_height = floor(($height/$width)*$new_width);
  $image_width  = $new_width;
} 
else {
  $image_width  = floor(($width/$height)*$new_height);
  $image_height = $new_height;
}

      			// create a new tempopary image
      			$tmp_img = imagecreatetruecolor( $image_width, $image_height );

      			// copy and resize old image into new image 
      			imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $image_width, $image_height, $width, $height );


      			// save thumbnail into a file
      			imagepng( $tmp_img, "{$pathToThumbs}",0);
			break;
    		}
		}

}
?>