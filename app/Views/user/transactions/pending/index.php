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
                    <div class="row">
                        <div class="col-12 mt-5">
                            <div class="card " style="border: 1px solid;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="row">
                                                <div class="col-md-12"> 
                                                    <a href="javascript:;" class="btn  mb-3 mt-2 sub-button pull-right" id="add_transactions" > Add Transactions</a>   
                                                    <a href="javascript:;" class="btn  mb-3 mt-2 sub-button pull-right mr-2" id="reload_pending" > Reload <i class="ti-loop"></i></a>
                                                </div>
                                            </div>
                                            <div class="data-tables">
                                                <table id="pending_transactions_table" style="width:100%" class="text-center stripe">
                                                    <thead class="bg-light text-capitalize">
                                                        <tr>
                                                            <th>PMAS NO</th>
                                                            <th>Date & Time Filed</th>
                                                            <th>Responsible Section</th>
                                                            <th>Type of Activity</th>
                                                            <th>Responsibility Center</th>
                                                            <th>Date And Time</th>
                                                            <th>Person Responsible</th>
                                                             <th></th>
                                                            <th>Actions</th>  
                                                        </tr>
                                                    </thead> 
                                                </table>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>     
<?php echo view('includes/scripts.php') ?>  
<script>
       $(document).on('click','a#add_transactions',function (e) {

        window.open( base_url + 'user/pending-transactions/add-transaction','_blank');

        })
</script> 
</body>
</html>
