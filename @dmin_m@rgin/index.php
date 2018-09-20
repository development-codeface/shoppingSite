<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Margin Free</title>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
</head>
<style>
body{
	background:#FFF;
}
ul{
	list-style-type:none;
}
a{
	text-decoration:none;
}
a:hover{
	text-decoration:underline;
	color:#000;
}
.image_main_con {
	width:100%;
	margin:0 auto;
}
.wrapper {
	width:600px;
	margin:0px auto;
	padding-top:50px;
}
.image_dtl_con {
	width:567px;
	float:left;
	border:1px solid #CCC;
	padding:10px;
	margin-top:20px;
	border-radius:10px;
}
.form_con {
/*	background:#f0e284;*/
	width:547px;
	padding:10px;
	float:left;
}
.form_bg_con {
	width:520px;
	float:left;
	padding:15px 15px 15px 10px;
	min-height:180px;
	font-family:Arial, Helvetica, sans-serif;
	color:#333;
	font-size:12px;
}
.form_top_hed {
	font-family:Arial, Helvetica, sans-serif;
	font-size:13px;
	color:#FF6ECD;
	font-weight:bold;
	padding-bottom:10px;
}
.Login_txt {
	font-family:Arial, Helvetica, sans-serif;
	font-size:18px;
	color:#6cc245;
	font-weight:normal;
	padding-bottom:10px;
}
.login_cnt_con {
	width:380px;
	float:left;
	margin-top:10px;
}
.formLabels {
	font-family:Arial, Helvetica, sans-serif;
	padding-top:9px;
	color:#000;
	width:95px;
	text-align:right;
	font-size:12px;
}
.formTextBox {
	height:21px;
	width:220px;
	float:left;
	border:1px solid #000;
	margin:5px 18px 0 0px;
	color:#000;
	background:#FFF;
	padding-left:5px;
	margin-left:10px;
	font:Arial, Helvetica, sans-serif;
	font-size:12px;
}
.btnForm{
	color:#FFF;
	background:#6cc245;
	cursor:pointer;
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	height:25px;
	width:80px;
	border:none;
	margin-left:10px;
	margin-top:10px;
	margin-right:8px;
}
label {
	float: left;
	text-align:right;
	width:116px;
	padding-top:8px;
	font-size:13px;
	margin-right:10px;
}
.lock{
	width:106px;
	height:111px;
	float:left;
}
</style>

<body>
<div class="image_main_con">

  <div class="wrapper">
     <div class="image_dtl_con"> 
      
      <!---------------------- BEGIN Form_con --------------------->
      
      <div class="form_con">
        <div class="form_bg_con">
          <div id="contact-area">
            <ul class="formBox">
              <li class="Login_txt">Administration Login</li>
              <span class="lock">
               <img src="../images/lock.jpg" height="111" width="106" /></span>
               <span style="width:360px; float:left;">
              <form action="../phpfiles/do/admin_login_check.php" method="post" name="login_form" onSubmit="">
                <li class="login_cnt_con">
                  <label class="formLabels">User Name :</label>
                  <input type="text" name="username" id="username" class="formTextBox" />
                </li>
                <li class="login_cnt_con">
                  <label class="formLabels">Password :</label>
                  <input type="password" name="password" id="password" class="formTextBox" />
                </li>
                <li class="login_cnt_con">
                  <label class="formLabels">&nbsp;</label>
                  <input type="submit" value="Log In"  name="login" id="login"  class="btnForm" />
                  <a href="../index.php"><font size="-1" color="#000000">Return to home </font></a> </li>
              </form>
              </span>
            </ul>
          </div>
        </div>
      </div>
       <!---------------------- END Form_con --------------------->
   </div>     
  </div>
</div>
</body>
</html>
