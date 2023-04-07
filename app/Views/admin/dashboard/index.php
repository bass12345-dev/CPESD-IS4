<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php echo view('includes/meta.php') ?>
    <?php echo view('includes/css.php') ?> 
</head>

<body>
   
 
    <div class="page-container">       
    <?php echo view('includes/sidebar.php') ?> 
        <div class="main-content">           
            <?php echo view('includes/topbar.php') ?>           
            <?php echo view('includes/breadcrumbs.php') ?> 
                <div class="main-content-inner">
                     <?php echo view('admin/dashboard/sections/count_section'); ?>
                     <?php echo view('admin/dashboard/sections/graph_section'); ?>
                </div>
        </div>
    </div>     
<?php echo view('includes/scripts.php') ?>   
</body>
</html>
