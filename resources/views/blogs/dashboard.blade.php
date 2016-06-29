<?php
/*
 * var $articles: all articles
 * var $blog: Blog info 
 */

use Illuminate\Support\Str;
$id_blog = $blog->id;
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
    @if(count($articles) > 0)
    @foreach ($articles as $article)
    <div class="col-md-12">
        <!-- ___Start Article & Feature___ -->
        <div class="article-and-feature post-bottom-content one-full-post">
            <h3> {{$article->title}} <span class="mobile-bg">9<a class="mobile-bg" href="#0">9 comment</a></span></h3>
            <div class="meta-info">
                <p class="date"><i class="fa fa-clock-o"></i><a href="#0">{{$article->created_at->diffForHumans()}}</a></p>
                <p class="category"><i class="fa fa-bookmark"></i>  <a href="#0">{{$categories_list_assoc[$blogs_list_assoc[$article->id_blog]->id_category]->title}}</a> </p>
                <p class="author"><i class="fa fa-user"></i> <a href="#0">{{$users_list_assoc[$blogs_list_assoc[$article->id_blog]->id_user]->firstname}} {{$users_list_assoc[$blogs_list_assoc[$article->id_blog]->id_user]->lastname}}</a></p>
            </div>
            <img class="img-responsive" src="{{asset('article_images/'.$article->path_image)}}" alt="" height="60%"/>
            <div class="single-post-content">
                <p>{!!Str::words($article->full_text, 100, ' ... ')!!}
                </p>

                <a class="mobile-color" href="{{route('view_article', ['id' => $article->id])}}"> CONTINUA A LEGGERE <i class="fa fa-arrow-right"></i> </a>
            </div>
        </div><!-- End Article & Feature -->
    </div><!-- End Column -->
    @endforeach
    {{$articles->render()}}
   @else 
   <center>
       <h1>Non ci sono articoli!</h1>
       @if(Auth::user()->id == $blog->id_user)
       <a href="{{route('add_article.blog.{id}.add_article.index', ['id' => $blog->id])}}"><h3>Scrivere il primo articolo</h3></a>
       @endif
   </center>
    @endif
</div>
@stop


@section('column')
<?php

use App\Models\Blog;
use App\Models\Comment;
use App\User;

$blogs = Blog::limit(5)->orderBy('id', 'desc')->get();
$users = User::limit(5)->orderBy('id', 'desc')->get();
$comments = Comment::limit(5)->orderBy('id', 'desc')->get();

$blog_info = Blog::where('id', '=', $id_blog)->first();


?>
    <!-- ___Start Sidebar___ -->
        

            <!-- ___Start Info Blog___ -->
            <div class="sidebar-widget sidebar-about">
                <h3>{{$blog_info->title}}</h3>
                <div class="about-image">
                    <img class="img-responsive" src="{{asset('blog_images/'.$blog_info->path_image)}}" alt="" />
                    @if(Auth::user()->id === $blog_info->id_user)
                    <center><a href="{{route('edit_image_blog', ['id' => $blog_info->id])}}">Cambiare immagine</a></center>
                @endif
                </div>
                
                <p>{!!$blog->description!!}</p>
            </div> <!-- End Info Blog -->

            @if(Auth::user()->id === $blog->id_user)

            <!-- ___Start Options Button Admin___ -->
            <div class="sidebar-widget sidebar-ads">
                <center>
                <h3>OPZIONI</h3></br>
                
                <a href="{{route('add_article.blog.{id}.add_article.index', ['id' => $blog_info->id])}}"><button type="button" class="btn btn-large btn-primary">Nuovo articolo</button></a>
                <a href="{{route('edit_blog.edit_blog.{id}.index', ['id' => $blog_info->id])}}"><button type="button" class="btn btn-large btn-primary">Modifica il blog</button></a>
                
                </center>
            </div><!-- End Options Button Admin-->
            @endif


            <div class="sidebar-widget sidebar-tab">
                <div role="tabpanel">
                    <!-- Nav Tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#popular" aria-controls="popular" role="tab" data-toggle="tab">Nuovi utenti</a></li>
                        <li role="presentation"><a href="#video" aria-controls="video" role="tab" data-toggle="tab">Nuovi blog</a></li>
                        <li role="presentation"><a href="#tag" aria-controls="tag" role="tab" data-toggle="tab">Ultimi commenti</a></li>
                    </ul>

                    <!-- ___Tab Content___ -->
                    <div class="tab-content">
                        <!-- ___Tab Pane Popular___ -->
                        <div role="tabpanel" class="tab-pane fade in active" id="popular">
                            <ul>

                                @foreach($users as $user)
                                <li>
                                    <div class="media">
                                        <div class="media-body media-left">
                                            <h3>{{$user->firstname}} {{$user->lastname}}</h3>
                                            <span>{{$user->created_at->diffForHumans()}}</span>
                                            <p class="travel-color">Travel</p>
                                        </div>
                                        <div class="media-right">
                                            <img class="img-responsive" src="{{asset('user_images/'.$user->path_image)}}" alt="">
                                        </div>
                                    </div><!-- End Media -->
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Tab Pane Popular -->

                        <!-- ___Tab Pane Video___ -->
                        <div role="tabpanel" class="tab-pane fade" id="video">
                            <ul>
                                @foreach($blogs as $blog)
                                <li>
                                    <div class="media">
                                        <div class="media-body media-left">
                                            <h3>{{$blog->title}}</h3>
                                            <span>{{$blog->created_at->diffForHumans()}}</span>
                                            <p class="mobile-color">{{$blog->id_category}}</p>
                                        </div>
                                        <div class="media-right">
                                            <img class="img-responsive" src="{{asset('blog_images/'.$blog->path_image)}}" alt="">
                                        </div>
                                    </div><!-- End Media -->
                                </li>
                                @endforeach	
                            </ul>
                        </div>
                        <!-- End Tab Pane Video -->

                        <!-- ___Tab Pane Tag___ -->
                        <div role="tabpanel" class="tab-pane fade" id="tag">
                            <ul>
                                @foreach($comments as $comment)
                                <li>
                                    <div class="media">
                                        <div class="media-body media-left">
                                            <h3>{{$comment->id_article}}</h3>

                                            <p>{{$comment->text_comment}}</p>
                                        </div>

                                    </div><!-- End Media -->
                                </li>
                                @endforeach

                            </ul>
                        </div><!-- End Tab Pane Tag-->
                    </div><!-- End Tab Content -->
                </div><!-- End Tab Panel -->
            </div><!-- End Side Tab -->


@stop