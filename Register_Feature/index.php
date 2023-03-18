<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Insert Data</title>
    <!-- jQuery -->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
  </head>
  <style media="screen">
    label{
      display: block;
    }
  </style>
  <body>
    <form id="myForm" action="" method="post" autocomplete="off">
      <label for="">Name</label>
      <input type="text" name="name" required value="">
      <label for="">Email</label>
      <input type="email" name="email" required value="">
      <label for="">password</label>
      <input type="password" name="pwd" required value="">
      <br> <br>
      <button type="submit" name="button" onclick = "insert();">Submit</button>
    </form>
    <script type="text/javascript">
      // Prevent form from submit or refresh
      var form = document.getElementById("myForm");
      function handleForm(event) { event.preventDefault(); }
      form.addEventListener('submit', handleForm);
      // Function
      function insert(){
        $(document).ready(function(){

          // Make an array of languages to insert multiple checkbox values of languages
          var languages = [];
          $("input[name=languages]").each(function(){
            if($(this).is(":checked")){
              languages.push($(this).val());
            }
          });
          $.ajax({
            // Action
            url: 'function.php',
            // Method
            type: 'POST',
            data: {
              // Get value
              name: $("input[name=name]").val(),
              email: $("input[name=email]").val(),
              pwd: $("input[name=pwd]").val(),
              action: "insert"
            },
            success:function(response){
              // Response is the output of action file
              if(response == 1){
                alert("Data Added Successfully!");
              }
              else if(response == 2){
                alert("Email Is Not Available");
              }
              else{
                console.log(response)
              }
            }
          });
        });
      }
    </script>
  </body>
</html>
