  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script type="text/javascript">
      
      $(".toggle_forms").click(function(){

        //alert("hi");
        $("#signup_form").toggle();
        $("#login_form").toggle();

      });


      //alerta si el contenido del area de texto del diario ha cambiado.
      $('#diario').bind('input propertychange', function() {

        //alert("cambio");

        $.ajax({
          method: "POST",
          url: "updatedatabase.php",
          data: { content: $('#diario').val() }
        });

      });


    </script>
  </body>
</html>