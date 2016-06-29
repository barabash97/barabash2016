<?php
    $users_list_assoc = array();
    foreach($users as $user){
        $users_list_assoc[$user->id] = $user;
    }
?>

@extends('layouts.app')

@section('content')
@if( count($user_dialogs) > 0)

@foreach($user_dialogs as $user_dialog)
    @foreach($dialogs as $dialog)
        @if($dialog->dialog_id == $user_dialog->dialog_id)
            @if($users_list_assoc[$dialog->user_id]->id != Auth::user()->id)
            <a href="/im/{{$users_list_assoc[$dialog->user_id]->id}}">{{$users_list_assoc[$dialog->user_id]->firstname}} {{$users_list_assoc[$dialog->user_id]->lastname}}</a></br>
            @endif
        @endif
    @endforeach
@endforeach

@else 
<center><h1>Non ci sono conversazioni!</h1>
    <h3><a href='/users'>Inizia una nuova conversazione</a></h3>
</center>
@endif
@stop