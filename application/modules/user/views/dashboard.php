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
                                    <?php if(!empty($UserData)){ 
                                        foreach($UserData as $UserValue){ ?>
                                    <div class="row-fluid-inner">
                                        <div class="media">
                                            <a class="media-avatar pull-left" href="#">
                                                <img src="<?php echo base_url('assets/images/user.png'); ?>">
                                            </a>
                                            <div class="media-body">
                                                <h3 class="media-title"><span style="color: #248aaf;"><?php echo $UserValue['FullName']; ?></span></h3>
                                                <br>
                                                <!-- <a href="<?php echo base_url("LoanAccount/viewLoanAccount/").$UserValue['UserName']; ?>" class="btn btn-small"> View Account</a>
                                                <a href="<?php echo base_url("LoanAccount/editLoanAccount/").$UserValue['Password']; ?>" class="btn btn-small"> Edit Account</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <?php } }else{ ?>
                                    <div class="row-fluid-inner">
                                        <div class="media">No Record Found</div>
                                    </div>
                                <?php } ?>
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