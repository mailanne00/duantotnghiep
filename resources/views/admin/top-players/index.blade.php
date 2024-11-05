@extends('admin.layouts.app')

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Thống kê player</h5>
            </div>
            
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên người chơi</th>
                                <th>Số lượt theo dõi</th>
                                <th>Số lần thuê</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($players as $player)
                                <tr>
                                    <td>{{ $player->id }}</td>
                                    <td>{{ $player->thong_tin }}</td>
                                    <td>{{ $player->followers_count }}</td>
                                    <td>{{ $player->hire_logs_count }}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tên người chơi</th>
                                <th>Số lượt theo dõi</th>
                                <th>Số lần thuê</th>
                                
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
