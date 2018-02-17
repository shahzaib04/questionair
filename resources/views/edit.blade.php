@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Project</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('update') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="questionair_id" value="{{$questionair->id}}"/>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Project Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$questionair->name}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="type" class="col-md-4 control-label">Duration</label>
                            <div class="col-md-3">
                                <input id="name" type="text" class="form-control" placeholder="Enter Duration" name="duration" value="{{$questionair->duration}}" required autofocus>
                            </div>

                            <div class="col-md-3">
                                <select class="form-control" name="time_type">
                                    <option value="min" @if($questionair->time_type == 'min') {{ 'selected' }} @endif> Minutes </option>
                                    <option value="hr" @if($questionair->time_type == 'hr') {{ 'selected' }} @endif> Hours </option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="services" class="col-md-4 control-label">Can Resume?</label>
                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="resumeable" id="inlineRadio1" value="Yes" @if($questionair->resumeable == 'Yes'){{ 'checked' }} @endif>
                                    <label class="form-check-label" for="resumeable1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="resumeable" id="inlineRadio2" value="No" @if($questionair->resumeable == 'No'){{ 'checked' }} @endif>
                                    <label class="form-check-label" for="resumeable2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
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
