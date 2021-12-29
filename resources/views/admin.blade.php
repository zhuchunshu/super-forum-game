@extends("app")

@section('title',"游戏设置")


@section('content')
    <div class="col-md-12">
        <div class="border-0 card">
            <div class="card-body">
                <h3 class="card-title">游戏设置</h3>
                <button id="game-init" class="btn btn-primary">点我初始化数据</button>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ file_hash("plugins/Game/js/admin.js") }}"></script>
@endsection