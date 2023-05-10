<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARCH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            width:100%;
            height:100vh;
            background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(images/n3.png);
            background-size: cover;
            background-position: center;
        }

        .hello:hover{
            border:none;
            background-color:rgba(255, 145, 0, 0.834) ;
        
        }
     </style>
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4>TYPE USERID FOR FETCHING PLAYER DETAILS</h4>
                    </div>
                    <div class="card-body">

                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" name="userid" value="<?php if(isset($_GET['userid'])){echo $_GET['userid'];} ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    <a href="home.html"><button type="button" class="hello">Get back</button></a>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","video_game");

                                    if(isset($_GET['userid']))
                                    {
                                        $userid = $_GET['userid'];

                                        $query = "SELECT P.username,GE.genre,G.gname,PL.plat,R.rating FROM game AS G,game_platform AS GP,platform AS PL,
                                         player AS P,reviews AS R,genre AS GE WHERE G.genreid=GE.genreid AND G.gameid=GP.gameid AND PL.platid=GP.platid AND
                                         R.gpid=GP.gpid AND R.userid=P.userid AND P.userid='$userid';";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                <div class="form-group mb-3">
                                                    <label for="">UserName</label>
                                                    <input type="text" value="<?= $row['username']; ?>" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">Genre</label>
                                                    <input type="text" value="<?= $row['genre']; ?>" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">GameName</label>
                                                    <input type="text" value="<?= $row['gname']; ?>" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">Platform</label>
                                                    <input type="text" value="<?= $row['plat']; ?>" class="form-control">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">Rating</label>
                                                    <input type="text" value="<?= $row['rating']; ?>" class="form-control">
                                                </div>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Record Found";
                                        }
                                    }
                                   
                                ?>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>