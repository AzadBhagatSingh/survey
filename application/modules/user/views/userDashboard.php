<style type="text/css">
    .row-fluid-inner{
        width: 45%;
        float: left;
        padding: 2%;
    }
</style>
<div class="span9">
                    <div class="content">
                        <div class="module">
                            <?php if ($this->session->flashdata('message')) { ?>
                            <CENTER><?php echo $this->session->flashdata('message'); ?></CENTER><br>
                            <?php } ?>
                            <div class="module-head">
                                <h3>
                                    All User Accounts</h3>
                            </div>
                            <!-- <div class="module-option clearfix">
                                <form>
                                <div class="input-append pull-left">
                                    <input type="text" class="span3" placeholder="Filter by name...">
                                    <button type="submit" class="btn">
                                        <i class="icon-search"></i>
                                    </button>
                                </div>
                                </form>
                                <div class="btn-group pull-right" data-toggle="buttons-radio">
                                    <button type="button" class="btn">
                                        All</button>
                                    <button type="button" class="btn">
                                        Male</button>
                                    <button type="button" class="btn">
                                        Female</button>
                                </div>
                            </div> -->
                            <div class="module-body">
                                
                                <div class="row-fluid">
                                    <div class="row-fluid-inner">
                                        <div class="media">
                                            <a class="media-avatar pull-left" href="#">
                                                <img src="<?php echo base_url('assets/images/user.png'); ?>">
                                            </a>
                                            <div class="media-body">
                                                <h3 class="media-title">Full Name : <span style="color: #248aaf;"><?php echo $this->session->userdata['FullName']; ?></span></h3>
                                                <h3 class="media-title">User Name : <span style="color: #248aaf;"><?php echo $this->session->userdata['UserName']; ?></span></h3>
                                                <br>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>                                
                                
                                
                            </div>
                        </div>
                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->