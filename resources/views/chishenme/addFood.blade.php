@extends('Core::app')
@section('title','今天吃什么 | Games')
@section('content')

    <div class="row row-cards justify-content-center">
        <div class="col-md-10">
            <div class="border-0 card card-body">
                <div class="card-title">今天吃什么-->add Food</div>
                <div id="vue-chishenme-addFood">
                    <form action="" @submit.prevent="submit">
                        <div class="mb-3">
                            <label class="form-label">Food name</label>
                            <textarea v-model="name" rows="3" type="text" class="form-control" required></textarea>
                            <small>一行一个</small>
                        </div>
                        <button class="btn btn-primary">提交</button>
                    </form>
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