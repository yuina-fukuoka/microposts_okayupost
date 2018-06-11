@extends('layouts.app')

@section('content')
    @if (Auth::check())
        
            <div class="row col-xs-offset-2 col-xs-8">
                @if (count($microposts) > 0)
                    @include('microposts.microposts', ['microposts' => $microposts])
            </div>
            <div class="row col-xs-offset-2 col-xs-8">
                 @else
                <br>
                    <p class="statement">First Time? Tell me how you feel!</p>
                    <p class="statement">{!! link_to_route('users.show', '☛Access My Profile',['id'=>\Auth::user()->id]) !!}</p>
                @endif    
            </div>
            
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>
                    Welcome to OkayuPost
                    <img class="title" src="{{ asset('okayupost_title.png') }}" alt="icon" >
                </h1>
                {!! link_to_route('signup.get', 'Sign up now !', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection