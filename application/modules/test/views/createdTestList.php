				<style type="text/css">
                .status12{
                    background: #d74f2a;
                    border-radius: 3px;
                    color: #ffffff;
                    display: inline-block;
                    padding: 1px 5px;
                    font-size: 11px;
                    text-transform: uppercase;
                }            
                </style>
                <div class="span9">
                    <div class="content">
                        <div class="module">
                            <?php if ($this->session->flashdata('message')) { ?>
                            <CENTER><?php echo $this->session->flashdata('message'); ?></CENTER><br>
                            <?php } ?>
                            <div class="module-head">
                                <h3>Test List</h3>
                            </div>                            
                            <div class="module-body">
                                <div class="row-fluid">
                                	<?php if($createdTestList){  ?>
                                	<div class="row-fluid-inner">
                                        <div class="media">
                                            <div class="media-body">
                                            	<table class="table table-striped table-bordered table-condensed">
												  <thead>
													<tr>
													  <th>Sr. No.</th>
													  <th>Test Name</th>
                                                      <th>User Name</th>
													  <th>Status</th>
													</tr>
												  </thead>
												  <tbody>
												  	<?php $i=1; foreach($createdTestList as $value){  ?>
													<tr>
													  <td><?php echo $i++; ?></td>
													  <td><?php echo $value['TestName']; ?></td>
                                                      <td><?php echo $value['UserName']; ?></td>
                                                      <?php if($value['status'] == 0){ ?>
                                                        <td><a class="btn btn-danger">Test Submitted</a></td>
                                                        <?php  }else{ ?>
                                                        <td><a class="btn btn-success">Test Remaining</a></td>
                                                        <?php } ?>
													</tr>
													<?php } ?>
												  </tbody>
												</table>
                                            </div>
                                        </div>
                                    </div>
                                	<?php }else{ ?>
									<div class="row-fluid-inner">
                                        <div class="media">No New Test For This User</div>
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