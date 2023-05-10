<?php
    include 'connect1.php';
    //query1
    $query=" SELECT CategoryName, MIN(CreationDate) As  
    EarliestCreationDate, COUNT(*) AS CategoryCount                                          
    FROM tblcategory
    GROUP BY CategoryName; "; 
    $result=mysqli_query($conn,$query); 
    //query2
   // $query1 = " SELECT * 
   // FROM tblpass 
   // WHERE FromDate BETWEEN '2021-07-05' AND '2021-07-15'; ";
    //$result1 = mysqli_query($conn,$query1);
    //query3
   // $query2 = " SELECT PassNumber, FullName, Cost
   // FROM tblpass 
   // WHERE FromDate >= '2021-07-01'; ";
  //  $result2 = mysqli_query($conn,$query2);
    //query4
  //  $query3 = " SELECT IdentityType, COUNT(*) as num_passengers 
  //  FROM tblpass 
  //  GROUP BY IdentityType 
   // ORDER BY num_passengers DESC; ";
   // $result3 = mysqli_query($conn,$query3);
 //query5
   // $query4 = " SELECT Destination, SUM(Cost) as total_cost 
   // FROM tblpass 
  //  GROUP BY Destination; ";
  //  $result4 = mysqli_query($conn,$query4);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="css1/bootstrap.css"/>
    <title>View Records</title>
</head>
<body class="bg-dark">
<div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered" border="1px" align="center" style="width:600px; line-height:40px;" >
                            <tr>
                                <th colspan="5">QUERY-1</th>
                            </tr>
                            <tr>
                                <th> CategoryName </th>
                                <th> EarliestCreationDate </th>
                                <th> CategoryCount </th>
                            </tr>
                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $var1 = $row['CategoryName'];
                                        $var2 = $row['EarliestCreationDate'];
                                        $var3 = $row['CategoryCount'];
                            ?>
                            <tr>
                                        <td><?php echo $var1 ?></td>
                                        <td><?php echo $var2 ?></td>
                                        <td><?php echo $var3 ?></td>
                            </tr>        
                            <?php 
                                    }  
                            ?>            
                        </table>
</body>
</html>