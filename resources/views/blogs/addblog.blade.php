@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">{{trans('blogs.header_title_new_blog')}}</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/addblog') }}" enctype="multipart/form-data">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">{{trans('blogs.title')}}</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">

                    @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>Il titolo del blog è obbligatorio.</strong>
                    </span>
                    @endif
                </div>
            </div>
            
            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">{{trans('blogs.image')}}</label>

                <div class="col-md-6">
                    <input type="file" class="form-control" name="image" value="{{ old('image') }}">

                    @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>Immagine di copertina è obbligatoria.</strong>
                    </span>
                    @endif
                </div>
            </div>
            

            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">{{trans('blogs.description')}}</label>

                <div class="col-md-6">

                    <textarea class="form-control" name="description">{{old('description')}}</textarea>

                    @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>La descrizione del blog è obbligatoria.</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('id_category') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">{{trans('blogs.select_category')}}</label>

                <div class="col-md-6">

                    @foreach($categories as $category)
                    {!!Form::radio("id_category", $category["id"])!!} {!!$category['title']!!}</br>
                    @endforeach

                    @if ($errors->has('id_category'))
                    <span class="help-block">
                        <strong>Seleziona una categoria.</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-sign-in"></i>{{trans('blogs.button_add_blog')}}
                    </button>


                </div>
            </div>


        </form>
    </div>
</div>
@stop

@section('title')
Creare un nuovo blog
@stop