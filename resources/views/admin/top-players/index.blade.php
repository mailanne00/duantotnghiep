@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Top Players</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên Player</th>
                        <th>Lượt tăng follow</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($players as $player)
                    <tr>
                        <td>{{ $player->ten }}</td>
                        <td>{{ $player->follows_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>
@endsection