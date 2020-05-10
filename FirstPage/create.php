<?php
if($_POST){
 
    // include database connection
    include '../data/database.php';
 
    try{
     
        
 
        // posted values
        $name=htmlspecialchars(strip_tags($_POST['name']));
        $price=htmlspecialchars(strip_tags($_POST['price']));
        $pays_depart=htmlspecialchars(strip_tags($_POST['pays_depart']));
        $pays_arrive=htmlspecialchars(strip_tags($_POST['pays_arrive']));
        $date_vol=htmlspecialchars(strip_tags($_POST['date_vol']));
        $hour_vol=htmlspecialchars(strip_tags($_POST['hour_vol']));
        $minute_vol=htmlspecialchars(strip_tags($_POST['minute_vol']));
        $nb_place=htmlspecialchars(strip_tags($_POST['nb_place']));
        $folder ="image/"; 
        $image = $_FILES['image']['name']; 

        $path = $folder . $image ; 

        $target_file=$folder.basename($_FILES["image"]["name"]);


        $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);


        $allowed=array('jpeg','png' ,'jpg'); 
        
        $filename=$_FILES['image']['name']; 

        $ext=pathinfo($filename, PATHINFO_EXTENSION); 
        if(!in_array($ext,$allowed) ) 

        { 

        echo "Sorry, only JPG, JPEG, PNG  files are allowed.";

        }

        else{ 

        move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); 


        // insert query
        $query = "INSERT INTO products(name,price,image,pays_depart,pays_arrive,date_vol,hour_vol,minute_vol,nb_place) VALUES (:name,:price,:image,:pays_depart,:pays_arrive,:date_vol,:hour_vol,:minute_vol,:nb_place)";
 
        // prepare query for execution
        $stmt = $con->prepare($query);
        // bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':pays_depart', $pays_depart);
        $stmt->bindParam(':pays_arrive', $pays_arrive);
        $stmt->bindParam(':date_vol', $date_vol);
        $stmt->bindParam(':hour_vol', $hour_vol);
        $stmt->bindParam(':minute_vol', $minute_vol);
        $stmt->bindParam(':nb_place', $nb_place);
        $stmt->bindParam(':image', $image);
         
        // specify when this record was inserted to the database
        $created=date('Y-m-d H:i:s');
        $stmt->bindParam(':created', $created);
        $stmt->execute();
        // Execute the query
        // if(){
        //     echo "<div class='alert alert-success'>Record was saved.</div>";
        // }else{
        //     echo "<div class='alert alert-danger'>Unable to save record.</div>";
        // }
    }
    }
     
    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Create a Record </title>
      
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
          
</head>
<body>
  
    <!-- container -->
    <div class="container">
   
        <div class="page-header">
            <h1>Create Product</h1>
        </div>
      
    <!-- html form to create product will be here -->
          
    </div> <!-- end .container -->
    <!-- PHP insert code will be here -->
 
<!-- html form here where the product information will be entered -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>

        <tr>
            <td>Price</td>
            <td><input type='number' name='price' class='form-control' /></td>
        </tr>
        <tr>
            <td>image</td>
            <td><input type='file' name='image' class='form-control' /></td>
        </tr>
        <tr>
            <td>Pays de depart</td>
            <td><input type='text' name='pays_depart' class='form-control' /></td>
        </tr>
        <tr>
            <td>pays d'arriver</td>
            <td><input type='text' name='pays_arrive' class='form-control' /></td>
        </tr>
        <tr>
            <td>Date de vol</td>
            <td><input type='date' name='date_vol' class='form-control' /></td>
        </tr>
        <tr>
            <td>Heure de vol</td>
            <td><input type='number' name='hour_vol' class='form-control' /></td>
        </tr>
        <tr>
            <td>Minute de vol</td>
            <td><input type='number' name='minute_vol' class='form-control' /></td>
        </tr>
        <tr>
            <td>Nombre de place</td>
            <td><input type='number' name='nb_place' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='index.php' class='btn btn-danger'>Back to read products</a>
            </td>
        </tr>
    </table>
</form>

      
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>