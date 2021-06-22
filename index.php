<?php

$link= mysqli_connect("localhost","root","","cal");




if(isset($_POST['submit'])){
  $dabit= $_POST['dabit'];


  $qurey= "INSERT INTO `cal`(`total_Balance`) VALUES ('$dabit')";

  $add= mysqli_query($link,$qurey);

  if($add){
    echo " Data inset sucess";
   
}else{
    echo "failed";
}


}


if(isset($_POST['reset'])){
  $qurey= "truncate `cal`";

  $add= mysqli_query($link,$qurey);


}


if(isset($_POST['cal'])){


  $db_sinfo= mysqli_query($link,"SELECT * FROM `cal`");
  $row=mysqli_fetch_assoc($db_sinfo);


    $dabit= $row['total_Balance']; 
    $cardit= $_POST['cardit'];

    $total_Balance= $dabit-$cardit;

    $qurey= "UPDATE `cal` SET `total_Balance`= '$total_Balance'";

     $add= mysqli_query($link,$qurey);
    

    echo '<div class="alert alert-success">'.$total_Balance.'</div>';  

   
}



?>




<!DOCTYPE html>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>cal</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
        <h2> Daily Calculator </h2>
            <div class="col-md-3 offset-md-3">
                

                <form action="" method="POST">

                <label for="dabit"> Your Debit</label>
                <input type="text" name="dabit" id="dabit" placeholder="Enter your main Balance" class="form-control">

               

                <input type="submit" name="submit"  id="submit" value="Add" class="btn btn-primary mt-3" > 
                <input type="submit" name="reset"  id="reset" value="Reset" class="btn btn-primary mt-3" > 
                
                
            
            </div>

            <div class="col-md-3">
                <form action="" method="POST">

                <label for="cardit"> Your Cradit</label>
                <input type="text" name="cardit" id="cardit" placeholder="Enter your cost" class="form-control"  >

                <input type="submit" name="cal"  id="cal" value="Calculate" class="btn btn-primary mt-3" > 

                </form>
            
            </div>

            <div class="col-md-3">

            

          
            
            </div>
        </div>
    
    
    </div>



















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>