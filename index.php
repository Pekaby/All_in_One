<?

$host = '127.0.0.1';
$username = 'root';
$password_for_database = '';
$name_database = 'all_in_one';

$CONNECT = mysqli_connect($host, $username, $password_for_database, $name_database);

//URL detect
if ($_SERVER['REQUEST_URI'] == '/') {

	$page = 'index';

}else{

	$page = explode("?", $_SERVER['REQUEST_URI']);
}


	if(!empty($_COOKIE)){
	$email = $_COOKIE['id'];
	$secur_key = $_COOKIE['secur_key'];
	$request_header_info = mysqli_query($CONNECT, "SELECT `nick`, `adm`  FROM `users` WHERE `hash_email` = ('$email') AND `secur_key` = ('$secur_key')");
	$decrypt = mysqli_fetch_assoc($request_header_info);
	$nick = $decrypt['nick'];
	if (isset($_COOKIE['adm'])) {
		if ($_COOKIE['adm'] != $decrypt['adm']) {
			unset($_COOKIE['adm']);
			setcookie('adm', "", time()-3000);
		}
	}


}

$name = "Forum_name"; 

// main page
$index_h1 = "Hello."; 

$index_text = "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste odit excepturi <br> consectetur libero maiores dicta, perferendis temporibus iusto, <br> facilis rem animi, repellat minus quod magni amet illo? Expedita, debitis velit?</p>"; // Текст приветствия

//login
$login_h1 = "Welcome."; 
$login_text = "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste odit excepturi <br> consectetur libero maiores dicta, perferendis temporibus iusto, <br> facilis rem animi, repellat minus quod magni amet illo? Expedita, debitis velit?</p>"; // Login text
$text = "<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, explicabo. A, omnis sequi aliquam iste molestiae! Nam architecto est velit laborum numquam. Dicta minima, aperiam doloremque natus, a totam dolores.</span><br><span>Recusandae culpa, quibusdam obcaecati facere distinctio eum est possimus tenetur excepturi quo reprehenderit fugiat natus iure quis maxime, eaque alias explicabo ea, rem numquam dignissimos illum asperiores nam rerum. Molestiae.</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor excepturi soluta eos doloremque, delectus et, laborum quae iusto quisquam architecto explicabo rem vero ab amet tempore nostrum necessitatibus eligendi repellat.</span>
			<span>Natus, placeat id ipsam est asperiores, consequatur. Ducimus, rerum nam maxime temporibus nobis magnam consequuntur ad sit dolorum deleniti nesciunt voluptates exercitationem praesentium quod harum iure provident veniam esse ut.</span>
			<span>Sint ipsam error, dolore aperiam porro facilis fugiat corrupti officiis, molestias quo animi pariatur amet quibusdam numquam officia consequatur doloremque impedit, laudantium dignissimos assumenda rem fugit. Impedit, recusandae est id!</span>";



$types = array('image/gif', 'image/png', 'image/jpeg', '');

$size = 1024000;
$path = '../img/usr/';

