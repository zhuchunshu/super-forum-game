@extends('Core::app')
@section('title','今天吃什么 | Games')
@section('content')

    <div class="row row-cards justify-content-center">
        <div class="col-md-10" id="game-chishenme-index">
            <div class="border-0 card card-body">
                <div id="chishenme-wrapper">
                    <h1 id="chishenme-h1">
                        今天吃什么，吃什么？
                        <br>
                        <br>
                        <b style="color:#FF9733" id="chishenme-what"></b>
                    </h1>
                    <input class="btn btn-primary" type="button" value="开始" id="chishenme-start"/>
                    <input type="button" class="btn btn-primary" value="开始" id="chishenme-stop" style="display: none;">
                </div>
                <div class="row">
                    <div class="col"></div>
                    <div class="col-auto">
                        @if(Authority()->check("game_chishenme_create"))
                            <a href="/games/chishenme/addFood">add Food ?</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="{{file_hash("plugins/Game/js/chishenme.js")}}"></script>
@endsection

@section('headers')
    <link rel="stylesheet" href="{{file_hash("plugins/Game/css/chishenme.css")}}">
@endsection