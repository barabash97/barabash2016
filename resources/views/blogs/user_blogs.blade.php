@extends('layouts.app')

@section('content')

@if( count($blogs) > 0)

@foreach($blogs as $blog)
    <div class="col-md-4">
        <div class="post-bottom-content">
            <img class="img-responsive" src="{{asset('blog_images/'.$blog->path_image)}}" alt="" width="325" height="250"/>
            <h3><a href="{{route('view_blog', ['id' => $blog->id])}}">{{$blog->title}}</a></h3>
            <span class="date">{{$blog->created_at}}</span>

        </div>
    </div><!-- End Column -->
    @endforeach
    {{$blogs->render()}}
@else 
<center><h1>Non ci sono blog!</h1>
</br>
<a href="{{route('addblog.addblog.index')}}">Crea il tuo primo blog</a></center>
@endif
@stop

@section('title')
Blogs dell'utente
@stop