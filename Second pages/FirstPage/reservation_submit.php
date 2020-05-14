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
    <title>Document</title>
</head>
<body>
    <?php
        // info client
        $nom_client = $_POST["nom_client"];
        $prenom_client = $_POST["prenom_client"];
        $cin_client = $_POST["cin_client"];
        $num_pasport = $_POST["num_pasport"];
        $phon_client = $_POST["phon"];
        $email_client = $_POST["email"];
        // info vol
        $id_vol = $_SESSION['id'];

        if(isset($_POST["submit"])){
            $query = "SELECT `nb_place` FROM `vols` WHERE `nb_place`>0 AND `id`='{$id_vol}'";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) >0){
                
                $query0 = "SELECT `id_client` FROM `clients` WHERE `clients`.`cin`='{$cin_client}'";
                $result0 = mysqli_query($conn,$query0);

                if(mysqli_num_rows($result0) >0){
                    
                    while($row0 = mysqli_fetch_assoc($result0)){
                        $id_client_exist = mysqli_real_escape_string($conn,$row0["id_client"]);
                        $_SESSION['last_id_client'] = $id_client_exist;
                    }
                    $query2 = "INSERT INTO `reservations`(`cli_id_client`, `vol_id_vol`) VALUES ({$id_client_exist},{$id_vol})";

                    if(mysqli_query($conn,$query2) && mysqli_affected_rows($conn)>0){

                        $var_sesionn = "  Client Deja Inscrit  +  Enregistrer La Reservation Avec Success";
                        // $query3 = "SELECT `id_reservation` FROM `reservations` WHERE `reservations`.`cli_id_client` = {$id_client_exist} ORDER BY id_reservation DESC LIMIT 1";
                        // $result3 = mysqli_query($conn,$query3);

                        // if(mysqli_num_rows($result3) >0){

                            // while($row3 = mysqli_fetch_assoc($result3)){

                            //     $last_id_reservation = mysqli_real_escape_string($conn,$row3["id_reservation"]);
                            //     $_SESSION['last_id_reservation'] = $last_id_reservation;
                            // }

                            $latest_id_reservation = $conn->insert_id; 
                            $_SESSION['last_id_reservation'] = $latest_id_reservation;

                            $sql2 = "UPDATE `vols` SET `nb_place`=`nb_place`-1 WHERE `id`={$id_vol}";
                            if(mysqli_query($conn,$sql2) && mysqli_affected_rows($conn)>0){
                                $_SESSION['client_existz'] = "  Client Deja Inscrit  +  Enregistrer La Reservation Avec Success + Nombre De Place De Voll Diminue Par 1";
                                $_SESSION['alert'] = 1 ;
                                header('Location:'.'confirmation.php');
                                exit();
                            }else{
                                $_SESSION['client_existz'] = "  Client Deja Inscrit  +  enregistrer la reservation avec success && nombre de place de voll pas Diminue par 1";
                                $_SESSION['alert'] = 2 ;
                                header('Location:'.'confirmation.php');
                                exit();
                            }

                            $_SESSION['client_existz'] = '  Erreur De Recuperation De Vol';
                            $_SESSION['alert'] = 3 ;
                            header('Location:'.'err.php');
                            exit();
                        // }
                    }
                    else{

                        $_SESSION['client_existz'] = "  Client Deja Inscrit  +  Erreur D'enregistrer La Reservation";
                        $_SESSION['alert'] = 3 ;
                        header('Location:'.'err.php');
                        exit();
                    }
                }else{
                    
                    $sql = "INSERT INTO `clients`(`nom_client`, `prenom_client`, `phone`, `email`, `cin`, `n_passport`) VALUES ('{$nom_client}','{$prenom_client}',{$phon_client},'{$email_client}','{$cin_client}','{$num_pasport}')";

                    if(mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){

                        $var_sesionn = '  Client Ajouté Avec Succes';
                        $query1 = "SELECT `id_client` FROM `clients`  WHERE `clients`.`cin`='{$cin_client}' ORDER BY id_client DESC LIMIT 1";
                        $result1 = mysqli_query($conn,$query1);
                        if(mysqli_num_rows($result1) >0){

                            while($row1 = mysqli_fetch_assoc($result1)){

                                $last_id = mysqli_real_escape_string($conn,$row1["id_client"]);
                                $_SESSION['last_id_client'] = $last_id;
                            }
                            $query2 = "INSERT INTO `reservations`(`vol_id_vol`, `cli_id_client`) VALUES ({$id_vol},{$last_id})";
                            $result2 = mysqli_query($conn,$query2);

                            if(mysqli_num_rows($result2) === 0){

                                $var_sesionn = $var_sesionn."  +  Erreur D'enregistrer La Reservation";
                                $_SESSION['client_existz'] = $var_sesionn;
                                $_SESSION['alert'] = 2 ;
                                header('Location:'.'err.php');
                                exit();
                            }
                            else{

                                $query3 = "SELECT reservations.id_reservation FROM reservations,clients WHERE reservations.cli_id_client = clients.id_client AND clients.cin = '{$cin_client}' ORDER BY reservations.`id_reservation` DESC LIMIT 1";
                                $result3 = mysqli_query($conn,$query3);
                                if(mysqli_num_rows($result3) >0){

                                    while($row3 = mysqli_fetch_assoc($result3)){
                                        $last_id_reservation = mysqli_real_escape_string($conn,$row3["id_reservation"]);
                                        $_SESSION['last_id_reservation'] = $last_id_reservation;
                                    }

                                    $sql2 = "UPDATE `vols` SET `nb_place`=`nb_place`-1 WHERE `id`={$id_vol}";
                                    if(mysqli_query($conn,$sql2) && mysqli_affected_rows($conn)>0){
                                        $var_sesionn = $var_sesionn.'  +  Enregistrer La Reservation Avec Success  +  Nombre De Place De Vol Diminue Par 1';
                                        $_SESSION['client_existz'] = $var_sesionn;
                                        $_SESSION['alert'] = 1 ;

                                        header('Location:'.'confirmation.php');
                                        exit();
                                    }else{
                                        $var_sesionn = $var_sesionn.'  +  Enregistrer La Reservation Avec Success  +  Nombre De Place De Vol Pas Diminue Par 1';
                                        $_SESSION['client_existz'] = $var_sesionn;
                                        $_SESSION['alert'] = 2 ;
                                        header('Location:'.'confirmation.php');
                                        exit();
                                    }
                                }else{

                                    $var_sesionn = '  Erreur De Recuperation De Vol';
                                    $_SESSION['client_existz'] = $var_sesionn;
                                    $_SESSION['alert'] = 3 ;
                                    header('Location:'.'err.php');
                                    exit();
                                }
                            }
                        }else{

                            header('Location:'.'read_one.php');
                            exit();
                        }
                    }else{

                        $var_sesionn = "  Erreur D'inscription De Client";
                        $_SESSION['client_existz'] = $var_sesionn;
                        $_SESSION['alert'] = 3 ;
                        header('Location:'.'err.php');
                        exit();
                    }

                }
                
            }else{
                $var_sesionn = '  Lopération à été Arrêté Par Ce Que Le Vol Est Plein';
                $_SESSION['client_existz'] = $var_sesionn;
                $_SESSION['alert'] = 4 ;
                header('Location:'.'err.php');
                exit();

            }
        }
    ?>
    
</body>
</html>