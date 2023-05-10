<?php
include 'connect.php';
//query1
$query1 = "SELECT game.genreid, genre.genre, game.gname 
FROM game 
INNER JOIN genre ON game.genreid=genre.genreid";
$result = mysqli_query($conn, $query1);
//query2
$query2 = " SELECT DISTINCT gname FROM game,game_platform,platform 
WHERE game_platform.gameid=game.gameid AND platform.platid=205; ";
$result1 = mysqli_query($conn,$query2);
//query3
$query3 = " SELECT * FROM player WHERE userid 
IN (SELECT userid FROM reviews where rating=5); ";
$result2 = mysqli_query($conn,$query3);
//query4
$query4 = " SELECT plat, (SELECT COUNT(*) FROM game_platform 
WHERE game_platform.platid=platform.platid) AS platform_count FROM platform; ";
$result3 = mysqli_query($conn,$query4);
//query5
$query5 = " SELECT G.gname,U.username,P.plat,GP.price FROM game G,player U,game_platform GP,platform P,reviews R 
WHERE G.gameid=GP.gameid AND GP.platid=P.platid AND R.gpid=GP.gpid AND U.userid=R.userid; ";
$result4 = mysqli_query($conn,$query5);
//query6
$query6 = " SELECT P.username,R.comments FROM player P,reviews R WHERE P.userid=R.userid AND R.rating>1; ";
$result5 = mysqli_query($conn,$query6);

//query7
$query7 = " SELECT G.gname,U.username,P.plat,GP.price FROM game G,player U,game_platform GP,platform P,reviews R 
WHERE G.gameid=GP.gameid AND GP.platid=P.platid AND R.gpid=GP.gpid AND U.userid=R.userid 
ORDER BY G.gname DESC,U.username ASC,P.plat ASC,GP.price DESC; ";
$result6 = mysqli_query($conn,$query7);

//query8
$query8 = " SELECT * FROM  Player LIMIT 7 OFFSET 3; ";
$result7 = mysqli_query($conn,$query8);

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="query.css" type="text/css" />
  <title>Query-Display</title>
</head>

<body>
<div class="container">
  <h1>QUERIES</h1>
  <div class="table-1">
    <h2>1-DISPLAYING GenreId,Genre,GName USING INNER JOIN (JOINING GAME AND GENRE TABLE)</h2>
    <table>
      <tbody>
        <tr>
          <th>GenreID</th>
          <th>Genre</th>
          <th>GName</th>
        </tr>
        <?php                       
             while($row=mysqli_fetch_assoc($result))
             {
                    $var1 = $row['genreid'];
                    $var2 = $row['genre'];
                    $var3 = $row['gname'];
                            ?>
        <tr>
          <td data-th="GenreID"> <?php echo $var1 ?></td>
          <td data-th="Genre"><?php echo $var2 ?></td>
          <td data-th="GName"><?php echo $var3 ?></td>
          <?php 
                  }  
                            ?>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="table-1">
    <h2>2-RETRIEVING DISTINCT GAME PUBLISHER NAMES OF MOBILE PLATFORM</h2>
    <table>
      <tbody>
        <tr>
          <th>GameName</th>
        </tr>
        <?php                       
             while($row=mysqli_fetch_assoc($result1))
             {
                    $var1 = $row['gname'];
                            ?>
        <tr>
          <td data-th="GameName"> <?php echo $var1 ?></td>
          <?php 
                  }  
                            ?>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="table-1">
    <h2>3-Player details who have given 5 rating for the games they have played</h2>
    <table>
      <tbody>
        <tr>
          <th>UserID</th>
          <th>UserName</th>
          <th>Password</th>
          <th>NickName</th>
          <th>Email</th>
        </tr>
        <?php                       
             while($row=mysqli_fetch_assoc($result2))
             {
                    $var1 = $row['userid'];
                    $var2 = $row['username'];
                    $var3 = $row['password'];
                    $var4 = $row['nickname'];
                    $var5 = $row['email'];
                            ?>
        <tr>
          <td data-th="UserID"> <?php echo $var1 ?></td>
          <td data-th="UserName"> <?php echo $var2 ?></td>
          <td data-th="Password"> <?php echo $var3 ?></td>
          <td data-th="NickName"> <?php echo $var4 ?></td>
          <td data-th="Email"> <?php echo $var5 ?></td>
          <?php 
                  }  
                            ?>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="table-1">
    <h2>4-Display Count of game_platforms(games) for each platform </h2>
    <table>
      <tbody>
        <tr>
          <th>Platform</th>
          <th>Platform_Count</th>
        </tr>
        <?php                       
             while($row=mysqli_fetch_assoc($result3))
             {
                    $var1 = $row['plat'];
                    $var2 = $row['platform_count'];
                            ?>
        <tr>
          <td data-th="Platform"> <?php echo $var1 ?></td>
          <td data-th="Platform_Count"><?php echo $var2 ?></td>
          <?php 
                  }  
                            ?>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="table-1">
    <h2>5-List of player usernames who have given review and played games inlucding gamename,gameplatform and its price</h2>
    <table>
      <tbody>
        <tr>
          <th>GName</th>
          <th>UserName</th>
          <th>Platform</th>
          <th>Price</th>
        </tr>
        <?php                       
             while($row=mysqli_fetch_assoc($result4))
             {
                    $var1 = $row['gname'];
                    $var2 = $row['username'];
                    $var3 = $row['plat'];
                    $var4 = $row['price'];
                            ?>
        <tr>
          <td data-th="GName"> <?php echo $var1 ?></td>
          <td data-th="UserName"> <?php echo $var2 ?></td>
          <td data-th="Platform"> <?php echo $var3 ?></td>
          <td data-th="Price"> <?php echo "$var4.0 Rs" ?></td>
          <?php 
                  }  
                            ?>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="table-1">
    <h2>6-List of Player usernames who have played game and reviewed them by giving rating above 1(including comments) </h2>
    <table>
      <tbody>
        <tr>
          <th>UserName</th>
          <th>Comments</th>
        </tr>
        <?php                       
             while($row=mysqli_fetch_assoc($result5))
             {
                    $var1 = $row['username'];
                    $var2 = $row['comments'];
                            ?>
        <tr>
          <td data-th="UserName"> <?php echo $var1 ?></td>
          <td data-th="Comments"><?php echo $var2 ?></td>
          <?php 
                  }  
                            ?>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="table-1">
    <h2>7-List of players who have given review and played games inlucding game name,game platform and its price also
game name in descending order.
</h2>
    <table>
      <tbody>
        <tr>
          <th>GName</th>
          <th>UserName</th>
          <th>Platform</th>
          <th>Price</th>
        </tr>
        <?php                       
             while($row=mysqli_fetch_assoc($result6))
             {
                    $var1 = $row['gname'];
                    $var2 = $row['username'];
                    $var3 = $row['plat'];
                    $var4 = $row['price'];
                            ?>
        <tr>
          <td data-th="GName"> <?php echo $var1 ?></td>
          <td data-th="UserName"> <?php echo $var2 ?></td>
          <td data-th="Platform"> <?php echo $var3 ?></td>
          <td data-th="Price"> <?php echo "$var4.0 Rs" ?></td>
          <?php 
                  }  
                            ?>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>