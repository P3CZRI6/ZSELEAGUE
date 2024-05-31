<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
$polaczenie -> query ('SET NAMES utf8');

$school = $_POST['nameSchool'];
$teamName = $_POST['teamName'];
$teamTag = $_POST['teamTag'];


//kapitan
$captain_name = $_POST['captain_name'];
$captain_surname = $_POST['captain_surname'];
//$captain_name->CharSet = "UTF-8";
//$captain_surname->CharSet = "UTF-8";

$captain_email = $_POST['captain_email'];
$captain_nick = $_POST['captain_nick'];

//drugi gracz
$second_name =  $_POST['second_name'];
$second_surname = $_POST['second_surname'];
//$second_name->CharSet = "UTF-8";
//$second_surname->CharSet = "UTF-8";

$second_email = $_POST['second_email'];
$second_nick = $_POST['second_nick'];

//trzeci gracz
$third_name = $_POST['third_name'];
$third_surname =  $_POST['third_surname'];
//$third_name->CharSet = "UTF-8";
//$third_surname->CharSet = "UTF-8";

$third_email = $_POST['third_email'];
$third_nick = $_POST['third_nick'];

//czwarty gracz
$fourth_name = $_POST['fourth_name'];
$fourth_surname =  $_POST['fourth_surname'];
//$third_name->CharSet = "UTF-8";
//$third_surname->CharSet = "UTF-8";

$fourth_email = $_POST['fourth_email'];
$fourth_nick = $_POST['fourth_nick'];

//piaty gracz
$fifth_name = $_POST['fifth_name'];
$fifth_surname =  $_POST['fifth_surname'];
//$third_name->CharSet = "UTF-8";
//$third_surname->CharSet = "UTF-8";

$fifth_email = $_POST['fifth_email'];
$fifth_nick = $_POST['fifth_nick'];

//rezerwowy gracz
$sixth_name = $_POST['sixth_name'];
$sixth_surname = $_POST['sixth_surname'];
//$fifth_name->CharSet = "UTF-8";
//$fifth_surname->CharSet = "UTF-8";

$sixth_email = $_POST['sixth_email'];
$sixth_nick = $_POST['sixth_nick'];

