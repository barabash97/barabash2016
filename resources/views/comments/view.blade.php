<!-- ___Start Comments___ -->
<div data-scroll-index="4" class="each-section comments">
    <h3>Commenti <div id="count-comments">0</div></h3>

    <ul class="comments-list" id="comments-box" >

    </ul><!-- End Comments List -->

</div>
<!-- End Comments -->



@include('comments._add_comment', ['id_article' => $id_article])


@section('downscript')

<script src="{{asset('main/js/chat/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('main/js/comments.js')}}"></script>
@stop