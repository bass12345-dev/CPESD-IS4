<!doctype html>
<html class="no-js" lang="en">
   <head>
      <?php echo view('includes/meta.php') ?>
      <?php echo view('includes/css.php') ?> 

   </head>
   <body>
      <div class="page-container sbar_collapsed">
         <div class="main-content">
            <?php echo view('user/transactions/pending/add_section/sections/add_transactions_pending_topbar'); ?>
            <?php echo view('user/transactions/pending/add_section/sections/add_transactions_pending_breadcrumbs'); ?>
            <div class="main-content-inner">
               <section class="wizard-section" style="background-color: #fff;">
                  <div class="row no-gutters">
                     <?php echo view('user/transactions/pending/add_section/sections/transactions_table'); ?>
                     <?php echo view('user/transactions/pending/add_section/sections/add_form'); ?>
                  </div>
               </section>
            </div>
         </div>
      <?php echo view('user/transactions/pending/add_section/modals/select_under_type_of_activity_modal') ?> 
      <?php echo view('includes/scripts.php') ?> 
      <script>
jQuery(document).ready(function() {
    // click on next button
    jQuery('.form-wizard-next-btn').click(function() {
        var parentFieldset = jQuery(this).parents('.wizard-fieldset');
        var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        var next = jQuery(this);
        var nextWizardStep = true;
        parentFieldset.find('.wizard-required').each(function(){
            var thisValue = jQuery(this).val();

            console.log(thisValue)

            if( thisValue == "") {
                jQuery(this).siblings(".wizard-form-error").slideDown();
                nextWizardStep = false;
            }
            else {
                jQuery(this).siblings(".wizard-form-error").slideUp();
            }
        });
        if( nextWizardStep) {
            next.parents('.wizard-fieldset').removeClass("show","400");
            currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',"400");
            next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show","400");


           


            jQuery(document).find('.wizard-fieldset').each(function(){
                if(jQuery(this).hasClass('show')){
                    var formAtrr = jQuery(this).attr('data-tab-content');
                    jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
                        if(jQuery(this).attr('data-attr') == formAtrr){
                            jQuery(this).addClass('active');
                            var innerWidth = jQuery(this).innerWidth();
                            var position = jQuery(this).position();
                            jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});





                        }else{
                            jQuery(this).removeClass('active');
                        }
                    });
                }
            });
        }
    });
    //click on previous button
    jQuery('.form-wizard-previous-btn').click(function() {
        var counter = parseInt(jQuery(".wizard-counter").text());;
        var prev =jQuery(this);
        var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        prev.parents('.wizard-fieldset').removeClass("show","400");
        prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show","400");
        currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',"400");
        jQuery(document).find('.wizard-fieldset').each(function(){
            if(jQuery(this).hasClass('show')){
                var formAtrr = jQuery(this).attr('data-tab-content');
                jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
                    if(jQuery(this).attr('data-attr') == formAtrr){
                        jQuery(this).addClass('active');
                        var innerWidth = jQuery(this).innerWidth();
                        var position = jQuery(this).position();
                        jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
                    }else{
                        jQuery(this).removeClass('active');
                    }
                });
            }
        });
    });
    //click on form submit button
    jQuery(document).on("click",".form-wizard .form-wizard-submit" , function(){
        var parentFieldset = jQuery(this).parents('.wizard-fieldset');
        var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        parentFieldset.find('.wizard-required').each(function() {
            var thisValue = jQuery(this).val();
            if( thisValue == "" ) {
                jQuery(this).siblings(".wizard-form-error").slideDown();
            }
            else {
                jQuery(this).siblings(".wizard-form-error").slideUp();
            }
        });
    });
    // focus on input field check empty or not
    jQuery(".form-control").on('focus', function(){
        var tmpThis = jQuery(this).val();
        if(tmpThis == '' ) {
            jQuery(this).parent().addClass("focus-input");
        }
        else if(tmpThis !='' ){
            jQuery(this).parent().addClass("focus-input");
        }
    }).on('blur', function(){
        var tmpThis = jQuery(this).val();
        if(tmpThis == '' ) {
            jQuery(this).parent().removeClass("focus-input");
            jQuery(this).siblings('.wizard-form-error').slideDown("3000");
        }
        else if(tmpThis !='' ){
            jQuery(this).parent().addClass("focus-input");
            jQuery(this).siblings('.wizard-form-error').slideUp("3000");
        }
    });
});



$('#id_0').datetimepicker({
            "allowInputToggle": true,
            "showClose": true,
            "showClear": true,
            "showTodayButton": true,
            "format": "YYYY/MM/DD hh:mm:ss A",
        });


         $('#id_1').datetimepicker({
            "allowInputToggle": true,
            "showClose": true,
            "showClear": true,
            "showTodayButton": true,
            "format": "YYYY/MM/DD hh:mm:ss A",
        });

          $('#id_2').datetimepicker({
            "allowInputToggle": true,
            "showClose": true,
            "showClear": true,
            "showTodayButton": true,
            "format": "YYYY/MM/DD hh:mm:ss A",
        });


function get_last_pmas_number(){

      $.ajax({
            url: base_url + 'api/get-last-pmas-number',
            type : 'POST',
            dataType : 'text',
            success: function(result) { 
               $('input[name=pmas_number]').val(parseInt(result) );
            }
         });
}
get_last_pmas_number();


$(document).on('change','select#type_of_activity_select',function (e) {
    var id = $('#type_of_activity_select').find('option:selected').val();

    if(!id){
       alert('Please Select Type Of Activity');
    }else {
       

        $.ajax({
            // JSON FILE URL
            url: base_url + 'api/get_under_type_of_activity',
            data : {id : id},
            type : 'POST',
            // Type of Return Data
            dataType: 'json',
            // Error Function
            error: err => {
                console.log(err)
                alert("An error occured")
               
              
            },
            // Succes Function
            success: function(result) {
                $('#select_under_activity_modal').modal('show');
                var $dropdown = $("#select_under_type");
                var option = '';
                if(result.length){
                        for (let i = 0; i < result.length; i++) {
                           
                            option +=   result[i].under_type_act_name
                            

                            
                        }

                        $("#select_under_type").html(option);
                }
                // $.each(result, function() {
                //     $dropdown.append($("<option />").val(this.nder_type_act_id).text(this.under_type_act_name));
                // });
            }
        })
        

    
    
    
        
    }

})


      </script>
   </body>
</html>