				<div class="span9">
                    <div class="content">
                        <div class="module">
                            <?php if ($this->session->flashdata('message')) { ?>
                            <CENTER><?php echo $this->session->flashdata('message'); ?></CENTER><br>
                            <?php } ?>
                            <div class="module-head">
                                <h3>Submitted Tes List</h3>
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
                                                    <!-- <input type="hidden" id="resultTestId" value="<?php echo $value['Id']; ?>"> -->
													  <td><?php echo $i++; ?></td>
													  <td><?php echo $value['TestName']; ?></td>
													  <td><button  id="submitResult" data-id="<?php echo $value['Id']; ?>" class="btn btn-primary submitResult">View Result</button></td>
													</tr>
													<?php } ?>
												  </tbody>
												</table>
                                            </div>
                                        </div>
                                    </div>
                                	<?php }else{ ?>
									<div class="row-fluid-inner">
                                        <div class="media">No Submitted Test For This User</div>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('.submitResult').click(function(){
                // alert("hiii");
                var TestId = $(this).data("id");
                // alert(TestId);
                $.ajax({
                    url:'test/viewResult',
                    type:'POST',
                    data:{TestId:TestId},
                    success: function(response){
                        // console.log(response);
                        setTimeout(function(){
                            // window.location.reload();
                            window.location.href = response;

                        },1300)
                    }
                });
            });
        });
    </script>