@extends('layouts.app')
@section('content')
<br>
<div class="col-md-9 col-lg-9 col-sm-9 float-left" style="background: white;">
  <h2>Create new Company</h2>
  {!! Form::open(['action' => 'CompaniesController@store' , 'method' => 'POST']) !!}
    {!! csrf_field() !!}
    <div class="form-group">
      <div class="row">
         {{Form::label('name', 'Name', ['class' => 'col-md-3'])}}
         <div class="col-md-6">{{Form::text('name','' , ['class' => 'form-control', 'placeholder' => 'Enter Name'])}}</div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
          {{Form::label('description', 'Description', ['class' => 'col-md-3'])}}
          <div class="col-md-6">{{Form::textarea('description','' , ['class' => 'form-control autosize-target text-left','rows' => '5' , 'placeholder' => 'Description'])}}</div>
      </div>
    </div>
    <div class="form-group">
        {{Form::hidden('_method','POST')}}
        {{Form::submit('Save', ['class' => 'btn btn-info'])}}
        <div class ="float-right"><a href="{{ route('companies.index')}}" class="btn btn-secondary"><i class="fas fa-arrow-alt-circle-left"></i>Go back</a></div>
      </div>
    {!! Form::close() !!}
</div>
<div class="col-sm-3 col-md-3 col-lg-3 float-right">
  <aside class=" blog-sidebar">
        <!-- <div class="p-4 mb-3 bg-light rounded">
          <h4 class="font-italic">About</h4>
          <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
        </div> -->
        <div class="p-4">
          <h4 class="font-italic">Actions</h4>
          <ol class="list-unstyled">
            
            <li><a href="/home">Home</a></li>
          </ol>
        </div>
        
  </aside>
</div>
@endsection