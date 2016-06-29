@extends('layouts.app')

@section('content')
<center><h1>Cambiare l'immagine di profilo con Gravatar</h1>
    
    <form name="edit_gravatar" action="" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <table align="center" style="border: 5px;">
            <input type="file"  class="form-control" name="image" placeholder="Inserisci e-mail di gravatar" value="{{old('image', Auth::user()->path_image)}}"/>
            </br>
            <input type="submit" name="send" value="Cambiare" />
        </table>
    </form>
  
</center>
@stop

@section('yield')
Cambiare l'immagine di profilo con Gravatar
@stop