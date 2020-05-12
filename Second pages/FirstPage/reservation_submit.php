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

                        $var_sesionn = "client deja exist &&  insert reservation avec succes";
                        $query3 = "SELECT `id_reservation` FROM `reservations` WHERE `reservations`.`cli_id_client` = {$id_client_exist} ORDER BY id_reservation DESC LIMIT 1";
                        $result3 = mysqli_query($conn,$query3);

                        if(mysqli_num_rows($result3) >0){

                            while($row3 = mysqli_fetch_assoc($result3)){

                                $last_id_reservation = mysqli_real_escape_string($conn,$row3["id_reservation"]);
                                $_SESSION['last_id_reservation'] = $last_id_reservation;
                            }

                            $sql2 = "UPDATE `vols` SET `nb_place`=`nb_place`-1 WHERE `id`={$id_vol}";
                            if(mysqli_query($conn,$sql2) && mysqli_affected_rows($conn)>0){
                                $_SESSION['client_existz'] = "client deja exist &&  insert reservation avec succes && update num place -1";
                                header('Location:'.'confirmation.php');
                                exit();
                            }else{
                                $_SESSION['client_existz'] = "client deja exist &&  insert reservation avec succes && not num place -1";
                                header('Location:'.'confirmation.php');
                                exit();
                            }

                            $_SESSION['client_existz'] = 'errur de recuperation de vol';
                            header('Location:'.'err.php');
                            exit();
                        }
                    }
                    else{

                        $_SESSION['client_existz'] = "client deja exist && erur insert reservation";
                        header('Location:'.'err.php');
                        exit();
                    }
                }else{
                    
                    $sql = "INSERT INTO `clients`(`nom_client`, `prenom_client`, `phone`, `email`, `cin`, `n_passport`) VALUES ('{$nom_client}','{$prenom_client}',{$phon_client},'{$email_client}','{$cin_client}','{$num_pasport}')";

                    if(mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){

                        $var_sesionn = 'create cliect';
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

                                $var_sesionn = $var_sesionn.' + not create vol';
                                $_SESSION['client_existz'] = $var_sesionn;
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
                                        $var_sesionn = $var_sesionn.' + create vollll + update num place';
                                        $_SESSION['client_existz'] = $var_sesionn;

                                        header('Location:'.'confirmation.php');
                                        exit();
                                    }else{
                                        $var_sesionn = $var_sesionn.' + create vollll + not update num place';
                                        $_SESSION['client_existz'] = $var_sesionn;

                                        header('Location:'.'confirmation.php');
                                        exit();
                                    }
                                }else{

                                    $var_sesionn = 'errur de recuperation de vol';
                                    $_SESSION['client_existz'] = $var_sesionn;
                                    header('Location:'.'err.php');
                                    exit();
                                }
                            }
                        }else{

                            header('Location:'.'read_one.php');
                            exit();
                        }
                    }else{

                        $var_sesionn = 'not create cliect';
                        $_SESSION['client_existz'] = $var_sesionn;
                        header('Location:'.'err.php');
                        exit();
                    }

                }
                
            }else{
                $var_sesionn = 'not create any theng becuse voll is full';
                $_SESSION['client_existz'] = $var_sesionn;
                header('Location:'.'err.php');
                exit();

            }
        }
    ?>
    
</body>
</html>