<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pencarian Resep</title>
    <!-- jQuery -->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class='container' style="max-width: 50%;">
        <div class="text-center mt-5 mb-4">
            <h2>Recipe Live Search</h2>
        </div>

        <input type="text" class="form-control" id='live_search' autocomplete="off" placeholder="Search recipe here....">
    </div>

    <div id="searchResult"></div>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#live_search").keyup(function(){
                var input = $(this).val();
                // alert(input);

                if (input != ""){
                    $.ajax({
                        url: "livesearch.php",
                        method: "POST",
                        data: {input: input},

                        success: function(data){
                            $("#searchResult").html(data);
                        }
                    });
                }else{
                    // $("#searchResult").css("display", "none");
                    $.ajax({
                        url: "livesearch.php",
                        method: "POST",
                        data: {input: input},

                        success: function(data){
                            $("#searchResult").html(data);
                        }
                    });
                }
            });
        });    
    </script>
  </body>
</html>