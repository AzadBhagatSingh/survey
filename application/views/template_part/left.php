<div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="<?php echo base_url("user"); ?>"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="<?php echo base_url("user/createUser"); ?>"><i class="menu-icon icon-paste"></i>Create User</a></li>
                                <li class="active"><a href="<?php echo base_url("question"); ?>"><i class="menu-icon icon-paste"></i>Question List</a></li>
                            </ul>
                            <!-- <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="<?php echo base_url("test"); ?>"><i class="menu-icon icon-paste"></i>Create Test</a></li>
                            </ul> -->
                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="#InstallmentPages"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Test </a>
                                    <ul id="InstallmentPages" class="collapse unstyled">
                                        <li><a href="<?php echo base_url("test"); ?>"><i class="icon-inbox"></i>Create Test</a></li>
                                        <li><a href="<?php echo base_url("test/createdTestList"); ?>"><i class="icon-inbox"></i>Test List </a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!--/.widget-nav-->
                            <!-- <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="#InstallmentPages"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Installment </a>
                                    <ul id="InstallmentPages" class="collapse unstyled">
                                        <li><a href="other-login.html"><i class="icon-inbox"></i>View </a></li>
                                        <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Pay </a></li>
                                    </ul>
                                </li>
                                <li><a href="#"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul> -->
                        </div>
                        <!--/.sidebar-->
                    </div>