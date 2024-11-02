@extends('admin.layouts.app')

@section('title', 'Đánh giá 5 sao')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Đánh giá player</h1>

    <!-- Form Tìm Kiếm -->
    <form method="GET" action="{{ route('admin.binh-luans.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="Nhập ID player để tìm kiếm..." value="{{ request('query') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Tìm kiếm ID</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="input-group">
                    <select name="danh_gia" class="form-control">
                        <option value="">Chọn số sao</option>
                        <option value="1" {{ request('danh_gia') == '1' ? 'selected' : '' }}>1 sao</option>
                        <option value="2" {{ request('danh_gia') == '2' ? 'selected' : '' }}>2 sao</option>
                        <option value="3" {{ request('danh_gia') == '3' ? 'selected' : '' }}>3 sao</option>
                        <option value="4" {{ request('danh_gia') == '4' ? 'selected' : '' }}>4 sao</option>
                        <option value="5" {{ request('danh_gia') == '5' ? 'selected' : '' }}>5 sao</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Tìm kiếm Sao</button>
                    </div>
                </div>
            </div>
        </div>
    </form> 

    <h3 class="mb-3">Danh sách đánh giá theo từng player</h3>
    <div class="row">
        @foreach($binhLuans->groupBy('player_id') as $playerId => $binhLuansForPlayer)
            <div class="col-md-4 mb-4">
                <div class="player-rating border rounded shadow-sm bg-light p-3">
                    @php
                        // Tính tổng số đánh giá và số sao
                        $totalReviews = $binhLuansForPlayer->count();
                        $starCounts = [
                            1 => $binhLuansForPlayer->where('danh_gia', 1)->count(),
                            2 => $binhLuansForPlayer->where('danh_gia', 2)->count(),
                            3 => $binhLuansForPlayer->where('danh_gia', 3)->count(),
                            4 => $binhLuansForPlayer->where('danh_gia', 4)->count(),
                            5 => $binhLuansForPlayer->where('danh_gia', 5)->count(),
                        ];
                    @endphp

                    <div class="average-rating mb-2">
                        <h5 class="font-weight-bold">Tỷ lệ đánh giá</h5>
                        <div class="star-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <div class="star-count">
                                    <div class="star-label">{{ $i }} <span class="star filled">★</span>:</div>
                                    <div class="bar">
                                        <div class="percentage-bar" style="width: {{ $totalReviews > 0 ? ($starCounts[$i] / $totalReviews) * 100 : 0 }}%;"></div>
                                    </div>
                                    <div class="percentage">{{ $totalReviews > 0 ? number_format(($starCounts[$i] / $totalReviews) * 100, 1) : 0 }}%</div>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <div class="player-stars" style="max-height: 250px; overflow-y: auto;">
                        @foreach ($binhLuansForPlayer as $binhLuan)
                            <div class="rating-item border rounded bg-white p-2 mb-2">
                                <div class="user-stars mb-2">
                                    @for ($j = 1; $j <= 5; $j++)
                                        <span class="star {{ $j <= $binhLuan->danh_gia ? 'filled' : '' }}">★</span>
                                    @endfor
                                </div>
                                <p class="comment mt-2">{{ $binhLuan->noi_dung }}</p>
                                <small class="timestamp text-muted">{{ $binhLuan->created_at ? $binhLuan->created_at->format('d/m/Y H:i:s') : 'Chưa có thời gian' }}</small>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .average-rating { text-align: left; }
    .star-rating { display: flex; flex-direction: column; }
    .star-count { display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px; }
    .bar { background-color: #e0e0e0; border-radius: 5px; height: 20px; flex: 1; margin: 0 10px; position: relative; }
    .percentage-bar { background-color: #28a745; height: 100%; border-radius: 5px; position: absolute; top: 0; left: 0; }
    .player-rating { background-color: #f9f9f9; border: 1px solid #ccc; border-radius: 10px; padding: 20px; margin-bottom: 20px; }
    .rating-item { border: 1px solid #eaeaea; border-radius: 5px; padding: 15px; margin-bottom: 10px; background-color: #ffffff; }
    .comment { margin: 10px 0; }
    .timestamp { font-size: 12px; color: #888; }
    .star { color: #ddd; font-size: 18px; }
    .star.filled { color: gold; }
</style>
@endsection
