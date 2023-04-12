<!doctype html>
<html class="no-js" lang="en">
   <head>
      <?php echo view('includes/meta.php') ?>
      <?php echo view('includes/css.php') ?> 
      <style>
         /*CSS*/
               .tree-content {
                  margin: 0px;
                  padding: 0px;
                  width: 100%;
                  height: 180vh;
                  font-family: Helvetica;
                  overflow: hidden;
               }

               #tree {
                  width: 100%;
                  height: 180vh;
               }

               #exTab1 .tab-content {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

#exTab2 h3 {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

/* remove border radius for the tab */

#exTab1 .nav-pills > li > a {
  border-radius: 0;
}

/* change border radius for the tab , apply corners on top*/

#exTab3 .nav-pills > li > a {
  border-radius: 4px 4px 0 0 ;
}

#exTab3 .tab-content {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}


      </style>
   </head>
   <body>
      <div class="page-container sbar_collapsed">
         <div class="main-content">
            <?php echo view('admin/cso/view/sections/cso_topbar'); ?>
            <?php echo view('admin/cso/view/sections/cso_breadcrumbs'); ?>
            <div class="main-content-inner">
            <div class="row">
               <div class="col-12 mt-5">
                  <div class="card" style="border: 1px solid; height: 200vh;">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <?php echo view('admin/cso/view/sections/cso_tabs'); ?>
                                 <div class="tab-content clearfix mt-3">
			                           <div class="tab-pane active" id="1a">
                                       <?php echo view('admin/cso/view/sections/cso_information'); ?>  
				                        </div>
				                        <div class="tab-pane" id="2a">
                                       <?php echo view('admin/cso/view/sections/cso_officers'); ?>  
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
      <?php echo view('admin/cso/view/modals/update_cso_information'); ?> 
      <?php echo view('admin/cso/view_officers/modals/add_officer_modal'); ?>   
      <?php echo view('includes/scripts.php') ?> 
      <script src="https://balkan.app/js/OrgChart.js"></script>
      <script>




$(document).on('click','a#update-cso-information',function (e) {

const id = $(this).data('id');
$('#update_cso_information_modal').modal('show');
$('input[name=cso_idd]').val(id);
});




$('#add_officer_form').on('submit', function(e) {
    e.preventDefault();

         $.ajax({
            type: "POST",
            url: base_url + 'api/add-officer',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            dataType: 'json',
            beforeSend: function() {
                $('.btn-add').text('Please wait...');
                $('.btn-add').attr('disabled','disabled');
            },
             success: function(data)
            {            
                if (data.response) {
                    $('#add_officer_form')[0].reset();
                    $('.btn-add').text('Submit');
                    $('.btn-add').removeAttr('disabled');
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
                            $('#officers_table').DataTable().destroy();
                            load_organization_chart();
                           
                }else {
                    $('.btn-add').text('Submit');
                    $('.btn-add').removeAttr('disabled');
                    Toastify({
                                text: data.message,
                                className: "info",
                                style: {
                                    "background" : "#e01c0d",
                                    "height" : "60px",
                                    "width" : "350px",
                                    "font-size" : "20px"
                                }
                            }).showToast();
                }
           },
            error: function(xhr) { // if error occured
                    alert("Error occured.please try again");
                    $('.btn-add').text('Submit');
                    $('.btn-add').removeAttr('disabled');
            },


        });

      });


    



var chart = new OrgChart(document.getElementById("tree"), {
    enableSearch: false,
    enableDragDrop: false, 
    lazyLoading: true, 
    mouseScrool: OrgChart.none,
    menu : {
         pdf : {
            text : 'Export Pdf'
         },
         png: { text: "Export PNG" },
            svg: { text: "Export SVG" },
            csv: { text: "Export CSV" },
            json: { text: "Export JSON" }
         
    },
    tags: {
        "assistant": {
            template: "ula"
        }
    },
   //  mode: "dark",
    anim: {func: OrgChart.anim.outBack, duration: 500},
    
    nodeBinding: {
        field_0: "name",
        field_1: "title",
        img_0: "img"
    }
});

