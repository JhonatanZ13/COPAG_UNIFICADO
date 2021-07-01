<?php
        foreach ($tools as $tool){
?>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
        <div class="x_title">
                <h2>Vista general de la Herramienta, <b><?= $tool['Her_nombre']; ?></b> en nuestro sistema COPAG</h2><br><br>
				<p style="color:red;">Recuerde que los campos no se pueden modificar.</p>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <br />
                <form action="" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label for="fullname">Nombre Herramienta</label>
                            <input type="text" id="Her_nombre" class="readonly form-control" value="<?= $tool['Her_nombre']; ?>" required />
                        </div>

                        <div class="form-group has-feedback">
                            <label for="fullname">Tipo de Herramienta</label>
                            <input class="readonly form-control" type="text" value="<?= $tool['Stg_nombre']?>" id="">
                        </div>

                        <div class="form-group has-feedback">
                            <label for="fullname">Descripcion <small>(Maximo 50 caracteres)</small>
                            </label>
                            <textarea style="max-height: 100px; min-height: 100px;" id="Her_descripcion" class="readonly form-control" value="" ><?= $tool['Her_descripcion']; ?></textarea>
                        </div> 
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label for="fullname">Foto Herramienta</label><br>
                            <img class="" src="<?php echo $tool['Her_foto'];?>" id="imagenPrevisualizacion"  style="width: 200px; height: 200px;">
                        </div>
                    </div>

                    <div class="row col-md-12 justify-content-end">
                        <div class="form-group float-right">
                            <a href="<?php echo getUrl("PanelDeControl", "Tool", "consultTools") ?>">
                                <button class="btn btn-danger" type="button">Regresar</button>
                            </a> 
                        </div>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>

<?php   }
    
?>