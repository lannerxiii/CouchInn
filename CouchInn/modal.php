<div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
  <div class="cd-user-modal-container"> <!-- this is the container wrapper -->
    <ul class="cd-switcher">
      <li><a href="#0">Iniciar Sesion</a></li>
      <li><a href="#0">Crear Cuenta</a></li>
    </ul>

    <script src="js/validaciones.js"></script>
    <div id="cd-login"> <!-- log in form -->
      <form class="cd-form" onsubmit="return validacion_formulario()" method="post" action="./login_usuario.php">
        <p class="fieldset">
          <label class="image-replace cd-email" for="signin-email">E-mail</label>
          <input class="full-width has-padding has-border" required id="signin-email" name="User" type="email" placeholder="ejemplo@ejemplo.com">

        </p>

        <p class="fieldset">
          <label class="image-replace cd-password" for="signin-password">Contraseña</label>
          <input class="full-width has-padding has-border" required id="signin-password" name="Pass" type="password"  placeholder="Contraseña">
          <a href="#0" class="hide-password">Mostrar</a>

        </p>


        <p class="fieldset">
          <input class="full-width" type="submit" value="Login" onclick="validacion_formulario()">
        </p>

      </form>

      <p class="cd-form-bottom-message"><a href="#0">¿Olvidaste tu Contraseña?</a></p>
      <!-- <a href="#0" class="cd-close-form">Close</a> -->
    </div> <!-- cd-login -->

    <form class="cd-form" onsubmit="return valFormularioAlta()" name="myForm" method="POST"  action="./alta_usuario.php">
      <div id="cd-signup"> <!-- sign up form -->
        <p class="fieldset">
          <label class="image-replace cd-username"  for="signup-username">Nombre y Apellido</label>
          <input class="full-width has-padding has-border" required name="apnom" id="signup-username" type="text" placeholder="Nombre Apellido">
        </p>

        <p class="fieldset">
          <label class="image-replace cd-email"  for="signup-email">E-mail</label>
          <input class="full-width has-padding has-border" required name="email" id="signup-email" type="email" placeholder="E-mail">

        </p>
        <p class="fieldset">
          <label class="image-replace cd-email"  for="signup-username">Telefono</label>
          <input class="full-width has-padding has-border " required name="telefono" id="telefon" type="tel" placeholder="Telefono">
        </p>

        <p class="fieldset">
          <label class="image-replace cd-password"  for="signup-password">Contraseña</label>
          <input class="full-width has-padding has-border" required name="contraseña" id="signup-password" type="password"  placeholder="Contraseña">

        </p>
        <p class="fieldset">
          <label class="image-replace cd-email"for="signup-username">Nacionalidad</label>
          <input class="full-width has-padding has-border" required name="nacionalidad" id="signup-email" type="text" placeholder="Nacionalidad">
        </p>
      </p>
      <p class="fieldset">
        <label class="image-replace cd-email" for="signup-email">Fecha de Nacimiento</label>
        <input type="text" class="full-width has-padding has-border readonly"  required  name="fecha" id="datepicker" placeholder="Fecha de Nacimiento" max="00/00/1998" min="00/00/0000" aria-describedby="helpBlock-fNac" >
        <script>
            $(".readonly").keydown(function(e){
                e.preventDefault();
            });
        </script>
      </p>

      <p class="fieldset">
        <input type="radio" name="sex" required value="H" /> Hombre
        <input type="radio" name="sex" value="M" /> Mujer
      </p>
      <p class="fieldset">
        <input class="full-width has-padding" type="submit" name="submit" value="Crear Cuenta">
      </p>
    </form>

    <!-- <a href="#0" class="cd-close-form">Close</a> -->
  </div> <!-- cd-signup -->

  <div id="cd-reset-password"> <!-- reset password form -->
    <p class="cd-form-message">¿Olvidaste la contraseña? ¡No te preocupes! Escribenos tu mail y te la enviaremos.</p>

    <form class="cd-form"  name="recForm" method="POST"  action="./recuperar_contrasena.php">
      <p class="fieldset">
        <label class="image-replace cd-email" for="reset-email">E-mail</label>
        <input class="full-width has-padding has-border" name="email" id="reset-email" type="email" placeholder="E-mail">
        <span class="cd-error-message">Error message here!</span>
      </p>

      <p class="fieldset">
        <input class="full-width has-padding" type="submit" value="¡Resetear!">
      </p>
    </form>

    <p class="cd-form-bottom-message"><a href="#0">Volver al Login</a></p>
  </div> <!-- cd-reset-password -->
  <a href="#0" class="cd-close-form">Cerrar</a>
</div> <!-- cd-user-modal-container -->
</div> <!-- cd-user-modal -->


<script src="./js/jquery.min.js"></script>
<script src="js/main.js"></script> <!-- Gem jQuery -->

<link rel="stylesheet" href="./js/jquery-ui.css">
<script src="./js/jquery-1.10.2.js"></script>

<script src="./js/jquery-ui.js"></script>
<script src="js/validaciones.js"></script>
