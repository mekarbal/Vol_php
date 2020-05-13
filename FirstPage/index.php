<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Vols</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 </head>
 <body>
 

    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand ">TM Air</a>
        <form class="navbar-form " role="search">
            <input type="text" name="search_text" id="search_text" placeholder="Chercher Un Vol" class="form-control" />   
        </form>
    </nav>

  <div class="container">
  
   <h2 class="text-center mt-5 jumbotron">All flights</h2><br />
   
 </div>    
   <div id="result" style="display: flex;flex-direction:row;flex-wrap: wrap; margin: auto; justify-content: space-evenly;width: 63%;"></div>


<footer class="page-footer font-small bg-primary">

  <div class="footer-copyright text-center mt-5 py-3">© 2020 Copyright:<a href="" class="text-light"> TM Air</a></div>

</footer>



   <script>
        $(document).ready(function(){

            load_data();

            function load_data(query){
                $.ajax({
                    url:"fetch.php",
                    method:"POST",
                    data:{query:query},
                    success:function(data)
                    {
                        $('#result').html(data);
                    }
                });
            }
                $('#search_text').keyup(function(){
                var search = $(this).val();
            if(search != '')
                {
                load_data(search);
                }
                else
                {
                load_data();
                }
                });
        });
</script>










<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 </body>
</html>


