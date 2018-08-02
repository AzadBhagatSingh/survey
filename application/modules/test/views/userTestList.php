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
                                	<?php if($UserTestList){  ?>
                                	<div class="row-fluid-inner">
                                        <div class="media">
                                            <div class="media-body">
                                            	<table class="table table-striped table-bordered table-condensed">
												  <thead>
													<tr>
													  <th>Sr. No.</th>
													  <th>Test Name</th>
													  <th>Action</th>
													</tr>
												  </thead>
												  <tbody>
												  	<?php $i=1; foreach($UserTestList as $value){  ?>
													<tr>
													  <td><?php echo $i++; ?></td>
													  <td><?php echo $value['TestName']; ?></td>
													  <td><a class="btn btn-primary" href="<?php echo base_url('test/userTest/').$value['Id']; ?>">Start Test</a></td>
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