function load_organization_chart(){

   $.ajax({
            url: base_url + 'api/get-officers      ',
            type: "POST",
            data : {cso_id :"<?php echo $_GET['id'] ?>"},
            dataType: "json",
            success: function(data) {

               chart.load(data);

               $('#officers_table').DataTable({
              
               "ordering" : false,
               "data": data,
               "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                                        "<'row'<'col-sm-12'tr>>" +
                                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        buttons: [
                                  {
                                     extend: 'excel',
                                     text: 'Excel',
                                     className: 'btn btn-default ',
                                     exportOptions: {
                                        columns: 'th:not(:last-child)'
                                     }
                                  },
                                   {
                                     extend: 'pdf',
                                     text: 'pdf',
                                     className: 'btn btn-default',
                                     exportOptions: {
                                        columns: 'th:not(:last-child)'
                                     }
                                  },

                                {
                                     extend: 'print',
                                     text: 'print',
                                     className: 'btn btn-default',
                                     exportOptions: {
                                        columns: 'th:not(:last-child)'
                                     }
                                  },    

                        ],
               'columns': [
                  {
                     // data: "song_title",
                     data: null,
                     render: function (data, type, row) {
                        return row.name;
                     }

                  },
                  {
                     // data: "song_title",
                     data: null,
                     render: function (data, type, row) {
                           return row.title;
                     }

                  },
                  {
                     // data: "song_title",
                     data: null,
                     render: function (data, type, row) {
                           return row.contact_number;
                     }

                  },
                  {
                     // data: "song_title",
                     data: null,
                     render: function (data, type, row) {
                           return row.email_address;
                     }

                  },
                  {
             // data: "song_title",
             data: null,
             render: function (data, type, row) {
                 return '<ul class="d-flex justify-content-center">\
                             <li class="mr-3 ">\
                             <a href="javascript:;" class="text-secondary action-icon" \
                             data-id="'+data['cso_officer_id']+'"  \
                             id="update-cso-officer"><i class="fa fa-edit"></i></a></li>\
                             </ul>';
             }

         },
]

})

            }


   })

// chart.load([
//     { id: 1, name: "Denny Curtis", title: "CEO", img: "https://cdn.balkan.app/shared/2.jpg" },
//     { id: 2, pid: 1, name: "Ashley Barnett", title: "Sales Manager", img: "https://cdn.balkan.app/shared/3.jpg" },
//     { id: 3, pid: 2, name: "Caden Ellison", title: "Dev Manager", img: "https://cdn.balkan.app/shared/4.jpg" },
//     { id: 4, pid: 3, name: "Elliot Patel", title: "Sales", img: "https://cdn.balkan.app/shared/5.jpg" },
//     { id: 5, pid: 4, name: "Lynn Hussain", title: "Sales", img: "https://cdn.balkan.app/shared/6.jpg" },
//     { id: 6, pid: 5, name: "Tanner May", title: "Developer", img: "https://cdn.balkan.app/shared/7.jpg" },
    
// ]);
}

function get_cso_information(){

          $.ajax({
                            type: "POST",
                            url: base_url + 'api/get-cso-infomation',
                            data : {'id' : '<?php echo $_GET['id'] ?>'},
                            cache: false,
                            dataType: 'json',  
                            success: function(data){
                               $('.cso_code').text(data.cso_code)
                                $('.cso_name').text(data.cso_name)
                                $('.cso_address').text(data.address)
                                $('.contact_person').text(data.contact_person)
                                $('.contact_number').text(data.contact_number)
                                $('.telephone_number').text(data.telephone_number)
                                $('.email').text(data.email)
                                $('.classification').html('<span class="status-p sub-button">'+data.type_of_cso+'<span>')
                                $('.cso_status').html(data.cso_status)
                                $('#update-cso-information').data('id',data.cso_id);
                              //   $('#update-cso').data('name',data.data.cso_name);
                              //   $('#update-cso').data('address',data.data.address);
                              //   $('#update-cso').data('contact-person',data.data.contact_person);
                              //   $('#update-cso').data('contact-number',data.data.contact_number);
                              //   $('#update-cso').data('email',data.data.email);


                              //   $('#view_cor').data('id',data.data.cor);
                              //   $('#view_bylaws').data('id',data.data.by_laws);
                              //   $('#view_article').data('id',data.data.article);


                              //   $('#update_cor').data('id',data.data.cso_id);
                              //   $('#update_cor').data('cor_name',data.data.cor);

                              //   $('#update_bylaws').data('id',data.data.cso_id);
                              //   $('#update_bylaws').data('bylaws_name',data.data.by_laws);
                               
                              //   $('#update_article').data('id',data.data.cso_id);
                              //   $('#update_article').data('article_name',data.data.article);






                                       
                            }

                    })

                }


get_cso_information();
load_organization_chart();



      </script>
   </body>
</html>