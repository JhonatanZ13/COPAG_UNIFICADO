 <!-- footer content -->
 <?php
    // condicion para que me muestre el pie de pagina cuando se inicie sesion
    if (isset($_SESSION['auth']) && ($_SESSION['auth'] == 'ok')) {
        echo '<footer style="text-align: right;">
        <i style="text-align: left;" class="fa fa-cc"> Licencia Creative Commons - </i>

    Desarrollado por <b>ADSI 2025454</b>
        <img src="images/logo-adsi.jpg" class="mt-n2"  width="40px" alt="logo_sena">
        <img src="images/logo_sena.png" class="mt-n2"  width="40px" alt="logo_sena">
    </footer>';
    }
    ?>
 <!-- /footer content -->

 <!-- jQuery sin comprimir-->
 <script src="vendors/jquery/dist/jquery.js"></script>

 <!-- Bootstrap -->
 <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

 <!-- FastClick -->
 <script src="vendors/fastclick/lib/fastclick.js"></script>

 <!-- NProgress -->
 <script src="vendors/nprogress/nprogress.js"></script>

 <!-- jQuery custom content scroller -->
 <script src="vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

 <!-- DataTables  -->
 <script src="vendors/datatables.net/js/jquery.dataTables.js"></script>
 <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.js"></script>
 <script src="vendors/datatables.net-buttons/js/dataTables.buttons.js"></script>
 <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.js"></script>
 <script src="vendors/datatables.net-buttons/js/buttons.flash.js"></script>
 <script src="vendors/datatables.net-buttons/js/buttons.html5.js"></script>
 <script src="vendors/datatables.net-buttons/js/buttons.print.js"></script>
 <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.js"></script>
 <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.js"></script>
 <script src="vendors/datatables.net-responsive/js/dataTables.responsive.js"></script>
 <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
 <script src="vendors/datatables.net-scroller/js/dataTables.scroller.js"></script>
 <script src="vendors/jszip/dist/jszip.js"></script>
 <script src="vendors/pdfmake/build/pdfmake.js"></script>
 <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

 <!-- Custom Theme Scripts -->
 <script src="build/js/custom.min.js"></script>
 <script src="build/js/global.js"></script>

 <!--- area de produccion produccion ---->

 <!-- Bootstrap Colorpicker -->
 <script src="vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
 
 <!-- iCheck -->
 <script src="vendors/iCheck/icheck.js"></script>
 <script src="build/js/globalProduccion.js"></script>
 
 <!-- Validaciones -->
 <script src="build/js/valida.js"></script>
 <script src="build/js/validaupdate.js"></script>

 <!----- Fin area de produccion -------------->
 
 <!-- validaciones de panel de control -->
 <script src="build/js/panel.js"></script>

  <!-- --- Mantenimiento ------------ -->
 <!-- <script src="vendors/jquery/dist/globalMantenimiento.js"></script> -->

 <!-- Costos -->
 <script src="build/js/costos.js"></script>
 <script src="build/js/compras.js"></script>

 <!----- Inventario -------------->
 <script src="build/js/globalInventario.js"></script>

 <!----- Mantenimiento -------------->
<script src="build/js/validamantoTI.js"></script>
<script src="build/js/validamantoTU.js"></script>
<script src="build/js/validamantoOI.js"></script>

 <!-- inicio sweetalert -->
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>