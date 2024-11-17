@extends('admin.layout.app')

@section('title', 'Chi tiết tài khoản')

@section('content')
    <div class="row mb-n4">
        <div class="col-xl-6 col-md-6">
            <div class="card user-card user-card-1">
                <div class="card-header border-0 p-2 pb-0">
                    <div class="cover-img-block">
                        <img src="{{asset('assets/images/widget/slider5.jpg')}}" alt=""
                             class="img-fluid">
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="user-about-block text-center">
                        <div class="row align-items-end">
                            <div class="col"></div>
                            <div class="col"><img
                                    class="img-radius img-fluid wid-80"
                                    src="{{\Illuminate\Support\Facades\Storage::url($taiKhoan->anh_dai_dien)}}"
                                    alt="User image"></div>
                            <div class="col"></div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h6 class="mb-1 mt-3">{{$taiKhoan->ten}}</h6>
                        <p class="mb-3 text-muted">VIP 1</p>
                    </div>
                    <hr class="wid-80 b-wid-3 my-4 m-auto">
                    <div class="row text-center">
                        <div class="col">
                            <h6 class="mb-1">37</h6>
                            <p class="mb-0">Mails</p>
                        </div>
                        <div class="col">
                            <h6 class="mb-1">2749</h6>
                            <p class="mb-0">Số giờ thuê</p>
                        </div>
                        <div class="col">
                            <h6 class="mb-1">678</h6>
                            <p class="mb-0">Người theo dõi</p>
                        </div>
                    </div>
                    <hr class="wid-80 b-wid-3 my-4 m-auto">
                    <div class="text-center">
                        <h6 class="mb-1">Thông tin client</h6>
                        <p class="mb-1">
                            anccdncdjcndjncjdncsjnckjnjnvdfnvxnvjvndfnvfdjnzvlvnlvnflvndjfvndkzjnvznvdjkvndznvdkz
                            fjdzjkvbzjkbdjvbdzjjhvbjdhvbhdj vh jdbjfhvbdfhvbhfbvjhfbvhjbdvhbvjbnckxjncjk
                            xvfjvhbx vhfbvxnvjfnvhbvjxnknjnvfvfvh jvnvnkjxfnvfk vnxfkvnxjkfvn vfjkvnfjvnfxlk
                            nvxfkjvnjxnv vjfvbfkdvnjfv vjfnvjnfjvnxf jfbvjxnvkxnfvkjv jkfvnxkvnx</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card user-card user-card-1">
                <div class="col mt-4">
                    <div class="row">
                        <div class="col">
                            <h6 style=" margin-left: 30px">Biệt danh</h6>
                        </div>
                        <div class="col">
                            <p >{{$taiKhoan->email}}</p>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="row">
                        <div class="col">
                            <h6 style=" margin-left: 30px">Email</h6>
                        </div>
                        <div class="col">
                            <p >{{$taiKhoan->email}}</p>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="row">
                        <div class="col">
                            <h6 style=" margin-left: 30px">Giới tính</h6>
                        </div>
                        <div class="col">
                            <p><img style="width: 30px;" src="{{$taiKhoan->gioi_tinh =='nam' ? 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Male_symbol_%28heavy_blue%29.svg/1200px-Male_symbol_%28heavy_blue%29.svg.png' : 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Venus_symbol_%28heavy_copper%29.svg/220px-Venus_symbol_%28heavy_copper%29.svg.png'}}" alt=""></p>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="row">
                        <div class="col">
                            <h6 style=" margin-left: 30px">Ngày sinh</h6>
                        </div>
                        <div class="col">
                            <p >{{$taiKhoan->ngay_sinh}}</p>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="row">
                        <div class="col">
                            <h6 style=" margin-left: 30px">Địa chỉ</h6>
                        </div>
                        <div class="col">
                            <p >{{$taiKhoan->dia_chi}}</p>
                        </div>
                    </div>
                </div>
                @if($taiKhoan->sdt != null)
                    {
                    <div class="col mt-3">
                        <div class="row">
                            <div class="col">
                                <h6 style=" margin-left: 30px">Số điện thoại</h6>
                            </div>
                            <div class="col">
                                <p >{{$taiKhoan->sdt}}</p>
                            </div>
                        </div>
                    </div>
                    }
                @endif
                <div class="col mt-3">
                    <div class="row">
                        <div class="col">
                            <h6 style=" margin-left: 30px">Số dư</h6>
                        </div>
                        <div class="col">
                            <p >{{number_format($taiKhoan->so_du,0,',')}} VNĐ</p>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="row">
                        <div class="col">
                            <h6 style=" margin-left: 30px">Giá thuê 1 giờ</h6>
                        </div>
                        <div class="col">
                            <p>{{number_format($taiKhoan->so_du,0,',')}} VNĐ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
