@extends('layouts.app')
@section('content')
    <br>
    <div class="row col-md-9 col-lg-9 col-sm-3 float-left">
        <div class="card card-body bg-light">
            <h1>{{ $work->name }}</h1>
            <p class="lead">{{ $work->description }}</p>
        </div>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2 float-right">
        <aside class=" blog-sidebar">
             <div class="p-4">
                <h4 class="font-italic">Actions</h4>
                <ol class="list-unstyled">
                    <li><a href="{{ route('companies.show', $work->company_id)}}">Company managed</a></li>
                    <li><a href="{{ route('works.edit', $work->id)}}">Edit Project</a></li>
                    
                </ol>
            </div>
            <div class="row justify-content-around">
                <div class="col-11">
                    {!! Form::open([ 'action' => ['WorksController@destroy', $work->id] , 'method' => 'POST']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete',['class' => 'btn btn-link'])}}
                    {!! Form::close() !!}
                </div>
            </div>
            <hr>
            <h4 class="font-italic">Add members</h4>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <form method="post" action="{{ route('works.adduser') }}">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="email" class="form-control" placeholder="Email">
                            <input type = "hidden" name = "project_id" value = "{{$work->id}}">
                            <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit">Add</button>
                            </span>
                        </div><!-- /input-group -->
                    </form>
                </div><!-- /.col-lg-6 -->
            </div>
            <hr>
            <h4 class="font-italic">Team members</h4>
            <ol class="list-unstyled">
                @foreach ( optional($work->users) as $user)
                    <li><a href="#">email {{ $user->email }}</a></li>
                @endforeach
                
            </ol>
        </aside>
    </div>
    <br>
    <div class="row col-md-8 col-lg-8 col-xs-8 col-sm-8"  style="background: white; margin: 10px; ">
        <div class="container-fluid">
            @include('notification.comment')
            <form method="post" action="{{ route('comments.store') }}">
                @csrf
                <div class="form-group">
                    <label for="body_comment">Comment</label>
                    <input type="text" name="body" id="body_comment" class="form-control form-control-lg "  spellcheck="false"/> 
                    <input type = "hidden" name = "commentable_id" value = "{{$work->id}}">                                
                </div>
                <div class="form-group">            
                    <label for="comment-content">Proof of work done (Url/Photos)</label>
                    <textarea placeholder="Enter url or screenshots" name="url" id="comment-content" class="form-control form-control-lg" spellcheck="false"></textarea>                       
                    <input type = "hidden" name = "commentable_type" value = "App\Work">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Add Comment" />
                </div>
            </form>        
        </div> 
    </div>
    
@endsection