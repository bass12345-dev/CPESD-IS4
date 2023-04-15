<div class="sidebar-menu ">
            <div class="sidebar-header">
                <div class="logo">
                    <a href=""><img src="<?php echo base_url('peso_logo.png'); ?>" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu " >
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">



                            <?php 

                            $request = \Config\Services::request();

                            $last = $request->uri->getSegments();
                            $page = $request->uri->getSegment(2);

                            if (session()->get('user_type') == 'admin') {
                            
                             ?>

                            <span style="color: #fff;" class="ml-1 p-2 mb-5">PMAS  </span>
                            <li class="<?= $page == 'dashboard' ? 'active' : ''?>"><a href="<?php echo base_url('admin/dashboard') ?>" ><i class="fa fa-dashboard"></i> <span>Dashboard </span></a></li>
                            <li class="<?= $page == 'completed-transactions' ? 'active' : ''?>"><a href="<?php echo base_url('admin/completed-transactions') ?>"><i class="fa fa-file"></i> <span>Completed Transactions </span></a></li>
                            <li  class="<?= $page == 'pending-transactions' ? 'active' : ''?>"><a href="<?php echo base_url('admin/pending-transactions') ?>"><i class="fa fa-hourglass-start"></i> <span>Pending Transactions</span> <span class="badge badge-danger count_pending">4</span></a></li>
                            <li class="<?= $page == 'cso' ? 'active' : ''?>"><a href="<?php echo base_url('admin/cso') ?>"><i class="fa fa-sitemap"></i> <span>CSO </span></a></li>
                            <li class="<?= $page == 'responsibility-center' ? 'active' : ''?>"><a href="<?php echo base_url('admin/responsibility-center') ?>"><i class="fa fa-chevron-right"></i> <span>Responsibilty Center</span></a></li>
                            <li class="<?= $page == 'responsible-section' ? 'active' : ''?>"><a href="<?php echo base_url('admin/responsible-section') ?>"><i class="fa fa-chevron-right"></i> <span>Responsible Section</span></a></li>
                            <li class="<?= $page == 'type-of-activity' ? 'active' : ''?>"><a href="<?php echo base_url('admin/type-of-activity') ?>"><i class="fa fa-chevron-right"></i> <span>Type of Activity</span></a></li>
                            
                            
                            <hr> 
                            <span style="color: #fff;" class="ml-1 p-2 mb-5">RFA</span>
                            <li class="scroll-down <?= $page == 'completed-rfa' ? 'active' : ''?>"><a href="<?php echo base_url('admin/completed-rfa') ?>"><i class="fa fa-history"></i> <span>Completed RFA</span></a></li>
                            <li class="scroll-down <?= $page == 'pending-rfa' ? 'active' : ''?>"><a href="<?php echo base_url('admin/pending-rfa') ?>"><i class="fa fa-history"></i> <span>Pending RFA</span></a></li>
                            <hr> 
                            <span style="color: #fff;" class="ml-1 p-2 mb-5">Others</span>
                            <li class="scroll-down <?= $page == 'users' ? 'active' : ''?>"><a href="<?php echo base_url('admin/users') ?>"><i class="fa fa-users"></i> <span>Users</span></a></li>
                            <li class="scroll-down <?= $page == 'back-up-database' ? 'active' : ''?>"><a href="<?php echo base_url('admin/back-up-database') ?>"><i class="fa fa-database"></i> <span>Backup Database</span></a></li>
                            <li class="scroll-down <?= $page == 'activity-logs' ? 'active' : ''?>"><a href="<?php echo base_url('admin/activity-logs') ?>"><i class="fa fa-history"></i> <span>Activity Logs</span></a></li>
                            
                            <!--  <li><a href="<?php echo base_url() ?>Wallpaper"><i class="ti-map-alt"></i> <span>Login Wallpaper</span></a></li> -->

                             <br>
                             <br>
                             <br>
                             <br>

                         <?php }else if (session()->get('user_type') == 'user') { ?>

                            <span style="color: #fff;" class="ml-1 p-2 mb-5">PMAS</span>
                            <li class="<?= $page == 'dashboard' ? 'active' : ''?>"><a href="<?php echo base_url('user/dashboard') ?>" ><i class="fa fa-dashboard"></i> <span>Dashboard </span></a></li>
                            <li class="<?= $page == 'completed-transactions' ? 'active' : ''?>"><a href="<?php echo base_url('user/completed-transactions') ?>"><i class="fa fa-file"></i> <span>Completed Transactions </span></a></li>
                            <li  class="<?= $page == 'pending-transactions' ? 'active' : ''?>"><a href="<?php echo base_url('user/pending-transactions') ?>"><i class="fa fa-hourglass-start"></i> <span>Pending Transactions</span> <span class="badge badge-danger count_pending">4</span></a></li>
                            
                            
                            <hr> 
                            <span style="color: #fff;" class="ml-1 p-2 mb-5">RFA</span>
                            <li class="<?= $page == 'completed-rfa' ? 'active' : ''?>"><a href="<?php echo base_url('user/completed-rfa') ?>"><i class="fa fa-history"></i> <span>Completed RFA</span></a></li>
                            <li class="<?= $page == 'pending-rfa' ? 'active' : ''?>"><a href="<?php echo base_url('user/pending-rfa') ?>"><i class="fa fa-history"></i> <span>Pending RFA</span></a></li>
                            <hr> 
                            <span style="color: #fff;" class="ml-1 p-2 mb-5">Others</span>
                           
                            <li class="<?= $page == 'activity-logs' ? 'active' : ''?>"><a href="<?php echo base_url('user/activity-logs') ?>"><i class="fa fa-history"></i> <span>Activity Logs</span></a></li>
                            <!--  <li><a href="<?php echo base_url() ?>Wallpaper"><i class="ti-map-alt"></i> <span>Login Wallpaper</span></a></li> -->

                             <br>
                             <br>
                             <br>
                             <br>

                        <?php   } ?>

             
                        </ul>
                    </nav>
                </div>
            </div>
        </div>