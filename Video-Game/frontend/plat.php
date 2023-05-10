<html>
    <body>
        <?php
        include 'connect.php';
        $plat=$_POST['plat'];
        $platid=$_POST['platid'];
        $price=$_POST['price'];
        $r_year=$_POST['r_year'];
        $gameid=$_POST['gameid'];
        $gpid=0;
        $gpid=rand(1,1000);
        $pconn = $conn->prepare("insert into platform(plat, platid)
        values(?, ?)");
        $gpconn = $conn->prepare("insert into game_platform(gpid, price, r_year, platid, gameid)
        values(?, ?, ?, ?, ?)");
        $pconn->bind_param("si",$plat, $platid);
        $pconn->execute();
        $gpconn->bind_param("iiiii",$gpid , $price, $r_year, $platid, $gameid);
        $gpconn->execute();
        header("Location: plat.html");
        echo '<script type="text/JavaScript"> 
        alert("ADDED SUCCESSFULLY");
        </script>';
        $pconn->close();
        $gpconn->close();
        $conn->close();
        echo '<a href="plat.html">Click here to get back</a>';
        ?>
    </body>
</html>