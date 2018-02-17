<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;
use Auth;

class QuestionsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id) {
        $data['questionair_id'] = $id;
        return View('questions.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        foreach ($_POST['question']['question_type'] as $key => $val) {
            $result = new Questions();
            $result->questionair_id = $request->questionair_id;
            $result->user_id = Auth::user()->id;
            $result->question_name = $_POST['question']['name'][$key];
            $result->question_type = $_POST['question']['question_type'][$key];
            if ($_POST['question']['question_type'][$key] == 'multiple_choice') {
                $result->choices = json_encode($_POST['question']['choice'][$key], true);
            } else {
                $result->answer = $_POST['question']['answer'][$key][0];
            }
            $result->save();
        }

        return redirect()->route('questionairs-view');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function addNewQuestion(Request $request) {
        $data['Counter'] = $request->questionCounter;
        return View('questions.addNewQuestion', $data);
    }

}
