
    @if (Auth::user()->is_favorite($micropost->id))
        {!! Form::open(['route' => ['user.unfavorite', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('Your Favorite', ['class' => "btn btn-success btn-sm"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.favorite', $micropost->id]]) !!}
            {!! Form::submit('Favorite This', ['class' => "btn btn-default btn-sm"]) !!}
        {!! Form::close() !!}
    @endif
