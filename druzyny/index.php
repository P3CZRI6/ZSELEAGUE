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
                    <li><a class="active menu-item" href="#">Drużyny</a></li>
                    <li><a class="menu-item" href="../o_nas">O nas</a></li>
                    <li><a class="menu-item" href="../faq">FAQ</a></li>
					<li><a class="menu-item" href="../kontakt">Kontakt</a></li>
					<li><a class="menu-item" href="../../">ZSE CUP</a></li>
					<!-- <li><button class="register"><a  href="../zarejestruj">Zarejestruj</a></button></li> -->
                </ul>
                <div class="icon menu-btn">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </nav>
        <div class="banner">
            <h1>Drużyny</h1>
        </div>
        <div class="about">
            <!--Wypisywanie-->
            <h2 class="gra"><span class="color">Liczba drużyn:</span>
                <?php
                    require_once "../connect.php";
                    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
                    $polaczenie -> query ('SET NAMES utf8');
                    
                    $teams = $polaczenie -> query("SELECT * FROM zseleague_teams");
                    $team = $teams -> num_rows;
                    echo $team;
                    $polaczenie -> close();
                ?>
            </h2>
            
            <!-- wypisywanie ile druzyn -->
            <div class="content-text">
                <div class="row">
                <?php
                        require_once "../connect.php";
                        $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
                        $polaczenie -> query ('SET NAMES utf8');
                    
                        $sql = "SELECT * FROM zseleague_teams";
                        $numTeams = $polaczenie -> query($sql); 

                        if($numTeams -> num_rows > 0){
                            while($row = $numTeams -> fetch_assoc()){
                                echo '
                                <div class="column">
                                    <h2>'.$row['teamName'].'<span class="name">'. $row['teamTag'].'</span></h2>
                                    <h4 class="color">'.$row['schoolName'].'</h4>
                                    <ul class="team">
                                ';

                                $help = 1;
                                $players_ask = "SELECT * FROM zseleague_gamers where teamID=".$row['id']." ORDER BY `id` ASC";
                                $players_num = $polaczenie -> query($players_ask);
                                while($player_row = $players_num -> fetch_assoc()){
                                    if($help == 1){
                                        echo '
                                        <li class="team-player capitan">'.$player_row['name'].' <span class="color">'.$player_row['nick'].'</span> '.$player_row['surname'].'</span></li>
                                        ';
                                    }
                                    else{
                                        echo '
                                        <li class="team-player">'.$player_row['name'].' <span class="color">'.$player_row['nick'].'</span> '.$player_row['surname'].'</span></li>
                                        ';
                                    }
                                    $help++;
                                }

                                echo '
                                    </ul>
                                </div>
                                ';
                            }
                        }
                        else{
                            echo '<p class="center">Aktualnie nikt się jeszcze nie zapisał</p>';
                        }

                    $polaczenie -> close();

                    ?>
                </div>
            </div>
        </div>
        <?php
            require_once "../connect.php";
            $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
            $polaczenie -> query ('SET NAMES utf8');
        
            $sql = "SELECT * FROM zseleague_teams";
            $numTeams = $polaczenie -> query($sql); 
            if($numTeams -> num_rows != 0){
                echo '
                <footer>
                    <p>
                    Copyright &copy; 2022 <br>
                    <a id="ft_od" href="https://esportwzse.pl/zseleague">ZSE LEAGUE</a><br>
                    Created by: <a class="author" href="https://www.facebook.com/DuolyStudio" target="_blank">Duoly</a><br>
                    <a href="https://www.youtube.com/channel/UCZF9sZ6Er_L9zOJuqQCHv-g" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a href="https://www.facebook.com/ZSELEAGUE" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    </p>
                </footer>';
            }
            else{
                echo '
                <footer class="fixed">
                    <p>
                        Copyright &copy; 2022 <br>
                        <a id="ft_od" href="https://esportwzse.pl/zseleague">ZSE LEAGUE</a><br>
                        Created by: <a class="author" href="https://www.facebook.com/DuolyStudio" target="_blank">Duoly</a><br>
                        <a href="https://www.youtube.com/channel/UCZF9sZ6Er_L9zOJuqQCHv-g" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.facebook.com/ZSELEAGUE" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    </p>
                </footer>';
            }
            $polaczenie -> close();

        ?>
        <script src="main.js"></script>
    </body>
</html>