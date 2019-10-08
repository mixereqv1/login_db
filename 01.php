<?php
    session_start();

    include_once('connect.php');
    include_once('functions.php');

    if(isset($_GET['action']) && $_GET['action'] == 'logout') {
        $_SESSION['logged_in'] = false;
        unset($_SESSION['user']);
    }

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $query = "SELECT username,password FROM users WHERE username ='$username'";
        $result = $mysqli -> query($query);
        $row = $result -> fetch_assoc();
        if($row['username'] === $username) {
            $password = $_POST['password'];
            if($row['password'] === $password) {
                $_SESSION['logged_in'] = true;
                $_SESSION['user'] = $username;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css">
        <title>Index</title>
    </head>
    <body>
        
        <div class="container">
            <header class="header">
                <h1><?php showCurrentPage(); ?></h1>            
            </header>
            <div class="left">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <input type="text" name="username" placeholder="Username...">
                    <input type="password" name="password" placeholder="Password...">
                    <input type="submit" name="submit" value="Log in">
                </form>
            </div>
            <div class="center">
                <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) { ?>
                    <div class="logged_in">
                        Jestes zalogowany jako: <b><?php echo $_SESSION['user']; ?></b>
                        <a href="<?php $_SERVER['PHP_SELF']; ?>?action=logout" class="logout">Wyloguj sie</a>
                    </div>
                <?php } else { ?>
                    <div class="logged_out"><h1>Nie jestes zalogowany</h1></div>
                <?php } ?>
            </div>
            <div class="right"></div>
            <footer class="footer">
                <?php createMenu(); ?>
            </footer>
        </div>

    </body>
</html>