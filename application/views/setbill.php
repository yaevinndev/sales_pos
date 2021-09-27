<html>
   <head>
      <!-- TABLES CSS CODE -->
      <?php include"comman/code_css_form.php"; ?>
      <!-- </copy> -->
   </head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include"sidebar.php"; ?>
      <div class="content-wrapper">
        <section class="content-header">
           <h1>
              <?= $page_title; ?>
              <small>Set bill correlative</small>
           </h1>
           <ol class="breadcrumb">
              <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo $base_url; ?>users/view"><?= $this->lang->line('master'); ?></a></li>
              <li class="active"><?= $page_title; ?></li>
           </ol>
        </section>
        <section class="content">
          <div class="row">
            <?php include"comman/code_flashdata.php"; ?>


              <div class="col-md-12">
                <div class="box box-info ">
                    <?= form_open('#', array('class' => 'form-horizontal', 'id' => 'set-bill', 'enctype'=>'multipart/form-data', 'method'=>'POST'));?>
                    <input type="hidden" id="base_url" value="<?php echo $base_url; ?>">
                      <div class="box-body">
                        <div style="margin-top:50px;" class="row ">
                          <div class="col-md-4">
                            <div class="form-group">
                               <label for="new_user" class="col-sm-4 control-label"><?= $this->lang->line('prev'); ?><label class="text-danger">*</label></label>
                               <div class="col-sm-8">
                                  <input type="text" class="form-control input-sm" id="prev" name="prev" placeholder="Inicio de Correlativo" onkeyup="shift_cursor(event,'mobile')" value="<?php print $prefijo; ?>" <?=$disabled;?> autofocus>
                                  <span  class="text-muted"></span>
                               </div>
                            </div>
                            <div class="form-group">
                               <label for="new_user" class="col-sm-4 control-label"><?= $this->lang->line('from'); ?><label class="text-danger">*</label></label>
                               <div class="col-sm-8">
                                  <input type="number" class="form-control input-sm" id="start" name="start" placeholder="Inicio de Correlativo" onkeyup="shift_cursor(event,'mobile')" value="<?php print $inicio; ?>" <?=$disabled;?> >
                                  <span  class="text-muted"></span>
                               </div>
                            </div>
                            <div class="form-group">
                               <label for="new_user" class="col-sm-4 control-label"><?= $this->lang->line('to'); ?><label class="text-danger">*</label></label>
                               <div class="col-sm-8">
                                  <input type="number" class="form-control input-sm" id="end" name="end" placeholder="Fin del correlativo" onkeyup="shift_cursor(event,'mobile')" value="<?php print $final; ?>" <?=$disabled;?> >
                                  <span  class="text-muted"></span>
                               </div>
                            </div>
                            <div class="form-group">
                               <label for="new_user" class="col-sm-4 control-label">Numero de resolucion<label class="text-danger">*</label></label>
                               <div class="col-sm-8">
                                  <input type="text" class="form-control input-sm" id="resolucion" name="resolucion" placeholder="Fin del correlativo" onkeyup="shift_cursor(event,'mobile')" value="<?php print $resolucion; ?>" <?=$disabled;?> >
                                  <span  class="text-muted"></span>
                               </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="box-footer">
                        <div class="col-sm-8 col-sm-offset-2 text-center">
                           <!-- <div class="col-sm-4"></div> -->
                           <div class="col-md-3 col-md-offset-3">
                              <button type="button" id="send_bill" class=" btn btn-block btn-success btn-sm" title="Save Data">Enviar</button>
                           </div>

                        </div>
                     </div>
                    <?= form_close(); ?>
                </div>
              </div>
          </div>
        </section>
      </div>


    </div>
    <?php include"footer.php"; ?>
   <!-- SOUND CODE -->
   <?php include"comman/code_js_sound.php"; ?>
   <!-- GENERAL CODE -->
   <?php include"comman/code_js_form.php"; ?>

   <script src="<?php echo $theme_link; ?>js/modals.js"></script>
     <!-- Add the sidebar's background. This div must be placed
          immediately after the control sidebar -->
     <div class="control-sidebar-bg"></div>
   </div>
   <!-- ./wrapper -->

         <script src="<?php echo $theme_link; ?>js/sales.js"></script>
</body>
</html>
