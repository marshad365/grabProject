<header> 
    <div class="container"> 
        <a href="index.html" class="site-logo"> 
            <img src="" alt="" width="50" /> 
            <strong>Grab Project</strong> 
        </a>                 
        <!-- Site Navigation -->                 
        <nav> 
            <a href="" class="btn btn-default site-menu-toggle visible-xs visible-sm pull-right"><i class="fa fa-bars"></i></a> 
            <!-- Main Menu -->                     
            <ul class="site-nav"> 
                <li>
                    <a class="site-nav-sub active">FIND WORK <i class='fa fa-angle-down'></i></a>
                    <ul class="com-heads header-drop-box boxed-shd">
                        <li><a href="">All Projects</a></li>
                        <li><a href="">Some Jobs</a></li>
                    </ul>
                </li>                    
                <li> 
                    <a href="">MY JOBS </a>
                </li>                         
                <li> 
                    <a href="">MESSAGES</a> 
                </li>
                <div class="pull-right">  
                    <li> 
                        <!--<a href=""><i class="fa fa-bell-o"></i></a>-->
                        <div class="comp-heads-search-box">
                            <form class="" method="POST" action="">
                                <div class="form-groups">
                                    <div class="input-group">
                                        <input type="text" name="txtSearchStudents" class="form-control comp-heads-search" placeholder="Find Projects">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li> 
                        <a href=""><i class="fa fa-bell-o" style="font-size:20px;font-weight:bold;"></i></a> 
                    </li>
                    <li>
                        <?php $ab=0; if($ab==1){?>
                        <a href="login.php">Login/Signup <i class="fa fa-arrow-right"></i></a>
                        <?php }else{ ?>
                        <a class='site-nav-sub'><i class='fa fa-angle-down site-nav-arrow'></i>
                            <img class='img-circle' src="images/user-profile/user.jpg" style='width:33px;max-height:33px;' />&nbsp;
                            <span>Kamran</span>
                        </a>
                        <ul class="com-heads header-drop-box boxed-shd">
                            <li><a href=""><i class="fa fa-user"></i>&nbsp; My Profile</a></li>
                            <li><a href=""><i class="fa fa-cog"></i>&nbsp; Settings</a></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out"></i>&nbsp; Logout</a></li>
                        </ul>
                        <?php } ?>
                    </li>
                </div>                         
            </ul>                     
            <!-- END Main Menu -->                     
        </nav>                 
        <!-- END Site Navigation -->                 
    </div>             
</header>