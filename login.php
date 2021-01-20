<?php include ('config.php'); ?>

<?php
	$Login['Unexpected'] = array(
		'Code' => 999,
		'Text' => 'Sistemsel Hata'
	);
	$Login['mustFilled'] = array(
		'Code' => 999,
		'Text' => 'Tüm boşlukları eksiksiz doldurun'
	);
	$Login['Success'] = array(
		'Code' => 200,
		'Text' => 'Giriş Başarılı,Hoşgeldiniz,Yönlendiriliyorsunuz'
	);
	$Login['Failed'] = array(
		'Code' => 404,
		'Text' => 'Hatalı Giriş Yaptınız,Tekrar Deneyin'
	);

	
	if (!isset($_POST['username'], $_POST['password'])){
		Output($Login['Unexpected']);
	}
	foreach($_POST as $index => $value){
		if (strlen($value) < 1){
			Output($Login['mustFilled']);
		}
	}
	
	$username = $_POST['username'];
	$password = $_POST['password'];


	$query = mysqli_query($connect, "SELECT * FROM yonetici_data WHERE username = '$username' AND password = '$password'");
	if (mysqli_affected_rows($connect)){
		$fetch = mysqli_fetch_array($query);
		$_SESSION['login'] = true;
		$_SESSION['userid'] = $fetch['id'];
		Output($Login['Success']);
	}else{
		Output($Login['Failed']);
	}
?>