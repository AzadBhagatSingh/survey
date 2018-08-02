<style type="text/css">
	.module-group-first,.module-group-second, .module-group-third, .module-group-fourth{
		width: 25%;
		float: left;
	}
	.error{
		color: red;
	}
</style>
<div class="span9">
    <div class="content">
    	<form id="frmAddTest" action="javascript:void(0)">
    		<div class="module">
	            <div class="module-head">
	                <h3>Test Name</h3>
	            </div>
	            <div class="module-body">
	            	<div class="control-group">
	            		<div class="module-group">
	            			<input type="text" name="testName" id="testName" required class="span4" >
	            			<span class="error"><?php echo form_error('testName'); ?></span>
	            		</div>
					</div>
	            </div>
	        </div>

    		<div class="module">
	            <div class="module-head">
	                <h3>Select User</h3>
	            </div>
	            <div class="module-body">

	            	<div class="control-group">
	            		<div class="module-group">
	            			<select tabindex="1" class="span4 select_user" required>
								<option value="">Select User here..</option>
							<?php foreach($UserData as $UserValue){ ?>
								<option value="<?php echo $UserValue['Id'] ?>"><?php echo $UserValue['FullName'] ?></option>
							<?php } ?>
							</select>
	            		</div>
					</div>
	            </div>
	        </div>

	        <div class="module">
	            <div class="module-head">
	                <h3>Select Question</h3>
	            </div>
	            <div class="module-body table">
	                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
						<thead>
							<tr>
								<th>Select</th>
								<th>Sr. No.</th>
								<th>Question</th>
							</tr>
						</thead>
						<tbody>
							<?php if($Questions){
								$i = 1;
								foreach($Questions as $q_value){
							?>
							<tr class="odd gradeX">
								<td class="cell-check" id="frmText">
                                    <input type="checkbox" name="question[]" id="<?php echo $q_value['QId']; ?>" class="inbox-checkbox">
                                </td>
								<td><?php echo $i++; ?></td>
								<td><?php echo $q_value['Question']; ?></td>
							</tr>
						<?php }} ?>
						</tbody>
					</table>
	            </div>
	        </div>
	        <!--/.module-->
	        <div class="module">
	            <div class="module-head">
	                <h3>Select Result Range</h3>
	            </div>
	            <div class="module-body">
	            	<div class="control-group result_range">
	            		<div class="module-group-first">
	            			<label>Min Marks</label>
	            			<hr>
	            			<input type="text" name="min_0" id="min_marks" class="span2 min_marks" required>
	            		</div>
	            		<div class="module-group-second">
	            			<label>Max Marks</label>
	            			<hr>
	            			<input type="text" name="max_0" id="max_marks" class="span2 max_marks" required>
	            		</div>
	            		<div class="module-group-third">
	            			<label>Result URL</label>
	            			<hr>
		            		<input  type="text" name="result_url_0" id="result_url" class="span2 tip url" required>
	            		</div>
	            		<div class="module-group-fourth">
	            			<hr style="margin-top:19%; ">
	            			<input type="hidden" id="counter" value="1">
	            			<button class="btn btn-primary add_field_button" style="margin-top:0%; ">Add More</button>
	            		</div>
	            		<div style="clear: both;"></div>
					</div>
	            </div>
	        </div>
			<div class="module">
	            <div class="module-body" style="text-align: center;">
	                <button type="submit" id="submit" class="btn btn-success">Submit</button>
	            </div>
	        </div>
	    </form>
    </div>
    <!--/.content-->
</div>
<!--/.span9-->
</div>
</div>
<!--/.container-->
</div>
<!--/.wrapper-->


<!-- Model Window JS Start -->
<script>
	

	$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".result_range"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        var counter = parseInt($('#counter').val());

        var newDiv = '<div class="control-group result_range"> <div class="module-group-first"><input type="text" name="min_' + counter + '" class="span2 min_marks" required> </div> <div class="module-group-second"> <input type="text" name="max_' + counter + '"  class="span2 max_marks" required> </div> <div class="module-group-third"><input  type="text" class="span2 tip url" name="result_url_' + counter + '"  required> </div> <a href="#" class="remove_field">Remove</a>  <div style="clear: both;"></div> </div>';

        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append(newDiv); //add input box
            $('#counter').val( counter + 1 );
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });
});

$(document).ready(function() {
	$("#submit").click(function(){
	$('#frmAddTest').validate({
		rules: {
	            'question[]': {
	                required: true
	            }
	        },
	        messages: {
	            'question[]': {
	                required: "You must check at least 1 box"
	            }
	        },
		submitHandler:function(){
        //Submit Ajax Request
		$.ajax({
			url:'test/createTest',
			type:'POST',
			data:{testName:testName,selectUser:selectUser,questions:selectedQuestion,minMarks:minArray,maxMarks:maxArray,resultUrl:urlArray},
			success: function(response){
				// console.log(response);
				alert("Test Created SuccessFull");
				setTimeout(function(){
					// window.location.reload();
					window.location.href = "test/createdTestList"
				},1300)
			}
		});
	}
	 
		});
		//Test Name
		var testName = $('#testName').val();

		//Seleted User For Test
		var selectUser = $('.select_user option:selected').val();

		//Selected Question Ids
		var checked = $('#frmText input:checked').length>0;

	    var selectId = {};
	    	selectId.questionId = [];
	    $("input:checkbox").each(function(){ 
			var $this = $(this);
			if($this.is(":checked")){
				selectId.questionId.push($this.attr("id"));
			}
		});
		var selectedQuestion = selectId.questionId;
		
		//Selected Min Range
		var minArray = [];
        $('.min_marks').each(function () {
	        $(this).rules("add", {
	            required: true,
                number: true
	        });
	        minArray.push(this.value);
	    });
	    //Selected Max Range
	    var maxArray = [];
        $('.max_marks').each(function () {
	        $(this).rules("add", {
	            required: true,
                number: true
	        });
	        maxArray.push(this.value);
	    });
	    //Selected Result Url
	    var urlArray = [];
        $('.url').each(function () {
	        $(this).rules("add", {
	            required: true
	        });
	        urlArray.push(this.value);
	    });


	});
});	
</script>
<!-- Model Window JS End -->