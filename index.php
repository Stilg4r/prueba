<?php include 'header.php';?>

    <main class="form-signin">
      <form data-bind="submit: doSubmit" >
        <h1 class="h3 mb-3 fw-normal">Ingrese sus datos</h1>
        <div class="form-floating">
          <input data-bind="value: username" type="text" class="form-control" id="floatingInput" placeholder="User name: Bret">
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Contraceña">
          <label for="floatingPassword">Contraceña</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
      </form>

<?php include 'foother.php';?>

<script type="text/javascript">
      function login() {
        var self = this;
        self.username = ko.observable("Bret");

        self.doSubmit = function () {
          $.ajax({
            url: "login.php",
            type: 'POST',
            data: {username: self.username()},
            statusCode:{
              200: function(response) {
                window.location.href = "users.php";
              },
            }
          }).fail(function() {
             alert( "No tiene acceso o ocurrio un error" );
          });
        }
      }
      jQuery(document).ready(function($) {
        ko.applyBindings(new login());
      });

</script>

  </body>
</html>