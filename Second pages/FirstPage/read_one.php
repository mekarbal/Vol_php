<?php 
    if(!isset($_SESSION)){
        session_start();
    }
?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Vols</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 </head>
 <body>
 
 <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">TM Air</a>
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
            $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
             
            //include database connection
            include '../data/connectdb.php';
             
            // read current record's data
            try {
                // prepare select query
                $query = "SELECT id, name, price,pays_depart,pays_arrive,date_vol,image FROM vols WHERE id = $id";
                $result = mysqli_query($conn,$query);
                if (!$result) {
                    printf("Error: %s\n", mysqli_error($conn));
                    exit();
                }
             
                // store retrieved row to a variable
                $row =mysqli_fetch_array($result);
             
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
                    <div class="col-md-6  text-center hover">
                        <img   src='<?php echo "image/{$image}" ?>' style='height:150px; '>;  
                    </div>
                    <div class="col-md-6">
                    <div class="card-body   text-center border border-primary ">
                        <h5 class="card-title "><i class="fab fa-avianex"></i> Nom : <span class="font-weight-bold text-success"> <?php echo "{$name}" ?><span></h5>
                        <p class="card-text"><i class="fas fa-map-marked"></i> Ville de depart : <span class="text-center "> <?php echo "{$pays_depart}" ?></span></p>
                        <p class="card-text"><i class="fas fa-map-marked"></i> Ville d'arriver : <span class="text-center"> <?php echo "{$pays_arrive}" ?></span></p>
                        <p class="card-text"><i class="fas fa-calendar-alt"></i> Date de Vol :<span class="text-center"><?php echo "{$date_vol}" ?></span></p>
                        <p class="card-text"><i class="fas fa-money-check "></i> Prix: <span class="text-center font-weight-bold text-success"><?php echo "{$price}" ?>Dhs</span></p>
                        <a href='index.php' class='btn btn-danger ml-2'>Annuler le vol</a>
                    </div>
                    </div>
                </div>
            </div>

 
    </div> <!-- end .container -->
    
    <br>

    <div class="container">
        <div class="">
            <center>
                <img src="image/back_img3.jpg" alt="" style="width: 30%;">
            </center>
        </div>
    </div>

    <!-- START CONTAINER -->

    <div class="container shadow-lg p-3 mt-5 mb-5 bg-white rounded">
            <h1 class="text-center mt-5">Veuillez Remplire Vos informations Pour reservez un Vol</h1>
        <div class="row mb-5 mt-5">
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
                        <input type="text" name="cin_client" class="form-control text-uppercase" id="cin" placeholder="CIN" required>
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
                    <button class="btn btn-outline-success btn-lg btn-block" type="submit"  name="submit">Reserve</button>
                </form>
            </div>
            <div class="col-md-1 order-md-1">
            </div>
        </div>
    </div>

    <footer class="page-footer font-small bg-primary">

<div class="footer-copyright text-center mt-5 py-3 mb-0">© 2020 Copyright:<a href="" class="text-light"> TM Air</a></div>

</footer>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
 
</body>
</html>