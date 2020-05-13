<?php 
    if(!isset($_SESSION)){
        session_start();
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Read One Vol</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    
    <?php include_once("../data/connectdb.php"); ?>
</head>
<body>
 
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Read Product</h1>
        </div>
         
        <!-- PHP read one record will be here -->
         <?php
            // get passed parameter value, in this case, the record ID
            // isset() is a PHP function used to verify if a value is there or not
            $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
            $_SESSION['id'] = $id;
            //include database connection
            include '../data/database.php';
             
            // read current record's data
            try {
                // prepare select query
                $query = "SELECT id, name, price,pays_depart,date_vol,image FROM vols WHERE id = ? LIMIT 0,1";
                $stmt = $con->prepare( $query );
             
                // this is the first question mark
                $stmt->bindParam(1, $id);
             
                // execute our query
                $stmt->execute();
             
                // store retrieved row to a variable
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
             
                // values to fill up our form
                $name = $row['name'];
                $date_vol=$row['date_vol'];
                $pays_depart = $row['pays_depart'];
                $price = $row['price'];
                $image=$row['image'];
            }
             
            // show error
            catch(PDOException $exception){
                die('ERROR: ' . $exception->getMessage());
            }
        ?>
 
        <!-- HTML read one record table will be here -->
            <table class='table table-hover table-responsive table-bordered'>
            <tr>
                    <td>Image</td>
                    <td><?php echo "<img src='image/{$image}' style='height:150px;'>; " ?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?php echo htmlspecialchars($name, ENT_QUOTES);  ?></td>
                </tr>
                <tr>
                    <td>date_vol</td>
                    <td><?php echo htmlspecialchars($date_vol, ENT_QUOTES);  ?></td>
                </tr>
                <tr>
                    <td>depart</td>
                    <td><?php echo htmlspecialchars($pays_depart, ENT_QUOTES);  ?></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><?php echo htmlspecialchars($price, ENT_QUOTES);  ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <a href='index.php' class='btn btn-danger'>Back to read products</a>
                    </td>
                </tr>
            </table>
 
    </div> <!-- end .container -->







    <hr>
    <!-- start sesion 2 -->

    <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <!-- 1 of 3 -->
                </div>
                <div class="col-sm-6">
                    <!-- start form -->

                    <form method='POST' action='reservation_submit.php'>
                        <h2>Information de Client</h2>
                        <div class="form-group">
                            <label for="text">Nom Client:</label>
                            <input type="text" name="nom_client" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            
                        </div>
                        <div class="form-group">
                            <label for="text">Prenom Client :</label>
                            <input type="text" name="prenom_client" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            
                        </div>
                        <div class="form-group">
                            <label for="text">Cin :</label>
                            <input type="text" name="cin_client" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="text">Num De Pasport :</label>
                            <input type="text" name="num_pasport" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="text">Pone :</label>
                            <input type="text" name="phon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            
                        </div>
                        <div class="form-group">
                            <label for="text">Email :</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            
                        </div>
                        <hr>
                        <hr>
                        <center><button type="submit" name="submit" class="btn btn-primary">Reserve</button></center>
                    </form>

                    <!-- rnd form -->
                </div>
                <div class="col-sm-3">
                    <!-- 3 of 3 -->
                </div>
            </div>
        </div>

    <!-- end sesion 2 -->






     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>