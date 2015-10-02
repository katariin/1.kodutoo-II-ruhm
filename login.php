<?php
  // muuutujad errorite jaoks
	$email_error = "";
	$password_error = "";
	$create_email_error = "";
	$create_password_error = "";
	$firstname_error = "";
	$lastname_error = "";
  // muutujad vaartuste jaoks
	$email = "";
	$password = "";
	$create_email = "";
	$create_password = "";
	$firstname = "";
	$lastname = "";
	if($_SERVER["REQUEST_METHOD"] == "POST") {
    // *********************
    // **** LOGI SISSE *****
    // *********************
		if(isset($_POST["login"])){
			
			echo "vajutas log in nuppu!";
			
			if ( empty($_POST["email"]) ) {
				$email_error = "See vali on kohustuslik";
			}else{
        // puhastame muutuja voimalikest uleliigsetest sumbolitest
				$email = cleanInput($_POST["email"]);
			}
			if ( empty($_POST["password"]) ) {
				$password_error = "See vali on kohustuslik";
			}else{
				$password = cleanInput($_POST["password"]);
			}
      // Kui oleme siia joudnud, voime kasutaja sisse logida
			if($password_error == "" && $email_error == ""){
				echo "Voib sisse logida! Kasutajanimi on ".$email." ja parool on ".$password;
			}
		} // login if end
    // *********************
    // ** LOO KASUTAJA *****
    // *********************
    if(isset($_POST["create"])){
		
		echo "vajutas create nuppu!";
		
		if ( empty($_POST["firstname"]) ) {
			$firstname_error = "See vali on kohustuslik";
		}else{
			$firstname= test_input($_POST["firstname"]);
		}
		
		if ( empty($_POST["lastname"]) ) {
			$lastname_error = "See vali on kohustuslik";
		}else{
			$lastname = test_input($_POST["lastname"]);
		}
		
		if ( empty($_POST["create_email"]) ) {
			$create_email_error = "See vali on kohustuslik";
		}else{
			$create_email = cleanInput($_POST["create_email"]);
		}
		if ( empty($_POST["create_password"]) ) {
			$create_password_error = "See vali on kohustuslik";
		} else {
			if(strlen($_POST["create_password"]) < 8) {
				$create_password_error = "Peab olema vahemalt 8 tahemarki pikk!";
			}else{
				$create_password = cleanInput($_POST["create_password"]);
			}
		}
		if(	$create_email_error == "" && $create_password_error == ""){
			echo "Voib kasutajat luua! Kasutajanimi on ".$create_email." ja parool on ".$create_password;
      }
    } // create if end
	}
  // funktsioon, mis eemaldab koikvoimaliku uleliigse tekstist
  function cleanInput($data) {
  	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>

  <h2>Log in</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
  	<input name="email" type="email" placeholder="E-post"> <?php echo $email_error; ?><br><br>
  	<input name="password" type="password" placeholder="Parool" value="<?php echo $password; ?>"> <?php echo $password_error; ?><br><br>
  	<input type="submit" name="login" value="Log in">
  </form>

  <h2>Create user</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
  	<input name="create_email" type="email" placeholder="E-post"> <?php echo $create_email_error; ?>*<br><br>
  	<input name="create_password" type="password" placeholder="Parool"> <?php echo $create_password_error; ?>*<br><br>
	<input name="firstname" type="name" placeholder="First name"> <?php echo $firstname_error; ?>*<br><br>
	<input name="lastname" type="name" placeholder="Last name"> <?php echo $lastname_error; ?>*<br><br>
  	<input type="submit" name="create" value="Create user">
  </form>

<form>
Minu web-site on seotud haridusega.  Mina hakkan postitama igasuguseid raamatuid, ja inimesed, kes lugevad raamatuid labi, hakkavad kirjutama oma arvamusi
raamatu kohta. Arutlused olevad foorumis. Samal ajal, kui inimesele on abi vaja matemaatikas, voi mingil muul ainetes, siis on voimalus oluline info kiiresti
katte saada. Selles mottes, et foorumis, toimuvad arutlused, kus inimene saab midagi kusida, ja need inimesed, kes teavad vastust kusimuste kohta,
saavad kitjutada.
</form>

<body>
<html>