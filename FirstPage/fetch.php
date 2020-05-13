<?php
//fetch.php
include '../data/database.php';
// $connect = mysqli_connect("localhost", "root", "", "cr");
$output = '';
if(isset($_POST["query"]))
      {
      $search =  $_POST["query"];
      $query = "
                  SELECT * FROM vols WHERE name LIKE '%".$search."%'
                  OR price LIKE '%".$search."%' 
                  OR pays_depart LIKE '%".$search."%' 
                  OR date_vol LIKE '%".$search."%' 
                  OR nb_place LIKE '%".$search."%'
      ";
      } else
      {
      $query = "
      SELECT * FROM vols WHERE nb_place>0 ORDER BY	id 
      ";
      }
      $result = $con->prepare($query);
      $result->execute();
      if($result->rowCount() > 0)
      {
 while($row = $result->fetch(PDO::FETCH_ASSOC))
 {
  $output .= '
   
  <div class="row justify-content-center col-sm-3   " >
         <div class="card mt-5  " style="width: 18rem;">
            <img src="image/'.$row["image"].' " class="card-img-top" alt="...">
            <hr>
               <div class="card-body " style="justify-content:center">
                  <h5 class="card-title text-success text-center">'.$row["name"].'</h5>
                  <p class="card-text text-center">'.$row["pays_depart"].'</p>
                  <p class="card-text text-center">'.$row["date_vol"].'</p>
                  <p class="card-text text-center">'.$row["price"].' Dhs</p>
                  <p class="text-center"><a href=read_one.php?id='.$row["id"].' class="btn btn-info m-r-1em text-center">Details</a></p>
               </div>
         </div>
      </div>
  ';
 }
 echo $output;
}
else
{
//  echo 'Data Not Found';

 echo '<div class="alert alert-danger" role="alert"> Data Not Found</div>';
}

?>