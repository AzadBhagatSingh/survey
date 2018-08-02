
<div class="span9">
    <div class="content">

        <div class="module">
            <div class="module-head">
                <h3>
Question List<a class="btn btn-primary pull-right" data-toggle="modal" data-target="#questionAdd">Add Question</a></h3>
            </div>
            <div class="module-body table">
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Question Id</th>
							<th>Question</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if($Questions){
							$i = 1;
							foreach($Questions as $q_value){
						?>
						<tr class="odd gradeX">
							<td><?php echo $i++; ?></td>
							<td><?php echo $q_value['QId']; ?></td>
							<td><?php echo $q_value['Question']; ?></td>
							<td>
								<a class="edit_que" data-toggle="modal" data-id="<?php echo $q_value['QId']; ?>" data-question="<?php echo $q_value['Question']; ?>" data-target="#questionEdit">Edit</a> | 
								<a class="delete_que" href="" data-id="<?php echo $q_value['QId']; ?>">Delete</a>
							</td>
						</tr>
					<?php }} ?>
					</tbody>
				</table>
            </div>
        </div>
        <!--/.module-->
        <!-- Model Window Div Start -->
        <div class="modal fade" id="questionAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
              	<h3>Question </h3>
                <textarea class="span5" name="Question" id="Question"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="addQuestion" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
        </div>
		<!-- Model Window Div End -->


		<!--Edit Model Window Div Start -->
		
        <div class="modal fade" id="questionEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
              	<h3>Question</h3>
              	<input type="hidden" name="hidden" id="que_id">
                <textarea class="span5" name="EditQuestion" id="EditQuestion"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="editQuestion" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
        </div>
		<!--Edit Model Window Div End -->
			
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
	$(document).on("click", ".edit_que", function () {
     var queId = $(this).data('id');
     var queName = $(this).data('question');
     // alert(queId);
     // alert(queName);
     $(".modal-body #que_id").val( queId );
     $(".modal-body #EditQuestion").val( queName );
	});
	$(document).on("click",".delete_que",function(){
		var queId = $(this).data('id');
		if (confirm('Are you sure you want to delete this question?')) {
	        $.ajax({
	            url: 'question/deleteQuestion',
	            type: "POST",
	            data: {QId:queId},
	            success: function () {
	                alert("Question Deleted Successfully");
					setTimeout(function(){
    					// window.location.reload();
    					window.location.href = "question"
    				},1300)
	            }
	        });
    	}	
	});
	$(document).ready(function(){

		$('#addQuestion').click(function(){
			var Question = $("#Question").val();
			// alert(Question);
			if(Question == ''){
				alert("Question is Required");
			}else{
			$.ajax({
				url: 'question/addQuestion',
				data: {Question:Question},
				type: 'POST',
				success: function(){
				alert("Question Added Successfully");
				setTimeout(function(){
    					// window.location.reload();
    					window.location.href = "question"
    				},1300)
				}
			});
			}
		});
		
		$('#editQuestion').click(function(){
			// alert("hiii");
			var QId = $("#que_id").val();
			// alert(QId);
			var EditQuestion = $("#EditQuestion").val();
			// alert(EditQuestion);
				if(EditQuestion == ''){
					alert("Question is Required");
				}else{
				$.ajax({
					url: 'question/editQuestion',
					data: {QId:QId,Question:EditQuestion},
					type: 'POST',
					success: function(){;
						alert("Question Edit Successfully");
						setTimeout(function(){
							window.location.href = "question"
						},1300)
					}
				});
			}
		});
	});
</script>
<!-- Model Window JS End -->