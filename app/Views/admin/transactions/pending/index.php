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
                    <table class="table table-hover progress-table text-center">
<thead class="text-uppercase">
<tr>
<th scope="col">ID</th>
 <th scope="col">task</th>
<th scope="col">Deadline</th>
<th scope="col">Progress</th>
<th scope="col">status</th>
<th scope="col">action</th>
</tr>
</thead>
<tbody>
<tr>
<th scope="row">1</th>
<td>Mark</td>
<td>09 / 07 / 2018</td>
<td>
<div class="progress" style="height: 8px;">
<div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</td>
<td><span class="status-p bg-primary">pending</span></td>
<td>
<ul class="d-flex justify-content-center">
<li class="mr-3"><a href="#" class="text-secondary"><i class="fa fa-edit"></i></a></li>
<li><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
</ul>
</td>
</tr>
<tr>
<th scope="row">2</th>
<td>Mark</td>
<td>09 / 07 / 2018</td>
<td>
<div class="progress" style="height: 8px;">
<div class="progress-bar bg-warning" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</td>
<td><span class="status-p bg-warning">pending</span></td>
<td>
<ul class="d-flex justify-content-center">
<li class="mr-3"><a href="#" class="text-secondary"><i class="fa fa-edit"></i></a></li>
<li><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
</ul>
</td>
</tr>
<tr>
<th scope="row">3</th>
<td>Mark</td>
<td>09 / 07 / 2018</td>
<td>
<div class="progress" style="height: 8px;">
<div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
 </div>
</td>
<td><span class="status-p bg-success">complate</span></td>
<td>
<ul class="d-flex justify-content-center">
<li class="mr-3"><a href="#" class="text-secondary"><i class="fa fa-edit"></i></a></li>
<li><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
</ul>
</td>
</tr>
<tr>
<th scope="row">4</th>
<td>Mark</td>
<td>09 / 07 / 2018</td>
<td>
<div class="progress" style="height: 8px;">
<div class="progress-bar bg-warning" role="progressbar" style="width: 85%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</td>
<td><span class="status-p bg-warning">panding</span></td>
<td>
<div class="btn-group">
<button type="button" class="btn btn-rounded btn-success">Action</button>
<button type="button" class="btn btn-rounded btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="sr-only">Toggle Dropdown</span>
</button>
<div class="dropdown-menu">
<a class="dropdown-item" href="#">Action</a>
<a class="dropdown-item" href="#">Another action</a>
<a class="dropdown-item" href="#">Something else here</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Separated link</a>
</div>
 </div>
</td>
</tr>
</tbody>
</table>
                </div>
        </div>
    </div>     
<?php echo view('includes/scripts.php') ?>  

</body>
</html>
