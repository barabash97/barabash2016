@extends('layouts.app')

@section('content')
<center>
    <img src="{{asset('user_images/'.$user->path_image)}}" width="300" height="220">
    @if($user->id == Auth::user()->id)
    <a href="/user/{{Auth::user()->id}}/gravatar">Cambiare immagine</a>
    @endif
    <h2> {{$user->firstname}} {{$user->lastname}}</h2>

    <p><strong>E-mail: </strong>{{$user->email}}</br>
        <strong>Username: </strong>{{$user->username}}</br>
        @if(Auth::user()->id != $user->id)<a href="/im/{{$user->id}}">Scrivi il messaggio</a></p>

</center>
@endif
@stop