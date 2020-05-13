<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Vols</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 </head>
 <body>
 
 <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand">TM Air</a>
        <form class="navbar-form " role="search">
            <input type="text" name="search_text" id="search_text" placeholder="Chercher Un Vol" class="form-control" />   
        </form>
    </nav>
 
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1 style="text-align:center;" class="mt-5 jumbotron">Toutes Les informations sur le Vol </h1>
        </div>
         
        <!-- PHP read one record will be here -->
         <?php
            // get passed parameter value, in this case, the record ID
            // isset() is a PHP function used to verify if a value is there or not
            $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
             
            //include database connection
            include '../data/database.php';
             
            // read current record's data
            try {
                // prepare select query
                $query = "SELECT id, name, price,pays_depart,pays_arrive,date_vol,image FROM vols WHERE id = ? LIMIT 0,1";
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
                $pays_arrive=$row['pays_arrive'];
                
            }
             
            // show error
            catch(PDOException $exception){
                die('ERROR: ' . $exception->getMessage());
            }
        ?>
 
       
            <div class="card mb-3" >
                <div class="row no-gutters">
                    <div class="col-md-6 text-center hover">
                        <img  src='<?php echo "image/{$image}" ?>' style='height:150px; '>;  
                    </div>
                    <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title">Nom :<span class="font-weight-bold text-success"> <?php echo "{$name}" ?><span></h5>
                        <p class="card-text">Ville de depart : <span class="text-center "> <?php echo "{$pays_depart}" ?></span></p>
                        <p class="card-text">Ville d'arriver : <span class="text-center"> <?php echo "{$pays_arrive}" ?></span></p>
                        <p class="card-text">Date de Vol : <span class="text-center"><?php echo "{$date_vol}" ?></span></p>
                        <p class="card-text">Prix : <span class="text-center font-weight-bold text-success"><?php echo "{$price}" ?> Dhs</span></p>
                        <a href='index.php' class='btn btn-danger'>Annuler le vol</a>
                    </div>
                    </div>
                </div>
            </div>

 
    </div> <!-- end .container -->
    

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>