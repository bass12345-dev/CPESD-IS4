<!doctype html>
<html class="no-js" lang="en">
   <head>
      <?php echo view('includes/meta.php') ?>
      <?php echo view('includes/css.php') ?> 
   </head>
   <body>
      <div class="page-container sbar_collapsed">
         <div class="main-content">
            <div class="header-area">
               <div class="row align-items-center">
                  <!-- nav and search button -->
                  <div class="col-md-6 col-sm-8 clearfix">
                     <span style="font-size:23px;">
                     <a href="<?php echo base_url() ?>admin/cso" style="color: #000;">
                     <i class="fa fa-arrow-left"></i>
                     </a>
                     </span>
                  </div>
                  <!-- profile info & task notification -->
                  <?php echo view('includes/logout'); ?>
               </div>
            </div>
            <div class="page-title-area">
               <div class="row align-items-center">
                  <div class="col-sm-6">
                     <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left"><?php echo $title ?></h4>
                        <ul class="breadcrumbs pull-left">
                           <li><a href="<?php echo base_url() ?>">Home</a></li>
                           <li><a href="<?php echo base_url() ?>admin/cso">CSO</a></li>
                           <li><a href="">View Officers</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="main-content-inner">
            </div>
         </div>
      </div>
       
      <?php echo view('includes/scripts.php') ?> 
   </body>
</html>