<!DOCTYPE html>

<?php session_start(); ?>
<html lang="zh-TW">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	<link href="" rel="shortcut icon">
	<title>練團室系統-註冊頁面</title><!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
	    <!-- jQuery -->
    <script src="js/jquery.js"></script>

	<style>
		body
		{
			background:url('img/register_bg.jpg');
			background-size: cover;
		}
		.well
		{
			opacity:0.95;
		}

	</style>
	
</head>
<body>
	<div class="container">
		<div class="well">
			<?php
			include("mysql_connect.inc.php");//資料庫連接
			include("securimage/securimage.php");//驗證碼
			$email = $_POST['email'];//email.密碼.確認密碼變數
			$password = $_POST['password'];
			$repassword = $_POST['repassword'];
			$band_name = $_POST['band_name'];

			$img = new Securimage(); //驗證碼接收
			$valid = $img->check($_POST['ct_captcha']);


			//驗證碼valid正確
			if($valid != true) 
			{ 
				echo "<center> 很抱歉, 您輸入了不正確的驗證碼.  <a href=\"javascript:history.go(-1)\">Go back</a> to try again.</center>";
			} 

			//判斷帳號密碼是否為空值
			//確認密碼輸入的正確性
			else if($email != null && $password != null && $repassword != null && $password == $repassword && $valid == true)
			{
					//新增資料進資料庫語法
					$sql = "insert into band (name, email, password) values ('$band_name','$email', '$password')";
					if(mysql_query($sql))
					{
							//echo '新增成功!';
							//echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
							//echo "<center> 您輸入了正確的驗證碼.<br />Click <a href=\"{$_SERVER['PHP_SELF']}\">here</a> to go back.</center>"; 
							//echo '<form name="send" action="send.php" method="post"><input name="email" value="';echo $email;echo'"></form>';
							//jQuery直接POST $email到send.php
							echo "<script>
									$(function(){
									var email = $('";echo 'input[name="send_form"]';echo "').val();
									  $.post('send.php',{email:email},function(data){
										alert(data);
									  });
									});
								</script>
								";echo '<input type="hidden" name="send_form" value="';echo $email;echo '">';
					}
					else
					{
							echo '新增失敗!此信箱已經註冊過!';
							echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
					}
			}
			else if($email != null && $password != null && $repassword != null)
			{
					echo '密碼與確認密碼不符!';
					echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
			}//判斷驗證碼

			else
			{
					echo '您無權限觀看此頁面!';
					echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
			}

			?>
		</div>
	</div><!-- /container -->
	</body>
</html>



