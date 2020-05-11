


<!DOCTYPE HTML>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- custom css -->
    <style>
    .m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    .mt0{ margin-top:0; }
    </style>
 
</head>
<body>
 
    
<nav class="navbar navbar-dark bg-primary">
  <a class="navbar-brand">Navbar</a>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>


















    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Tout les vols</h1>
        </div>
     
        <!-- PHP code to read records will be here -->
        
        <?php
                // include database connection
                include '../data/database.php';
            

                // select all data
                $query = "SELECT id, name, price,pays_depart,date_vol,image,nb_place FROM vols WHERE nb_place>0 ORDER BY id DESC";
                $stmt = $con->prepare($query);
                $stmt->execute();
                 
                // this is how to get number of rows returned
                $num = $stmt->rowCount();
                 
                //check if more than 0 record found
                if($num>0){
                 
                    // data from database will be here
                    echo "<table class='table table-hover table-responsive'>";//start table
 
                        //creating our table heading
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>image</th>";
                            echo "<th>Name</th>";
                            echo "<th>price</th>";
                            echo "<th>pays de depart</th>";
                            echo "<th>Date de vol</th>";
                            echo "<th>Nombre de place</th>";
                            echo "<th>Action</th>";
                        echo "</tr>";
     
    // table body will be here

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    // extract row
                    // this will make $row['firstname'] to
                    // just $firstname only
                    extract($row);
                     
                    // creating new table row per record
                    echo "<tr>";
                        echo "<td>{$id}</td>";
                        echo "<td><img src='image/{$image}' style='height:150px;'></td>";
                        echo "<td>{$name}</td>";
                        echo "<td>&#36;{$price}</td>";
                        echo "<td>{$pays_depart}</td>";
                        echo "<td>{$date_vol}</td>";
                        echo "<td>{$nb_place}</td>";
                        echo "<td>";
                            // read one record 
                            echo "<a href='read_one.php?id={$id}' class='btn btn-info m-r-1em'>More infos</a>";
                             
                          
                        echo "</td>";
                    echo "</tr>";
                }
 
// end table
echo "</table>";
                     
                }
                 
                // if no records found
                else{
                    echo "<div class='alert alert-danger'>No records found.</div>";
                }




?>
         
    </div> <!-- end .container -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
<!-- confirm delete record will be here -->
            <script type='text/javascript'>
                    // confirm record deletion
                    function delete_user( id ){
                         
                        var answer = confirm('Are you sure?');
                        if (answer){
                            // if user clicked ok, 
                            // pass the id to delete.php and execute the delete query
                            window.location = 'delete.php?id=' + id;
                        } 
                    }
             </script>
</body>
</html>