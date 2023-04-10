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
            <div class="row">
               <div class="col-12 mt-5">
                  <div class="card" style="border: 1px solid; height: 200vh;">
                     <div class="card-body">
                     <button class="btn sub-button pull-right " data-toggle="modal" data-target="#add_officers_modal">Add Officer</button>
                     <h4 class="mb-3">Officers of <?php echo $title; ?> <span class="badge badge-primary count_pending"><?php echo $cso_type ?></span></h4>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="data-tables">
                                 <table id="users_table" style="width:100%" class="text-center mb-3">
                                       <thead class="bg-light text-capitalize">
                                          <tr>
                                             <th>Name</th>  
                                             <th>Position</th> 
                                             <th>Contact Number</th>                                                     
                                             <th>Email Address</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                 </table> 
                           </div>
                           </div>
                           <div class="col-md-6 tree-content" >
                              <div id="tree"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
      
         </div>
      </div>
      <?php echo view('admin/cso/view_officers/modals/add_officer_modal'); ?>   
      <?php echo view('includes/scripts.php') ?> 
      <script src="https://balkan.app/js/OrgChart.js"></script>
      <script>


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
                  //   users_table.ajax.reload();
                  //   inactiveusers_table.ajax.reload();
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
    enableDragDrop: true,    
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
    nodeMenu: {
        details: { text: "Details" },
        edit: { text: "Edit" },
        add: { text: "Add" },
        remove: { text: "Remove" }
    },
    nodeBinding: {
        field_0: "name",
        field_1: "title",
        img_0: "img"
    }
});

chart.load([
    { id: 1, name: "Denny Curtis", title: "CEO", img: "https://cdn.balkan.app/shared/2.jpg" },
    { id: 2, pid: 1, name: "Ashley Barnett", title: "Sales Manager", img: "https://cdn.balkan.app/shared/3.jpg" },
    { id: 3, pid: 2, name: "Caden Ellison", title: "Dev Manager", img: "https://cdn.balkan.app/shared/4.jpg" },
    { id: 4, pid: 3, name: "Elliot Patel", title: "Sales", img: "https://cdn.balkan.app/shared/5.jpg" },
    { id: 5, pid: 4, name: "Lynn Hussain", title: "Sales", img: "https://cdn.balkan.app/shared/6.jpg" },
    { id: 6, pid: 5, name: "Tanner May", title: "Developer", img: "https://cdn.balkan.app/shared/7.jpg" },
    
]);

      </script>
   </body>
</html>