<?php
	session_start();

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;

    if(isset($_POST['kname']) && isset($_POST['kemail']) && isset($_POST['ktheme']) && isset($_POST['kdescript'])){
		

		//echo '<script>alert("Trwają prace! Spróbuj ponownie później!")</script>';

		$name = $_POST['kname'];
		$email = $_POST['kemail'];
		$theme = $_POST['ktheme'];
		$body = $_POST['kdescript'];

		require "../PHPMailer/PHPMailer.php";
		require "../PHPMailer/SMTP.php";
		require "../PHPMailer/Exception.php";

		$mail = new PHPMailer();

		//smtp settings 
		$mail->CharSet = "UTF-8";
        $mail -> isSMTP();
        $mail ->Host = "ssl0.ovh.net";
        $mail -> SMTPAuth = true;
        $mail -> Username = "mail";
        $mail -> Password = 'haslo';
        $mail -> Port = 465;
        $mail -> SMTPSecure = "ssl";


		//email settings
		$mail -> isHTML(true);
		$mail -> setFrom($email);
		$mail -> addAddress("mail");
		$mail -> Subject = $theme;
		$mail -> Body = "Imie i nazwisko: ".$name." <br>
		email: ".$email." <br>
		temat: ".$theme."<br>
		opis: ".$body;

		if($mail -> Send()){
			echo '<script>alert("Wiadomość wysłana! Odezwiemy się wktórce!")</script>';
		}
		else{
			echo "error";
            // echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
		
		$mail -> smtpClose();
		
	}
    
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ZSE LEAGUE</title>
        <link rel="icon" href="../IMG/logo.png">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    </head>
	<body>
		<nav class="navbar sticky">
			<div class="content">
				<div class="logo">
					<a href="../">ZSE LEAGUE</a>
				</div>
				<ul class="menu-list">
					<div class="icon cancel-btn">
						<i class="fas fa-times"></i>
					</div>
					<li><a class="menu-item" href="../">Strona Główna</a></li>
                    <li><a class="menu-item" href="../wyniki">Wyniki</a></li>
                    <li><a class="menu-item" href="../druzyny">Drużyny</a></li>
                    <li><a class="menu-item" href="../o_nas">O nas</a></li>
					<li><a class="menu-item" href="../faq">FAQ</a></li>
					<li><a class="active menu-item" href="#">Kontakt</a></li>
					<li><a class="menu-item" href="../../">ZSE CUP</a></li>
					<!-- <li><button class="register"><a  href="../zarejestruj">Zarejestruj</a></button></li> -->
				</ul>
				<div class="icon menu-btn">
					<i class="fas fa-bars"></i>
				</div>
			</div>
		</nav>
		<div class="banner">
			<h1>Kontakt</h1>
		</div>
		<form class="flp" method="post">
			<div class="row">
				<div class="column">
					<div>
						<input type="text" id="fname" name="kname" required>
						<label for="fname">Imie Nazwisko</label>
					</div>
					<div>
						<input type="email" id="email" name="kemail" required>
						<label for="email">Email</label>
					</div>
					<div>
						<input type="text" id="ftheme" name="ktheme" required>
						<label for="ftheme">Temat</label>
					</div>
				</div>
				<div class="column">
					<div>
						<textarea type="text" id="fdescript" name="kdescript" required></textarea>
						<label id="textarea-label" for="fdescript">Twoja Wiadomość</label>
					</div>
				</div>
			</div>
			<div id="btn_srodek">
				<button class="btn_wyslij" type="submit">Wyślij</button>
			</div>
		</form>
		<footer>
			<p>
			<p>
                Copyright &copy; 2022 <br>
                <a id="ft_od" href="https://esportwzse.pl/zseleague">ZSE LEAGUE</a><br>
                Created by: <a class="author" href="https://www.facebook.com/DuolyStudio" target="_blank">Duoly</a><br>
                <a href="https://www.youtube.com/channel/UCZF9sZ6Er_L9zOJuqQCHv-g" target="_blank"><i class="fab fa-youtube"></i></a>
                <a href="https://www.facebook.com/ZSELEAGUE" target="_blank"><i class="fab fa-facebook-f"></i></a>
            </p>
			</p>
		</footer>

		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
		<script  src="script.js"></script>
	</body>
</html>
