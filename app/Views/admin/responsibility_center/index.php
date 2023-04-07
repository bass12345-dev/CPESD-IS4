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
                    <?php echo view('admin/responsibility_center/sections/responsibility_center_table'); ?> 
                </div>
        </div>
    </div>     
<?php echo view('includes/scripts.php') ?> 
<script type="text/javascript">

var res_center_table = $('#responsibility_table').DataTable({
            responsive: false,
            "ajax" : {
                        "url": base_url + 'api/get-responsiblity',
                        "type" : "POST",
                        "dataSrc": "",
            },
            'columns': [
             {
                // data: "song_title",
                data: null,
                render: function (data, type, row) {
                    return '<span href="javascript:;"   data-id="'+data['responsibility_center_id']+'"  style="color: #000;" >'+data['responsibility_center_code']+'</span>';
                }

            },
             {
                // data: "song_title",
                data: null,
                render: function (data, type, row) {
                    return '<a href="javascript:;"  class="a"  data-id="'+data['responsibility_center_id']+'" data-code="'+data['responsibility_center_code']+'"  style="color: #000;"  >'+data['responsibility_center_name']+'</a>';
                }

            },
            {
                // data: "song_title",
                data: null,
                render: function (data, type, row) {
                    return '<ul class="d-flex justify-content-center">\
                                <li class="mr-3 "><a href="javascript:;" class="text-secondary action-icon" data-id="'+data['responsibility_center_id']+'" data-name="'+data['responsibility_center_name']+'" data-code="'+data['responsibility_center_code']+'" id="update-center"><i class="fa fa-edit"></i></a></li>\
                                <li><a href="javascript:;" data-id="'+data['responsibility_center_id']+'"  id="delete-center"  class="text-danger action-icon"><i class="ti-trash"></i></a></li>\
                                </ul>';
                }

            },
          ]
        });    


$('#add_responsibility_center_form').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
            type: "POST",
            url: base_url + 'api/add-responsibility',
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function() {
                $('.btn-add-center').text('Please wait...');
                $('button[type="submit"]').attr('disabled','disabled');
            },
            success: function(data)
            {            
                if (data.response) {
                    $('#add_responsibility_center_form')[0].reset();
                    $('.btn-add-center').text('Submit');
                    $('button[type="submit"]').removeAttr('disabled');
                     $('.alert').html(' <div class="alert-dismiss mt-2">\
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">\
                                                            <strong>'+data.message+'.\
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>\
                                                            </button>\
                                                            </div>\
                                                    </div>');
                      
                    res_center_table.ajax.reload();

                     setTimeout(function() { 
                        $('.alert').html('')
                    }, 5000);


                }else {
                    $('.btn-add-center').text('Submit');
                     $('button[type="submit"]').removeAttr('disabled');
                     $('.alert').html(' <div class="alert-dismiss mt-2">\
                                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                                                            <strong>'+data.message+'.\
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>\
                                                            </button>\
                                                            </div>\
                                                    </div>');
                      setTimeout(function() { 
                        $('.alert').html('')
                    }, 5000);

                }
           },
            error: function(xhr) { // if error occured
                alert("Error occured.please try again");
                 $('button[type="submit"]').removeAttr('disabled');
                $('.btn-add-center').text('Submit');
                $('button[type="submit"]').attr('disabled','disabled');
            },
       });



    });
</script>  
</body>
</html>
