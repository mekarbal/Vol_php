<?php 
    if(!isset($_SESSION)){
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../data/connectdb.php"); ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body onload="window.print()">
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row pb-5 p-5">
                            <div class="col-md-6">
                                <h3 class="font-weight-bold mb-4"><strong>Information de client</strong></h3>
                                <?php
                                    // info client
                                    $id_client_select = (int)$_SESSION['last_id_client'];
                                    $query0 = "SELECT * FROM `clients` WHERE `clients`.`id_client`='{$id_client_select}'";
                                    $result0 = mysqli_query($conn,$query0);
                                    if(mysqli_num_rows($result0) >0){
                                        echo "<tr>";
                                        while($row0 = mysqli_fetch_assoc($result0)){
                                            echo "  <p class='mb-1'><strong>ID Client :</strong>".$row0['id_client']."</p>";
                                            echo "  <p class='mb-1'><strong>Nom:</strong>".$row0['nom_client']."</p>";
                                            echo "  <p class='mb-1'><strong>Prenom:</strong>".$row0['prenom_client']."</p>";
                                            echo "  <p class='mb-1'><strong>CIN :</strong>".$row0['cin']."</p>";
                                            echo "  <p class='mb-1'><strong>NumDe Pasport:</strong>".$row0['n_passport']."</p>";
                                            echo "  <p class='mb-1'><strong>phone:</strong>".$row0['phone']."</p>";
                                            echo "  <p class='mb-1'><strong>email :</strong>".$row0['email']."</p>";
                                        }
                                    }
                                ?>
                            </div>
                            <div class="col-md-6 text-right">
                                <h3 class="font-weight-bold mb-4"><strong>Information de Reservation</strong></h3>
                                <?php
                                    // info reservation
                                    $last_id_reservation = (int)$_SESSION['last_id_reservation'];
                                    $query1 = "SELECT * FROM `reservations` WHERE `reservations`.`id_reservation`={$last_id_reservation}";
                                    $result1 = mysqli_query($conn,$query1);
                                    if(mysqli_num_rows($result1) >0){
                                        echo "<tr>";
                                        while($row1 = mysqli_fetch_assoc($result1)){
                                            echo "  <p class='mb-1'><strong>ID Reservation:</strong>".$row1['id_reservation']."</p>";
                                            echo "  <p class='mb-1'><strong>DATE RESERVATION :</strong>".$row1['date_reservation']."</p>";
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="row  p-5 pb-0">
                            <div class="col-md-6">
                                <h3 class="font-weight-bold mb-0"><strong>Information de Vol</strong></h3>
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse bg-white text-white p-4">
                            <div class="py-3 px-5">
                                <div class="py-3 px-5">
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">champs</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // info vol
                                        $id_vol = (int)$_SESSION['id'];
                                        $query2 = "SELECT * FROM `vols` WHERE `vols`.`id`={$id_vol}";
                                        $result2 = mysqli_query($conn,$query2);
                                        if(mysqli_num_rows($result2) >0){
                                            while($row2 = mysqli_fetch_assoc($result2)){
                                                echo "<tr><td><strong>ID :</strong></td><td>".$row2['id']."</td></tr>";
                                                echo "<tr><td><strong>NOM VOL :</strong></td><td>".$row2['name']."</td></tr>";
                                                echo "<tr><td><strong>price :</strong></td><td>".$row2['price']."</td></tr>";
                                                echo "<tr><td><strong>image :</strong></td><td>".$row2['image']."</td></tr>";
                                                echo "<tr><td><strong>created :</strong></td><td>".$row2['created']."</td></tr>";
                                                echo "<tr><td><strong>pays_depart :</strong></td><td>".$row2['pays_depart']."</td></tr>";
                                                echo "<tr><td><strong>pays_arrive :</strong></td><td>".$row2['pays_arrive']."</td></tr>";
                                                echo "<tr><td><strong>date_vol :</strong></td><td>".$row2['date_vol']."</td></tr>";
                                                echo "<tr><td><strong>hour_vol :</strong></td><td>".$row2['hour_vol']."</td></tr>";
                                                echo "<tr><td><strong>minute_vol :</strong></td><td>".$row2['minute_vol']."</td></tr>";
                                                echo "<tr><td><strong>nb_place :</strong></td><td>".$row2['nb_place']."</td></tr>";
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div class="py-3 px-5">
                                <div class="py-3 px-5">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                            <div class="px-5">
                                <div class="px-5">
                                    <div class="px-5">
                                    </div>
                                </div>
                            </div>
                            <div class="px-5">
                                <div class="px-5">
                                    <div class="px-5">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-light mt-5 mb-5 text-center small">by : <a class="text-light" target="_blank" href="http://totoprayogo.com">totoprayogo.com</a></div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>