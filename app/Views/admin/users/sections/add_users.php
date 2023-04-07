<div class="col-md-6">
   <div class="card">
      <h4 class="header-title">Add User</h4>
      <form id="add_user_form">
         <div class="form-group">
            <label>First Name<span class="text-danger">*</span></label>
            <input  type="text" class="form-control input" name="first_name"  placeholder="" required>      
         </div>
         <div class="form-group">
            <label>Middle Name</label>
            <input  type="text" class="form-control input" name="middle_name"  placeholder="" >      
         </div>
         <div class="form-group">
            <label>Last Name<span class="text-danger">*</span></label>
            <input  type="text" class="form-control input" name="last_name"  placeholder="" required>      
         </div>
         <div class="form-group">
            <label>Extension<span class="text-danger">*</span></label>
             <i><label class="pull-right ">Jr Sr ...</label></i>
            <input  type="text" class="form-control input" name="ext"  placeholder="" >      
         </div>
         <div class="form-group ">
            <label for="inputEmail4">User Type<span class="text-danger">*</span></label>
            <select id="inputState" name="user_type " class="custom-select" style="border: 1px solid;">
               <option selected value="user">User</option>
             
            </select>
         </div>
         <div class="form-group">
            <label>Username<span class="text-danger">*</span></label>
            <input  type="text" class="form-control input" name="username"  placeholder="" required>      
         </div>
         <div class="form-group">
            <label>Password<span class="text-danger">*</span></label>
            <input  type="password" class="form-control input" name="password"  placeholder="" required>      
         </div>
         <div class="form-group">
            <label>Confirm Password<span class="text-danger">*</span></label>
            <input  type="password" class="form-control input" name="confirm_password"  placeholder="" required>      
         </div>
         <button  type="submit" class="btn mt-1 pr-4 pl-4 btn-add-user sub-button"> Submit</button>
         <div class="alert"></div>
      </form>
   </div>
</div>