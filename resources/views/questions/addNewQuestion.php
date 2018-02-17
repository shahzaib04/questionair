<div id="questional_row_id_<?php echo $Counter; ?>" class="row questions_row">
    <div class="col-md-2"><a onclick="removeQuestion(<?php echo $Counter; ?>)" class="btn btn-danger"> Remove <i class="fa fa-times"></i></a></div>				
    <div class="col-md-8">
        <div class="form-group">
            <label class="col-md-2 control-label" for="question_type">Question Type</label>
            <div class="col-md-4">
                <select class="form-control" onchange="changeQuestionType($(this).val(), <?php echo $Counter; ?>)" name="question[question_type][]">
                    <option value="text">Text</option>
                    <option value="multiple_choice">Multiple Choice</option>
                </select>
            </div>
        </div>
    </div>	

    <div style="clear:both;"></div>
    <div class="col-md-2">&nbsp;</div>				
    <div class="col-md-8">
        <div class="form-group">
            <label class="col-md-2 control-label" for="question">Question</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="question" placeholder="Enter Question" name="question[name][]" required> 
            </div>
        </div>
    </div>
    <div style="clear:both;"></div>
    <div class="col-md-2">&nbsp;</div>
    <div id="helping_dv_<?php echo $Counter; ?>">
        <div class="col-md-8" id="answer_row_id_<?php echo $Counter; ?>">
            <div class="form-group">
                <label class="col-md-2 control-label" for="answer">Answer</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="answer" placeholder="Enter Answer" name="question[answer][<?php echo $Counter - 1; ?>][]" required>
                </div>
            </div>
        </div>


    </div>
    <div style="clear:both;"></div>
    <div class="col-md-2">&nbsp;</div>
    <div class="col-md-8" id="addChoiceBtn_<?php echo $Counter; ?>" style="display: none;;">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <input type="hidden" value="1" id="choice_counter_<?php echo $Counter; ?>" />
            <a onclick="addMoreChoice(<?php echo $Counter; ?>)" class="btn btn-default"><i class="fa fa-plus"></i>Add Choice</a>   
        </div>

    </div>
</div>

