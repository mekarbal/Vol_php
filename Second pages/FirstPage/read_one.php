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
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->

    <!-- LINK -->

    <!-- Latest compiled and minified Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <!-- LINK -->

    <?php include_once("../data/connectdb.php"); ?>
</head>
<body>
    <!-- container -->
    <div class="container">
        <div class="row">
            <div class="col-md-1 order-md-1"></div>
            <div class="col-md-10 order-md-1">
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
                <table class='table table-hover table-bordered'>
                <!-- <table class='table table-hover table-responsive table-bordered'> -->
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
            </div>
            <div class="col-md-1 order-md-1"></div>
        </div>
 
    </div> 
    <!-- end .container -->

    <hr>

    <!-- START CONTAINER -->

    <div class="container shadow-lg p-3 mt-5 mb-5 bg-white rounded">
        <div class="row mb-5">
            <div class="col-md-1 order-md-1"></div>
            <div class="col-md-10 order-md-1">
                <form class="needs-validation" method='POST' action='reservation_submit.php'>
                    <h2>Information de Client</h2><br> 
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="text">Nom :</label>
                            <input type="text" name="nom_client" class="form-control" id="firstName" placeholder="First name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="text">Prenom :</label>
                            <input type="text" name="prenom_client" class="form-control" id="lastName" placeholder="Last name" required>
                        </div>
                    </div><br>
                    <div class="mb-3">
                        <label for="text">Cin :</label>
                        <input type="text" name="cin_client" class="form-control" id="cin" placeholder="CIN" required>
                    </div><br>
                    <div class="mb-3">
                        <label for="text">Numéro De Passeport :</label>
                        <input type="text" name="num_pasport" class="form-control" id="num_pasport" placeholder="Numéro De Passeport" required>
                    </div><br>
                    <div class="mb-3">
                        <label for="example-tel-input">Telephone :</label>
                        <input type="number" name="phon" class="form-control" id="example-tel-input" placeholder="Telephone" required>
                    </div><br>
                    <div class="mb-3">
                        <label for="text">Email :</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="you@example.com" required>
                    </div><br>
                    <hr class="mb-4">
                    <button class="btn btn-success btn-lg btn-block" type="submit"  name="submit">Reserve</button>
                </form>
            </div>
            <div class="col-md-1 order-md-1">
            </div>
        </div>
    </div>

    <!-- END CONTAINER -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
 
</body>
</html>