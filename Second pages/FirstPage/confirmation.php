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
<body>
    <?php
    
        echo "<br>";
        echo $_SESSION['client_existz'];

        echo "<br>";
        echo "<br>";
    ?>
    <a href="index.php">Back to eservation</a>
    <br><br>
    <hr>

    <div class="container">

        <?php
            echo "<table class='table'>
                <thead class='thead-dark'>
                    <tr>
                        <th scope='col'>clol</th>
                        <th scope='col'>Tout Les Information</th>
                    </tr>
                </thead>
                <tbody>";

                    // info vol
                    $id_vol = (int)$_SESSION['id'];
                    $query2 = "SELECT * FROM `vols` WHERE `vols`.`id`={$id_vol}";
                    $result2 = mysqli_query($conn,$query2);
                    if(mysqli_num_rows($result2) >0){
                        echo "<tr>";
                        while($row2 = mysqli_fetch_assoc($result2)){
                            echo "<td><strong><h3>information VOL</h3></strong></td>";
                            echo "<td>
                                    <strong>ID :</strong>".$row2['id']."<br>
                                    <strong>NOM VOL :</strong>".$row2['name']."<br>
                                    <strong>price :</strong>".$row2['price']."<br>
                                    <strong>image :</strong>".$row2['image']."<br>
                                    <strong>created :</strong>".$row2['created']."<br>
                                    <strong>pays_depart :</strong>".$row2['pays_depart']."<br>
                                    <strong>pays_arrive :</strong>".$row2['pays_arrive']."<br>
                                    <strong>date_vol :</strong>".$row2['date_vol']."<br>
                                    <strong>hour_vol :</strong>".$row2['hour_vol']."<br>
                                    <strong>minute_vol :</strong>".$row2['minute_vol']."<br>
                                    <strong>nb_place :</strong>".$row2['nb_place']."<br>
                                </td>";
                        }
                        echo "</tr>";
                    }
                    
                    // info client
                    $id_client_select = (int)$_SESSION['last_id_client'];
                    $query0 = "SELECT * FROM `clients` WHERE `clients`.`id_client`='{$id_client_select}'";
                    $result0 = mysqli_query($conn,$query0);
                    if(mysqli_num_rows($result0) >0){
                        echo "<tr>";
                        while($row0 = mysqli_fetch_assoc($result0)){
                            echo "<td><strong><h3>information client</h3></strong></td>";
                            echo "<td>
                                    <strong>ID :</strong>".$row0['id_client']."<br>
                                    <strong>Nom:</strong>".$row0['nom_client']."<br>
                                    <strong>Prenom:</strong>".$row0['prenom_client']."<br>
                                    <strong>CIN :</strong>".$row0['cin']."<br>
                                    <strong>NumDe Pasport:</strong>".$row0['n_passport']."<br>
                                    <strong>phone:</strong>".$row0['phone']."<br>
                                    <strong>email :</strong>".$row0['email']."<br>
                                </td>"; 
                        }
                        echo "</tr>";
                    }

                    // info reservation
                    $last_id_reservation = (int)$_SESSION['last_id_reservation'];
                    $query1 = "SELECT * FROM `reservations` WHERE `reservations`.`id_reservation`={$last_id_reservation}";
                    $result1 = mysqli_query($conn,$query1);
                    if(mysqli_num_rows($result1) >0){
                        echo "<tr>";
                        while($row1 = mysqli_fetch_assoc($result1)){
                            echo "<td><strong><h3>information reservation</h3></strong></td>";
                            echo "<td>
                                    <strong>ID :</strong>".$row1['id_reservation']."<br>
                                    <strong>DATE RESERVATION :</strong>".$row1['date_reservation']."<br>
                                    <strong>ID CLIENT :</strong>".$row1['cli_id_client']."<br>
                                    <strong>ID VOL :</strong>".$row1['vol_id_vol']."<br>
                                </td>";
                        }
                        echo "</tr>";
                    }
                echo "</tbody>
            </table>";
        ?>
        
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>