@extends('layouts.one_column')

@section('content')



<div class="col-lg-4 col-lg-offset-4">
    <h1 id="greeting">Stai chattando con: <span id="username">{!! $users[1]->firstname!!} {!! $users[1]->lastname!!}</span></h1>

    <div id="chat-window" class="col-lg-12 pre-scrollable">
        
    </div>
    <div class="col-lg-12">
        <div id="typingStatus" class="col-lg-12" style="padding: 15px"></div>
            <input type="hidden" id="id_dialog" value="{{$id_dialog}}" />
            <input type="text" id="text_message" class="form-control col-lg-12" autofocus="">


    </div>
</div>
<p id='demo'></p>

<script>
    var user_id = "{!!Auth::user()->id!!}";
    var dialog_id = "{!!$id_dialog!!}";
</script>
<script src="{{asset('main/js/chat/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('main/js/chat/chats.js')}}"></script>

@endsection