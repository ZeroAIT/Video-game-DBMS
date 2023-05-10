<html>
    <body>
        <?php
        include 'connect.php';
        $userid=$_POST['userid'];
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        $nick=$_POST['nick'];
        $mail=$_POST['mail'];
        $uconn = $conn->prepare("insert into player(userid, username, password, nickname, email)
        values(?, ?, ?, ?, ?)");
        $uconn->bind_param("issss",$userid, $user, $pass, $nick, $mail);
        $uconn->execute();
        header("Location: play.html");
        echo '<script type="text/JavaScript"> 
        alert("ADDED SUCCESSFULLY");
        </script>';
        $uconn->close();
        $conn->close();
        echo '<a href="play.html">Click here to get back</a>';
        ?>
    </body>
</html>