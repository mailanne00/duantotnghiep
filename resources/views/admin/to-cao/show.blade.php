@extends('admin.layout.app')
@section('script-header')
    <link rel="stylesheet" href="{{asset('assets-admin/plugins/data-tables/css/datatables.min.css')}}">
@endsection
@section('title', 'Chi tiết bản tố cáo số '.$toCao->id  )
@section('content')
<a href="{{route('admin.to-caos.index')}}" class="btn btn-primary mb-3">Quay trở lại</a>
    <!-- [ breadcrumb ] start -->
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Chi tiết đơn tố cáo số {{$toCao->id}}</h5>
                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">

                       <div class="row" style="margin-left: unset; margin-right: unset;">
                           <div class="col-xl-4 col-md-6">
                               <h6 class="text-center">Người tố cáo</h6>
                               <div class="card user-card user-card-1">
                                   <div class="card-header border-0 p-2 pb-0">
                                       <div class="cover-img-block">
                                           <img src="{{asset('assets-admin/images/widget/slider5.jpg')}}" alt=""
                                                class="img-fluid">
                                       </div>
                                   </div>
                                   <div class="card-body pt-0">
                                       <div class="user-about-block text-center">
                                           <div class="row align-items-end">
                                               <div class="col"></div>
                                               <div class="col"><img
                                                       class="img-radius img-fluid wid-80"
                                                       src="{{Storage::url($toCao->nguoiToCao->anh_dai_dien)}}"
                                                       alt="User image"></div>
                                               <div class="col"></div>
                                           </div>
                                       </div>
                                       <div class="text-center">
                                           <h6 class="mb-1 mt-3">{{$toCao->nguoiToCao->ten}}</h6>
                                           <span class="badge text-bg-{{$toCao->nguoiToCao->mau}} mb-3">{{$toCao->nguoiToCao->trangThai2}}</span>
                                       </div>
                                       <div class="row text-center">
                                           <div class="col">
                                               <h6 class="mb-1">{{$toCao->nguoiToCao->countDanhGia}} <i class="fas fa-star f-10 m-l-10 text-c-yellow"></i></h6> 
                                               <p class="mb-0">Đánh giá</p>
                                           </div>
                                           <div class="col">
                                               <h6 class="mb-1">{{$toCao->nguoiToCao->rent['1']}}</h6>
                                               <p class="mb-0">Số đơn hoàn thành</p>
                                           </div>
                                           <div class="col">
                                               <h6 class="mb-1">{{$toCao->nguoiToCao->count}}</h6>
                                               <p class="mb-0">Lượt yêu thích</p>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-xl-4 col-md-6">
                               <h6 class="text-center">Người bị tố cáo</h6>
                               <div class="card user-card user-card-1">
                                   <div class="card-header border-0 p-2 pb-0">
                                       <div class="cover-img-block">
                                           <img src="{{asset('assets-admin/images/widget/slider5.jpg')}}" alt=""
                                                class="img-fluid">
                                       </div>
                                   </div>
                                   <div class="card-body pt-0">
                                       <div class="user-about-block text-center">
                                           <div class="row align-items-end">
                                               <div class="col"></div>
                                               <div class="col"><img
                                                       class="img-radius img-fluid wid-80"
                                                       src="{{Storage::url($toCao->nguoiBiToCao->anh_dai_dien)}}"
                                                       alt="User image"></div>
                                               <div class="col"></div>
                                           </div>
                                       </div>
                                       <div class="text-center">
                                           <h6 class="mb-1 mt-3">{{$toCao->nguoiBiToCao->ten}}</h6>
                                           <span class="badge text-bg-{{$toCao->nguoiBiToCao->mau}} mb-3">{{$toCao->nguoiBiToCao->trangThai2}}</span>
                                       </div>
                                       <div class="row text-center">
                                           <div class="col">
                                               <h6 class="mb-1">{{$toCao->nguoiBiToCao->countDanhGia}} <i class="fas fa-star f-10 m-l-10 text-c-yellow"></i></h6> 
                                               <p class="mb-0">Đánh giá</p>
                                           </div>
                                           <div class="col">
                                               <h6 class="mb-1">{{$toCao->nguoiBiToCao->rent['1']}}</h6>
                                               <p class="mb-0">Số đơn hoàn thành</p>
                                           </div>
                                           <div class="col">
                                               <h6 class="mb-1">{{$toCao->nguoiBiToCao->count}}</h6>
                                               <p class="mb-0">Lượt yêu thích</p>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-xl-4 col-md-6">
                               <h6 class="text-center">Đơn thuê</h6>
                               <div class="card user-card user-card-1">
                                   <div class="card-body pt-0" >
                                       <div class="mt-2" style="display:flex; justify-content:space-between">
                                        <h6>Mã đơn thuê:</h6>
                                        <p>MS-{{$toCao->donThue->id}}</p>
                                       </div>
                                       <div class="mt-2" style="display:flex; justify-content:space-between">
                                        <h6>Giờ bắt đầu:</h6>
                                        <p>{{$toCao->donThue->created_at}}</p>
                                       </div>
                                       <div class="mt-2" style="display:flex; justify-content:space-between">
                                        <h6>Giờ kết thúc:</h6>
                                        <p>{{$toCao->donThue->thoi_gian_ket_thuc}}</p>
                                       </div>
                                       <div class="mt-2" style="display:flex; justify-content:space-between">
                                        <h6>Giá thuê 1 giờ:</h6>
                                        <p>{{number_format($toCao->donThue->gia_thue,0,'.')}} VNĐ</p>
                                       </div>
                                       <div class="mt-2" style="display:flex; justify-content:space-between">
                                        <h6>Số giờ thuê:</h6>
                                        <p>{{$toCao->donThue->gio_thue}}</p>
                                       </div>
                                       <div class="mt-2" style="display:flex; justify-content:space-between">
                                        <h6>Tổng số tiền:</h6>
                                        <p>{{number_format($toCao->donThue->gia_thue * $toCao->donThue->gio_thue,0,'')}} VNĐ</p>
                                       </div>
                                       <div class="mt-2" style="display:flex; justify-content:space-between">
                                        <h6>Lợi nhuận thu về:</h6>
                                        <p>{{number_format($toCao->donThue->gia_thue * $toCao->donThue->gio_thue * 0.1,0,'')}} VNĐ</p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>


                    </div>
                </div>
                <div class="card-body msg-block">
                    <h6>Đoạn chat của 2 người</h6>
                    <div class="row mt-3">
                        <div class="col-lg-12 col-md-12 position-relative">
                            <div class="ch-block">
                                <div class="h-list-body">
                                    <div class="msg-user-chat scroll-div">
                                        <div class="main-friend-chat">
                                            <div class="d-flex chat-messages">
                                                <a class="media-left photo-table" href="#!"><img
                                                        class="img-fluid media-object img-radius m-t-5"
                                                        src="{{asset('assets-admin/images/user/avatar-2.jpg')}}"
                                                        alt="Generic placeholder image"></a>
                                                <div class="media-body chat-menu-content">
                                                    <div class="">
                                                        <p class="chat-cont">hello Elite! Will
                                                            you
                                                            tell me something</p>
                                                        <div class="clearfix"></div>
                                                        <p class="chat-cont">about yourself?</p>
                                                    </div>
                                                    <p class="chat-time">8:20 a.m.</p>
                                                </div>
                                            </div>
                                            <div class="d-flex chat-messages">
                                                <div class="flex-grow-1 chat-menu-reply">
                                                    <div class="">
                                                        <p class="chat-cont">Ohh! very nice</p>
                                                    </div>
                                                    <p class="chat-time">8:22 a.m.</p>
                                                </div>
                                                <a class="media-right photo-table" href="#!"><img
                                                        class="media-object img-radius img-radius m-t-5"
                                                        src="{{asset('assets-admin/images/user/avatar-1.jpg')}}"
                                                        alt="Generic placeholder image"></a>
                                            </div>
                                            <div class="d-flex chat-messages">
                                                <a class="media-left photo-table" href="#!"><img
                                                        class="img-fluid media-object img-radius m-t-5"
                                                        src="{{asset('assets-admin/images/user/avatar-2.jpg')}}"
                                                        alt="Generic placeholder image"></a>
                                                <div class="media-body chat-menu-content">
                                                    <div class="">
                                                        <p class="chat-cont">can you help me?
                                                        </p>
                                                    </div>
                                                    <p class="chat-time">8:20 a.m.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <!-- [ Main Content ] end -->
@endsection
@section('script-footer')
    <script src="{{asset('assets-admin/plugins/data-tables/js/datatables.min.js')}}"></script>
    <script src="{{asset('assets-admin/js/pages/data-basic-custom.js')}}"></script>
    <script !src="">
        let b = document.getElementsByClassName('overlay-image')[0];
        function largeImage(id) {
            let a = document.getElementById('image'+id);
            a.style.width = '500px';
            a.style.position = 'fixed';
            a.style.top = '50%';
            a.style.left = '50%';
            a.style.zIndex = '2300';
            a.style.transform = 'translate(-50%, -50%)'
            b.style.display = 'block';
            b.addEventListener('click', ()=> {
                b.style.display = 'none';
                a.style.top = 'unset';
                a.style.left = 'unset';
                a.style.position = 'relative';
                a.style.transform = 'unset';
                a.style.width = '100px';
            })
        }
    </script>
@endsection
