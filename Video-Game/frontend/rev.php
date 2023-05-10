<html>
    <body>
        <?php
        include 'connect.php';
        $rate=$_POST['rate'];
        $rev=$_POST['rev'];
        $userid=$_POST['userid'];
        $gpid=$_POST['gpid'];
        $rconn = $conn->prepare("insert into reviews(rating, comments, userid, gpid)
        values(?, ?, ?, ?)");
        $rconn->bind_param("issss",$rate, $rev, $userid, $gpid);
        $rconn->execute();
        echo '<script type="text/JavaScript"> 
        alert("ADDED SUCCESSFULLY");
        </script>';
        $rconn->close();
        $conn->close();
        header("Location: rev.html");
        exit;
        //echo '<a href="rev.html">Click here to get back</a>';
        ?>
    </body>
</html>