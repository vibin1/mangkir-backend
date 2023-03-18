<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Insert Data</title>
    <!-- jQuery -->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
  </head>
  <body>
    <form method="post" action="index.php">
        <input type="text" id= "email" placeholder="Email..."><br>
        <input type="password" id = "password" placeholder="Password..."><br>
        <input type="button" value="Login" id="login">

        <p id="response"></p>
    </form>
    <script type="text/javascript">
        // wait document to be ready after that it will execute this code below
        $(document).ready(function () {
            // this code
            console.log('page ready');
            $("#login").on('click', function () {
                var email = $("#email").val();
                var password = $("#password").val();

                if (email == "" || password == ""){
                    alert("Harap lengkapi form yang diberikan");
                }
                else{
                    $.ajax(
                        {
                            url: 'login.php',
                            method: "POST",
                            data: {
                                login: 1,
                                emailPHP: email,
                                passwordPHP: password 
                            },
                            success: function(response){
                                $("#response").html(response);
                                if (response.indexOf('success') >= 0)
                                    window.location = 'next.php';
                            },
                            dataType: 'text'
                        }
                    );
                }
            });
        });
    </script>
  </body>
</html>