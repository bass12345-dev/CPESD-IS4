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
                            <div class="card  animate__animated animate__zoomInDown " style="border: 1px solid;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="header-title"><?php echo $title ?></h4>
                                        </div>
                                        <div class="col-md-6">
                                             <button class="btn  pull-right mb-2 back-up-database sub-button">Back Up Now</button>
                                        </div>
                                        <div class="invoice-table table-responsive mt-5">
                                            <table class="table table-bordered table-hover text-right" id="database_table">
                                                <thead>
                                                    <tr class="text-capitalize">
                                                        <th class="text-center" style="width: 5%;">#</th>
                                                        <th class="text-center" >Databse</th>                                          
                                                        <th  class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
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
<?php echo view('includes/scripts.php') ?>   
<script type="text/javascript">
    
$(document).on('click','button.back-up-database',function (e) {

    $.ajax({
            url: base_url + 'api/back-up-db',
            type: "POST",
            beforeSend: function() {
                $('.back-up-database').text('Please wait...');
                $('.back-up-database').prop("disabled", true);                
            },
            dataType : 'json',
            success: function(data)
            {            
                if (data.response) 
                {

                    $('.back-up-database').prop("disabled", false);    
                    $('.back-up-database').text('Back up Now');
                    
                    Toastify({
                                text: data.message,
                                className: "info",
                                style: {
                                    "background" : "linear-gradient(to right, #00b09b, #96c93d)",
                                    "height" : "60px",
                                    "width" : "350px",
                                    "font-size" : "20px"
                                }
                            }).showToast();
                }
            }
        });
    });

// function fetch_database(){

//      var table = $('#database_table')
//          table.find('tbody').html('')
//           var tr1 = $('<tr>')
//           tr1.html('<th class="py-1 px-2 text-center">Please Wait</th>')
//           table.find('tbody').append(tr1)
//             setTimeout(() => {

//             $.ajax({     
//             url: base_url + 'api/get-database',
//             type: "POST",            
//             dataType: 'json',         
//             error: err => {
//                 console.log(err)
//                 alert("An error occured")
                
              
//             },
//                 success: function(resp) {
//                 tr1.html('')
//                     table.find('tbody').append(tr1)

//                 resp.sort().reverse()    
//                 if (resp.length > 0) {
//                     // If returned json data is not empty
//                     var i = 0;
//                     // looping the returned data
//                     Object.keys(resp).map(k => {
//                         // creating new table row element
//                         var tr = $('<tr>')
//                          i++;
//                             // second column data
//                         tr.append('<td class="text-center">' + i  + '</td>')
//                         tr.append('<td class="text-center">' + resp[k].database + '</td>')
//                             // third column data
//                         tr.append('<td class="py-1 px-2"><ul class="d-flex justify-content-center">\
//                                  <li class="mr-3 "><a href="'+base_url+'uploads/database/'+resp[k].database+'" class="text-secondary action-icon"  id="import"><i class="fa fa-download"></i></a></li>\
//                                 </ul></td>')
                         

//                         // Append table row item to table body
//                         table.find('tbody').append(tr)
//                     });
//                     fetch_database();
//                 } else {
//                     // If returned json data is empty
//                     var tr = $('<tr>')
//                     tr.append('<th class="py-1 px-2 text-center">No data to display</th>')
//                     table.find('tbody').append(tr)
//                 }
              
//             }

//         }) }, 5000)
           

// }
// fetch_database();
</script>
</body>
</html>
