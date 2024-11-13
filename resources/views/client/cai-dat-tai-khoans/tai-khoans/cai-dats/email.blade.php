@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Email')

@section('content')
    <div class="col-lg-9 col-12">

        <div class="aside">

            <h3>Email</h3>

            <form class="account-form">

                <div class="row">

                    <div class="col-md-6">

                        <div class="fieldGroup ">

                            <p class="control-label">EMAIL</p><input type="text" name="emailValue" placeholder=""
                                disabled="" maxlength="5000" autocomplete="false" value="hoangdev@gmail.com">
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="col-md-3"><span class="badge-email bg-email-verified hidden-sm hidden-xs"><i
                                    class="fa fa-check"></i> Verified</span></div>

                    </div>

                    <div class="col-md-6">

                        <hr><button type="button" class="btn-delemail mt-3">Xoá email</button>
                    </div>

                </div>

                <div class=""></div>

            </form>

        </div>

    </div>
@endsection
