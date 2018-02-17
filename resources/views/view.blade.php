@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center><a href="{{route('create-questionar')}}" class="btn btn-primary"> Create Questionair </a></center>
            <hr>
            <div class="panel panel-default">
                <div class="panel-heading">All Questionairs</div>
                <div class="panel-body">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Number of Questions</th>
                                <th>Duration</th>
                                <th>Resumeable</th>
                                <th>Published</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Number of Questions</th>
                                <th>Duration</th>
                                <th>Resumeable</th>
                                <th>Published</th>
                                <th>Action</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($Questionairs) > 0)
                            @foreach($Questionairs as $Questionair)
                            <tr>
                                <td>{{$Questionair->id}}</td>
                                <td>{{$Questionair->name}}</td>
                                <?php $NUMBER_OF_QUE = DB::table('questions')->where('questionair_id', $Questionair->id)->count(); ?>
                                <td>{{$NUMBER_OF_QUE}} | <a class="btn btn-primary" href="{{route('create-question', ['id' => $Questionair->id])}}">Add</a></td>
                                <td>{{$Questionair->duration}}{{$Questionair->time_type}}</td>
                                <td>{{$Questionair->resumeable}}</td>
                                <td>{{$Questionair->published}}</td>
                                <td width=""><a href="{{route('edit', ['id' => $Questionair->id])}}" class="btn btn-info">Edit</a> | <a href="{{route('delete-questionair', ['id' => $Questionair->id])}}" class="btn btn-danger">Delete</a></td>

                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
