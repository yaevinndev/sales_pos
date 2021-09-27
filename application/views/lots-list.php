<!DOCTYPE html>
<html>

<head>
<!-- TABLES CSS CODE -->
<?php include"comman/code_css_datatable.php"; ?>
</head>

<!--=====================================
MODAL SEGMENT LOT
======================================-->

<body class="hold-transition skin-blue sidebar-mini">

  <div id="modalSegmentarlote" class="modal fade" role="dialog">

    <div class="modal-dialog">

     <div class="modal-content">

       <form id="segmentlot" role="form" method="post" enctype="multipart/form-data">

<!--=====================================
  CABEZA DEL MODAL
 ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <buton type="buton" class="close" data-dismiss="modal">&times;</buton>

          <h4 class="modal-title">Segmentar Lote</h4>

        </div>
<!--=====================================
CUERPO DEL MODAL
======================================-->

<div class="modal-body">

   <div class="box-body">

<!-- num_lote NUEVO NUEVO LOTE -->

    <div class="form-group">

        <div class="input-group">

           <span class="input-group-addon">Ingresar nuevo numero lote</span>

           <input type="text" class="form-control input-lg" id="new_num_lote" name="new_num_lote" value="" required>

        </div>

    </div>

 <!-- ENTRADA PARA FECHA DE NUEVO LOTE -->

    <div class="form-group">

       <div class="input-group">

         <span class="input-group-addon">Ingrese nueva fecha del lote</span>

         <input type="date" class="form-control input-lg" id="new_fecha" name="new_fecha" value="" required>

       </div>

     </div>
     

 <!-- ENTRADA PARA CANTIDAD DE NUEVO LOTE -->

      <div class="form-group">

        <div class="input-group">

          <span class="input-group-addon">Ingrese nueva cantidad lote</span>

          <input type="number" class="form-control input-lg" id="new_cant" name="new_cant" value="" required>

        </div>

      </div>

  </div>

</div>

 <!--=====================================
 PIE DEL MODAL
 ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Segmentar lote</button>

        </div>
    
      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDIT LOT
======================================-->

<body class="hold-transition skin-blue sidebar-mini">

<div id="modalEditarlote" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form id="editlot" role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Lote</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

              <div class="modal-body">

                <div class="box-body">

                <!-- EDITAR CANTIDAD NUEVO LOTE -->

                 <div class="form-group">

                    <div class="input-group" >

                      <span class="input-group-addon">Ingrese cantidad del Lote</span>

                      <input type="number" class="form-control input-lg" id="cant_lote" name="cant_lote" value="" required>

                  </div>

                </div>

              </div>

            </div>

 <!--=====================================
 PIE DEL MODAL
 ======================================-->
           
            <div class="modal-footer">

              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

              <button type="submit" class="btn btn-primary">Modificar lote</button>

            </div>

      </form>

    </div>

   </div>

</div> 


