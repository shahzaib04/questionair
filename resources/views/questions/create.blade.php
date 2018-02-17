@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">Create</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('store-questions') }}" id="questions_form">
                        {{ csrf_field() }}
                        <input type="hidden" name="questionair_id" value="<?php echo $questionair_id; ?>"/>
                        <div id="addNewQuestionsRow"></div>
                        <div class="form-group">

                            <div class="col-md-2">
                                <input type="hidden" value="1" id="questionCounter" />
                                <a onclick="addNewQuestion()" class="btn btn-primary"><i class="fa fa-plus"></i>CLICK HERE TO ADD QUESTION </a>
                            </div>
                        </div>



                        <hr>
                        <div class="form-group">
                            <div class="col-md-12 pull-right">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    .questions_row{background:#eee;padding-top:15px;margin-bottom:20px;}
</style>
@section('footer')
<script>
    function addNewQuestion() {
        var questionCounter = parseInt($("#questionCounter").val());
        var newcounter = questionCounter + 1;
        $("#questionCounter").val(newcounter);
        $.post("{{route('add-new-question')}}", {questionCounter: questionCounter, _token: "{{ csrf_token() }}"}).done(function (e) {
            $("#addNewQuestionsRow").append(e);
        });
    }
    function removeQuestion(rowid) {
        $("#questional_row_id_" + rowid).remove();
    }

    function changeQuestionType(qType, counter) {
        if (qType == 'text') {
            $("#answer_row_id_" + counter).remove();
            $("#choice_row_id_" + counter).remove();
            $("#choice_counter_" + counter).val(1);
            $('#helping_dv_' + counter).append('<div class="col-md-8" id="answer_row_id_' + counter + '"><div class="form-group"><label class="col-md-2 control-label" for="answer">Answer</label><div class="col-md-8"><input type="text" class="form-control" id="answer" placeholder="Enter Answer" name="question[answer][' + (parseInt(counter) - 1) + '][]" required></div></div></div>');
            $('#addChoiceBtn_' + counter).hide();
        } else if (qType == 'multiple_choice') {
            $('#addChoiceBtn_' + counter).show();
            var choice_counter = parseInt($("#choice_counter_" + counter).val());
            var choice_counter = counter + '_' + choice_counter;
            $("#answer_row_id_" + counter).remove();
            $("#choice_row_id_" + counter).remove();
            var delete_choice = counter+'_1';
            $('#helping_dv_' + counter).append('<div class="col-md-8" id="choice_row_id_' + counter + '"><div class="form-group" id="choice_row_' + choice_counter + '"><label class="col-md-2 control-label" for="answer">choice 1</label><div class="col-md-6"><input type="text" class="form-control" placeholder="Enter Choice" name="question[choice][' + (parseInt(counter) - 1) + '][]" required></div><div class="col-md-2"><div class="checkbox"><label><input type="checkbox" name="question[correct][' + (parseInt(counter) - 1) + '][]"> Correct Choice?</label></div></div><div class="col-md-2"><a class="btn btn-danger" onclick="deleteChoice(\'' + delete_choice + '\',\'' + counter + '\')">Delete Choice</a></div></div></div>');
        }

    }

    function addMoreChoice(mainCounter) {
        var choice_counter = parseInt($("#choice_counter_" + mainCounter).val());
        var newcounter = choice_counter + 1;
        $("#choice_counter_" + mainCounter).val(newcounter);
        var choice_counter = parseInt($("#choice_counter_" + mainCounter).val());
        choice_counter = mainCounter + '_' + choice_counter;
        var label = parseInt($("#choice_counter_" + mainCounter).val());
        $('#choice_row_id_' + mainCounter).append('<div class="form-group" id="choice_row_' + choice_counter + '"><label class="col-md-2 control-label" for="answer">choice ' + label + '</label><div class="col-md-6"><input type="text" class="form-control" placeholder="Enter Choice" name="question[choice][' + (parseInt(mainCounter) - 1) + '][]" required></div><div class="col-md-2"><div class="checkbox"><label><input type="checkbox" name="question[correct][' + (parseInt(mainCounter) - 1) + '][]"> Correct Choice?</label></div></div><div class="col-md-2"><a class="btn btn-danger" onclick="deleteChoice(\'' + choice_counter + '\',\'' + mainCounter + '\')">Delete Choice</a></div></div>');
    }

    function deleteChoice(counter, mainCounter) {
       
        $("#choice_row_" + counter).remove();

    }

</script>

@endsection
