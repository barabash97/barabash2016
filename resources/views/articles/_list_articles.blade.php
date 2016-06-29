<?php

use Illuminate\Support\Str;

$blogs_list_assoc = array();
$categories_list_assoc = array();
$users_list_assoc = array();

foreach ($blogs as $blog) {
    $blogs_list_assoc[$blog->id] = $blog;
}

foreach ($categories as $category) {
    $categories_list_assoc[$category->id] = $category;
}

foreach ($users as $user) {
    $users_list_assoc[$user->id] = $user;
}
?>
@extends('layouts.app')

@section('content')
<div class="row">
    @foreach ($articles as $article)
    <div class="col-md-12">
        <!-- ___Start Article & Feature___ -->
        <div class="article-and-feature post-bottom-content one-full-post">
            <h3> {{$article->title}} <span class="mobile-bg">9<a class="mobile-bg" href="#0">9 comment</a></span></h3>
            <div class="meta-info">
                <p class="date"><i class="fa fa-clock-o"></i><a href="#0">{{$article->created_at}}</a></p>
                <p class="category"><i class="fa fa-bookmark"></i>  <a href="#0">{!! $categories_list_assoc[$blogs_list_assoc[$article->id_blog]->id_category]->title !!}</a> </p>
                <p class="author"><i class="fa fa-user"></i> <a href="#0">{!! $users_list_assoc[$blogs_list_assoc[$article->id_blog]->id_user]->firstname !!} {!! $users_list_assoc[$blogs_list_assoc[$article->id_blog]->id_user]->lastname !!}</a></p>
            </div>
            <img class="img-responsive" src="{{asset('article_images/'.$article->path_image)}}" alt="" width="965" height="500" />
            <div class="single-post-content">
                <p>{!!Str::words($article->full_text, 100, ' ... ')!!}
                </p>

                <a class="mobile-color" href="{{route('view_article', ['id' => $article->id])}}"> CONTINUA A LEGGERE <i class="fa fa-arrow-right"></i> </a>
            </div>
        </div><!-- End Article & Feature -->
    </div><!-- End Column -->
    @endforeach

    {{$articles->render()}}
</div>
@stop

