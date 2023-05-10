<?php
    include 'connect.php';
    //genre
    $query=" select * from genre "; 
    $result=mysqli_query($conn,$query); 
    //game
    $game = " select * from game ";
    $result1 = mysqli_query($conn,$game);
    //platform
    $platform = " select * from platform ";
    $result2 = mysqli_query($conn,$platform);
    //gameplatform
    $game_platform = " select * from game_platform ";
    $result3 = mysqli_query($conn,$game_platform);
    //player
    $player = " select * from player ";
    $result4 = mysqli_query($conn,$player);
    //reviews
    $review = " select * from reviews ";
    $result5 = mysqli_query($conn,$review);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<div" class=" wrapper">
    <link rel="stylesheet" href="dis.css" type="text/css" />

    <h1 class="white">GENRE</h1> 
    <div class="table">

        <div class="row header">
            <div class="cell">
                Genre
            </div>
            <div class="cell">
                GenreID
            </div>
        </div>
        <?php 
                                    
                 while($row=mysqli_fetch_assoc($result))
                {
                    $genre = $row['genre'];
                    $genreid = $row['genreid'];
        ?>

        <div class="row">
            <div class="cell" data-title="Genre">
            <?php echo $genre ?>
            </div>
            <div class="cell" data-title="GenreID">
            <?php echo $genreid ?>
            </div>
        </div>
        <?php 
                                    }  
                            ?>

        

    </div>
    <h1 class="white">GAME</h1>                               
    <div class="table">

        <div class="row header green">
            <div class="cell">
                GameID
            </div>
            <div class="cell">
                GName
            </div>
            <div class="cell">
                Publisher
            </div>
            <div class="cell">
                GenreID
            </div>
        </div>
        <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result1))
                                    {
                                        $gameid = $row['gameid'];
                                        $gname = $row['gname'];
                                        $publisher = $row['publisher'];
                                        $genreid = $row['genreid'];
                            ?>
        <div class="row">
            <div class="cell" data-title="GameID">
            <?php echo $gameid ?>
            </div>
            <div class="cell" data-title="GName">
            <?php echo $gname ?>
            </div>
            <div class="cell" data-title="Publisher">
            <?php echo $publisher ?>
            </div>
            <div class="cell" data-title="GenreID">
            <?php echo $genreid ?>
            </div>
        </div>
        <?php 
                                    }  
                            ?>
    </div>
    <h1 class="white">PLATFORM</h1> 
    <div class="table">
        <div class="row header blue">
            <div class="cell">
                Platform
            </div>
            <div class="cell">
                PlatformID
            </div>
        </div>
        <?php                        
            while($row=mysqli_fetch_assoc($result2))
            {
                $plat = $row['plat'];
                $platid = $row['platid'];
        ?>
        <div class="row">
            <div class="cell" data-title="Platform">
                    <?php echo $plat ?>
            </div>
            <div class="cell" data-title="PlatformID">
                <?php echo $platid ?>
            </div>
        </div>
        <?php 
                 }  
            ?> 
    
    </div>
    <h1 class="white">GAME-PLATFORM</h1> 
    <div class="table">

        <div class="row header orange">
            <div class="cell">
                GamePlatID
            </div>
            <div class="cell">
                Price
            </div>
            <div class="cell">
                ReleaseYear
            </div>
            <div class="cell">
                PlatID
            </div>
            <div class="cell">
                GameID
            </div>
        </div>
        <?php 
                                    
                while($row=mysqli_fetch_assoc($result3))
                {
                    $gpid = $row['gpid'];
                    $price = $row['price'];
                    $r_year = $row['r_year'];
                    $platid = $row['platid'];
                    $gameid = $row['gameid'];
                            ?>
        <div class="row">
            <div class="cell" data-title="GamePlatID">
            <?php echo $gpid?>
            </div>
            <div class="cell" data-title="Price">
            <?php echo "$price.0 Rs" ?>
            </div>
            <div class="cell" data-title="ReleaseYear">
            <?php echo $r_year ?>
            </div>
            <div class="cell" data-title="PlatID">
            <?php echo $platid ?>
            </div>
            <div class="cell" data-title="GameID">
            <?php echo $gameid ?>
            </div>
        </div>
        <?php 
                                    }  
                          ?>
    </div>
    <h1 class="white">PLAYER</h1> 
    <div class="table">

        <div class="row header purple">
            <div class="cell">
                UserID
            </div>
            <div class="cell">
                UserName
            </div>
            <div class="cell">
                Password
            </div>
            <div class="cell">
                NickName
            </div>
            <div class="cell">
                Email
            </div>
        </div>
        <?php 
                                    
                while($row=mysqli_fetch_assoc($result4))
                {
                    $userid = $row['userid'];
                    $uname = $row['username'];
                    $pass = $row['password'];
                    $nick = $row['nickname'];
                    $email = $row['email'];
                            ?>
        <div class="row">
            <div class="cell" data-title="UserID">
            <?php echo $userid?>
            </div>
            <div class="cell" data-title="UserName">
            <?php echo "$uname" ?>
            </div>
            <div class="cell" data-title="Password">
            <?php echo $pass ?>
            </div>
            <div class="cell" data-title="NickName">
            <?php echo $nick ?>
            </div>
            <div class="cell" data-title="Email">
            <?php echo $email ?>
            </div>
        </div>
        <?php 
                                    }  
                          ?>
    </div>
    <h1 class="white">REVIEWS</h1> 
    <div class="table">

        <div class="row header yellow">
            <div class="cell">
                Rating
            </div>
            <div class="cell">
                Comments
            </div>
            <div class="cell">
                UserID
            </div>
            <div class="cell">
                GamePlatID
            </div>
        </div>
        <?php 
                                    
                while($row=mysqli_fetch_assoc($result5))
                {
                    $rate = $row['rating'];
                    $com = $row['comments'];
                    $userid = $row['userid'];
                    $gpid = $row['gpid'];
                            ?>
        <div class="row">
            <div class="cell" data-title="Rating">
            <?php echo $rate ?>
            </div>
            <div class="cell" data-title="Comments">
            <?php echo "$com" ?>
            </div>
            <div class="cell" data-title="UserID">
            <?php echo $userid ?>
            </div>
            <div class="cell" data-title="GamePlatID">
            <?php echo $gpid ?>
            </div>
        </div>
        <?php 
                                    }  
                          ?>
    </div>    
   
    <title>DISPLAY TABLES</title>
</head>

<body>

</body>

</html>