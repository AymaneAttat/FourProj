@foreach( $comments as $comment )
    <hr data-brackets-id="12673">
    <ul data-brackets-id="12674" id="sortable" class="list-unstyled ui-sortable">
        <strong class="pull-left primary-font"><a href="{{ route('users.show', $comment->user_id) }}">{{ optional($comment->users)->name }} <i class="fas fa-comment"></i></a></strong>
        <small class="pull-right text-muted">
        <span class="glyphicon glyphicon-time"></span>7 mins ago</small>
        </br>
        <li>{{ $comment->body }}</li>
        <li>{{ $comment->url }}</li>
        </br>                    
    </ul>
@endforeach