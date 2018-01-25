<header style="padding: 13px 0px;position: relative">
    <div class="container" >
        <a href="myjob.php" class="site-logo">
            <img src="../images/logo.png" alt="" width="200px" style="margin-top: -5px;"/>
        </a>                 
        <!-- Site Navigation -->                 
        <nav> 
            <a href="" class="btn btn-default site-menu-toggle visible-xs visible-sm pull-right"><i class="fa fa-bars"></i></a> 
            <!-- Main Menu -->                     
            <ul class="site-nav"> 
                <li>
                    <a class="site-nav-sub active">JOBS <i class='fa fa-angle-down'></i></a>
                    <ul class="com-heads header-drop-box boxed-shd">
                        <li><a href="">My Jobs</a></li>
                        <li><a href="">All Job Postings</a></li>
                        <li><a href="">Post a Job</a></li>
                    </ul>
                </li>                    
                <li> 
                    <a class="site-nav-sub">STUDENTS <i class='fa fa-angle-down'></i></a>
                    <ul class="com-heads header-drop-box boxed-shd">
                        <li><a href="">My Students</a></li>
                        <li><a href="">Find Students</a></li>
                        <li><a href="">Work Diary</a></li>
                    </ul> 
                </li>                         
                <li> 
                    <a href="">MESSAGES</a> 
                </li>
                <div class="pull-right" style="text-transform: none">
                    <li> 
                        <div class="comp-heads-search-box">
                            <form class="" method="POST" action="">
                                <div class="input-groups">
                                    <input type="text" name="txtSearchStudents" class="form-control comp-heads-search" placeholder="Find Students">
                                </div>
                            </form>
                        </div>
                    </li>
                    <li> 
                        <a href=""><i class="fa fa-bell-o" style="font-size:20px;font-weight:bold;"></i></a> 
                    </li>
                    <li>
                        <a class='site-nav-sub'><i class='fa fa-angle-down site-nav-arrow'></i>
                            <img class='img-circle' src="../images/user-profile/user.jpg" style='width:33px;max-height:33px;' />&nbsp;
                            <span><?php echo $company->getUserName();?></span>
                        </a>
                        <ul class="com-heads header-drop-box boxed-shd">
                            <li><a href=""><i class="fa fa-user"></i>&nbsp; Company Profile</a></li>
                            <li><a href=""><i class="fa fa-cog"></i>&nbsp; Settings</a></li>
                            <li><a href="../logout.php"><i class="fa fa-sign-out"></i>&nbsp; Logout</a></li>
                        </ul>
                    </li>
                </div>                         
            </ul>                     
            <!-- END Main Menu -->                     
        </nav>                 
        <!-- END Site Navigation -->                 
    </div>             
</header>