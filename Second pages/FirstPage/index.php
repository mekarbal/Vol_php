<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Vols</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 </head>
 <body>
 
 <nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="#">TMAir</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">About us</a>
      </li>
      
    </ul>
  </div>
</nav>
 

        <!-- slider_area_start -->
        <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-10">
                        <div class="slider_text text-center justify-content-center">
                            <h1 class="jumbotron mt-5">Chercher un vol</h1>
                           
                            <!-- <div class="search_form"> -->
                                <?php
                                $connect = mysqli_connect("localhost", "root", "", "cr");
                                if(isset($_POST['pays_depart'], $_POST['pays_arrive'])){
                                    $searchkey = $_POST['pays_depart'];
                                    $searchkey1 = $_POST['pays_arrive'];
                                    $sql = "SELECT * FROM vols WHERE pays_depart LIKE '%$searchkey%' AND pays_arrive LIKE '%$searchkey1%' ";
                                } else {
                                    $sql = "SELECT * FROM vols";
                                    $searchkey = "";
                                    $searchkey1 = "";
                                }
                                // $sql = "SELECT * FROM vol";
                                $result = mysqli_query($connect, $sql);
                                ?>
                                <form action="" class="mt-5" method="POST">
                                <center>
                                    <div class="row align-items-center">
                                        <div class="col-xl-4 col-md-4 form-group">
                                                <input type="text" class="form-control" value="<?php echo $searchkey; ?>" placeholder="Entrer votre ville de départ" name="pays_depart" id="select1">
                                        </div>
                                        <div class="col-xl-4 col-md-4 form-group">
                                            <input type="text" class="form-control" value="<?php echo $searchkey1; ?>" placeholder="Entrer votre ville d'arrive" name="pays_arrive" id="select2">
                                     </div>
                                        <div class="col-xl-4 col-md-4">
                                            <div class="button_search form-group">
                                                <button class="boxed-btn2 btn btn-primary" id="search">Rechercher</button>
                                            </div>
                                        </div>
                                    </div>
                                    </center>
                                </form>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <div id="table_class" class="container mt-5">
        <table id="data" class="table table-bordered table-striped">
            <form action="page2.php" method="POST"></form>
                <tr>
                    <th width="10%">Numero de vol</th>
                    <th width="10%">Lieu Depart</th>
                    <th width="10%">Lieu Arrive</th>
                    <th width="10%">Date Depart</th>
                    <th width="10%">Prix (DH)</th>
                    <th width="10%">Action</th>
                </tr>
                <?php while($row = mysqli_fetch_object($result)){ ?>
                <tr>
                    <td><?php echo $row->id ?></td>
                    <td><?php echo $row->pays_depart ?></td>
                    <td><?php echo $row->pays_arrive ?></td>
                    <td><?php echo $row->date_vol ?></td>
                    <td><?php echo $row->price ?>DH</td>
                    <td><a href="read_one.php?id=<?php echo $row->id ?> " ><button id="commande" class="btn btn-success">Commander</button><a/></td>
                </tr>
                <?php } ?>
            </form>
        </table>
    </div>

    <footer class="page-footer font-small bg-primary">

<div class="footer-copyright text-center mt-5 py-3 mb-0">© 2020 Copyright:<a href="" class="text-light"> TM Air</a></div>

</footer>
        <!-- link that opens popup -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    

</body>
</html>