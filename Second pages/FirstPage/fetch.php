<?php
//fetch.php
$output = '';
// include '../data/database.php';
include '../data/connectdb.php';
// $connect = mysqli_connect("localhost", "root", "", "cr");

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
      $result = mysqli_query($conn,$query);
      if(mysqli_num_rows($result) > 0)
      {
 while($row = mysqli_fetch_assoc($result))
 {
  $output .= '
   
  <div class="row justify-content-center col-sm-3   " >
         <div class="card mt-5  " style="width: 18rem;">
            <img src="image/'.$row["image"].' " class="card-img-top" alt="...">
            <hr>
               <div class="card-body " style="justify-content:center">
                  <h5 class="card-title text-success text-center">Nom : '.$row["name"].'</h5>
                  <p class="card-text text-center"> Ville de depart : '.$row["pays_depart"].'</p>
                  <p class="card-text text-center"> Ville de depart : '.$row["pays_arrive"].'</p>
                  <p class="card-text text-center">Date de Vol : '.$row["date_vol"].'</p>
                  <p class="card-text text-center">Prix: '.$row["price"].' Dhs</p>
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