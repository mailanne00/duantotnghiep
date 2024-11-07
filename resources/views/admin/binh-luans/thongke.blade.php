@extends('admin.layouts.app')
<<<<<<< HEAD <title>@yield('title', 'Thống kê đánh giá')</title>
    =======
    <title>@yield('title', 'Thống kê đánh giá')</title>
    >>>>>>> 5afc1b509a6547a168f575aff41bb0ef4107761f


    @section('title', 'Đánh giá 5 sao')

    @section('content')
        <div class="container">
            <h1 class="text-center mb-4">Đánh giá player</h1>

            <div class="row">
                @foreach ($binhLuans->groupBy('player_id') as $playerId => $binhLuansForPlayer)
                    <div class="col-md-4 mb-4">
                        <div class="player-rating border rounded shadow-sm bg-light p-3">

                            <!-- Phần Tỷ Lệ Đánh Giá -->
                            <div class="average-rating mb-2">
                                <h5 class="font-weight-bold">Tỷ lệ đánh giá</h5>
                                <div class="star-rating">
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

                                    @for ($i = 1; $i <= 5; $i++)
                                        <div class="star-count">
                                            <div class="star-label">{{ $i }} <span class="star filled">★</span>:
                                            </div>
                                            <div class="bar">
                                                <div class="percentage-bar"
                                                    style="width: {{ $totalReviews > 0 ? ($starCounts[$i] / $totalReviews) * 100 : 0 }}%;">
                                                </div>
                                            </div>
                                            <div class="percentage">
                                                {{ $totalReviews > 0 ? number_format(($starCounts[$i] / $totalReviews) * 100, 1) : 0 }}%
                                            </div>
                                            <div class="container">
                                                <h1 class="text-center mb-4">Đánh giá player</h1>

                                                <div class="row">
                                                    @foreach ($binhLuans->groupBy('player_id') as $playerId => $binhLuansForPlayer)
                                                        <div class="col-md-4 mb-4">
                                                            <div
                                                                class="player-rating border rounded shadow-sm bg-light p-3">

                                                                <!-- Phần Tỷ Lệ Đánh Giá -->
                                                                <div class="average-rating mb-2">
                                                                    <h5 class="font-weight-bold">Tỷ lệ đánh giá</h5>
                                                                    <div class="star-rating">
                                                                        @php
                                                                            // Tính tổng số đánh giá và số sao
                                                                            $totalReviews = $binhLuansForPlayer->count();
                                                                            $starCounts = [
                                                                                1 => $binhLuansForPlayer
                                                                                    ->where('danh_gia', 1)
                                                                                    ->count(),
                                                                                2 => $binhLuansForPlayer
                                                                                    ->where('danh_gia', 2)
                                                                                    ->count(),
                                                                                3 => $binhLuansForPlayer
                                                                                    ->where('danh_gia', 3)
                                                                                    ->count(),
                                                                                4 => $binhLuansForPlayer
                                                                                    ->where('danh_gia', 4)
                                                                                    ->count(),
                                                                                5 => $binhLuansForPlayer
                                                                                    ->where('danh_gia', 5)
                                                                                    ->count(),
                                                                            ];
                                                                        @endphp

                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            <div class="star-count">
                                                                                <div class="star-label">{{ $i }}
                                                                                    <span class="star filled">★</span>:
                                                                                </div>
                                                                                <div class="bar">
                                                                                    <div class="percentage-bar"
                                                                                        style="width: {{ $totalReviews > 0 ? ($starCounts[$i] / $totalReviews) * 100 : 0 }}%;">
                                                                                    </div>
                                                                                </div>
                                                                        @endfor
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <!-- Phần Bình Luận -->
                                                <div class="comments-section mt-4 bg-light p-3">
                                                    <h5 class="font-weight-bold">Bình luận ({{ $binhLuans->count() }})</h5>

                                                    <!-- Lọc theo số sao -->
                                                    <div class="filter-rating mb-3">
                                                        <label for="filter-stars" class="mr-2">Lọc theo số sao:</label>
                                                        <select id="filter-stars" class="form-control"
                                                            onchange="filterComments(this.value)">
                                                            <option value="">Tất cả</option>
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <option value="{{ $i }}">{{ $i }} sao
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>

                                                    @foreach ($binhLuans as $binhLuan)
                                                        <div class="comment-item p-3 mb-3 border rounded comment"
                                                            data-rating="{{ $binhLuan->danh_gia }}">
                                                            <div class="comment-header d-flex justify-content-between">
                                                                <span
                                                                    class="comment-author font-weight-bold">{{ $binhLuan->taiKhoan->ten }}</span>
                                                                <span
                                                                    class="timestamp">{{ $binhLuan->created_at ? $binhLuan->created_at->format('d/m/Y H:i:s') : 'Chưa có thời gian' }}</span>
                                                            </div>
                                                            <div class="rating-stars mb-2">
                                                                @for ($j = 1; $j <= 5; $j++)
                                                                    <span
                                                                        class="star {{ $j <= $binhLuan->danh_gia ? 'filled' : '' }}">★</span>
                                                                @endfor
                                                            </div>
                                                            <p class="comment-content mt-2">{{ $binhLuan->noi_dung }}</p>
                                                        </div>
                                                    @endforeach

                                                    <div class="pagination-wrapper">
                                                        {{ $binhLuans->links() }}
                                                    </div>
                                                </div>
                                            </div>

                                            <style>
                                                .comments-section {
                                                    background-color: #f9f9f9;
                                                    border-radius: 8px;
                                                    padding: 20px;
                                                }

                                                .comment-item {
                                                    background-color: #fff;
                                                    border: 1px solid #e0e0e0;
                                                    border-radius: 8px;
                                                    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                                                }

                                                .comment-header {
                                                    display: flex;
                                                    justify-content: space-between;
                                                    align-items: center;
                                                }

                                                .comment-author {
                                                    font-size: 16px;
                                                    color: #333;
                                                }

                                                .rating-stars {
                                                    font-size: 18px;
                                                    color: #ffd700;
                                                    /* Màu vàng cho sao */
                                                }

                                                .star {
                                                    color: #ddd;
                                                }

                                                .star.filled {
                                                    color: #ffd700;
                                                }

                                                .timestamp {
                                                    font-size: 12px;
                                                    color: #888;
                                                }

                                                .comment-content {
                                                    margin: 10px 0;
                                                    font-size: 14px;
                                                    color: #333;
                                                }

                                                .pagination-wrapper {
                                                    margin-top: 15px;
                                                }

                                                .average-rating {
                                                    text-align: left;
                                                }

                                                .star-rating {
                                                    display: flex;
                                                    flex-direction: column;
                                                }

                                                .star-count {
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: space-between;
                                                    margin-bottom: 10px;
                                                }

                                                .bar {
                                                    background-color: #e0e0e0;
                                                    border-radius: 5px;
                                                    height: 20px;
                                                    flex: 1;
                                                    margin: 0 10px;
                                                    position: relative;
                                                }

                                                .percentage-bar {
                                                    background-color: #28a745;
                                                    height: 100%;
                                                    border-radius: 5px;
                                                    position: absolute;
                                                    top: 0;
                                                    left: 0;
                                                }

                                                .player-rating {
                                                    background-color: #f9f9f9;
                                                    padding: 20px;
                                                    margin-bottom: 20px;
                                                }
                                            </style>

                                            <script>
                                                function filterComments(stars) {
                                                    const comments = document.querySelectorAll('.comment-item');
                                                    comments.forEach(comment => {
                                                        const rating = comment.getAttribute('data-rating');
                                                        if (stars === "" || rating == stars) {
                                                            comment.style.display = "block";
                                                        } else {
                                                            comment.style.display = "none";
                                                        }
                                                    });
                                                }
                                            </script>

                                        </div>
                                </div>
                @endforeach
            </div>

            <!-- Phần Bình Luận -->
            <div class="comments-section mt-4 bg-light p-3">
                <h5 class="font-weight-bold">Bình luận ({{ $binhLuans->count() }})</h5>

                <!-- Lọc theo số sao -->
                <div class="filter-rating mb-3">
                    <label for="filter-stars" class="mr-2">Lọc theo số sao:</label>
                    <select id="filter-stars" class="form-control" onchange="filterComments(this.value)">
                        <option value="">Tất cả</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }} sao</option>
                        @endfor
                    </select>
                </div>

                @foreach ($binhLuans as $binhLuan)
                    <div class="comment-item p-3 mb-3 border rounded comment" data-rating="{{ $binhLuan->danh_gia }}">
                        <div class="comment-header d-flex justify-content-between">
                            <span class="comment-author font-weight-bold">{{ $binhLuan->taiKhoan->ten }}</span>
                            <span
                                class="timestamp">{{ $binhLuan->created_at ? $binhLuan->created_at->format('d/m/Y H:i:s') : 'Chưa có thời gian' }}</span>
                        </div>
                        <div class="rating-stars mb-2">
                            @for ($j = 1; $j <= 5; $j++)
                                <span class="star {{ $j <= $binhLuan->danh_gia ? 'filled' : '' }}">★</span>
                            @endfor
                        </div>
                        <p class="comment-content mt-2">{{ $binhLuan->noi_dung }}</p>
                    </div>
                @endforeach

                <div class="pagination-wrapper">
                    {{ $binhLuans->links() }}
                </div>
            </div>
        </div>

        <style>
            .comments-section {
                background-color: #f9f9f9;
                border-radius: 8px;
                padding: 20px;
            }

            .comment-item {
                background-color: #fff;
                border: 1px solid #e0e0e0;
                border-radius: 8px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            }

            .comment-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .comment-author {
                font-size: 16px;
                color: #333;
            }

            .rating-stars {
                font-size: 18px;
                color: #ffd700;
                /* Màu vàng cho sao */
            }

            .star {
                color: #ddd;
            }

            .star.filled {
                color: #ffd700;
            }

            .timestamp {
                font-size: 12px;
                color: #888;
            }

            .comment-content {
                margin: 10px 0;
                font-size: 14px;
                color: #333;
            }

            .pagination-wrapper {
                margin-top: 15px;
            }

            .average-rating {
                text-align: left;
            }

            .star-rating {
                display: flex;
                flex-direction: column;
            }

            .star-count {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 10px;
            }

            .bar {
                background-color: #e0e0e0;
                border-radius: 5px;
                height: 20px;
                flex: 1;
                margin: 0 10px;
                position: relative;
            }

            .percentage-bar {
                background-color: #28a745;
                height: 100%;
                border-radius: 5px;
                position: absolute;
                top: 0;
                left: 0;
            }

            .player-rating {
                background-color: #f9f9f9;
                padding: 20px;
                margin-bottom: 20px;
            }
        </style>

        <script>
            function filterComments(stars) {
                const comments = document.querySelectorAll('.comment-item');
                comments.forEach(comment => {
                    const rating = comment.getAttribute('data-rating');
                    if (stars === "" || rating == stars) {
                        comment.style.display = "block";
                    } else {
                        comment.style.display = "none";
                    }
                });
            }
        </script>

    @endsection
