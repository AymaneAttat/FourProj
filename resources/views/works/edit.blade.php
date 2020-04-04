@extends('layouts.app')
@section('content')
    <br>
    <div class="col-md-9 col-lg-9 col-sm-9 float-left" style="background: white;">
        <h2>Updated Project</h2>
        <div class="col-md-12 col-lg-12 col-sm-12">
            {!! Form::open(['action' => ['WorksController@update', $work->id], 'method' => 'POST']) !!}
                {!! csrf_field() !!}
                <div class="form-group">
                    <div class="row">{{ Form::label('name', 'Name', ['class' => 'col-md-3']) }} </div>
                        {{Form::text('name', $work->name , ['class' => 'form-control', 'placeholder' => 'Enter Name'])}}
                    
                </div>
                <div class="form-group">
                    <div class="row">{{Form::label('description', 'Description', ['class' => 'col-md-3'])}}</div>
                        {{Form::textarea('description', $work->description , ['class' => 'form-control autosize-target text-left','rows' => '5' , 'placeholder' => 'Description'])}}
                </div>
                <div class="form-group">
                    <div class="row">{{Form::label('days', 'Days', ['class' => 'col-md-3'])}}</div>
                    {{Form::number('days', $work->days , ['class' => 'form-control', 'placeholder' => 'Enter nbr days'])}}  
                </div>
                <div class="form-group">
                    <div class="row">
                        {{Form::label('company_id', 'Company', ['class' => 'col-md-3'])}}
                        <div class="col-md-6">{{Form::select('company_id', array_pluck( $company , 'name','id'), $work->company_id , ['class' => 'form-control', 'placeholder' => 'Choose Category']) }}</div>       
                    </div>
                </div>
                <div class="form-group">
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Save', ['class' => 'btn btn-info'])}}
                    <div class ="float-right"><a href="{{ route('works.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-alt-circle-left"></i>Go back</a></div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3 float-right">
        <aside class=" blog-sidebar">
            <div class="p-4">
            <h4 class="font-italic">Actions</h4>
            <ol class="list-unstyled">
                
                <li><a href="/home">Home</a></li>
            </ol>
            </div>
        </aside>
    </div>
@endsection