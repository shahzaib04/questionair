@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Create</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('store-questionair') }}" id="project">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Questionair Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" placeholder="Enter Questionair name" name="name" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="type" class="col-md-4 control-label">Duration</label>
                            <div class="col-md-3">
                                <input id="name" type="text" class="form-control" placeholder="Enter Duration" name="duration" value="" required autofocus>
                            </div>

                            <div class="col-md-3">
                                <select class="form-control" name="time_type">
                                    <option value="min"> Minutes </option>
                                    <option value="hr"> Hours </option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="services" class="col-md-4 control-label">Can Resume?</label>
                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked="" type="radio" name="resumeable" id="inlineRadio1" value="Yes">
                                    <label class="form-check-label" for="resumeable1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="resumeable" id="inlineRadio2" value="No">
                                    <label class="form-check-label" for="resumeable2">No</label>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
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
@section('footer')
<script>
    $(document).ready(function () {

        $('#project').validate({// initialize the plugin
            rules: {
                name: {
                    required: true,
                    maxlength: 120
                },
                type: {
                    required: true

                },
                comments: {
                    required: true

                },
                terms: {
                    required: true

                }
            }
        });

    });
</script>
@endsection
