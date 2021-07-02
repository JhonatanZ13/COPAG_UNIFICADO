<?php
    include_once '../lib/helpers.php';
    include_once '../view/partials/header.php'; 
?> 

<body class="login">
    <div class="container">
        <div class="login_wrapper">
            <div class="containerLogin">
                <div class="mt-3">
                    <img class="" src="images/LogonegroSENA.png" width="40%">
                </div>

                <div class="">
                    <h3 class="text-light">Recuperacion de contraseña 
                    <button data-status="2" id="showMore" class=" btn-sm btn-info fa fa-question-circle" style="border: none; outline: none;">
                        </button>
                        </h3>
                </div>

                <div class="text-light">
                    
                </div>

                <div class=" col-md-10 clearfix"></div>

                <form action="<?php echo getUrl("Mail", "Mail", "postToken", false, "ajax"); ?>" class="form-group m-3" method="post">
                    <div class="form-group has-feedbackmt-4">
                        <label class="text-light">Ingresa su numero de identificacion</label>
                        <input class="col-md-12 form-control mb-3" name="Usu_numeroDocumento" type="number"/>
                    </div>

                    <div class="form-group has-feedbackmt-4">
                        <label class="text-light">Ingresa el codigo</label>
                        <input class="col-md-12 form-control mb-3" name="Usu_token" type="text"/>
                    </div>

                    <div class="form-group mt-3">
                        <button id="colorButton" class="btn btn-primary " type="submit">Verificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<?php include_once '../view/partials/footer.php'; ?>
</body>

</html>