function random_str($value=30){
	return substr(str_shuffle('0123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $value);
}

 function can_upload($file){
	
	
	if($file['size'] == 0)
		return 'Файл слишком большой.';
	
	
	$getMime = explode('.', $file['name']);
	
	$mime = strtolower(end($getMime));
	
	$types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
	
	
	if(!in_array($mime, $types))
		return 'Недопустимый тип файла.';
	
	return true;
  }
  
 function make_upload($file){	
	$name = mt_rand(0, 10000) . $file['name'];
	copy($file['tmp_name'], 'img/' . $name);
  }
function footer($name='All in One')
{
echo		"<footer>";
echo		"<div class=\"logo-footer\" style=\"padding-top: 40px;\"><a href=\"#\">".$name."</a></div>";
echo		"<div class=\"menu-footer\">";
echo			"<nav>";
echo				"<ul>";
echo					"<a href=\"#\">Donate</a><br>";
echo					"<a href=\"temp/search.php\">Search</a><br>";
echo				"</ul>";
echo			"</nav>";
echo		"</div>";
echo	"</footer>";
echo"</body>";
echo"</html>";
}
function header_fuc($name='All in One'){
	global $nick;
	echo "<!DOCTYPE html>";
	echo "<html lang=\"en\">";
	echo "<head>";
	echo"	<meta charset=\"UTF-8\">";
	echo	"<title>".$name."</title>";
	echo	"<link rel=\"stylesheet\" href=\"css/style.css\">";
	echo	"<link href=\"https://fonts.googleapis.com/css?family=Public+Sans&display=swap\" rel=\"stylesheet\">";
	echo 	"<style>";
	echo			"*{margin:0;padding:0}input{outline:none}body{background:#000}header{width:100%;background-color:#18090F;height:65px}.header_content{text-align:center}.logo{padding-left:150px;padding-top:15px;float:left}.logo a{color:white;text-decoration:none;font-size:26px}.search{float:left;text-align:right;padding-top:23px;padding-left:40%}.search input{background-color:#0E0005;border-color:#0E0005;padding:3px;color:#9e8cdb}.search input:focus{border:2px solid #9e8cdb}.search input:active{background-color:black}.menu{text-align:right;padding-right:10%;padding-top:15px}.menu nav{padding-left:50px}.menu a{color:white;text-decoration:none;padding-bottom:3px}.index_image{width:100%;height:250px;background-image:url(https://images.freeimages.com/images/large-previews/82e/dark-sky-1-1175737.jpg)}.line_index_image{width:100%;height:35px;background:#18090F}.text_image{color:white;padding-top:55px;padding-left:10px;font-family:'Roboto',sans-serif}.text_image h1{padding-bottom:8px}.importand_texts{width:80%;padding-left:30px;padding-top:60px;float:left}#line{width:90%;height:35px;background-color:#18090F}#line p{color:#fff;padding-left:5px;padding-top:8px;float:left}.important{padding-left:5px;background:#0E0005;width:89.6%;padding-bottom:15px}.important a{color:#fff;text-decoration:none;font-size:20px}.important p{color:#fff;font-size:15px}.news_block{padding-right:30px;padding-top:25px;width:200px;float:right;padding-bottom:5px}#line_right_menu{height:35px;background-color:#18090F}#line_right_menu p{color:#fff;padding-left:15px;padding-top:8px}.news{padding-left:5px;background:#0E0005;padding-bottom:10px;padding-top:5px}.news a{color:#fff;text-decoration:none;font-size:18px}.news p{padding-top:6px;color:#fff}.hr{padding-top:0;width:100%;height:5px;background-color:#18090F}.some_block{padding-right:30px;padding-top:25px;width:200px;float:right}footer{margin-top:50px;width:100%;height:300px;background:#18090F;float:left}.logo-footer{font-size:45px;padding-left:25px}.logo-footer a{color:#fff;text-decoration:none}.menu-footer{text-align:left;padding:25px}.menu-footer a{color:#fff;text-decoration:none;font-size:25px}.register{margin-top:45px;margin-left:20px}#line_for_signup{width:365px;background:#18090F;padding-top:7.5px;padding-bottom:7.5px}#line_for_signup p{color:#fff;padding-left:5px}.register_block{padding-left:25px;padding-top:15px;margin-right:55px;background:#0E0005;width:340px;padding-bottom:15px}.register_block label{color:#fff}.register_block input{background-color:#18090F;border-color:#18090F;padding:3px;color:#fff}.register_block input:focus{border:2px solid #18090F;color:#fff}.search input:active{background-color:black}.close_sign_polosa{width:365px;padding-top:15px;height:10px;background:#18090F}.register{float:left}.info{padding-top:105px;padding-left-left:40px}.info p{color:#fff}.profile{width:90%;height:100%;margin-left:5%;background:#0E0005;padding-bottom:15px;padding-top:15px}.avatar{width:155px;height:155px;background:#fff;margin-left:25px;float:left;margin-right:25px;margin-top:20px}.avatar img{*/}.text_profile p,span{color:#fff}.nickname{padding-bottom:5px;font-size:40px;font-family:'Public Sans',sans-serif;padding-top:15px;color:#fff}.email{font-family:'Public Sans',sans-serif;padding-bottom:15px}.email a{color:#fff}.bio a{color:#fff}.bio{padding-top:25px;color:#fff;font-family:'Roboto',sans-serif;padding-left:205px}.post{padding-top:15px;color:#fff}.post a{color:#fff;text-decoration:none}.theme_block{width:90%;height:100%;margin-left:55px;margin-top:85px}.line{width:100%;height:35px;background:#18090F}.theme-block{width:100%;height:100%;background:#0E0005}.name_of_stat{padding-top:15px;padding-bottom:5px;font-size:30px;font-family:'Public Sans',sans-serif;color:#fff}.date_of_create{color:#fff;font-size:15px;padding-top:5px;padding-bottom:40px}.text{padding-right:65px;padding-bottom:50px;padding-left:210px}.post_profile{margin-left:15px;padding-top:15px;color:#fff}.post_profile a{color:#fff;text-decoration:none}.block_theme_answer{width:90%;height:100%;min-height:140px;margin-left:55px;background:#0E0005}.avatar_answer{width:100px;height:100px;background:#fff;float:left;margin-left:25px;margin-top:10px;margin-right:15px}.avatar_answer img{width:100px;height:100px;background:#fff;float:left}.answer{paddong-top:15px;color:#fff;min-height:80px}.nick_theme{color:#fff;font-size:20px;padding-top:10px}.hr_theme{width:100%;height:5px;margin-top:35px;background-color:#18090F}.edit_profile label,{color:#fff}.edit_profile input{background-color:#18090F;border-color:#0E0005;padding:3px;color:#fff}.edit_profile input:focus{border:2px solid #9e8cdb}.edit_profile input:active{background-color:black}.edit_profile textarea{background-color:#18090F;border-color:#0E0005;padding:3px;color:#fff}.edit_profile textarea:focus{border:2px solid #9e8cdb}.edit_profile textarea:active{background-color:black}.create_block{height:100%;margin-left:10%;padding-bottom:15px;padding-top:105px}.block_theme{width:90%}.theme_form{padding-left:5%;padding-top:15px;background:#0E0005}.theme_form label{color:#fff;font-size:18px}.theme_form input,textarea{background-color:#18090F;border-color:#18090F;padding:3px;color:#fff}.theme_form input,textarea:focus{border:2px solid #18090F;color:#fff}.theme_form input:active{background-color:black}.block_theme_answer input,textarea{background-color:#18090F;border-color:#18090F;padding:3px;color:#fff;margin-left:25px;margin-top:10px}.block_theme_answer input,textarea:focus{border:2px solid #18090F;color:#fff}.block_theme_answer input:active{background-color:black}.search_box{margin-left:10%;margin-top:100px;height:100%}.form_search{margin-left:5%;margin-top:3%}.form_search input{color:#fff;font-size:18px;margin-bottom:10px}.form_search input,textarea{background-color:#18090F;border-color:#18090F;padding:3px;color:#fff}.form_search input,textarea:focus{border:2px solid #18090F;color:#fff}.form_search input:active{background-color:black}.form_search button{height:35px;border:1px solid #18090F;padding:5px}form span{font-family:roboto}.check_usr input{padding:0;height:10px;width:10;x}.answer_request{margin-left:12%;margin-top:15px;float:left}.avatar_search{width:105px;height:105px;background:#fff;float:left}.nickname_search{color:#fff}.block_search_answer{height:100%;min-height:140px;margin-left:10%;margin-right:9%;background:#0E0005}";
	echo"</style>";
	echo"</head>";
	echo"<body>";
	echo"	<header>";
	echo		"<div class=\"header_content\">";
	echo			"<div class=\"logo\">";
	echo				"<a href=\"/\">".$name."</a>";
	echo			"</div>";
	echo			"<div class=\"right_panel\">";
	echo			"<div class=\"search\">";
	echo				"<form action=\"/search\">";
	echo					"<input type=\"text\" placeholder=\"Search\">";
	echo					"<input type=\"submit\" value=\"Search!\" style=\"padding: 3px; color:white\">";
	echo				"</form>";
	echo			"</div>";
	echo			"<div class=\"menu\">";
	echo				"<nav>";
	echo					"<ul>";
							
							if(!empty($_COOKIE)){
								echo "<a href='/profile' style='margin-top:5px;'>".$nick."</a><br>";
								echo "<a href='/?sob=leave'>Sign out</a>";
							}else{
	echo							"<a href=\"/signup\">Sign up</a><br>";
	echo							"<a href=\"login\">Login</a><br>";
	}
							
	echo					"</ul>";
	echo				"</nav>";
	echo			"</div>";
	echo			"</div>";
	echo		"</div>";
	echo	"</header>";
}
if ($page == 'index') {
	
	header_fuc();

echo	"<div class=\"index_image\">";
echo		"<div class=\"text_image\">";
echo			"<h1>".$index_h1."</h1>";
echo $index_text;
echo		"</div>";
echo	"</div>";


echo	"<div class=\"importand_texts\">";
echo		"<div id=\"line\"><p>Закрепленные:  <a href=\"/create\" style=\"padding-top: 8px; color: #fff; \">Создать запись</a></p></div>";

	$request_for_importand = mysqli_query($CONNECT, "SELECT * FROM `art` WHERE `pinned`= 1");
	$count = mysqli_num_rows($request_for_importand);
	for($i=0; $i < $count; ++$i ){
		$decrypt_importand = mysqli_fetch_assoc($request_for_importand);
		$id = $decrypt_importand['id'];
		$title = $decrypt_importand['title'];
		$text = $decrypt_importand['text'];
		$text = mb_substr($text, 0, 100);
		echo "<div class=\"important\">";
		echo    "<a href=\"temp/theme.php?id=$id\">".$title."</a>";
		echo    "<p>".$text."</p>";
		echo "</div>";
	}
	
echo		"<div id=\"line\"></div>";
echo	"</div>";
echo	"<div class=\"importand_texts\">";
echo		"<div id=\"line\"><p>Последне созданные записи:  <a href=\"/create\" style=\"margin-top: 8px; color: #fff; \">Создать запись</a></p></div>";
	
	$request_for_importand = mysqli_query($CONNECT, "SELECT * FROM `art` ORDER BY `pubdate`");
	$count = mysqli_num_rows($request_for_importand);
	for($i=0; $i < 10; ++$i ){
		$decrypt_importand = mysqli_fetch_assoc($request_for_importand);
		$id = $decrypt_importand['id'];
		$title = $decrypt_importand['title'];
		$text = $decrypt_importand['text'];
		$text = mb_substr($text, 0, 100);
		echo "<div class=\"important\">";
		echo    "<a href=\"temp/theme.php?id=$id\">".$title."</a>";
		echo    "<p>".$text."</p>";
		echo "</div>";
		
	}
	
echo		"<div id=\"line\"></div>";
echo	"</div>";
footer();
		
}elseif($page[0] == '/signup') {
	if($_POST['dosignup']){
	$errors = array();
	if($_POST['email'] ==''){
		$errors[] = 'You have not entered your Email.';
	}
	elseif($_POST['nick'] == ''){
		$errors[] = "You have not entered your nickname.";
	}
	if($_POST['password'] == ''){
		$errors[] = "You have not entered your password!";
	}
	elseif ($_POST['password'] != $_POST['password1']) {
		$errors[] = "Passwords do not match!";
	}else{
		$email =& $_POST['email'];
		$nick =& $_POST['nick'];
		$q = mysqli_query($CONNECT, "SELECT `id` FROM `users` WHERE `email` = ('$email')");
		$count = mysqli_num_rows($q);
		if($count > 0){
			$errors[] = "This Email is already registered!";
		}
		$q1 = mysqli_query($CONNECT, "SELECT `id` FROM `users` WHERE `nick` = ('$nick')");
		$count1 = mysqli_num_rows($q1);
		if($count1 > 0){
			$errors[] = "This Nickname is already registered!";
		}
		if(empty($errors)){
			$email =& $_POST['email'];
			$hash_email = md5($email);
			$email_id = random_str(150);
			$secur_key = random_str(255);
			$password =& $_POST['password'];
			$password = md5($password);
			$nick =& $_POST['nick'];

			$r = mysqli_query($CONNECT, "INSERT INTO `users` (`id`, `email`, `hash_email`, `email_vac`, `email_id`, `secur_key`, `password`, `adm`, `nick`, `bio`) VALUES (NULL, '$email', '$hash_email', 'False', '$email_id', '$secur_key', '$password', NULL, '$nick', NULL)");
			if (!$r) {
				$errors[] = "something went wrong. Try again later.";
			}else{
				setcookie("secur_key", $secur_key, time()+9999, "../", $domain="http://design");
				setcookie("id", $hash_email, time()+9999, "../",$domain="http://design");

				mail($email, "Confirm your email on All in One", "hello. <br><br> To confirm your Email, follow this link:<br><br>http://newproject/sys/confirm?email_id=$email_id");
				$errors[] = "Check Your Email";
			}
		}
	}
}
	header_fuc();
	echo	"<div class=\"index_image\">";
	echo		"<div class=\"text_image\">";
	echo			"<h1>".$index_h1."</h1>";
	echo $index_text;
	echo		"</div>";
	echo	"</div>";
	echo"<div class=\"register\">";
	echo"<div id=\"line_for_signup\"><p>Sign up:</p></div>";
	echo"<div class=\"register_block\">";
	echo	"<form action=\"/signup\" method=\"POST\">";
	echo		"<label>Email:</label><br>";
	echo		"<input type=\"email\" name=\"email\" placeholder=\" Enter your Email\">";
	echo		"<br><br>";
	echo		"<label for=\"\">Nickname:</label><br>";
	echo		"<input type=\"text\" name=\"nick\" placeholder=\" Enter your Nickname\">";
	echo		"<br><br>";
	echo		"<label for=\"\">Password:</label><br>";
	echo		"<input type=\"password\" name=\"password\" placeholder=\" Enter your password\">";
	echo		"<br><br>";
	echo		"<label for=\"\">Repeat your password:</label><br>";
	echo		"<input type=\"password\" name=\"password1\" placeholder=\" Repeat your password\"><br><br>";
	echo		"<div class=\"error\" style=\"padding-top: 5px; padding-bottom: 5px; color: #fff;\">";
					 if (!empty($errors)) {
						echo array_shift($errors);
					}
					
	echo		"</div>";
	echo		"<input type=\"submit\" value=\"Register\" name=\"dosignup\"style=\"padding: 5px; color:white\">";
	echo	"</form>";
	echo"</div>";
	echo"<div class=\"close_sign_polosa\"></div>";
	echo"</div>";
	
	echo"<div class=\"info\">";
	echo"<p>";
	echo	$text;
	echo"</p>";
	echo"</div>";
	footer();
}elseif($page[0] == '/sys/confirm'){
	if(!empty($_GET['email_id'])){
	$id_vac = $_GET['email_id'];
	$id = mysqli_query($CONNECT, "SELECT * FROM `users` WHERE `email_id` = ('$id_vac')");
	$count = mysqli_num_rows($id);
	if($count > 0){
		$decrypt = mysqli_fetch_assoc($id);
		$id = $decrypt['id'];
		$r = mysqli_query($CONNECT, "UPDATE `users` SET `email_id` = NULL WHERE `users`.`id` = ('$id')");
		mysqli_query($CONNECT, "UPDATE `users` SET `email_vac` = ('TRUE') WHERE `users`.`id` = ('$id')");
		
		setcookie("id", $hash_email, time()+9999);
		setcookie("secur_key", $secur, time()+9999);
		Header("Location: http://newproject.loc/");

	}else{
		header('Location: http://newproject.loc/');
	}
	}

	if(!empty($_GET['email_vac_id'])){
		$errors = array();
	if (isset($_POST['doreset'])) {
		if ($_POST['password'] != $_POST['password1']) {
		$errors[] = 'Пароли не совпадают';
		}
		elseif ($_POST['email_vac_id'] == '') {
		exit("Фатальная ошибка. Попробуйте позже.");
		}
	if (empty($errrs)) {
		$email_vac_id =& $_POST['email_vac_id'];
		$password = md5($_POST['password']);
		$request = mysqli_query($CONNECT, "UPDATE `users` SET `password` = ('$password') WHERE `users`.`email_id` = ('$email_vac_id')");
		$request = mysqli_query($CONNECT, "UPDATE `users` SET `email_vac` = ('TRUE') WHERE `users`.`email_id` = ('$email_vac_id')");
		$request = mysqli_query($CONNECT, "UPDATE `users` SET `email_id` = ('$email_vac_id') WHERE `users`.`email_id` = ('$email_vac_id')");
		if (!$request) {
			exit("Неудачный запрос к бд.");
		}else{
			$errors[] = 'Ваш пароль сменен. '. "<a href='/login' style='color:#fff;'>Войти</a>";
		}
	}
}
	
	header_fuc();

	echo"<div class=\"register_block\" style=\"margin: 15px;\">";
	echo"<form action=\"/sys/confirm?email_vac_id=2\" method=\"POST\">";
	echo"<input type=\"hidden\" name = \"email_vac_id\" value=".$_GET['email_vac_id'].">";
	echo"<label for=\"\">Введите Ваш пароль:</label><br><br>";
	echo"<input type=\"password\" name=\"password\"><br><br>";
	echo"<label for=\"\">Повторите Ваш пароль:</label><br><br>";
	echo"<input type=\"password\" name=\"password1\">";
	echo"<br><br>";
	echo"<div class=\"error\" style=\"padding-top: 5px; padding-bottom: 5px; color: #fff;\">";
					if (!empty($errors)) {
						echo array_shift($errors);
					}
					
	echo"</div>";
	echo"<input type=\"submit\" name=\"doreset\">";
	echo"</form>";
	echo"</div>";
	footer();
	}

	if (isset($_POST['dologin'])) {
	if ($_POST['email'] != $_POST['email1']) {
		$errors[] = 'Введеный Email не совпадает!';
	}else{
		$email =& $_POST['email'];
		$request_for_reset = mysqli_query($CONNECT, "SELECT * FROM `users` WHERE `email` = ('$email')");
		$count_for_reset = mysqli_num_rows($request_for_reset);
		if ($count_for_reset <= 0) {
			$errors[] = 'Данный Email не найден. Возможно, вы ввели его не верно.';
		}else {
			if (empty($errors)) {
				$email =& $_POST['email'];
				$email_id = random_str(255);
				$recovery = mysqli_query($CONNECT, "UPDATE `users` SET `email_id` = ('$email_id') WHERE `users`.`email` = ('$email')");
				$recovery_true_vac = mysqli_query($CONNECT, "UPDATE `users` SET `email_vac` = ('TRUE') WHERE `users`.`email` = ('$email')");
				mail($email, "Password recovery for $ name", "Hello.<br><br>You have made a password reset request, to reset your password, follow this link: http://newproject.loc/sys/confirm?email_vac_id=$email_id");
				echo "Check your Email";
				exit();
				
			}
		}
	}
	echo "<div style='color:white;'>Проверьте Ваш Email</div>";
}
	if ($_GET['id'] == 2) {
		header_fuc();
		echo"<div class=\"register_block\" style=\"margin: 15px;\">";
		echo"<form action=\"/sys/confirm\" method=\"POST\">";
		echo	"<label for=\"\">Email:</label><br>";
		echo	"<input type=\"email\" name=\"email\" placeholder=\" Enter your Email\">";
		echo	"<br><br>";

		echo	"<label for=\"\">Repeat your Email:</label><br>";
		echo	"<input type=\"email\" name=\"email1\" placeholder=\"Repeat your Email\">";
		echo	"<br><br>";
		echo	"<div class=\"error\" style=\"padding-top: 5px; padding-bottom: 5px; color: #fff;\">";
					if (!empty($errors)) {
						echo array_shift($errors);
					}
					
		echo	"</div>";
		echo	"<input type=\"submit\" value=\"Recover password\" style=\"padding: 5px; color:white\" name=\"dologin\">";
		echo"</form>";
		echo"</div>";
		footer();
	}

}elseif($page[0] == '/login'){
	if($_POST['dologin']){
	$errors = array();
	if($_POST['email'] ==''){
		$errors[] = 'You have not entered your Email.';
	}elseif ($_POST['passowrd' == '']){
		$errors[] = 'Enter your password.';
	}else{
		$password = md5($_POST['password']);
		$email =& $_POST['email'];
		$request_login = mysqli_query($CONNECT, "SELECT * FROM `users` WHERE `email` = ('$email') AND `password` = ('$password')");
		$count = mysqli_num_rows($request_login);
		if ($count < 0) {
			$errors[] = "something went wrong. Try again later.";
		}elseif($count > 0){
			$decrypt = mysqli_fetch_assoc($request_login);
			$hash_email =& $decrypt['hash_email'];
			$secur_key =& $decrypt['secur_key'];
			$adm =& $decrypt['adm'];
			setcookie("id", $hash_email, time()+3000, '/');
			setcookie("secur_key", $secur_key, time()+3000, '/');
			if ($adm == "1") {
				setcookie("adm", $adm, time()+3000, '/');
			}
			header("Location: http://newproject.loc/profile");
		}else {
			$errors[] = "Password or Email are wrong";
		}
	}
}
	header_fuc();

	echo"<div class=\"index_image\">";
	echo"<div class=\"text_image\">";
	echo	"<h1>Welcome.</h1>";
	echo	"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste odit excepturi <br> consectetur libero maiores dicta, perferendis temporibus iusto, <br> facilis rem animi, repellat minus quod magni amet illo? Expedita, debitis velit?</p>";
	echo"</div>";
	echo"</div>";
	echo"<div class=\"line_index_image\"></div>";

	echo"<div class=\"register\">";
	echo"<div id=\"line_for_signup\"><p>Вход:</p></div>";
	echo"<div class=\"register_block\">";
	echo	"<form action=\"#\" method=\"POST\">";
	echo		"<label for=\"\">Email:</label><br>";
	echo		"<input type=\"email\" name=\"email\" placeholder=\" Enter your Email\">";
	echo		"<br><br>";

	echo		"<label for=\"\">Password:</label><br>";
	echo		"<input type=\"password\" name=\"password\" placeholder=\" Enter your password\">";
	echo		"<br><br>";
	echo		"<div class=\"error\" style=\"padding-top: 5px; padding-bottom: 5px; color: #fff;\">";
					if (!empty($errors)) {
						echo array_shift($errors);
					}
					
	echo		"</div>";
	echo		"<input type=\"submit\" value=\"Login\" style=\"padding: 5px; color:white\" name=\"dologin\"><a href=\"../sys/confirm?id=2\" style=\"padding-left: 5px;color:#fff; text-decoration: none;\">Forgot your password?</a>";
	echo	"</form>";
	echo"</div>";
	echo	"<div class=\"close_sign_polosa\"></div>";
	echo"</div>";
	
	echo"<div class=\"info\">";
	echo"<p>";
	echo	"<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, explicabo. A, omnis sequi aliquam iste molestiae! Nam architecto est velit laborum numquam. Dicta minima, aperiam doloremque natus, a totam dolores.</span><br><span>Recusandae culpa, quibusdam obcaecati facere distinctio eum est possimus tenetur excepturi quo reprehenderit fugiat natus iure quis maxime, eaque alias explicabo ea, rem numquam dignissimos illum asperiores nam rerum. Molestiae.</span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor excepturi soluta eos doloremque, delectus et, laborum quae iusto quisquam architecto explicabo rem vero ab amet tempore nostrum necessitatibus eligendi repellat.</span>";
	echo	"<span>Natus, placeat id ipsam est asperiores, consequatur. Ducimus, rerum nam maxime temporibus nobis magnam consequuntur ad sit dolorum deleniti nesciunt voluptates exercitationem praesentium quod harum iure provident veniam esse ut.</span>";
	echo	"<span>Sint ipsam error, dolore aperiam porro facilis fugiat corrupti officiis, molestias quo animi pariatur amet quibusdam numquam officia consequatur doloremque impedit, laudantium dignissimos assumenda rem fugit. Impedit, recusandae est id!</span>";
	echo"</p>";
	echo"</div>";
	footer();
}elseif($page[0]=='/profile'){
	if (!empty($_GET['id'])) {
	if ($_GET['id'] == 0) {
		header("Location: http://newproject.loc");
	}
	$id_user = $_GET['id'];
	$request = mysqli_query($CONNECT, "SELECT * FROM `users` WHERE `id` = ('$id_user')");
	$ccpunt = mysqli_num_rows($request);
	if ($ccpunt = 0) {
		header("Location /");
	}
	$decrypt = mysqli_fetch_assoc($request);
	$nick = $decrypt['nick'];
	$date_of_register = $decrypt['regdate'];
	$bio = $decrypt['bio'];
	if (isset($_COOKIE['adm'])) {
		if ($_COOKIE['adm'] != $decrypt['adm']) {
			unset($_COOKIE['adm']);
			setcookie('adm', "", time()-3000);
			exit();
		}
	}
}elseif(!empty($_COOKIE)){
	$email = $_COOKIE['id'];
	$secur_key = $_COOKIE['secur_key'];
	$request_header_info = mysqli_query($CONNECT, "SELECT * FROM `users` WHERE `hash_email` = ('$email') AND `secur_key` = ('$secur_key')");
	$decrypt1 = mysqli_fetch_assoc($request_header_info);
	$nick = $decrypt1['nick'];
	$email_dec = $decrypt1['email'];
	$date_of_register = $decrypt1['regdate'];
	$bio = $decrypt1['bio'];
	$img = $decrypt1['img'];
	$id = $decrypt1['id'];
	if (isset($_COOKIE['adm'])) {
		if ($_COOKIE['adm'] != $decrypt['adm']) {
			unset($_COOKIE['adm']);
			setcookie('adm', "", time()-3000);
		}
	}
}
if (empty($_GET)) {
	$request_for_art_profile = mysqli_query($CONNECT, "SELECT * FROM `art` WHERE `id_creater` = ('$id')");
	//$decrypt_request_profile = mysqli_fetch_assoc($request_for_art_profile);
	$rows = mysqli_num_rows($request_for_art_profile);
}else{
	$id = $_GET['id'];
	$request_for_art_profile = mysqli_query($CONNECT, "SELECT * FROM `art` WHERE `id_creater` = ('$id')");
	//$decrypt_request_profile = mysqli_fetch_assoc($request_for_art_profile);
	$rows = mysqli_num_rows($request_for_art_profile);
}

	header_fuc();
	echo"<div class=\"block_profile\">";
	echo"<div id=\"line\" style=\"margin-left: 5%; margin-top: 100px;\"></div>";
	echo"<div class=\"profile\">";
	echo	"<div class=\"avatar\" style=\"\">";
				if($img == NULL OR $img == ''){
					//code
				}else{
					echo "<img src='../img/usr/$img' alt='' style='	width: 155px;
	height: 155px;
	background: #fff;

	float: left;
	margin-right: 25px;
	/*margin-bottom: 100%;*/
	 '>";}
	echo	"</div>";
	echo	"<div class=\"text_profile\">";
	echo		"<div class=\"nickname\"><p>".$nick."</p></div>";
				 if (empty($_GET)) {
					echo "<div class='email'><span>".$email_dec."</span><a href='../edit_profile'>(edit)</a></div>";
				}
	echo		"<div class=\"date_of_register\"><span>Date and time of register:".$date_of_register."</span></div>";
	echo		"<div class=\"bio\"><span>BIO:";
				if (empty($_GET)) {
					echo "<a href='../edit_profile'>(edit)</a>";
				} 
	echo		"</span><br> <br>";
				 echo $bio; 
	echo		"</div>";
	echo	"</div>";
	echo	"<div class=\"hr\" style=\"margin-top: 15px;\"></div>";
	echo	"<div class=\"autors_posts\">";
	echo		"<div id=\"line\" style=\"width: 100%\"><p>Созданные записи:</p></div>";
				$decrypt_request_profile = mysqli_fetch_assoc($request_for_art_profile);
				for ($i = 0 ; $i < $rows; ++$i)
    			{
        			$decrypt_request_profile = mysqli_fetch_assoc($request_for_art_profile);
        			$iddd=$decrypt_request_profile['id'];
        			echo "<div class=\"post_profile\">";
					echo "<a href=\"/temp/theme.php?id=$iddd\">".$decrypt_request_profile['title']."</a>";
					echo "<p>".$decrypt_request_profile['text']."</p></div>";
    			}
				

	echo		"</div>";
	echo	"</div>";
	echo"</div>";
	footer();

}elseif($page[0] == '/edit_profile'){
	if(!empty($_COOKIE)){
	$email = $_COOKIE['id'];
	$secur_key = $_COOKIE['secur_key'];
	$request_header_info = mysqli_query($CONNECT, "SELECT * FROM `users` WHERE `hash_email` = ('$email') AND `secur_key` = ('$secur_key')");
	$decrypt = mysqli_fetch_assoc($request_header_info);
	$nick = $decrypt['nick'];
	$email_dec = $decrypt['email'];
	$date_of_register = $decrypt['regdate'];
	$bio = $decrypt['bio'];
	$img = $decrypt['img'];
	$id = $decrypt['id'];

}else{
	header("Location: http://design");
}

	$pashalka = 'Не хочу спать я не могу встать не знаю как это все равно буду любить тебя всегда на связи и массовых беспорядков на Украине в Киеве в семье не без меня я тебя не знаю как это все равно не могу угодно но я не могу зговорить не знаю что со своей незц в магазин за продуктами питания в школу и все равно буду любить тебя всегда на связи и я тебя люблю тебя очень сильно люблю тебя очень люблю тебя люблю и уууу и все равно не могу слушать 👂 в душ схожу и все будет нормально я в школе не знаю 🤷‍♂ я уже в школу утро как дела что нового как ты как это все равно не';
$vac = false;
$errors = array();
$email_edit = $_POST['email']; 
$md5_email_edit = md5($_POST['email']);
$bio_edit = $_POST['bio'];
$bio_edit = str_replace("", "<br>", $bio_edit);
if (isset($_POST['doedit'])) {
	if($_POST['email'] == ''){
		$email_edit = $email_dec;
	}elseif($_POST['email'] == $email_dec){

	}else{
		$q = mysqli_query($CONNECT, "SELECT `id` FROM `users` WHERE `email` = ('$email_edit')");
		$count = mysqli_num_rows($q);
		if($count > 0){
			$errors[] = "This Email already registered!";
		}else{
			$vac = true;
			$email_edit = $_POST['email'];
			$md5_email_edit = md5($_POST['email']);
		}
	}
	if ($_POST['bio'] == $pashalka) {
		$errors[] = 'Я люблю свою Котю больше всего на свете ♥';
	}
	if ($_POST['bio'] == '') {
		$errors[] = 'Bio cannot be empty.';
	}
	if (!in_array($_FILES['picture']['type'], $types))
 		$errors[] = 'Forbidden file type. Try another.';
 

 	if ($_FILES['picture']['size'] > $size)
 		die('Слишком большой размер файла.');
 
 // Загрузка файла и вывод сообщения
 	@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']);
 		
 	$name_file = $_FILES['picture']['name'];
 	
 	if (empty($errors)) {
 		$request_for_edit = mysqli_query($CONNECT, "UPDATE `users` SET `email` = ('$email_edit') WHERE `users`.`id` = ('$id')");
 		$request_for_edit = mysqli_query($CONNECT, "UPDATE `users` SET `bio` = ('$bio_edit') WHERE `users`.`id` = ('$id')");
 		if ($name_file == '') {
 		
 		}else{
			$request_for_edit = mysqli_query($CONNECT, "UPDATE `users` SET `img` = ('$name_file') WHERE `users`.`id` = ('$id')");
 		}
 		$request_for_edit = mysqli_query($CONNECT, "UPDATE `users` SET `hash_email` = ('$md5_email_edit') WHERE `users`.`id` = ('$id')");

 	}
}
	header_fuc();
	echo"<div class=\"block_profile\">";
	echo"<div id=\"line\" style=\"margin-left: 5%; margin-top: 100px;\"></div>";
	echo  "<div class=\"profile\">";
				
	echo	"<!-- 	<div class=\"avatar\" style=\"\">";
				if($img == NULL){
					//code
				}else{
					echo "<img src='../img/usr/$img' alt='' style='	width: 155px;
	height: 155px;
	background: #fff;

	float: left;

	 '>";} 
	 echo"</div> -->";
	echo	"<div class=\"edit_profile\">";
	echo		"<div class=\"nickname\"><p style=\"color: #fff; padding-bottom: 15px;\">".$nick."</p></div>";
	echo		"<form enctype=\"multipart/form-data\" method=\"POST\" action=\"/edit_profile\">";
	echo			"<label for=\"\" style=\"color:#fff; font-size: 18px;\">Email:</label><br>";
	echo			"<input type=\"email\" name=\"email\" value=".$email_dec.">";
	echo			"<br><br>";
	echo			"<label for=\"\" style=\"color:#fff; font-size: 18px;\">Bio:</label><br>";
	echo			"<textarea name=\"bio\" id=\"\" cols=\"100\" rows=\"30\"></textarea>";
	echo			"<br><br>";
	echo			"<label for=\"\" style=\"margin-left: 17%; color:#fff;\" >Update avatar</label><br>";
	echo			"<input type=\"file\" name=\"picture\" style=\"padding-left: 17%; background: none;\"><br><br>";
	echo			"<div class=\"error\" style=\"padding-top: 5px; padding-bottom: 5px; color: #fff; margin-left: 17%\">";
					if (!empty($errors)) {
						echo array_shift($errors);
					}
	echo		"</div>";
	echo			"<input type=\"submit\" value=\"Save\" name=\"doedit\" style=\"margin-left: 17%;/*background: none;*/ \">";
	echo		"</form>";
	echo	"</div>";
	echo	"<div class=\"hr\" style=\"margin-top: 15px;\"></div>";
}elseif($page[0] == '/create'){
	if(!empty($_COOKIE)){
	$email = $_COOKIE['id'];
	$secur_key = $_COOKIE['secur_key'];
	$request_header_info = mysqli_query($CONNECT, "SELECT * FROM `users` WHERE `hash_email` = ('$email') AND `secur_key` = ('$secur_key')");
	$decrypt = mysqli_fetch_assoc($request_header_info);
	$nick = $decrypt['nick'];
	$email_dec = $decrypt['email'];
	$date_of_register = $decrypt['regdate'];
	$bio = $decrypt['bio'];
	$img = $decrypt['img'];
	$id = $decrypt['id'];

}else{
	header("Location: http://design");
}
	$errors = array();
if (isset($_POST['docreate'])) {
	if ($_POST['title'] == '') {
		$errors[] = 'Title cannot be empty';
	}
	if ($_POST['text'] == '') {
		$errors[] = 'Text cannot be empty';
	}
	if (empty($errors)) {
		$text =& $_POST['text'];
		$title =& $_POST['title'];
		$request_for_create = mysqli_query($CONNECT, "INSERT INTO `art` (`id`, `id_creater`, `title`, `text`, `pinned`, `closed`) VALUES (NULL, '$id', '$title', '$text', NULL, NULL)");
		$q = mysqli_query($CONNECT, "SELECT `id` FROM `art` WHERE `id_creater` = ('$id') ORDER BY `pubdate` DESC");
		$decr = mysqli_fetch_assoc($q);
		$id_q = $decr['id'];
		header("Location: http://newproject.loc/theme?id=$id_q");
	}
}

	header_fuc();
	echo"<div class=\"create_block\">";
	echo"<div id=\"line\"></div>";
	echo"<div class=\"block_theme\">";
	echo	"<div class=\"theme_form\">";
	echo		"<form action=\"/create\" method=\"POST\">";
	echo			"<label for=\"\">Title for theme</label><br>";
	echo			"<input type=\"text\" name=\"title\"style=\"width: 365px;\"><br><br>";
	echo			"<label for=\"\">Text theme:</label><br>";
	echo			"<textarea name=\"text\" id=\"\" cols=\"50\" rows=\"20\"></textarea><br>";
	echo			"<div class=\"error\" style=\"padding-top: 5px; padding-bottom: 5px; color: #fff;\">";
					if (!empty($errors)) {
						echo array_shift($errors);
					}
					
	echo		"</div>";
	echo			"<input type=\"submit\" value=\"Создать\" name=\"docreate\">";
	echo		"</form>";
	echo	"</div>";
	echo	"</div>";
	echo"</div>";

}elseif($page[0] == '/theme'){
	if (isset($_POST['close'])) {
	if ($_COOKIE['adm'] != 1) {
		header("Location: $url/");
	}
	$id_art = $_POST['id_art'];
	$close = mysqli_query($CONNECT, "UPDATE `art` SET `closed` = '1' WHERE `art`.`id` = ('$id_art');");
	header("Location: http://design/temp/theme.php?id=$id_art");
}
if (isset($_POST['pin'])) {
	if ($_COOKIE['adm'] != 1) {
		header("Location: /");
	}
	$id_art = $_POST['id_art'];
	$close = mysqli_query($CONNECT, "UPDATE `art` SET `pinned` = '1' WHERE `art`.`id` = ('$id_art');");
	header("Location: http://newproject.loc/theme?id=$id_art");
}
$errors = array();
if (isset($_POST['doanswer'])) {
	if ($_POST['text'] == '') {
		$errors[] = "Не может быть пустым";
	}
	if (empty($errors)) {
		$id = $_POST['id'];
		$text =& $_POST['text'];
		$id_art = $_POST['id_art'];
		$q = mysqli_query($CONNECT, "INSERT INTO `answers` (`id`, `id_creater`, `id_art`, `text`) VALUES (NULL, '$id', '$id_art', '$text')");
		header("Location: http://design/theme?id=$id_art");
	}else{
		$id_art = $_POST['id_art'];
		header("Location: http://design/theme?id=$id_art");
	}
}
	if (!empty($_GET['id'])) {
	if ($_GET['id'] == 0) {
		header("Location: http://newproject.loc");
	}
	$id_art = $_GET['id'];
	$request = mysqli_query($CONNECT, "SELECT * FROM `art` WHERE `id` = ('$id_art')");
	$decrypt = mysqli_fetch_assoc($request);
	$title = $decrypt['title'];
	$id_of_creater_for_img = $decrypt['id_creater'];
	$qqq = mysqli_query($CONNECT, "SELECT `img` FROM `users` WHERE `id` = ('$id_of_creater_for_img')");
	$qqq_dcr = mysqli_fetch_assoc($qqq);
	$img = $qqq_dcr['img'];
	$date_of_public = $decrypt['pubdate'];
	$text = $decrypt['text'];
	$close = $decrypt['closed'];
}else{
	header("Location: http://newproject.loc");
}
if(!empty($_COOKIE)){
	$email = $_COOKIE['id'];
	$secur_key = $_COOKIE['secur_key'];
	$request_header_info = mysqli_query($CONNECT, "SELECT `nick`, `id` FROM `users` WHERE `hash_email` = ('$email') AND `secur_key` = ('$secur_key')");
	$decrypt = mysqli_fetch_assoc($request_header_info);
	$nick = $decrypt['nick'];
	$id = $decrypt['id'];
	if (isset($_COOKIE['adm'])) {
		if ($_COOKIE['adm'] != $decrypt['adm']) {
			unset($_COOKIE['adm']);
			setcookie('adm', "", time()-3000);
		}
	}

}
$errors = array();
if (isset($_POST['doanswer'])) {
	if ($_POST['text'] == '') {
		$errors[] = "Text cannot be empty";
	}
	if (empty($errors)) {
		$text =& $_POST['text'];
		$q = mysqli_query($CONNECT, "INSERT INTO `answers` (`id`, `id_creater`, `id_art`, `text`) VALUES (NULL, '$id', '$id_art', '$text')");

	}
}
header_fuc();
echo"<div class=\"theme_block\">";
echo	"<div class=\"line\"><p></p></div>";
echo	"<div class=\"theme-block\">";
echo		"<div class=\"avatar\" style=\"\">\"<img src='../img/usr/$img' alt='' style='width: 155px;
	height: 155px;'>\"</div>";

echo		"<div class=\"theme\">";
echo			"<div class=\"name_of_stat\">".$title."</div>";
echo			"<div class=\"date_of_create\">$date_of_public</div>";
echo			"<div class=\"text\"><p>";
echo				"<span>".$text."</span>";
echo			"</p></div>";
echo		"</div>";
echo	"</div>";
	if ($_COOKIE['adm'] == 1) {

echo	"<form action=\"theme\" method=\"POST\">";
echo		"<input type=\"hidden\" name=\"id_art\" value=".$id_art.">";
echo		"<input type=\"submit\" name=\"close\", value=\"Close\">";
echo	"</form>";
echo	"<form action=\"theme\" method=\"POST\">";
echo		"<input type=\"hidden\" name=\"id_art\" value=".$id_art.">";
echo		"<input type=\"submit\" name=\"pin\" value=\"Pin\">";
echo	"</form>";
}
echo	"<div id=\"line\" style=\"width: 100%;\"><p>Answers:</p></div>";

echo	"</div>";
echo"<div class=\"block_theme_answer\">";
		if (!empty($_COOKIE)) {
			if ($close == NULL) {
			
echo			"<form action=\"/theme\" method=\"POST\">";
echo				"<input type=\"hidden\" value=".$id_art." name=\"id_art\">";
echo				"<input type=\"hidden\" value=".$id."name=\"id\">";
echo				"<textarea name=\"text\" id=\"\" cols=\"100\" rows=\"10\"></textarea><br>";
echo				"<input type=\"submit\" value=\"answer\" name=\"doanswer\">";
echo			"</form>";
		  }
		}
		

		
		$request_for_ansers = mysqli_query($CONNECT, "SELECT * FROM `answers` WHERE `id_art` = ('$id_art')");
		$row = mysqli_num_rows($request_for_ansers);
		for ($i = 0 ; $i < $row; ++$i)
    			{
        			$decrypt_request_answer = mysqli_fetch_assoc($request_for_ansers);
        			$id_creater = $decrypt_request_answer['id_creater'];
        			$nick_creater = mysqli_query($CONNECT, "SELECT `nick`, `img` FROM `users` WHERE `id` = ('$id_creater')");
        			$dcr = mysqli_fetch_assoc($nick_creater);
        			$nick_answer = $dcr['nick'];
        			$img_anser = $dcr['img'];
        			$text = $decrypt_request_answer['text'];
        			echo "<div class=\"avatar_answer\"><img src='../img/usr/$img_anser' alt=''></div>";
        			echo "<div class=\"nick_theme\">".$nick_answer."</div>";
        			echo "<div class=\"answer\" style=\"padding-top: 15px;\">".$text."</div>";
    			}
				
		
	echo"</div>";
	echo"<div id=\"line\" style=\"width: 90%; margin-left: 4.1%\"></div>";


}elseif($page[0] == '/search'){
	header_fuc();
	?><div class="search_box">;
		<div id="line"></div>
		<div class="form_search">
			<form action="">
				<input type="text" style="	width: 900px;
	height: 25px;" name="search_text"> <button name="dosearch" value="dosearch">Search</button><br>
				<input type="checkbox" value="1" name="for_usr" class="check_usr"><span>Search users</span><br>
				<input type="checkbox" value="1" name="for_art" style="margin-bottom: 3%;"><span>Search themes</span>
			</form>
		</div>
		<div id="line"></div>
	</div>
	<?



	if(isset($_GET['dosearch'])) {
	$text = $_GET['search_text'];
	if ($_GET['for_usr'] == '1' AND $_GET['for_art'] == '1') {
		$request_usr = mysqli_query($CONNECT, "SELECT * FROM `users` WHERE `nick` = ('$text') OR `email` = ('text')");
		$count = mysqli_num_rows($request_usr);
		if($count > 0){
			for ($i = 0 ; $i < $count; ++$i){
				$decrypt = mysqli_fetch_assoc($request_usr);
				$title = $decrypt['nick'];
				$text = substr ( $decrypt['bio'], 0, 150);
				$img = $decrypt['img'];
				$id = $decrypt['id'];
				echo "<div class=\"block_search_answer\">";
				echo "<div class=\"avatar_answer\"><img src='../img/usr/$img' alt=''></div>";
				echo "<div class=\"nick_theme\"><a href=\"/temp/profile.php?id=$id\" style=\"text-decoration:none; color:#fff;\">".$title."</a></div>";
				echo "<div class=\"answer\" style=\"padding-top: 15px;\">".$text."</div>";
				echo "<div class=\"hr_theme\"></div>";
				echo "</div>";
			}
		}
		$request_art = mysqli_query($CONNECT, "SELECT * FROM `art` WHERE `title` = ('$text')");
		$count1 = mysqli_num_rows($request_art);
		if ($count1 > 0) {
			for ($i = 0 ; $i < $count1; ++$i){
				$decrypt = mysqli_fetch_assoc($request_art);
				$title = $decrypt['title'];
				$text = substr ( $decrypt['text'], 0, 150);
				$id_creater = $decrypt['id_creater'];
				$img_request = mysqli_query($CONNECT, "SELECT `img` FROM `users` WHERE `id` = ('$id_creater')");
				$decode_image = mysqli_fetch_assoc($img_request);
				$img = $decode_image['img'];
				echo "<div class=\"block_search_answer\">";
				echo "<div class=\"avatar_answer\"><img src='../img/usr/$img' alt=''></div>";
				echo "<div class=\"nick_theme\"><a href=\"/temp/profile.php?id=$id\" style=\"text-decoration:none; color:#fff;\">".$title."</a></div>";
				echo "<div class=\"answer\" style=\"padding-top: 15px;\">".$text."</div>";
				echo "<div class=\"hr_theme\"></div>";
				echo "</div>";
			}
		}
	}
	if ($_GET['for_usr'] == '1') {
		$text = $_GET['search_text'];
		$request_usr = mysqli_query($CONNECT, "SELECT * FROM `users` WHERE `nick` = ('$text') OR `email` = ('$text')");
		$count = mysqli_num_rows($request_usr);
		if($count > 0){
			for ($i = 0 ; $i < $count; ++$i){
				$decrypt = mysqli_fetch_assoc($request_usr);
				$title = $decrypt['nick'];
				$text = substr ( $decrypt['bio'], 0, 150);
				$img = $decrypt['img'];
				$id = $decrypt['id'];
				echo "<div class=\"block_search_answer\">";
				echo "<div class=\"avatar_answer\"><img src='../img/usr/$img' alt=''></div>";
				echo "<div class=\"nick_theme\"><a href=\"/temp/profile.php?id=$id\" style=\"text-decoration:none; color:#fff;\">".$title."</a></div>";
				echo "<div class=\"answer\" style=\"padding-top: 15px;\">".$text."</div>";
				echo "<div class=\"hr_theme\"></div>";
				echo "</div>";
			}
		}else{
			echo "<p style=\"color:#fff;\"> Не найдено.</p>";
		}
	}
	if ($_GET['for_art'] == '1') {
		$text = $_GET['search_text'];
		$request_art = mysqli_query($CONNECT, "SELECT * FROM `art` WHERE `title` = ('$text')");
		$count1 = mysqli_num_rows($request_art);
		if ($count1 > 0) {
			for ($i = 0 ; $i < $count1; ++$i){
				$decrypt = mysqli_fetch_assoc($request_art);
				$title = $decrypt['title'];
				$text = substr ( $decrypt['text'], 0, 150);
				$id_creater = $decrypt['id_creater'];
				$img_request = mysqli_query($CONNECT, "SELECT `img` FROM `users` WHERE `id` = ('$id_creater')");
				$decode_image = mysqli_fetch_assoc($img_request);
				$img = $decode_image['img'];
				echo "<div class=\"block_search_answer\">";
				echo "<div class=\"avatar_answer\"><img src='../img/usr/$img' alt=''></div>";
				echo "<div class=\"nick_theme\"><a href=\"/temp/profile.php?id=$id\" style=\"text-decoration:none; color:#fff;\">".$title."</a></div>";
				echo "<div class=\"answer\" style=\"padding-top: 15px;\">".$text."</div>";
				echo "<div class=\"hr_theme\"></div>";
				echo "</div>";
			}
		}else{
			echo "<p style=\"color:#fff;\"> Не найдено.</p>";
		}
	}
}

footer();

}elseif($page[0] == '/'){
	unset($_COOKIE);
	setcookie('adm', '', time()-3000);
	setcookie('id', '', time()-3000);
	setcookie('secur_key', '', time()-3000);
	header("Location: /");
}
