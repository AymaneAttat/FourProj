@extends('layouts.app')
@section('content')
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary">
                <div class="card-header text-white bg-primary">
                    Companies @if(!Auth::guest()) <a class="float-right text-white btn btn-primary btn-sm" href="{{ route('companies.create') }}"><i class="fas fa-plus"></i>Created new Company</a> @endif
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($companies as $company)
                            @if(Auth::user()->id == $company->user_id)
                                <li class="list-group-item"><a href="{{ route('companies.show', $company->id) }}">{{ $company->name }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    

@endsection