$sixth = $_POST['sixth'];


    $isTeamName = $polaczenie -> query("SELECT * FROM zseleague_teams WHERE teamName='$teamName'");
    $isTeamTag = $polaczenie -> query("SELECT * FROM zseleague_teams WHERE teamTag='$teamTag'");

    $isTeamName = $isTeamName->num_rows;
    $isTeamTag = $isTeamTag->num_rows;

    if($isTeamName == 0 && $isTeamTag == 0){
        if ($polaczenie->query("INSERT INTO zseleague_teams VALUES (NULL, '$teamName', '$teamTag', '$school')")){

        }
        else{
            throw new Exception($polaczenie->error);
        }    


        $result = $polaczenie -> query("SELECT * FROM zseleague_teams WHERE teamName='$teamName'");
        $result = $result->fetch_assoc();
        $teamid = $result['id'];

        //kapitan
        if ($polaczenie->query("INSERT INTO zseleague_gamers VALUES (NULL, '$captain_name', '$captain_surname',  '$captain_email', '$captain_nick', '$teamid')")){

        }
        else{
            throw new Exception($polaczenie->error);
        }

        //drugi gracz
        if ($polaczenie->query("INSERT INTO zseleague_gamers VALUES (NULL, '$second_name', '$second_surname',  '$second_email', '$second_nick', '$teamid')")){

        }
        else{
            throw new Exception($polaczenie->error);
        }

        //trzeci gracz
        if ($polaczenie->query("INSERT INTO zseleague_gamers VALUES (NULL, '$third_name', '$third_surname', '$third_email', '$third_nick', '$teamid')")){
        }
        else{
            throw new Exception($polaczenie->error);
        }

        //czwarty gracz
        if ($polaczenie->query("INSERT INTO zseleague_gamers VALUES (NULL, '$fourth_name', '$fourth_surname', '$fourth_email', '$fourth_nick', '$teamid')")){
        }
        else{
            throw new Exception($polaczenie->error);
        }

        //piaty gracz
        if ($polaczenie->query("INSERT INTO zseleague_gamers VALUES (NULL, '$fifth_name', '$fifth_surname', '$fifth_email', '$fifth_nick', '$teamid')")){
        }
        else{
            throw new Exception($polaczenie->error);
        }

        //rezerwowy gracz
        if($sixth == 2){
            if ($polaczenie->query("INSERT INTO zseleague_gamers VALUES (NULL, '$sixth_name', '$sixth_surname', '$sixth_email', '$sixth_nick', '$teamid')")){
        
            }
            else{
                throw new Exception($polaczenie->error);
            }
        }
        

        //mailer
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
		$mail -> setFrom("mail");
		$mail -> addAddress($captain_email);
		$mail -> Subject = "ZSE LEAGUE - Zaproszenie na Discord'a";
		$mail -> Body = '<body>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse:collapse;border:1px solid rgb(204,204,204)">
            <tbody><tr>
                <td colspan="3" align="center" bgcolor="#17181c" style="padding:20px 0px 20px">
                    <p style="font-family: Ubuntu, sans-serif; font-size:18px; margin:0px; color:rgb(255,255,255); ">ZSE LEAGUE KRAKÓW</p>
                </td>
            </tr>
            
            <tr>
                <td bgcolor="#008cff" style="width:10%"></td>
                <td bgcolor="#ffffff" style="width:80%;padding-top:10px" align="center">
                <img src="https://cdn.discordapp.com/attachments/802140144479895562/809681463892246528/logo.png" width="250px" class="gmail_canned_response_image">
                </td>
                <td bgcolor="#008cff" style="width:10%"></td>
            </tr>
    
            <tr>
                <td bgcolor="#008cff" style="width:10%"></td>
                <td bgcolor="#ffffff" style="width:80%" align="center">
                    <p align="center">Dziękujemy za zgłoszenie drużyny</p>
                    <p style="padding-right:40px;padding-left:40px">
                        Prosimy się zapoznać z regulaminem turnieju oraz o dołączenie na nasz serwer discord, gdzie prosimy zweryfikować drużynę. 
                        Znajdują się tam informacje o rozgrywkach<br><br><br>
                        
                    </p>
                </td>
                <td bgcolor="#008cff" style="width:10%"></td>
            </tr>
    
            <tr>
                <td bgcolor="#008cff" style="width:10%"></td>
                <td bgcolor="#ffffff" style="width:80%;padding-top:10px" align="center">
                    <a href="https://discord.gg/bWnXxcZmbE" target="_blank">
                        <button style="background-color:#008cff ;padding:10px 50px;border-width:1px;border-style:solid;border-color:rgb(23,24,28);color:rgb(23,24,28)">Zaproszenie</button>
                    </a>
                </td>
                <td bgcolor="#008cff" style="width:10%"></td>
            </tr>
            <tr>
                <td bgcolor="#008cff" style="width:10%"></td>
                <td bgcolor="#ffffff" style="width:80%;padding-top:10px" align="center">
                </td>
                <td bgcolor="#008cff" style="width:10%"></td>
            </tr>
            <tr>
                <td bgcolor="#008cff" style="width:10%"></td>
                
                <td bgcolor="#008cff" style="width:10%"></td>
            </tr>
    
            <tr>
                <td bgcolor="#008cff" style="width:10%"></td>
                <td bgcolor="#ffffff" style="width:80%;padding-top:10px" align="center">
                </td>
                <td bgcolor="#008cff" style="width:10%"></td>
            </tr>
            <tr>
                <td bgcolor="#008cff" style="width:10%"></td>
                <td bgcolor="#ffffff" style="width:80%;padding-top:10px" align="center">
                </td>
                <td bgcolor="#008cff" style="width:10%"></td>
            </tr>
            <tr>
                <td bgcolor="#008cff" style="width:10%"></td>
                <td bgcolor="#ffffff" style="width:80%;padding-top:10px" align="center">
                </td>
                <td bgcolor="#008cff" style="width:10%"></td>
            </tr>
            <tr>
                <td bgcolor="#008cff" style="width:10%"></td>
                <td bgcolor="#ffffff" style="width:80%;padding-top:10px" align="center">
                </td>
                <td bgcolor="#008cff" style="width:10%"></td>
            </tr>
    
            
    
            <tr>
                <td bgcolor="#008cff" style="width:10%"></td>
                <td bgcolor="#ffffff" style="width:80%;padding-top:30px" align="center">
                </td>
                <td bgcolor="#008cff" style="width:10%"></td>
            </tr>
    
            <tr>
                <td colspan="3" align="center" bgcolor="#17181c" style="padding:20px 0px 10px">
                    <p style="margin:0px;color:white">2022 © Wszelkie prawa zastrzeżone</p>
                    <p style="font-family: Ubuntu, sans-serif; margin:0px;color:white">ZSE LEAGUE</p>
                </td>
            </tr>
        </tbody></table>
    </body>';

		if($mail -> Send()){
		}
		else{
            
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
		
		$mail -> smtpClose();
		


        echo"work";
    }
    else{
        echo"not";
    }

?>