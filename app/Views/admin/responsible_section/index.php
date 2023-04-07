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
                    <?php echo view('admin/responsible_section/sections/responsible_section_table'); ?> 
                </div>
        </div>
    </div>     
<?php echo view('includes/scripts.php') ?>   
<script type="text/javascript">
    

     var responsible_section_table = $('#responsible_section_table').DataTable({


           "ajax" : {
                        "url": base_url + 'api/get-responsible',
                        "type" : "POST",
                        "dataSrc": "",
            },
             'columns': [
            {
                // data: "song_title",
                data: null,
                render: function (data, type, row) {
                    return '<span href="javascript:;"   data-id="'+data['responsible_section_id']+'"  style="color: #000;" class="table-font-size" >'+data['responsible_section_name']+'</span>';
                }

            },
            {
                // data: "song_title",
                data: null,
                render: function (data, type, row) {
                    return '<ul class="d-flex justify-content-center">\
                                <li class="mr-3 "><a href="javascript:;" class="text-secondary action-icon" data-id="'+data['responsible_section_id']+'" data-name="'+data['responsible_section_name']+'" id="update-responsible"><i class="fa fa-edit"></i></a></li>\
                                <li><a href="javascript:;" data-id="'+data['responsible_section_id']+'"  id="delete-responsible"  class="text-danger action-icon"><i class="ti-trash"></i></a></li>\
                                </ul>';
                }

            },
          ]

    })




      $('#add_responsible_section_form').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
            type: "POST",
            url: base_url + 'api/add-responsible',
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function() {
                $('.btn-add-responsible').text('Please wait...');
                $('.btn-add-responsible').attr('disabled','disabled');
            },
             success: function(data)
            {            
                if (data.response) {
                    $('#add_responsible_section_form')[0].reset();
                    $('.btn-add-responsible').text('Submit');
                    $('.btn-add-responsible').removeAttr('disabled');
                    $('.alert').html(' <div class="alert-dismiss mt-2">\
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">\
                                                            <strong>'+data.message+'.\
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>\
                                                            </button>\
                                                            </div>\
                                                    </div>');
                    
                    setTimeout(function() { 
                        $('.alert').html('')
                    }, 3000);
                    responsible_section_table.ajax.reload();
                }else {
                    $('.btn-add-responsible').text('Submit');
                   $('.btn-add-responsible').removeAttr('disabled');
                     $('.alert').html(' <div class="alert-dismiss mt-2">\
                                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                                                            <strong>'+data.message+'.\
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>\
                                                            </button>\
                                                            </div>\
                                                    </div>');
                }
           },
            error: function(xhr) { // if error occured
                alert("Error occured.please try again");
                $('.btn-add-responsible').text('Submit');
                 $('.btn-add-responsible').removeAttr('disabled');
            },


        });

    });
</script>
</body>
</html>
