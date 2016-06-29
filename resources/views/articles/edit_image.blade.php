@extends('layouts.app')

@section('content')
<center><h1>Cambiare l'immagine dell'articolo</h1>
    
    <form name="edit_image_article" action="" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <table align="center" style="border: 5px;">
            <input type="file"  class="form-control" name="image" value="{{old('image')}}"/>
            </br>
            <input type="submit" name="send" value="Cambiare" />
        </table>
    </form>
  
</center>
@stop

@section('yield')
Cambiare l'immagine di profilo con Gravatar
@stop