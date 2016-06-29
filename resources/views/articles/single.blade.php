<?php
use App\Models\Blog;
$categories_list_assoc = array();
$users_list_assoc = array();
$blog_info = Blog::where('id', '=', $article->id_blog)->first();
foreach ($categories as $category) {
    $categories_list_assoc[$category->id] = $category;
}

foreach ($users as $user) {
    $users_list_assoc[$user->id] = $user;
}
?>

@extends('layouts.app')

@section('content')
<div class="single-post">

    <!-- ___Start Article & Feature___ -->
    <div class="article-and-feature post-bottom-content bg-box-shadow each-section" data-scroll-index="0">
        <h3>{{$article->title}}</h3>
        <div class="meta-info">
            <p class="date"><i class="fa fa-clock-o"></i><a href="#0">{{$article->created_at}}</a></p>
            <p class="category"><i class="fa fa-bookmark"></i>  <a href="#0">{{$categories_list_assoc[$article_blog->id_category]->title}}</a> </p>
            <p class="author"><i class="fa fa-user"></i> <a href="/user/{{$users_list_assoc[$article_blog->id_user]->id}}">{{$users_list_assoc[$article_blog->id_user]->firstname}} {{$users_list_assoc[$article_blog->id_user]->lastname}}</a></p>
        </div>
        <img src="{{asset('article_images/'.$article->path_image)}}" alt="" width="800" height="500">

        <div class="article-content">
            <p>{!!$article->full_text!!}</p>
        </div>
    </div>
    @yield('comments')
    @include('comments.view', ['id_article' => $article->id])
</div>

<script>
    var id_article = "{!!$article->id!!}";
</script>
@stop

@section('up_column')
@if(count($blog_info) > 0 && Auth::user()->id === $blog_info->id_user)

<!-- ___Start Options Button Admin___ -->
<div class="sidebar-widget sidebar-ads">
    <center>
        <h3>OPZIONI</h3></br>
        <a href="{{route('view_edit_image_article', ['id' => $article->id])}}"><button type="button" class="btn btn-large btn-primary">Cambiare immagine</button></a>
        <a href="{{route('edit_article.edit_article.{id}.index', ['id' => $article->id])}}"><button type="button" class="btn btn-large btn-primary">Modificare articolo</button></a>
        <a href="{{route('delete_article', ['id' => $article->id])}}"><button type="button" class="btn btn-large btn-primary">Eliminare articolo</button></a>
        
        

    </center>
</div><!-- End Options Button Admin-->
@endif
@stop


@section('title')
{{$article->title}}
@stop