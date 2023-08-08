@extends('staff.layouts.layout')
@section('content')
    <section class="dashboardPgaesSec bg-white">
        <div class="container rounded">
            <div class="dashboardPgaesSecinner">
                <div class="row rowBox">
                    <div class="col-md-3 columnBox border-right dasboardLeftSideBar">
                        <div class="dasboardLeftSideBarinner">
                            <div class="d-flex flex-column align-items-center text-center userProfileArea">
                                <div class="userProfileThumnail">
                                    <img class="rounded-circle" width=""
                                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                </div>
                                <div class="userProfileInfo">
                                    <p class="userName font-weight-bold mb-0">Test Student</p>
                                    <p class="text text-black-50 mb-0">teststd@gmail.com</p>
                                </div>
                            </div>
                            <div class="dasboardLeftSideBarMenuArea">
                                <ul class="nav">
                                    <li class="nav-item active">
                                        <a class="nav-link"
                                            href="{{ route('staff.student.general.detail') }}/{{ $studentDetail ? $studentDetail->user_id : '' }}"><span
                                                class="icon"><i class="fa-regular fa-address-card"></i></span> <span
                                                class="txt">General Info</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ $studentDetail ? route('staff.student.education.history', $studentDetail ? $studentDetail->user_id : '') : 'javascript:;' }}"><span
                                                class="icon"><i class="fa-regular fa-graduation-cap"></i></span> <span
                                                class="txt">Education History</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ $studentDetail ? route('staff.student.test.score', $studentDetail ? $studentDetail->user_id : '') : 'javascript:;' }}"><span
                                                class="icon"><i class="fa-regular fa-rectangle-list"></i></span> <span
                                                class="txt">Test Score</span> </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ $studentDetail ? route('staff.student.visa.permit', $studentDetail ? $studentDetail->user_id : '') : 'javascript:;' }}"><span
                                                class="icon"><i class="fa-regular fa-id-card-clip"></i></span> <span
                                                class="txt">Visa
                                                &amp; Study Permit</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 columnBox border-right dasboardrightPart">
                        <div class="dasboardrightPartWrapper">
                            <div class="p-3 py-5 dasboardrightPartWrapperinner">
                                <!--
                                                                                                                                                                                                                                                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                                                                                                                                                                                                                                                <h4 class="text-right">Update Profile</h4>
                                                                                                                                                                                                                                                                            </div>-->
                                <h4 class="card-title text-center1 mb-0"> Update Profiles</h4>
                                <hr>
                                <form method="post" action="{{ route('staff.student-general-detail.store') }}">
                                    @csrf
                                    <input type="hidden" name="user_id"
                                        value="{{ $studentDetail ? $studentDetail->user_id : '' }}">
                                    <div class="row rowBox2 mt-3">

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">First Name</label>
                                            <input type="text" class="form-control" placeholder="first name"
                                                name="first_name"
                                                value="{{ $studentDetail->first_name ?? old('first_name') }}"
                                                required="">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Middle Name</label>
                                            <input type="text" class="form-control" placeholder="Middle Name"
                                                name="middle_name"
                                                value="{{ $studentDetail->middle_name ?? old('middle_name') }}">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Last Name</label><input type="text"
                                                class="form-control" name="last_name" placeholder="surname"
                                                value="{{ $studentDetail->last_name ?? old('last_name') }}" required="">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Email ID</label>
                                            <input type="email" class="form-control" placeholder="Enter email id"
                                                name="email"
                                                value="{{ auth()->user()->type == 'student' ? auth()->user()->email : (auth()->user()->type !== 'student' ? ($studentDetail ? $studentDetail->email : '') : '') }}"
                                                {{ auth()->user()->type == 'agent' ? '' : (auth()->user()->type == 'staff' ? '' : 'readonly') }}>
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Country Code</label>

                                            <select class="form-control" name="country_code" required="">
                                                <option value=""> Select phone code </option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->phonecode }}"
                                                        {{ $studentDetail ? ($studentDetail->country_code == $country->phonecode ? 'selected' : '') : '' }}>
                                                        {{ $country->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Mobile Number</label>
                                            <input type="number" class="form-control" placeholder="enter mobile number"
                                                name="mobile_number"
                                                value="{{ $studentDetail->mobile_number ?? old('mobile_number') }}"
                                                required="">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Alternative Country Code</label>
                                            <select class="form-control" name="alt_country_code" required="">
                                                <option value=""> Select Alternative phone code </option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->phonecode }}"
                                                        {{ $studentDetail ? ($studentDetail->alt_country_code == $country->phonecode ? 'selected' : '') : '' }}>
                                                        {{ $country->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Alternate Mobile Number</label>
                                            <input type="number" class="form-control"
                                                placeholder="enter alternative mobile number" name="alt_mobile_number"
                                                value="{{ $studentDetail->alt_mobile_number ?? old('alt_mobile_number') }}"
                                                required="">
                                        </div>
                                        <div class="col-md-6 columnBox2">
                                            <label class="labels">Address</label>
                                            <input type="text" class="form-control" placeholder="Enter address"
                                                name="address" value="{{ $studentDetail->address ?? old('address') }}"
                                                required="">
                                        </div>
                                        <div class="col-md-6 columnBox2">
                                            <label class="labels">City</label>
                                            <input type="text" class="form-control" placeholder="Enter city"
                                                name="city" value="{{ $studentDetail->city ?? old('city') }}"
                                                required="">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Postcode / Zipcode</label>
                                            <input type="number" class="form-control"
                                                placeholder="Enter your Postcode / Zipcode" name="pincode"
                                                value="{{ $studentDetail->pincode ?? old('pincode') }}" required="">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Student Source Country</label>
                                            <select class="form-control" name="country" required="">
                                                <option value=""> Select Country </option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ $studentDetail ? ($studentDetail->country == $country->id ? 'selected' : '') : '' }}>
                                                        {{ $country->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Passport Number</label>
                                            <input type="text" class="form-control"
                                                placeholder="Enter your passport number" name="passport_number"
                                                value="{{ $studentDetail->passport_number ?? old('passport_number') }}"
                                                required="">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Passport Expiry Date</label>
                                            <input type="date" class="form-control"
                                                placeholder="Enter your passport expiry date" name="passport_expiry_date"
                                                value="{{ date('Y-m-d', strtotime($studentDetail->passport_expiry_date ?? now())) ?? old('passport_expiry_date') }}"
                                                required="">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Marital Status</label>
                                            <select class="form-control" name="marital_status" required="">
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Gender</label>
                                            <select class="form-control" name="gender" required="">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Date of Birth</label>
                                            <input type="date" class="form-control"
                                                placeholder="Enter your date of birth" name="dob"
                                                value="{{ date('Y-m-d', strtotime($studentDetail->dob ?? now())) ?? old('dob') }}"
                                                required="">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Fast Language</label>
                                            <input type="text" class="form-control"
                                                placeholder="Enter your fast language" name="fast_language"
                                                value="{{ $studentDetail->fast_language ?? old('fast_language') }}"
                                                required="">
                                        </div>
                                        {{-- <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">State</label>
                                            <input type="text" class="form-control" placeholder="Enter your state"
                                                name="state" value="" required="">
                                        </div>
                                         <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Country</label>
                                            <select class="form-control" name="country" required="">
                                                <option value="Afghanistan">Afghanistan
                                                </option>
                                                <option value="Aland Islands">Aland Islands
                                                </option>
                                                <option value="Albania">Albania
                                                </option>
                                                <option value="Algeria">Algeria
                                                </option>
                                                <option value="AmericanSamoa">AmericanSamoa
                                                </option>
                                                <option value="Andorra">Andorra
                                                </option>
                                                <option value="Angola">Angola
                                                </option>
                                                <option value="Anguilla">Anguilla
                                                </option>
                                                <option value="Antarctica">Antarctica
                                                </option>
                                                <option value="Antigua And Barbuda">Antigua And Barbuda
                                                </option>
                                                <option value="Argentina">Argentina
                                                </option>
                                                <option value="Armenia">Armenia
                                                </option>
                                                <option value="Aruba">Aruba
                                                </option>
                                                <option value="Australia">Australia
                                                </option>
                                                <option value="Austria">Austria
                                                </option>
                                                <option value="Azerbaijan">Azerbaijan
                                                </option>
                                                <option value="Bahamas">Bahamas
                                                </option>
                                                <option value="Bahrain">Bahrain
                                                </option>
                                                <option value="Bangladesh">Bangladesh
                                                </option>
                                                <option value="Barbados">Barbados
                                                </option>
                                                <option value="Belarus">Belarus
                                                </option>
                                                <option value="Belgium">Belgium
                                                </option>
                                                <option value="Belize">Belize
                                                </option>
                                                <option value="Benin">Benin
                                                </option>
                                                <option value="Bermuda">Bermuda
                                                </option>
                                                <option value="Bhutan">Bhutan
                                                </option>
                                                <option value="Bolivia, Plurinational State Of">Bolivia, Plurinational
                                                    State Of
                                                </option>
                                                <option value="Bosnia And Herzegovina">Bosnia And Herzegovina
                                                </option>
                                                <option value="Botswana">Botswana
                                                </option>
                                                <option value="Brazil">Brazil
                                                </option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean
                                                    Territory
                                                </option>
                                                <option value="Brunei Darussalam">Brunei Darussalam
                                                </option>
                                                <option value="Bulgaria">Bulgaria
                                                </option>
                                                <option value="Burkina Faso">Burkina Faso
                                                </option>
                                                <option value="Burundi">Burundi
                                                </option>
                                                <option value="Cambodia">Cambodia
                                                </option>
                                                <option value="Cameroon">Cameroon
                                                </option>
                                                <option value="Canada">Canada
                                                </option>
                                                <option value="Cape Verde">Cape Verde
                                                </option>
                                                <option value="Cayman Islands">Cayman Islands
                                                </option>
                                                <option value="Central African Republic">Central African Republic
                                                </option>
                                                <option value="Chad">Chad
                                                </option>
                                                <option value="Chile">Chile
                                                </option>
                                                <option value="China">China
                                                </option>
                                                <option value="Christmas Island">Christmas Island
                                                </option>
                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands
                                                </option>
                                                <option value="Colombia">Colombia
                                                </option>
                                                <option value="Comoros">Comoros
                                                </option>
                                                <option value="Congo">Congo
                                                </option>
                                                <option value="Congo, The Democratic Republic Of The Congo">Congo, The
                                                    Democratic Republic Of The Congo
                                                </option>
                                                <option value="Cook Islands">Cook Islands
                                                </option>
                                                <option value="Costa Rica">Costa Rica
                                                </option>
                                                <option value="Cote D'Ivoire">Cote D'Ivoire
                                                </option>
                                                <option value="Croatia">Croatia
                                                </option>
                                                <option value="Cuba">Cuba
                                                </option>
                                                <option value="Cyprus">Cyprus
                                                </option>
                                                <option value="Czech Republic">Czech Republic
                                                </option>
                                                <option value="Denmark">Denmark
                                                </option>
                                                <option value="Djibouti">Djibouti
                                                </option>
                                                <option value="Dominica">Dominica
                                                </option>
                                                <option value="Dominican Republic">Dominican Republic
                                                </option>
                                                <option value="Ecuador">Ecuador
                                                </option>
                                                <option value="Egypt">Egypt
                                                </option>
                                                <option value="El Salvador">El Salvador
                                                </option>
                                                <option value="Equatorial Guinea">Equatorial Guinea
                                                </option>
                                                <option value="Eritrea">Eritrea
                                                </option>
                                                <option value="Estonia">Estonia
                                                </option>
                                                <option value="Ethiopia">Ethiopia
                                                </option>
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)
                                                </option>
                                                <option value="Faroe Islands">Faroe Islands
                                                </option>
                                                <option value="Fiji">Fiji
                                                </option>
                                                <option value="Finland">Finland
                                                </option>
                                                <option value="France">France
                                                </option>
                                                <option value="French Guiana">French Guiana
                                                </option>
                                                <option value="French Polynesia">French Polynesia
                                                </option>
                                                <option value="Gabon">Gabon
                                                </option>
                                                <option value="Gambia">Gambia
                                                </option>
                                                <option value="Georgia">Georgia
                                                </option>
                                                <option value="Germany">Germany
                                                </option>
                                                <option value="Ghana">Ghana
                                                </option>
                                                <option value="Gibraltar">Gibraltar
                                                </option>
                                                <option value="Greece">Greece
                                                </option>
                                                <option value="Greenland">Greenland
                                                </option>
                                                <option value="Grenada">Grenada
                                                </option>
                                                <option value="Guadeloupe">Guadeloupe
                                                </option>
                                                <option value="Guam">Guam
                                                </option>
                                                <option value="Guatemala">Guatemala
                                                </option>
                                                <option value="Guernsey">Guernsey
                                                </option>
                                                <option value="Guinea">Guinea
                                                </option>
                                                <option value="Guinea-Bissau">Guinea-Bissau
                                                </option>
                                                <option value="Guyana">Guyana
                                                </option>
                                                <option value="Haiti">Haiti
                                                </option>
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City
                                                    State)
                                                </option>
                                                <option value="Honduras">Honduras
                                                </option>
                                                <option value="Hong Kong">Hong Kong
                                                </option>
                                                <option value="Hungary">Hungary
                                                </option>
                                                <option value="Iceland">Iceland
                                                </option>
                                                <option value="India" selected="">India
                                                </option>
                                                <option value="Indonesia">Indonesia
                                                </option>
                                                <option value="Iran, Islamic Republic Of Persian Gulf">Iran, Islamic
                                                    Republic Of Persian Gulf
                                                </option>
                                                <option value="Iraq">Iraq
                                                </option>
                                                <option value="Ireland">Ireland
                                                </option>
                                                <option value="Isle Of Man">Isle Of Man
                                                </option>
                                                <option value="Israel">Israel
                                                </option>
                                                <option value="Italy">Italy
                                                </option>
                                                <option value="Jamaica">Jamaica
                                                </option>
                                                <option value="Japan">Japan
                                                </option>
                                                <option value="Jersey">Jersey
                                                </option>
                                                <option value="Jordan">Jordan
                                                </option>
                                                <option value="Kazakhstan">Kazakhstan
                                                </option>
                                                <option value="Kenya">Kenya
                                                </option>
                                                <option value="Kiribati">Kiribati
                                                </option>
                                                <option value="Korea, Democratic People's Republic Of Korea">Korea,
                                                    Democratic People's Republic Of Korea
                                                </option>
                                                <option value="Korea, Republic Of South Korea">Korea, Republic Of South
                                                    Korea
                                                </option>
                                                <option value="Kuwait">Kuwait
                                                </option>
                                                <option value="Kyrgyzstan">Kyrgyzstan
                                                </option>
                                                <option value="Laos">Laos
                                                </option>
                                                <option value="Latvia">Latvia
                                                </option>
                                                <option value="Lebanon">Lebanon
                                                </option>
                                                <option value="Lesotho">Lesotho
                                                </option>
                                                <option value="Liberia">Liberia
                                                </option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya
                                                </option>
                                                <option value="Liechtenstein">Liechtenstein
                                                </option>
                                                <option value="Lithuania">Lithuania
                                                </option>
                                                <option value="Luxembourg">Luxembourg
                                                </option>
                                                <option value="Macao">Macao
                                                </option>
                                                <option value="Macedonia">Macedonia
                                                </option>
                                                <option value="Madagascar">Madagascar
                                                </option>
                                                <option value="Malawi">Malawi
                                                </option>
                                                <option value="Malaysia">Malaysia
                                                </option>
                                                <option value="Maldives">Maldives
                                                </option>
                                                <option value="Mali">Mali
                                                </option>
                                                <option value="Malta">Malta
                                                </option>
                                                <option value="Marshall Islands">Marshall Islands
                                                </option>
                                                <option value="Martinique">Martinique
                                                </option>
                                                <option value="Mauritania">Mauritania
                                                </option>
                                                <option value="Mauritius">Mauritius
                                                </option>
                                                <option value="Mayotte">Mayotte
                                                </option>
                                                <option value="Mexico">Mexico
                                                </option>
                                                <option value="Micronesia, Federated States Of Micronesia">Micronesia,
                                                    Federated States Of Micronesia
                                                </option>
                                                <option value="Moldova">Moldova
                                                </option>
                                                <option value="Monaco">Monaco
                                                </option>
                                                <option value="Mongolia">Mongolia
                                                </option>
                                                <option value="Montenegro">Montenegro
                                                </option>
                                                <option value="Montserrat">Montserrat
                                                </option>
                                                <option value="Morocco">Morocco
                                                </option>
                                                <option value="Mozambique">Mozambique
                                                </option>
                                                <option value="Myanmar">Myanmar
                                                </option>
                                                <option value="Namibia">Namibia
                                                </option>
                                                <option value="Nauru">Nauru
                                                </option>
                                                <option value="Nepal">Nepal
                                                </option>
                                                <option value="Netherlands">Netherlands
                                                </option>
                                                <option value="Netherlands Antilles">Netherlands Antilles
                                                </option>
                                                <option value="New Caledonia">New Caledonia
                                                </option>
                                                <option value="New Zealand">New Zealand
                                                </option>
                                                <option value="Nicaragua">Nicaragua
                                                </option>
                                                <option value="Niger">Niger
                                                </option>
                                                <option value="Nigeria">Nigeria
                                                </option>
                                                <option value="Niue">Niue
                                                </option>
                                                <option value="Norfolk Island">Norfolk Island
                                                </option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands
                                                </option>
                                                <option value="Norway">Norway
                                                </option>
                                                <option value="Oman">Oman
                                                </option>
                                                <option value="Pakistan">Pakistan
                                                </option>
                                                <option value="Palau">Palau
                                                </option>
                                                <option value="Palestinian Territory, Occupied">Palestinian Territory,
                                                    Occupied
                                                </option>
                                                <option value="Panama">Panama
                                                </option>
                                                <option value="Papua New Guinea">Papua New Guinea
                                                </option>
                                                <option value="Paraguay">Paraguay
                                                </option>
                                                <option value="Peru">Peru
                                                </option>
                                                <option value="Philippines">Philippines
                                                </option>
                                                <option value="Pitcairn">Pitcairn
                                                </option>
                                                <option value="Poland">Poland
                                                </option>
                                                <option value="Portugal">Portugal
                                                </option>
                                                <option value="Puerto Rico">Puerto Rico
                                                </option>
                                                <option value="Qatar">Qatar
                                                </option>
                                                <option value="Romania">Romania
                                                </option>
                                                <option value="Russia">Russia
                                                </option>
                                                <option value="Rwanda">Rwanda
                                                </option>
                                                <option value="Reunion">Reunion
                                                </option>
                                                <option value="Saint Barthelemy">Saint Barthelemy
                                                </option>
                                                <option value="Saint Helena, Ascension And Tristan Da Cunha">Saint Helena,
                                                    Ascension And Tristan Da Cunha
                                                </option>
                                                <option value="Saint Kitts And Nevis">Saint Kitts And Nevis
                                                </option>
                                                <option value="Saint Lucia">Saint Lucia
                                                </option>
                                                <option value="Saint Martin">Saint Martin
                                                </option>
                                                <option value="Saint Pierre And Miquelon">Saint Pierre And Miquelon
                                                </option>
                                                <option value="Saint Vincent And The Grenadines">Saint Vincent And The
                                                    Grenadines
                                                </option>
                                                <option value="Samoa">Samoa
                                                </option>
                                                <option value="San Marino">San Marino
                                                </option>
                                                <option value="Sao Tome And Principe">Sao Tome And Principe
                                                </option>
                                                <option value="Saudi Arabia">Saudi Arabia
                                                </option>
                                                <option value="Senegal">Senegal
                                                </option>
                                                <option value="Serbia">Serbia
                                                </option>
                                                <option value="Seychelles">Seychelles
                                                </option>
                                                <option value="Sierra Leone">Sierra Leone
                                                </option>
                                                <option value="Singapore">Singapore
                                                </option>
                                                <option value="Slovakia">Slovakia
                                                </option>
                                                <option value="Slovenia">Slovenia
                                                </option>
                                                <option value="Solomon Islands">Solomon Islands
                                                </option>
                                                <option value="Somalia">Somalia
                                                </option>
                                                <option value="South Africa">South Africa
                                                </option>
                                                <option value="South Sudan">South Sudan
                                                </option>
                                                <option value="South Georgia And The South Sandwich Islands">South Georgia
                                                    And The South Sandwich Islands
                                                </option>
                                                <option value="Spain">Spain
                                                </option>
                                                <option value="Sri Lanka">Sri Lanka
                                                </option>
                                                <option value="Sudan">Sudan
                                                </option>
                                                <option value="Suriname">Suriname
                                                </option>
                                                <option value="Svalbard And Jan Mayen">Svalbard And Jan Mayen
                                                </option>
                                                <option value="Swaziland">Swaziland
                                                </option>
                                                <option value="Sweden">Sweden
                                                </option>
                                                <option value="Switzerland">Switzerland
                                                </option>
                                                <option value="Syrian Arab Republic">Syrian Arab Republic
                                                </option>
                                                <option value="Taiwan">Taiwan
                                                </option>
                                                <option value="Tajikistan">Tajikistan
                                                </option>
                                                <option value="Tanzania, United Republic Of Tanzania">Tanzania, United
                                                    Republic Of Tanzania
                                                </option>
                                                <option value="Thailand">Thailand
                                                </option>
                                                <option value="Timor-Leste">Timor-Leste
                                                </option>
                                                <option value="Togo">Togo
                                                </option>
                                                <option value="Tokelau">Tokelau
                                                </option>
                                                <option value="Tonga">Tonga
                                                </option>
                                                <option value="Trinidad And Tobago">Trinidad And Tobago
                                                </option>
                                                <option value="Tunisia">Tunisia
                                                </option>
                                                <option value="Turkey">Turkey
                                                </option>
                                                <option value="Turkmenistan">Turkmenistan
                                                </option>
                                                <option value="Turks And Caicos Islands">Turks And Caicos Islands
                                                </option>
                                                <option value="Tuvalu">Tuvalu
                                                </option>
                                                <option value="Uganda">Uganda
                                                </option>
                                                <option value="Ukraine">Ukraine
                                                </option>
                                                <option value="United Arab Emirates">United Arab Emirates
                                                </option>
                                                <option value="United Kingdom">United Kingdom
                                                </option>
                                                <option value="United States">United States
                                                </option>
                                                <option value="Uruguay">Uruguay
                                                </option>
                                                <option value="Uzbekistan">Uzbekistan
                                                </option>
                                                <option value="Vanuatu">Vanuatu
                                                </option>
                                                <option value="Venezuela, Bolivarian Republic Of Venezuela">Venezuela,
                                                    Bolivarian Republic Of Venezuela
                                                </option>
                                                <option value="Vietnam">Vietnam
                                                </option>
                                                <option value="Virgin Islands, British">Virgin Islands, British
                                                </option>
                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.
                                                </option>
                                                <option value="Wallis And Futuna">Wallis And Futuna
                                                </option>
                                                <option value="Yemen">Yemen
                                                </option>
                                                <option value="Zambia">Zambia
                                                </option>
                                                <option value="Zimbabwe">Zimbabwe
                                                </option>
                                            </select>
                                        </div> --}}
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Website</label>
                                            <input type="text" class="form-control" placeholder="Enter your website"
                                                name="website" value="{{ $studentDetail->website ?? old('website') }}">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Twitter</label>
                                            <input type="text" class="form-control" placeholder="Enter your twitter"
                                                name="twitter" value="{{ $studentDetail->twitter ?? old('twitter') }}">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Instagram</label>
                                            <input type="text" class="form-control" placeholder="Enter your instagram"
                                                name="instagram"
                                                value="{{ $studentDetail->instagram ?? old('instagram') }}">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Facebook</label>
                                            <input type="text" class="form-control" placeholder="Enter your facebook"
                                                name="facebook"
                                                value="{{ $studentDetail->facebook ?? old('facebook') }}">
                                        </div>
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button class="btn btn-primary profile-button" type="submit">
                                            Save & Update Profile
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
