@extends('layouts.app')
@section('content')
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary">
                <div class="card-header text-white bg-primary">
                    Projects @if(!Auth::guest()) <a class="float-right text-white btn btn-primary btn-sm" href="{{ route('works.create') }}"><i class="fas fa-angle-double-left"></i>Add new Project</a> @endif
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($works as $work)
                            
                                <li class="list-group-item"><a href="{{ route('works.show', $work->id) }}">{{ $work->name }}</a></li>
                            
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection