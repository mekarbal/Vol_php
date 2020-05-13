<?php
//fetch.php
include '../data/database.php';
// $connect = mysqli_connect("localhost", "root", "", "cr");
$output = '';
if(isset($_POST["query"]))
{
 $search =  $_POST["query"];
 $query = "
  SELECT * FROM vols
  WHERE name LIKE '%".$search."%'
  OR price LIKE '%".$search."%' 
  OR pays_depart LIKE '%".$search."%' 
  OR date_vol LIKE '%".$search."%' 
  OR nb_place LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM vols WHERE nb_place>0 ORDER BY	id 
 ";
}
$result = $con->prepare($query);
$result->execute();
if($result->rowCount() > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
    <th>Image</th>
     <th>Name</th>
     <th>price</th>
     <th>Depart</th>
     <th>Date</th>
     <th>nb Places</th>
     <th></th>
    </tr>
 ';
 while($row = $result->fetch(PDO::FETCH_ASSOC))
 {
  $output .= '
   <tr>
   <td><img src="image/'.$row["image"].' " style="height:150px;" ></td>
    <td>'.$row["name"].'</td>
    <td>'.$row["price"].'</td>
    <td>'.$row["pays_depart"].'</td>
    <td>'.$row["date_vol"].'</td>
    <td>'.$row["nb_place"].'</td>
    <td><a href=read_one.php?id='.$row["id"].' class="btn btn-info m-r-1em">More infos</a><td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>