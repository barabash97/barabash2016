<?php

use Illuminate\Support\Str;
?>

@extends('layouts.app')

@section('content')
@if( count($articles) > 0 )
    @foreach ($articles as $article)
    <div class="col-md-12">
        <!-- ___Start Article & Feature___ -->
        <div class="article-and-feature post-bottom-content one-full-post">
            <h3> {{$article->title}} <span class="mobile-bg">9<a class="mobile-bg" href="#0">9 comment</a></span></h3>
            <div class="meta-info">
                <p class="date"><i class="fa fa-clock-o"></i><a href="#0">{{$article->created_at}}</a></p>
                <p class="category"><i class="fa fa-bookmark"></i>  <a href="#0">mobile</a> </p>
                <p class="author"><i class="fa fa-user"></i> <a href="#0">{{$article->id_blog}}</a></p>
            </div>
            <img class="img-responsive" src="images/noimage_article.jpg" alt="" />
            <div class="single-post-content">
                <p>{!!Str::words($article->full_text, 100, ' ... ')!!}
                </p>

                <a class="mobile-color" href="{{route('view_article', ['id' => $article->id])}}"> CONTINUA A LEGGERE <i class="fa fa-arrow-right"></i> </a>
            </div>
        </div><!-- End Article & Feature -->
    </div><!-- End Column -->
    @endforeach
    @else 
    <center><h1>Nessun risultato!</h1></center>
    @endif
    @stop