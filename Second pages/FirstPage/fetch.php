<?php

include('../data/connectdb.php');

$column = array('name', 'pays_depart', 'pays_arrive');

$query = "
SELECT * FROM vols 
";

if(isset($_POST['pays_depart'], $_POST['pays_arrive']) && $_POST['pays_depart'] != '' && $_POST['pays_arrive'] != '')
{
 $query .= '
 WHERE pays_depart = "'.$_POST['pays_depart'].'" AND pays_arrive = "'.$_POST['pays_arrive'].'" 
 ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement =  mysqli_query($conn,$query);

$number_filter_row = mysqli_num_rows($statement);

$statement =  mysqli_query($conn,$query1);

$result =  mysqli_fetch_all($statement);



$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['name'];
 $sub_array[] = $row['pays_depart'];
 $sub_array[] = $row['pays_arrive'];
 $data[] = $sub_array;
}

function count_all_data($conn)
{
 $query = "SELECT * FROM vols";
 $statement = mysqli_query($conn,$query);
 return mysqli_num_rows($statement);
}

$output = array(
 "draw"       =>  intval($_POST["draw"]),
 "recordsTotal"   =>  count_all_data($conn),
 "recordsFiltered"  =>  $number_filter_row,
 "data"       =>  $data
);

echo json_encode($output);

?>