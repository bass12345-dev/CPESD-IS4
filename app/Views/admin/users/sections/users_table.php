<div class="row">
    <div class="col-12 mt-5">
        <div class="card" style="border: 1px solid;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="data-tables">
                            <h4 class="header-title">Active</h4>
                                <table id="users_table" style="width:100%" class="text-center mb-3">
                                    <thead class="bg-light text-capitalize">
                                        <tr>
                                            <th>Name</th>  
                                            <th>Username</th> 
                                            <th>Type</th>                                                     
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                            <h4 class="header-title">InActive</h4>
                                <table id="inactiveusers_table" style="width:100%" class="text-center ">
                                    <thead class="bg-light text-capitalize">
                                        <tr>
                                            <th>Name</th>  
                                            <th>Username</th> 
                                            <th>Type</th>                                                     
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                        </div>
                    </div>
                        <!--load add section -->
                        <?php echo view('admin/users/sections/add_users'); ?>
                </div>
            </div>
        </div>
    </div>
</div>