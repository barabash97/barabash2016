@extends('layouts.app')

@section('content')
	
                    <form class="form-horizontal" role="form" method="POST" action="">
                        {!! csrf_field() !!}
   
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{trans('articles.title')}}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ old('title', $article['title']) }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>Il titolo è obbligatorio.</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('meta_key') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{trans('articles.meta_key')}}</label>

                            <div class="col-md-6">
                                
                                <input type="text" class="form-control" name="meta_key" value="{{ old('meta_key', $article['meta_key']) }}">

                                @if ($errors->has('meta_key'))
                                    <span class="help-block">
                                        <strong>Il campo keywords è obbligatorio.</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('meta_desc') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{trans('articles.meta_desc')}}</label>

                            <div class="col-md-6">
                                
                                <input type="text" class="form-control" name="meta_desc" value="{{ old('meta_desc', $article['meta_data']) }}">

                                @if ($errors->has('meta_desc'))
                                    <span class="help-block">
                                        <strong>Il campo description è obbligatorio.</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('full_text') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{trans('articles.full_text')}}</label></br>

                           
                            </br>
                                <center> <textarea class="form-control" name="full_text" rows="50" cols="50">{{old('full_text', $article['full_text'])}}</textarea></center>

                                @if ($errors->has('full_text'))
                                    <span class="help-block">
                                        <strong>Il testo dell'articolo è vuoto!.</strong>
                                    </span>
                                @endif
                           
                        </div>

                       

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>{{trans('articles.button_edit_article')}}
                                </button>

                  
                            </div>
                        </div>

                  
                    </form>

                <script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section('title')
    {{trans('articles.header_edit_article')}}
@stop