<?php
include_once '../lib/helpers.php';
//esta condicion es para que no nos deje volver al login cuando ya iniciamos sesion
if (isset($_SESSION['auth']) && ($_SESSION['auth'] == 'ok')) {
    redirect('index.php');
}
?>

<!DOCTYPE html>
<html lang="es">

<?php include_once '../view/partials/header.php'; ?>

<body class="login">
    <div class="container">
        <div class="login_wrapper">
            <div class="containerLogin">
                <div class="mt-3">
                    <img class="" src="images/Logo negro SENA.png" width="40%">
                </div>

                <div class="">
                    <h3 class="text-light">Sistema COPAG</h3>
                </div>

                <div class=" col-md-10 clearfix"></div>
                <form action="<?php echo getUrl("Access", "Access", "login", false, "ajax"); ?>" class="form-group m-3" method="post">
                    <div class="form-group has-feedbackmt-4">
                        <label class="text-light">Ingresa tu usuario</label>
                        <input class="col-md-12 form-control" name="Usu_email" type="text" class="form-control" placeholder="Email" />
                    </div>

                    <div class="form-group has-feedback">
                        <label class="text-light">Ingresa tu contrase&nacute;a</label>
                        <input class="col-md-12 form-control mb-3" name="Usu_password" type="password" class="form-control" placeholder="Contrase&nacute;a" />
                    </div>

                    <div>
                        <a class="text-light" href="<?php echo getUrl("Mail", "Mail", "getMail", false, "ajax"); ?>">¿Olvidaste tu contraseña?</a>
                    </div>

                    <div class="form-group mt-3">
                        <button id="colorButton" class="btn btn-primary " type="submit">Iniciar sesion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once '../view/partials/footer.php'; ?>

</body>

</html>