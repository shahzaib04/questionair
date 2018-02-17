<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionairs;
use Auth;
use App\Questions;

class QuestionairController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['Questionairs'] = \App\Questionairs::getAll();

        return view('view', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $result = new Questionairs();
        $result->name = $request->name;
        $result->user_id = Auth::user()->id;
        $result->duration = $request->duration;
        $result->time_type = $request->time_type;
        $result->resumeable = $request->resumeable;
        $result->save();

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
        $data['questionair'] = \App\Questionairs::show($id);
        return view('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $result = \App\Questionairs::find($request->questionair_id);
        $result->name = $request->name;
        $result->duration = $request->duration;
        $result->time_type = $request->time_type;
        $result->resumeable = $request->resumeable;
        $result->save();
        return redirect()->route('questionairs-view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        \App\Questionairs::deleteQuestionair($id);
        return redirect()->route('questionairs-view');
    }

}
