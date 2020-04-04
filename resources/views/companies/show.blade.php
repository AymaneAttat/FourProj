@extends('layouts.app')
@section('content')
<br>
<div class="row col-md-9 col-lg-9 col-sm-3 float-left">

  <!-- The justified navigation menu is meant for single line per list item.
      Multiple lines will require custom code not provided by Bootstrap. -->

  <!-- Jumbotron -->
  <div class="jumbotron">
    <h1>{{ $company->name }}</h1>
    <p class="lead">{{ $company->description }}</p>
    <!-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
  </div>

  <!-- Example row of columns -->
  <div class="row col-md-12 col-lg-12 col-sm-12"  style="background: white; margin: 10px; ">
    
      @foreach( $work as $w )
        @if( $company->id == $w->company_id )  
          <div class="col-lg-4 col-md- col-sm-4">
              <h2>{{ $w->name }}</h2>
              <p class="text-danger">{{ $w->description }}</p>
              <p><a class="btn btn-primary" href="{{ route('works.show', $w->id) }}" role="button">View Projects »</a></p>
          </div>
          
        @endif
      @endforeach
      @if( $company->id == $w->company_id ) <div class="col float-right"><a class="float-right btn btn-primary btn-sm" href="{{ route('works.create') }}">Add Project</a></div>  @endif
  </div>

  <!-- Site footer -->
  

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
            <li><a href="{{ route('companies.edit', $company->id) }}">Edit</a></li>
            <li><a href="{{ route('companies.create') }}">Created new Company</a></li>
            <li><a href="{{ route('works.create', $company->id) }}">Add Project</a></li>
          </ol>
        </div>
        <div class="row justify-content-around">
          <div class="col-11">
            {!! Form::open([ 'action' => ['CompaniesController@destroy', $company->id] , 'method' => 'POST']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete',['class' => 'btn btn-link'])}}
            {!! Form::close() !!}
          </div>
        </div>
        <!--
        <div class="p-4">
          <h4 class="font-italic">Archives</h4>
          <ol class="list-unstyled mb-0">
            <li><a href="#">March 2014</a></li>
            <li><a href="#">February 2014</a></li>
            <li><a href="#">January 2014</a></li>
            <li><a href="#">December 2013</a></li>
            <li><a href="#">November 2013</a></li>
            <li><a href="#">October 2013</a></li>
            <li><a href="#">September 2013</a></li>
            <li><a href="#">August 2013</a></li>
            <li><a href="#">July 2013</a></li>
            <li><a href="#">June 2013</a></li>
            <li><a href="#">May 2013</a></li>
            <li><a href="#">April 2013</a></li>
          </ol>
      </div>
      -->
        
  </aside>
</div>


@endsection