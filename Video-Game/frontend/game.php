<html>
    <body>
        <?php
        include 'connect.php';
        $game=$_POST['game'];
        $genre=$_POST['genre'];
        $gameid;
        $genreid=$_POST['genreid'];
        $pub=$_POST['pub'];
        $gconn = $conn->prepare("insert into Game(gname, gameid, publisher, genreid)
        values(?, ?, ?, ?)");
        $geconn = $conn->prepare("insert into Genre(genre, genreid)
        values(?, ?)");
        $geconn->bind_param("si",$genre, $genreid);
        $geconn->execute();
        $gconn->bind_param("sisi",$game, $gameid, $pub, $genreid);
        $gconn->execute();
        echo '<script type="text/JavaScript"> 
        alert("ADDED SUCCESSFULLY");
        </script>';
        $gconn->close();
        $geconn->close();
        $conn->close();
        header("Location: game.html");
        exit;
        //echo '<a href="game.html">Click here to get back</a>';
        ?>

    </body>
</html>