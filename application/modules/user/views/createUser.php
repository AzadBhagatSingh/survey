
<style type="text/css">
.profile_span{
		color: #2d2b32;
		font-weight: bold;
	}
	.register_form_error{
		color: red;
	}
</style>
<div class="span9">
                    <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <h3>Create User</h3>
                            </div>
                            <?php if ($this->session->flashdata('message')) { ?>
							<CENTER><?php echo $this->session->flashdata('message'); ?></CENTER><br>
							<?php } ?>
                            <div class="module-body">
                                <section class="docs">
                                	<form class="form-horizontal row-fluid" action="<?php echo base_url("user/userRegister"); ?>" method="POST">
										<div class="control-group">
											<label class="control-label" for="basicinput"><span class="profile_span">Full Name</span></label>
											<div class="controls">
												<input type="text" id="FullName" name="FullName" value="<?php echo set_value('FullName'); ?>" class="span8" required>
												<span class="register_form_error"><?php echo form_error('FullName'); ?></span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput"><span class="profile_span">User Name</span></label>
											<div class="controls">
												<input class="span8" type="text" id="UserName" name="UserName" value="<?php echo set_value('UserName'); ?>" onblur="return check_username();">
												<div id="Info"></div><span id="Loading">Loading...</span>
												<span class="register_form_error"><?php echo form_error('UserName'); ?></span>
											</div>
										</div>
										<div class="control-group">
								
										<div class="control-group">
											<label class="control-label" for="basicinput"><span class="profile_span">Password</span></label>
											<div class="controls">
												<input type="password" id="Password" name="Password" value="<?php echo set_value('Password'); ?>" class="span8" required>
												<span class="register_form_error"><?php echo form_error('Password'); ?></span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput"><span class="profile_span">Confirm Password</span></label>
											<div class="controls">
												<input type="password" id="confirmPassword" name="confirmPassword" value="<?php echo set_value('confirmPassword'); ?>" class="span8" required>
												<span class="register_form_error"><?php echo form_error('confirmPassword'); ?></span>
											</div>
										</div>
										<div><button type="submit" class="btn btn-primary pull-right">Create User</button></div>
									</form>


                                    
                                </section>
                                
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
    <script src="<?php echo base_url('assets/scripts/jquery-1.9.1.min.js'); ?>" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('#Loading').hide();    
            });

        function check_username(){

        var username = $("#UserName").val();
        if(username == ''){
        	res = '<h5 style="color:#f00">Username is required. </h5>';
        	$('#Info').fadeOut();
            $('#Loading').hide();
        setTimeout("finishAjax('Info', '"+escape(res)+"')", 450);
        }else{
        	$('#Loading').show();
            $.post("<?php echo base_url('user/check_username_availablity'); ?>", {
                UserName: $('#UserName').val(),
                }, function(response){
            $('#Info').fadeOut();
            $('#Loading').hide();
        setTimeout("finishAjax('Info', '"+escape(response)+"')", 450);
            });
        return false;
        }
            
    }

function finishAjax(id, response){

  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn(1000);
} 
</script>