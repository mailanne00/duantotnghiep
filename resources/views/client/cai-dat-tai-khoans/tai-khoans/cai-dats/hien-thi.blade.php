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

                                <p>Hiển thị trên bảng xếp hạng</p>

                            </td>

                            <td>

                                <input id="chck" type="checkbox" class="opacity-0">

                                <label for="chck" class="check-trail">

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