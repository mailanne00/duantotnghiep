@extends('client.layouts.cai-dat-tai-khoan')

@section('title', 'Thông tin cá nhân')

@section('content')
    <div class="col-lg-9 col-12">

        <div class="aside">

            <div class="row flowaccount">

                <div class="col-sm-4 col-xs-12">

                    <div class="border">

                        <p>TỔNG TIỀN ĐÃ NẠP</p><span>0đ </span>
                    </div>

                </div>

                <div class="col-sm-4 col-xs-12">

                    <div class="border">

                        <p>TỔNG TIỀN ĐÃ DONATE</p><span>0đ </span>
                    </div>

                </div>

                <div class="col-sm-4 col-xs-12">

                    <div class="border">

                        <p>SỐ GIỜ ĐÃ THUÊ</p><span>0 Giờ</span>
                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6 col-sm-12 col-xs-12 personalinfo">

                    <h3>Thông tin cá nhân</h3>

                    <div class="d-flex img-avatar"><img src="https://files.playerduo.com/production/images/avatar5.png"
                            class="" alt="avatar" sizes="sm">

                        <div class="cropimg-avatar">

                            <button type="button"><label for="change-avt" class="cursor-pointer"> <span>Thay Đổi<p>
                                            JPG, GIF or PNG, &lt;5 MB. </p></span></label></button>

                            <input type="file" id="change-avt" class="d-none" accept="image/*">

                        </div>

                    </div>

                    <form class=" from-userinfo">

                        <div class="fieldGroup">

                            <p class="control-label">Họ và tên</p><input type="text" name="name" placeholder=""
                                maxlength="5000" autocomplete="false" value="Đoàn">
                        </div>

                        <div class="fieldGroup">

                            <p class="control-label">Biệt danh</p><input type="text" name="nickName" placeholder=""
                                maxlength="5000" autocomplete="false" value="doandev">
                        </div>

                        <p class="control-label">Ngày sinh</p>

                        <div class="datefield">

                            <div class="react-datepicker-wrapper">

                                <div class="react-datepicker__input-container">

                                    <input type="text" id="datepicker" class="example-custom-input">

                                </div>

                            </div>

                            <div><span class="err-message d-none">Theo mẫu dd/mm/yyyy</span></div>

                        </div>

                        <!-- <p class="control-label">Ngôn ngữ</p>
                        <select name="language">
                            <option disabled="">--- Chọn ngôn ngữ ---</option>
                            <option value="5b99f97c978dff3d115260c7">Tiếng Việt</option>
                        </select> -->

                        <!-- <p class="control-label">Quốc gia</p>
                        <select name="country">
                            <option value="5b99f97c978dff3d115260e3">Afghanistan</option>
                            <option value="5b99f97c978dff3d115260e4">Albania</option>
                            <option value="5b99f97c978dff3d115260e5

                                   ">Algeria</option>
                            <option value="5b99f97c978dff3d115260e6">Andorra</option>
                            <option value="5b99f97c978dff3d115260e7">Angola</option>
                            <option value="5b99f97c978dff3d115260e8">Anguilla</option>
                            <option value="5b99f97c978dff3d115260e9

                                   ">Antigua and Barbuda</option>
                            <option value="5b99f97c978dff3d115260ea">Argentina</option>
                            <option value="5b99f97c978dff3d115260eb">Armenia</option>
                            <option value="5b99f97c978dff3d115260ec">Aruba</option>
                            <option value="5b99f97c978dff3d115260ed

                                   ">Australia</option>
                            <option value="5b99f97c978dff3d115260ee">Austria</option>
                            <option value="5b99f97c978dff3d115260ef">Azerbaijan</option>
                            <option value="5b99f97c978dff3d115260f0">Bahamas</option>
                            <option value="5b99f97c978dff3d115260f1

                                   ">Bahrain</option>
                            <option value="5b99f97c978dff3d115260f2">Bangladesh</option>
                            <option value="5b99f97c978dff3d115260f3">Barbados</option>
                            <option value="5b99f97c978dff3d115260f4">Belarus</option>
                            <option value="5b99f97c978dff3d115260f5

                                   ">Belgium</option>
                            <option value="5b99f97c978dff3d115260f6">Belize</option>
                            <option value="5b99f97c978dff3d115260f7">Benin</option>
                            <option value="5b99f97c978dff3d115260f8">Bermuda</option>
                            <option value="5b99f97c978dff3d115260f9

                                   ">Bhutan</option>
                            <option value="5b99f97c978dff3d115260fa">Bolivia</option>
                            <option value="5b99f97c978dff3d115260fb">Bonaire</option>
                            <option value="5b99f97c978dff3d115260fc">Bosnia-Herzegovina</option>
                            <option value="5b99f97c978dff3d115260fd

                                   ">Botswana</option>
                            <option value="5b99f97c978dff3d115260fe">Bouvet Island</option>
                            <option value="5b99f97c978dff3d115260ff">Brazil</option>
                            <option value="5b99f97c978dff3d11526100">Brunei</option>
                            <option value="5b99f97c978dff3d11526101

                                   ">Bulgaria</option>
                            <option value="5b99f97c978dff3d11526102">Burkina Faso</option>
                            <option value="5b99f97c978dff3d11526103">Burundi</option>
                            <option value="5b99f97c978dff3d11526104">Cambodia</option>
                            <option value="5b99f97c978dff3d11526105

                                   ">Cameroon</option>
                            <option value="5b99f97c978dff3d11526106">Canada</option>
                            <option value="5b99f97c978dff3d11526107">Cape Verde</option>
                            <option value="5b99f97c978dff3d11526108">Cayman Islands</option>
                            <option value="5b99f97c978dff3d11526109

                                   ">Central African Republic</option>
                            <option value="5b99f97c978dff3d1152610a">Chad</option>
                            <option value="5b99f97c978dff3d1152610b">Chile</option>
                            <option value="5b99f97c978dff3d1152610c">China</option>
                            <option value="5b99f97c978dff3d1152610d

                                   ">Christmas Island</option>
                            <option value="5b99f97c978dff3d1152610e">Cocos (Keeling) Islands</option>
                            <option value="5b99f97c978dff3d1152610f">Colombia</option>
                            <option value="5b99f97c978dff3d11526110">Comoros</option>
                            <option value="5b99f97c978dff3d11526111

                                   ">Congo, Democratic Republic of the (Zaire)</option>
                            <option value="5b99f97c978dff3d11526112">Congo, Republic of</option>
                            <option value="5b99f97c978dff3d11526113">Cook Islands</option>
                            <option value="5b99f97c978dff3d11526114">Costa Rica</option>
                            <option value="5b99f97c978dff3d11526115

                                   ">Croatia</option>
                            <option value="5b99f97c978dff3d11526116">Cuba</option>
                            <option value="5b99f97c978dff3d11526117">Curacao</option>
                            <option value="5b99f97c978dff3d11526118">Cyprus</option>
                            <option value="5b99f97c978dff3d11526119

                                   ">Czech Republic</option>
                            <option value="5b99f97c978dff3d1152611a">Denmark</option>
                            <option value="5b99f97c978dff3d1152611b">Djibouti</option>
                            <option value="5b99f97c978dff3d1152611c">Dominica</option>
                            <option value="5b99f97c978dff3d1152611d

                                   ">Dominican Republic</option>
                            <option value="5b99f97c978dff3d1152611e">Ecuador</option>
                            <option value="5b99f97c978dff3d1152611f">Egypt</option>
                            <option value="5b99f97c978dff3d11526120">El Salvador</option>
                            <option value="5b99f97c978dff3d11526121

                                   ">Equatorial Guinea</option>
                            <option value="5b99f97c978dff3d11526122">Eritrea</option>
                            <option value="5b99f97c978dff3d11526123">Estonia</option>
                            <option value="5b99f97c978dff3d11526124">Ethiopia</option>
                            <option value="5b99f97c978dff3d11526125

                                   ">Falkland Islands</option>
                            <option value="5b99f97c978dff3d11526126">Faroe Islands</option>
                            <option value="5b99f97c978dff3d11526127">Fiji</option>
                            <option value="5b99f97c978dff3d11526128">Finland</option>
                            <option value="5b99f97c978dff3d11526129

                                   ">France</option>
                            <option value="5b99f97c978dff3d1152612a">French Guiana</option>
                            <option value="5b99f97c978dff3d1152612b">Gabon</option>
                            <option value="5b99f97c978dff3d1152612c">Gambia</option>
                            <option value="5b99f97c978dff3d1152612d

                                   ">Georgia</option>
                            <option value="5b99f97c978dff3d1152612e">Germany</option>
                            <option value="5b99f97c978dff3d1152612f">Ghana</option>
                            <option value="5b99f97c978dff3d11526130">Gibraltar</option>
                            <option value="5b99f97c978dff3d11526131

                                   ">Greece</option>
                            <option value="5b99f97c978dff3d11526132">Greenland</option>
                            <option value="5b99f97c978dff3d11526133">Grenada</option>
                            <option value="5b99f97c978dff3d11526134">Guadeloupe (French)</option>
                            <option value="5b99f97c978dff3d11526135

                                   ">Guam (USA)</option>
                            <option value="5b99f97c978dff3d11526136">Guatemala</option>
                            <option value="5b99f97c978dff3d11526137">Guinea</option>
                            <option value="5b99f97c978dff3d11526138">Guyana</option>
                            <option value="5b99f97c978dff3d11526139

                                   ">Haiti</option>
                            <option value="5b99f97c978dff3d1152613a">Holy See</option>
                            <option value="5b99f97c978dff3d1152613b">Honduras</option>
                            <option value="5b99f97c978dff3d1152613c">Hong Kong</option>
                            <option value="5b99f97c978dff3d1152613d

                                   ">Hungary</option>
                            <option value="5b99f97c978dff3d1152613e">Iceland</option>
                            <option value="5b99f97c978dff3d1152613f">India</option>
                            <option value="5b99f97c978dff3d11526140">Indonesia</option>
                            <option value="5b99f97c978dff3d11526141

                                   ">Iran</option>
                            <option value="5b99f97c978dff3d11526142">Iraq</option>
                            <option value="5b99f97c978dff3d11526143">Ireland</option>
                            <option value="5b99f97c978dff3d11526144">Israel</option>
                            <option value="5b99f97c978dff3d11526145

                                   ">Italy</option>
                            <option value="5b99f97c978dff3d11526146">Ivory Coast (Cote D`Ivoire)</option>
                            <option value="5b99f97c978dff3d11526147">Jamaica</option>
                            <option value="5b99f97c978dff3d11526148">Japan</option>
                            <option value="5b99f97c978dff3d11526149

                                   ">Jordan</option>
                            <option value="5b99f97c978dff3d1152614a">Kazakhstan</option>
                            <option value="5b99f97c978dff3d1152614b">Kenya</option>
                            <option value="5b99f97c978dff3d1152614c">Kiribati</option>
                            <option value="5b99f97c978dff3d1152614d

                                   ">Kosovo</option>
                            <option value="5b99f97c978dff3d1152614e">Kuwait</option>
                            <option value="5b99f97c978dff3d1152614f">Kyrgyzstan</option>
                            <option value="5b99f97c978dff3d11526150">Laos</option>
                            <option value="5b99f97c978dff3d11526151

                                   ">Latvia</option>
                            <option value="5b99f97c978dff3d11526152">Lebanon</option>
                            <option value="5b99f97c978dff3d11526153">Lesotho</option>
                            <option value="5b99f97c978dff3d11526154">Liberia</option>
                            <option value="5b99f97c978dff3d11526155

                                   ">Libya</option>
                            <option value="5b99f97c978dff3d11526156">Liechtenstein</option>
                            <option value="5b99f97c978dff3d11526157">Lithuania</option>
                            <option value="5b99f97c978dff3d11526158">Luxembourg</option>
                            <option value="5b99f97c978dff3d11526159

                                   ">Macau</option>
                            <option value="5b99f97c978dff3d1152615a">Macedonia</option>
                            <option value="5b99f97c978dff3d1152615b">Madagascar</option>
                            <option value="5b99f97c978dff3d1152615c">Malawi</option>
                            <option value="5b99f97c978dff3d1152615d

                                   ">Malaysia</option>
                            <option value="5b99f97c978dff3d1152615e">Maldives</option>
                            <option value="5b99f97c978dff3d1152615f">Mali</option>
                            <option value="5b99f97c978dff3d11526160">Malta</option>
                            <option value="5b99f97c978dff3d11526161

                                   ">Marshall Islands</option>
                            <option value="5b99f97c978dff3d11526162">Martinique (French)</option>
                            <option value="5b99f97c978dff3d11526163">Mauritania</option>
                            <option value="5b99f97c978dff3d11526164">Mauritius</option>
                            <option value="5b99f97c978dff3d11526165

                                   ">Mayotte</option>
                            <option value="5b99f97c978dff3d11526166">Mexico</option>
                            <option value="5b99f97c978dff3d11526167">Micronesia</option>
                            <option value="5b99f97c978dff3d11526168">Moldova</option>
                            <option value="5b99f97c978dff3d11526169

                                   ">Monaco</option>
                            <option value="5b99f97c978dff3d1152616a">Mongolia</option>
                            <option value="5b99f97c978dff3d1152616b">Montenegro</option>
                            <option value="5b99f97c978dff3d1152616c">Montserrat</option>
                            <option value="5b99f97c978dff3d1152616d

                                   ">Morocco</option>
                            <option value="5b99f97c978dff3d1152616e">Mozambique</option>
                            <option value="5b99f97c978dff3d1152616f">Myanmar</option>
                            <option value="5b99f97c978dff3d11526170">Namibia</option>
                            <option value="5b99f97c978dff3d11526171

                                   ">Nauru</option>
                            <option value="5b99f97c978dff3d11526172">Nepal</option>
                            <option value="5b99f97c978dff3d11526173">Netherlands</option>
                            <option value="5b99f97c978dff3d11526174">New Caledonia (French)</option>
                            <option value="5b99f97c978dff3d11526175

                                   ">New Zealand</option>
                            <option value="5b99f97c978dff3d11526176">Nicaragua</option>
                            <option value="5b99f97c978dff3d11526177">Niger</option>
                            <option value="5b99f97c978dff3d11526178">Nigeria</option>
                            <option value="5b99f97c978dff3d11526179

                                   ">Niue</option>
                            <option value="5b99f97c978dff3d1152617a">Norfolk Island</option>
                            <option value="5b99f97c978dff3d1152617b">North Korea</option>
                            <option value="5b99f97c978dff3d1152617c">Northern Mariana Islands</option>
                            <option value="5b99f97c978dff3d1152617d

                                   ">Norway</option>
                            <option value="5b99f97c978dff3d1152617e">Oman</option>
                            <option value="5b99f97c978dff3d1152617f">Pakistan</option>
                            <option value="5b99f97c978dff3d11526180">Palau</option>
                            <option value="5b99f97c978dff3d11526181

                                   ">Panama</option>
                            <option value="5b99f97c978dff3d11526182">Papua New Guinea</option>
                            <option value="5b99f97c978dff3d11526183">Paraguay</option>
                            <option value="5b99f97c978dff3d11526184">Peru</option>
                            <option value="5b99f97c978dff3d11526185

                                   ">Philippines</option>
                            <option value="5b99f97c978dff3d11526186">Pitcairn Island</option>
                            <option value="5b99f97c978dff3d11526187">Poland</option>
                            <option value="5b99f97c978dff3d11526188">Polynesia (French)</option>
                            <option value="5b99f97c978dff3d11526189

                                   ">Portugal</option>
                            <option value="5b99f97c978dff3d1152618a">Puerto Rico</option>
                            <option value="5b99f97c978dff3d1152618b">Qatar</option>
                            <option value="5b99f97c978dff3d1152618c">Reunion</option>
                            <option value="5b99f97c978dff3d1152618d

                                   ">Romania</option>
                            <option value="5b99f97c978dff3d1152618e">Russia</option>
                            <option value="5b99f97c978dff3d1152618f">Rwanda</option>
                            <option value="5b99f97c978dff3d11526190">Saint Helena</option>
                            <option value="5b99f97c978dff3d11526191

                                   ">Saint Kitts and Nevis</option>
                            <option value="5b99f97c978dff3d11526192">Saint Lucia</option>
                            <option value="5b99f97c978dff3d11526193">Saint Pierre and Miquelon</option>
                            <option value="5b99f97c978dff3d11526194

                                   ">Saint Vincent and Grenadines</option>
                            <option value="5b99f97c978dff3d11526195">Samoa</option>
                            <option value="5b99f97c978dff3d11526196">San Marino</option>
                            <option value="5b99f97c978dff3d11526197">Sao Tome and Principe</option>
                            <option value="5b99f97c978dff3d11526198

                                   ">Saudi Arabia</option>
                            <option value="5b99f97c978dff3d11526199">Senegal</option>
                            <option value="5b99f97c978dff3d1152619a">Serbia</option>
                            <option value="5b99f97c978dff3d1152619b">Seychelles</option>
                            <option value="5b99f97c978dff3d1152619c

                                   ">Sierra Leone</option>
                            <option value="5b99f97c978dff3d1152619d">Singapore</option>
                            <option value="5b99f97c978dff3d1152619e">Sint Maarten</option>
                            <option value="5b99f97c978dff3d1152619f">Slovakia</option>
                            <option value="5b99f97c978dff3d115261a0

                                   ">Slovenia</option>
                            <option value="5b99f97c978dff3d115261a1">Solomon Islands</option>
                            <option value="5b99f97c978dff3d115261a2">Somalia</option>
                            <option value="5b99f97c978dff3d115261a3">South Africa</option>
                            <option value="5b99f97c978dff3d115261a4

                                   ">South Georgia and South Sandwich Islands</option>
                            <option value="5b99f97c978dff3d115261a5">South Korea</option>
                            <option value="5b99f97c978dff3d115261a6">South Sudan</option>
                            <option value="5b99f97c978dff3d115261a7">Spain</option>
                            <option value="5b99f97c978dff3d115261a8

                                   ">Sri Lanka</option>
                            <option value="5b99f97c978dff3d115261a9">Sudan</option>
                            <option value="5b99f97c978dff3d115261aa">Suriname</option>
                            <option value="5b99f97c978dff3d115261ab">Svalbard and Jan Mayen Islands</option>
                            <option value="5b99f97c978dff3d115261ac

                                   ">Swaziland</option>
                            <option value="5b99f97c978dff3d115261ad">Sweden</option>
                            <option value="5b99f97c978dff3d115261ae">Switzerland</option>
                            <option value="5b99f97c978dff3d115261af">Syria</option>
                            <option value="5b99f97c978dff3d115261b0

                                   ">Taiwan</option>
                            <option value="5b99f97c978dff3d115261b1">Tajikistan</option>
                            <option value="5b99f97c978dff3d115261b2">Tanzania</option>
                            <option value="5b99f97c978dff3d115261b3">Thailand</option>
                            <option value="5b99f97c978dff3d115261b4

                                   ">Timor-Leste (East Timor)</option>
                            <option value="5b99f97c978dff3d115261b5">Togo</option>
                            <option value="5b99f97c978dff3d115261b6">Tokelau</option>
                            <option value="5b99f97c978dff3d115261b7">Tonga</option>
                            <option value="5b99f97c978dff3d115261b8

                                   ">Trinidad and Tobago</option>
                            <option value="5b99f97c978dff3d115261b9">Tunisia</option>
                            <option value="5b99f97c978dff3d115261ba">Turkey</option>
                            <option value="5b99f97c978dff3d115261bb">Turkmenistan</option>
                            <option value="5b99f97c978dff3d115261bc

                                   ">Turks and Caicos Islands</option>
                            <option value="5b99f97c978dff3d115261bd">Tuvalu</option>
                            <option value="5b99f97c978dff3d115261be">Uganda</option>
                            <option value="5b99f97c978dff3d115261bf">Ukraine</option>
                            <option value="5b99f97c978dff3d115261c0

                                   ">United Arab Emirates</option>
                            <option value="5b99f97c978dff3d115261c1">United Kingdom</option>
                            <option value="5b99f97c978dff3d115261c2">United States</option>
                            <option value="5b99f97c978dff3d115261c3">Uruguay</option>
                            <option value="5b99f97c978dff3d115261c4

                                   ">Uzbekistan</option>
                            <option value="5b99f97c978dff3d115261c5">Vanuatu</option>
                            <option value="5b99f97c978dff3d115261c6">Venezuela</option>
                            <option value="5b99f97c978dff3d115261c7">Vietnam</option>
                            <option value="5b99f97c978dff3d115261c8

                                   ">Virgin Islands</option>
                            <option value="5b99f97c978dff3d115261c9">Wallis and Futuna Islands</option>
                            <option value="5b99f97c978dff3d115261ca">Yemen</option>
                            <option value="5b99f97c978dff3d115261cb">Zambia</option>
                            <option value="5b99f97c978dff3d115261cc

                                   ">Zimbabwe</option>
                            <option value="5b99f97c978dff3d115261cd">Åland Islands</option>
                        </select> -->

                        <div class="fieldGroup">

                            <p class="control-label">Quê quán</p><input type="text" name="que_quan" placeholder=""
                                maxlength="5000" autocomplete="false" value="Hà Nội">
                        </div>

                        <p class="control-label">Thành phố</p><select name="city">
                            <option value="5b99f9e35180d13ea22a97fc">An Giang</option>
                            <option value="5b99f9e35180d13ea22a97fd"> Bà Rịa Vũng Tàu</option>
                            <option value="5b99f9e35180d13ea22a97fe

                                   "> Bình Dương
                            </option>
                            <option value="5b99f9e35180d13ea22a97ff"> Bình Phước</option>
                            <option value="5b99f9e35180d13ea22a9800"> Bình Thuận</option>
                            <option value="5b99f9e35180d13ea22a9801"> Bình Định</option>
                            <option value="5b99f9e35180d13ea22a9802

                                   "> Bạc Liêu
                            </option>
                            <option value="5b99f9e35180d13ea22a9803"> Bắc Cạn</option>
                            <option value="5b99f9e35180d13ea22a9804"> Bắc Giang</option>
                            <option value="5b99f9e35180d13ea22a9805"> Bắc Ninh</option>
                            <option value="5b99f9e35180d13ea22a9806

                                   "> Bến Tre</option>
                            <option value="5b99f9e35180d13ea22a9807"> Cao Bằng</option>
                            <option value="5b99f9e35180d13ea22a9808"> Cà Mau</option>
                            <option value="5b99f9e35180d13ea22a9809"> Cần Thơ</option>
                            <option value="5b99f9e35180d13ea22a980a

                                   "> Đà Nẵng</option>
                            <option value="5b99f9e35180d13ea22a980b"> Đăk Lăk</option>
                            <option value="5b99f9e35180d13ea22a980c"> Điện Biên</option>
                            <option value="5b99f9e35180d13ea22a980d"> Đồng Nai</option>
                            <option value="5b99f9e35180d13ea22a980e

                                   "> Đồng Tháp
                            </option>
                            <option value="5b99f9e35180d13ea22a980f"> Gia Lai</option>
                            <option value="5b99f9e35180d13ea22a9810"> Hà Giang</option>
                            <option value="5b99f9e35180d13ea22a9811"> Hà Nam</option>
                            <option value="5b99f9e35180d13ea22a9812

                                   "> Hà Nội</option>
                            <option value="5b99f9e35180d13ea22a9813"> Hà Tây</option>
                            <option value="5b99f9e35180d13ea22a9814"> Hà Tĩnh</option>
                            <option value="5b99f9e35180d13ea22a9815"> Hà Đông</option>
                            <option value="5b99f9e35180d13ea22a9816

                                   "> Hòa Bình
                            </option>
                            <option value="5b99f9e35180d13ea22a9817"> Hưng Yên</option>
                            <option value="5b99f9e35180d13ea22a9818"> Hạ Long</option>
                            <option value="5b99f9e35180d13ea22a9819"> Hải Dương</option>
                            <option value="5b99f9e35180d13ea22a981a

                                   "> Hải Phòng
                            </option>
                            <option value="5b99f9e35180d13ea22a981b"> Hồ Chí Minh</option>
                            <option value="5b99f9e35180d13ea22a981c"> Khánh Hòa</option>
                            <option value="5b99f9e35180d13ea22a981d"> Kiên Giang</option>
                            <option value="5b99f9e35180d13ea22a981e

                                   "> KonTum</option>
                            <option value="5b99f9e35180d13ea22a981f"> Lai Châu</option>
                            <option value="5b99f9e35180d13ea22a9820"> Long An</option>
                            <option value="5b99f9e35180d13ea22a9821"> Lào Cai</option>
                            <option value="5b99f9e35180d13ea22a9822

                                   "> Lâm Đồng
                            </option>
                            <option value="5b99f9e35180d13ea22a9823"> Lạng Sơn</option>
                            <option value="5b99f9e35180d13ea22a9824"> Nam Định</option>
                            <option value="5b99f9e35180d13ea22a9825"> Nghệ An</option>
                            <option value="5b99f9e35180d13ea22a9826

                                   "> Ninh Bình
                            </option>
                            <option value="5b99f9e35180d13ea22a9827"> Ninh Thuận</option>
                            <option value="5b99f9e35180d13ea22a9828"> Phú Thọ</option>
                            <option value="5b99f9e35180d13ea22a9829"> Phú Yên</option>
                            <option value="5b99f9e35180d13ea22a982a

                                   "> Quảng Bình
                            </option>
                            <option value="5b99f9e35180d13ea22a982b"> Quảng Nam</option>
                            <option value="5b99f9e35180d13ea22a982c"> Quảng Ngãi</option>
                            <option value="5b99f9e35180d13ea22a982d"> Quảng Ninh</option>
                            <option value="5b99f9e35180d13ea22a982e

                                   "> Quảng Trị
                            </option>
                            <option value="5b99f9e35180d13ea22a982f"> Sóc Trăng</option>
                            <option value="5b99f9e35180d13ea22a9830"> Sơn La</option>
                            <option value="5b99f9e35180d13ea22a9831"> Thanh Hóa</option>
                            <option value="5b99f9e35180d13ea22a9832

                                   "> Thái Bình
                            </option>
                            <option value="5b99f9e35180d13ea22a9833"> Thái Nguyên</option>
                            <option value="5b99f9e35180d13ea22a9834"> Thừa Thiên Huế</option>
                            <option value="5b99f9e35180d13ea22a9835"> Tiền Giang</option>
                            <option value="5b99f9e35180d13ea22a9836

                                   "> Trà Vinh
                            </option>
                            <option value="5b99f9e35180d13ea22a9837"> Tuyên Quang</option>
                            <option value="5b99f9e35180d13ea22a9838"> Tây Ninh</option>
                            <option value="5b99f9e35180d13ea22a9839"> Vĩnh Long</option>
                            <option value="5b99f9e35180d13ea22a983a

                                   "> Vĩnh Phúc
                            </option>
                            <option value="5b99f9e35180d13ea22a983b"> Yên Bái</option>
                            <option value="5b99f9e35180d13ea22a983c">Khác</option>
                        </select>

                        <p class="control-label">Giới tính</p>

                        <div class="d-flex"><label class="gender--radio"><input name="gender" type="radio"
                                    value="male">Nam<span></span></label><label class="gender--radio"><input
                                    name="gender" type="radio" value="female">Nữ<span></span></label></div>

                        <hr><button type="submit" class="btn-update">Cập nhật</button>
                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection

@section('footer')
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        var header = $('header.menu__header');

        $(window).scroll(function() {

            if ($(window).scrollTop() > 200) {

                header.addClass('fix-menu')

            } else {

                header.removeClass('fix-menu')

            }

            $("#datepicker").datepicker();

        });

        $('.navbar-right .mobile-search').click(function() {

            $('.menu__header .mobile-input-search').toggleClass("d-block");

        });

        $('.setting__main--menu .btn-drawer-setting').click(function() {

            $('.setting__main--menu .menu__setting').toggleClass("drawer");

            $('.setting__main--menu .btn-drawer-setting i').toggleClass("fa-chevron-right");

            $('.setting__main--menu .btn-drawer-setting i').toggleClass("fa-chevron-left");

        });
    </script>
@endsection