<div class="wrapper">

  <!-- Left side column. contains the logo and sidebar -->

  <?php include"sidebar.php"; ?>


  <div class="content-wrapper">
                <!-- Content Header (Page header) -->
        <section class="content-header">
                <h1>
                    <?= $this->lang->line('lots_list') ?>
                    <small>Add/Update Lots</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active"><?= $this->lang->line('lots_list'); ?></li>
                </ol>
        </section>
        <section class="content">
          <div class="row">
            <!-- ********** ALERT MESSAGE START******* -->
              <?php include"comman/code_flashdata.php"; ?>
            <!-- ********** ALERT MESSAGE END******* -->
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"> <?=$this->lang->line('lost_list') ?></h3>
                    <?php if ($CI->permissions('lots_add')){ ?>
                      <div class="box-tools">

                      </div>
                <?php } ?>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="table_lots" class="table table-bordered table-striped" width="100%">
                    <thead class="bg-primary">
                    <tr>
                    <th>#</th>
                    <th><?= $this->lang->line('items'); ?></th>
                    <th><?= $this->lang->line('lots'); ?></th>
                    <th><?= $this->lang->line('expired'); ?></th><!--expired at , vence el-->
                    <th><?= $this->lang->line('days'); ?></th><!--days to , dias a vencer-->
                    <th><?= $this->lang->line('quantity'); ?></th>
                    <th><?= $this->lang->line('status'); ?></th>
                    <th><?= $this->lang->line('action'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        foreach($viewdata as $value){

                           if($value["estado"]==0){
                             $status="<button class='btn btn-success btn-sm'>Activo</button>";
                           }else{
                            $status="<button class='btn btn-danger btn-sm'>Vencido</button>";
                           }
                           $fecha1= new DateTime(date('Y-m-d'));
                           $fecha = $value["fecha_vence"];
                           $f_fecha = new DateTime($fecha);
                           if($f_fecha>$fecha1){
                             $rest = $fecha1->diff($f_fecha);
                             $dias = $rest->days+1;
                           }else{
                             $dias=0;
                           }

                           $accion='<div class="btn-group" title="View Account">
                                      <a class="btn btn-primary btn-o dropdown-toggle acction" lot="'.$value["num_lote"].'" product="'.$value["id_producto"].'" data-toggle="dropdown" href="#">
                                        Action <span class="caret"></span>				
                                      </a>
                                      <ul role"menu" class="dropdown-menu dropdown-light pull-right">';
                                      if($lot_edit)
                                      $accion.='<li>
                                            <a  class="editlot" title="Update lot ?" href="#" data-toggle="modal" data-target="#modalEditarlote">
                                              <i class="fa fa-fw fa-edit text-blue"></i>Edit
                                            </a>
                                            </li>';
                                      if($lot_segment)
                                      $accion.='<li>
                                            <a title="Update segment ?" href="#" data-toggle="modal" data-target="#modalSegmentarlote" >
                                              <i class="fa fa-fw fa-edit text-blue"></i>Segment
                                            </a>
                                            </li>
                                      </ul>
                                    </div>';
                          ?>
                          <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $value["item_name"]; ?></td>
                          <td><?php echo $value["num_lote"]; ?></td>
                          <td><?php echo $value["fecha_vence"]; ?></td>
                          <td><?php echo $dias; ?></td>
                          <td><?php echo $value["cantidad"]; ?></td>
                          <td><?php echo $status; ?></td>
                          <td><?php echo $accion; ?> </td>                            
                          </tr>
                        <?php $i++;} ?>
                      </tbody>
                    </table>

              </div>
            </div>
          </div>
        </section>
  </div>
</div>

<?php include"footer.php"; ?>
<!-- SOUND CODE -->
<?php include"comman/code_js_sound.php"; ?>
<!-- TABLES CODE -->
<?php include"comman/code_js_datatable.php"; ?>
<!-- Lightbox -->
<script src="<?php echo $theme_link; ?>js/items.js"></script>
<script src="<?php echo $theme_link; ?>plugins/lightbox/ekko-lightbox.js"></script>
<script type="text/javascript">
var ajax_url =" <?php echo site_url('items/editlot') ?>";
var base_url ="<?php echo $base_url ?>"+"items/lotsview";
var dir_url = "<?php echo site_url('items/segmentlot') ?>";
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
</script>
<script>
$(".<?php echo basename(__FILE__,0);?>-active-li").addClass("active");

var table = $('#table_lots').DataTable({

   /* FOR EXPORT BUTTONS START*/
dom:'<"row margin-bottom-12"<"col-sm-12"<"pull-left"l><"pull-right"fr><"pull-right margin-left-10 "B>>>tip',
/* dom:'<"row"<"col-sm-12"<"pull-left"B><"pull-right">>> <"row margin-bottom-12"<"col-sm-12"<"pull-left"l><"pull-right"fr>>>tip',*/
   buttons: {
     buttons: [
         {
             className: 'btn bg-red color-palette btn-flat hidden delete_btn pull-left',
             text: 'Delete',
             action: function ( e, dt, node, config ) {
                 multi_delete();
             }
         },
         { extend: 'copy', className: 'btn bg-teal color-palette btn-flat',exportOptions: { columns: [0,1,2,3,4,5,6]} },
         { extend: 'excel', className: 'btn bg-teal color-palette btn-flat',exportOptions: { columns: [0,1,2,3,4,5,6]} },
         { extend: 'pdf', className: 'btn bg-teal color-palette btn-flat',exportOptions: { columns: [0,1,2,3,4,5,6]} },
         { extend: 'print', className: 'btn bg-teal color-palette btn-flat',exportOptions: { columns: [0,1,2,3,4,5,6]} },
         { extend: 'csv', className: 'btn bg-teal color-palette btn-flat',exportOptions: { columns: [0,1,2,3,4,5,6]} },
         { extend: 'colvis', className: 'btn bg-teal color-palette btn-flat',text:'Columns' },

         ]
     },
     /* FOR EXPORT BUTTONS END */

     "processing": false, //Feature control the processing indicator.
     "serverSide": false, //Feature control DataTables' server-side processing mode.
     "order": [], //Initial no order.
     "responsive": true,
     language: {
         processing: '<div class="text-primary bg-primary" style="position: relative;z-index:100;overflow: visible;">Procesando...</div>'
     }

     
 });
 //new $.fn.dataTable.FixedHeader( table );


 // load data de acciones
 $("#editlot").on('submit',function(){
	   event.preventDefault();
     var lot=num_lote;
     callEditlot(lot);
   });

$("#segmentlot").on('submit',function(){
    event.preventDefault();
    var editlot=num_lote;
    var editprod=producto;
    callSegmentlot(editlot,editprod);

});

</script>
</body>
</html>
