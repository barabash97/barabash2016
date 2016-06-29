@section('column')
<?php

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Article;
use App\Models\Comment;
use App\User;

$articles_column = Article::all();
$categories_column = BlogCategory::all();
$blogs_column = Blog::limit(5)->orderBy('id', 'desc')->get();
$users_column = User::limit(5)->orderBy('id', 'desc')->get();
$comments_column = Comment::limit(5)->orderBy('id', 'desc')->get();

$articles_assoc = array();
$categories_assoc = array();

foreach($articles_column as $article_column){
	$articles_assoc[$article_column->id] = $article_column;
}

foreach($categories_column as $category_column){
	$categories_assoc[$category_column->id] = $category_column;
}
?>


    
        <!-- ___Start Sidebar___ -->
        

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

                                @foreach($users_column as $user_column)
                                <li>
                                    <div class="media">
                                        <div class="media-body media-left">
                                            <a href="/user/{{$user_column->id}}"><h3>{{$user_column->firstname}} {{$user_column->lastname}}</h3></a>
                                            <p>{{$user_column->created_at->diffForHumans()}}</p>     
                                        </div>
                                        <div class="media-right">
                                            <img class="img-responsive" src="{{asset('user_images/'.$user_column->path_image)}}" alt="">
                                        </div>
                                    </div><!-- End Media -->
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Tab Pane Popular -->

                        <!-- ___New Blogs___ -->
                        <div role="tabpanel" class="tab-pane fade" id="video">
                            <ul>
                                @foreach($blogs_column as $blog_column)
                                <li>
                                    <div class="media">
                                        <div class="media-body media-left">
                                            <a href="/blog/{{$blog_column->id}}"> <h3>{{$blog_column->title}}</h3></a>
                                            <span>{{$blog_column->created_at->diffForHumans()}}</span>
                                            <p class="mobile-color">{{$categories_assoc[$blog_column->id_category]->title}}</p>
                                        </div>
                                        <div class="media-right">
                                            <img class="img-responsive" src="{{asset('blog_images/'.$blog_column->path_image)}}" alt="">
                                        </div>
                                    </div><!-- End New Blogs -->
                                </li>
                                @endforeach	
                            </ul>
                        </div>
                        <!-- End Tab Pane Video -->

                        <!-- ___Tab Pane Tag___ -->
                        <div role="tabpanel" class="tab-pane fade" id="tag">
                            <ul>
                                @foreach($comments_column as $comment_column)
                                <li>
                                    <div class="media">
                                        <div class="media-body media-left">
                                            <a href="/article/{{$comment_column->id_article}}"><h3>{{$articles_assoc[$comment_column->id_article]->title}}</h3></a>

                                            <p>{{$comment_column->text_comment}}</p>
                                        </div>

                                    </div><!-- End Media -->
                                </li>
                                @endforeach

                            </ul>
                        </div><!-- End Tab Pane Tag-->
                    </div><!-- End Tab Content -->
                </div><!-- End Tab Panel -->
            </div><!-- End Side Tab -->








        <!-- End Sidebar -->
  


@stop
