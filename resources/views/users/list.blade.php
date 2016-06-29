@extends('layouts.app')

@section('content')

@if( count($users) > 0)

@foreach($users as $user)
    <div class="col-md-4">
        <div class="post-bottom-content">
            <img src="{{asset('user_images/'.$user->path_image)}}" width="300" height="220">
            <h3><a href="{{route('view_user', ['id' => $user->id])}}">{{$user->
                        firstname}} {{$user->lastname}}</a></h3>
            <span class="date">{{$user->email}}</span>

        </div>
    </div><!-- End Column -->

    @endforeach
    {{$users->render()}}
@else 
non ci sono utenti
@endif

@stop