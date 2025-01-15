@extends('client.layouts.app')
@section('title', 'Rút tiền')
@section('content')
<section class="flat-title-page inner">
    <div class="overlay"></div>
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading mg-bt-12">
                    <h1 class="heading text-center">Rút tiền</h1>
                </div>
                <div class="breadcrumbs style2">
                    <ul>
                        <li><a href="index-2.html">Trang chủ</a></li>
                        <li><a href="#">Thông tin cá nhân</a></li>
                        <li>Rút tiền</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="tf-connect-wallet tf-section">
    <div class="themesflat-container" style="margin-top: -50px">
        <div class="row">
            <div class="col-12" style="display: flex; justify-content:space-between">
                <h2 class="tf-title-heading ct style-2 mb-5" style="margin-left: 40%">
                    Chọn ngân hàng nhận tiền
                </h2>
                <input type="text" id="bankSearch" class="form-control" placeholder="Tìm kiếm ngân hàng..." onkeyup="filterBanks()" style="margin-bottom: 20px; width:400px">
            </div>
            <div class="col-md-12">
                <div class="sc-box-icon-inner style-2" id="bankList">
                    @foreach ($banks['data'] as $bank)
                    <div class="sc-box-icon" data-bank-name="{{ strtolower($bank['shortName']) }}">
                        <input type="hidden" value="{{$bank['shortName']}}">
                        <div class="img" style="background:#fff; width:120px; margin: 0 auto 25px auto;">
                            <img src="{{$bank['logo']}}" alt="Image" width="120px">
                        </div>
                        <a href="{{route('client.rutTien.create')}}?bankName={{$bank['shortName']}}"><h4 class="heading">{{$bank['name']}}</h4></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script_footer')
<script>
    function filterBanks() {
        // Lấy giá trị từ ô tìm kiếm
        let searchValue = document.getElementById('bankSearch').value.toLowerCase();

        // Lấy danh sách các ngân hàng
        let banks = document.querySelectorAll('#bankList .sc-box-icon');

        // Lặp qua từng ngân hàng và kiểm tra
        banks.forEach(bank => {
            let bankName = bank.getAttribute('data-bank-name');
            if (bankName.includes(searchValue)) {
                bank.style.display = ''; // Hiển thị ngân hàng phù hợp
            } else {
                bank.style.display = 'none'; // Ẩn ngân hàng không phù hợp
            }
        });
    }
</script>

@endsection