<style type="text/css">
    .ans_starred{
        color: #fd7b12;
    }
    .ans_option{
        padding-left: 8%;
    }
    .error {
        color:red;
    }
</style>
<div class="span9">
    <div class="content">
        <div class="module">
            <?php if ($this->session->flashdata('message')) { ?>
            <CENTER><?php echo $this->session->flashdata('message'); ?></CENTER><br>
            <?php } ?>
            <div class="module-head">
                <input type="hidden" class="TestId" id="TestId" value="<?php echo $UserTestData['Id']; ?>">
                <h3>Test Name:- <span style="color: #248aaf;"><?php echo $UserTestData['TestName'] ; ?></span></h3>
            </div>                            
            <div class="module-body">
                <div class="row-fluid">
                    <div class="row-fluid-inner">
                        <div class="media">
                            <div class="media-body">
                                <form id="frmUserTest" action="javascript:void(0)">
                            	<?php $i=1; foreach($Questions as $que){  ?>
                                <div class="control-group">
                                    <h4><span>Q.<?php echo $i; ?> </span><?php echo $que['Question']; ?></h4>
                                    <div class="controls">
                                        <input type="hidden" class="qid" id="QId" value="<?php echo $que['QId']; ?>">
                                        <label class="radio inline">
                                            <input type="radio" name="optionsRadios<?php echo $i; ?>" id="field" class="ans_id1" value="1"> 
                                            <i class= "icon-star ans_starred"></i>
                                        </label> 
                                        <label class="radio inline ans_option">
                                            <input type="radio" name="optionsRadios<?php echo $i; ?>" id="field" class="ans_id2" value="2"> 
                                            <i class= "icon-star ans_starred"></i><i class= "icon-star ans_starred"></i>
                                        </label> 
                                        <label class="radio inline ans_option">
                                            <input type="radio" name="optionsRadios<?php echo $i; ?>" id="field" class="ans_id3" value="3"> 
                                            <i class= "icon-star ans_starred"></i><i class= "icon-star ans_starred"></i><i class= "icon-star ans_starred"></i>
                                        </label>
                                        <label class="radio inline ans_option">
                                            <input type="radio" name="optionsRadios<?php echo $i; ?>" id="field" class="ans_id4" value="4"> 
                                            <i class= "icon-star ans_starred"></i><i class= "icon-star ans_starred"></i><i class= "icon-star ans_starred"></i><i class= "icon-star ans_starred"></i>
                                        </label>
                                        <label class="radio inline ans_option">
                                            <input type="radio" name="optionsRadios<?php echo $i; ?>" id="field" class="ans_id5" value="5"> 
                                            <i class= "icon-star ans_starred"></i><i class= "icon-star ans_starred"></i><i class= "icon-star ans_starred"></i><i class= "icon-star ans_starred"></i><i class= "icon-star ans_starred"></i>
                                        </label>
                                    </div>
                                </div>
                            <?php $i++; } ?>
                                <div class="control-group">
                                    <div class="controls">
                                        <button id="submitAnswer" class="btn btn-primary">Submit Answer</button>
                                    </div>
                                </div>
                            </form>
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

<script type="text/javascript">
$(document).ready(function(){
    $('#submitAnswer').click(function(){ 
        $( "#frmUserTest" ).validate({  
            errorPlacement: function(error, element){
                if ( element.is(":radio")){
                    error.appendTo( element.parents('.controls'));
                }
                else{ // This is the default behavior 
                    error.insertAfter( element );
                }
            },
            submitHandler:function(){
                //Submit Ajax Request
                $.ajax({
                    url:'../test/submitTest',
                    type:'POST',
                    data:{TestId:TestId,QId:QId,AnsId:AnsId},
                    success: function(response){
                        // console.log(response);
                        alert("Test Submitted SuccessFull");
                        setTimeout(function(){
                            // window.location.reload();
                            window.location.href = "../submittedTestList"
                        },1300)
                    }
                });
            }
        });

        var TestId = $('#TestId').val();

        var QId = [];
        $('.qid').each(function () {
            $(this).rules("add", {
                required: true
            });
            QId.push(this.value);
        });
        // alert(QId);

        var i = 1;
        var AnsId = [];
        var radio_value;
        $('.ans_id'+i+'').each(function () {
            $(this).rules("add", {
                required: true
            });
            radio_value = $('input[name=optionsRadios'+i+']:checked').val();
            i++;
            AnsId.push(radio_value);
        });
        // alert(AnsId);
    });        
});
</script>