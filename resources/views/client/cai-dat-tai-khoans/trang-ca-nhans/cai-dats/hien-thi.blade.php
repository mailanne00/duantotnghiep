@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Hiển thị')

@section('content')

<div class="col-lg-9 col-12">

    <div class="aside">

        <h3>Cài đặt hiển thị</h3>

        <hr>

        <div class="user-setting-display">

            <div class="table-responsive">

                <table class="table">

                    <tbody>

                        <tr>

                            <td>

                                <p>Đăng ký thành viên</p>

                            </td>

                            <td>

                                <input id="chck1" type="checkbox" class="opacity-0">

                                <label for="chck1" class="check-trail">

                                    <span class="check-handler"></span>

                                </label>

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <p>Hiển thị số thành viên</p>

                            </td>

                            <td>

                                <input id="chck2" type="checkbox" class="opacity-0">

                                <label for="chck2" class="check-trail">

                                    <span class="check-handler"></span>

                                </label>



                            </td>

                        </tr>

                        <tr>

                            <td>

                                <p>Hiển thị Player Profile</p>

                            </td>

                            <td>

                                <input id="chck3" type="checkbox" class="opacity-0">

                                <label for="chck3" class="check-trail">

                                    <span class="check-handler"></span>

                                </label>

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <p>Hiển thị Player Pay</p>

                            </td>

                            <td>

                                <input id="chck4" type="checkbox" class="opacity-0">

                                <label for="chck4" class="check-trail">

                                    <span class="check-handler"></span>

                                </label>

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <p>Hiển thị thông tin ở trang cá nhân</p>

                            </td>

                            <td>

                                <input id="chck5" type="checkbox" class="opacity-0">

                                <label for="chck5" class="check-trail">

                                    <span class="check-handler"></span>

                                </label>

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <p>Đăng nhập để xem nội dung</p>

                            </td>

                            <td>

                                <input id="chck6" type="checkbox" class="opacity-0">

                                <label for="chck6" class="check-trail">

                                    <span class="check-handler"></span>

                                </label>

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <p>Hiện icon trang cá nhân trên trang Player</p>

                            </td>

                            <td>

                                <input id="chck7" type="checkbox" class="opacity-0">

                                <label for="chck7" class="check-trail">

                                    <span class="check-handler"></span>

                                </label>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

            <hr><button class="btn-update" type="button" id="btn-update-user-setting-display">Cập nhật</button>
        </div>

    </div>

</div>
@endsection
