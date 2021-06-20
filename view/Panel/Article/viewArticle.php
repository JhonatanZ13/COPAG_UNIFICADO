<?php
    foreach ($articulo as $arti){
?>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Vista general del Articulo, <b><?php echo $arti['Arti_nombre']?></b> en nuestro sistema COPAG</h2><br><br>
				<p style="color:red;">Recuerde que los campos no se pueden modificar.</p>
                <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
                <br />
                <form action="<?php echo getUrl("PanelDeControl","Articulo","consultArticles")?>" enctype="multipart/form-data" method="post" data-parsley-validate class="form-horizontal form-label-left">

                    <input type="hidden" name="Arti_id" value="<?php echo $arti['Arti_id']; ?>">
                    <input type="hidden" name="imagenVieja" value="<?php echo $arti['Arti_imagen']; ?>">

                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label for="fullname">Nombre del Articulo</label>
                            <input type="text" id="fullname" class="form-control" value="<?php echo $arti['Arti_nombre']?>" name="Arti_nombre" readonly/>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="fullname">Tipo de Articulo</label>
                            <select name="Tart_id" class="form-control" readonly>
                                <option value=<?php echo $arti['Tart_id']?>><?php echo $arti['Tart_descripcion']?></option>
                            </select>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="fullname">Medida</label>
                            <div class="item form-group">
                                <input value=<?php echo $arti['Arti_medida']?> type="text" class="form-control" name="Arti_medida" readonly/>
                                <select name="Med_id" class="form-control" readonly>
                                    <option value=<?php echo $arti['Med_id']?>><?php echo $arti['Med_descripcion']?></option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <div class="form-group has-feedback">
                                <label for="fullname">Descripcion</label>
                                <textarea style="max-height: 100px; min-height: 100px;" class="form-control" name="Arti_descripcion" disabled><?php echo $arti['Arti_descripcion']?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label for="fullname">Imagen</label><br>
                            <img src="<?php echo $arti['Arti_imagen'];?>" id="imagenPrevisualizacion"  style="width: 200px; height: 200px;" readonly>
                        </div>
                    </div>

                    <div class="row col-12 justify-content-end">
                        <div class="form-group text-center">
                            <a href="<?php echo getUrl("PanelDeControl","Article","consultArticles")?>">
                                <button class="btn btn-danger" type="button">Regresar</button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    }
?> 