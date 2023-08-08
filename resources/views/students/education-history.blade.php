@extends('students.layouts.layout')
@section('content')
    <section class="dashboardPgaesSec bg-white">
        <div class="container rounded ">
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
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('student.student-detail.index') }}"><span
                                                class="icon"><i class="fa-regular fa-address-card"></i></span> <span
                                                class="txt">General Info</span></a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ route('student.education-summary.index') }}"><span
                                                class="icon"><i class="fa-regular fa-graduation-cap"></i></span> <span
                                                class="txt">Education History</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('student.test-score.index') }}"><span
                                                class="icon"><i class="fa-regular fa-rectangle-list"></i></span> <span
                                                class="txt">Test Score</span> </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('student.visa-and-permit.index') }}"><span
                                                class="icon"><i class="fa-regular fa-id-card-clip"></i></span> <span
                                                class="txt">Visa
                                                &amp; Study Permit</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 border-right dasboardrightPart">
                        <div class="dasboardrightPartWrapper">
                            <div class="card shadow1 p-3 py-5 mb-0 bg-white border-0 rounded dasboardrightPartWrapperinner">
                                <h4 class="card-title text-center1 mb-0"> Education Summary</h4>
                                <hr>
                                <p class="text-muted">Please enter the information for the highest academic level that you
                                    have
                                    completed.
                                </p>
                                <div class="card-body p-0 ">
                                    <div class="p-3a py-2">
                                        <form method="post" action="{{ route('student.education-summary.store') }}">
                                            @csrf
                                            <div class="row rowBox2">
                                                <div class="col-md-6 mb-3 columnBox2">
                                                    <label class="labels">Country of Education</label>
                                                    <select class="form-control" name="education_country" required="">
                                                        <option value="Afghanistan">
                                                            Afghanistan
                                                        </option>
                                                        <option value="Aland Islands">
                                                            Aland Islands
                                                        </option>
                                                        <option value="Albania">
                                                            Albania
                                                        </option>
                                                        <option value="Algeria">
                                                            Algeria
                                                        </option>
                                                        <option value="AmericanSamoa">
                                                            AmericanSamoa
                                                        </option>
                                                        <option value="Andorra">
                                                            Andorra
                                                        </option>
                                                        <option value="Angola">
                                                            Angola
                                                        </option>
                                                        <option value="Anguilla">
                                                            Anguilla
                                                        </option>
                                                        <option value="Antarctica">
                                                            Antarctica
                                                        </option>
                                                        <option value="Antigua And Barbuda">
                                                            Antigua And Barbuda
                                                        </option>
                                                        <option value="Argentina">
                                                            Argentina
                                                        </option>
                                                        <option value="Armenia">
                                                            Armenia
                                                        </option>
                                                        <option value="Aruba">
                                                            Aruba
                                                        </option>
                                                        <option value="Australia">
                                                            Australia
                                                        </option>
                                                        <option value="Austria">
                                                            Austria
                                                        </option>
                                                        <option value="Azerbaijan">
                                                            Azerbaijan
                                                        </option>
                                                        <option value="Bahamas">
                                                            Bahamas
                                                        </option>
                                                        <option value="Bahrain">
                                                            Bahrain
                                                        </option>
                                                        <option value="Bangladesh">
                                                            Bangladesh
                                                        </option>
                                                        <option value="Barbados">
                                                            Barbados
                                                        </option>
                                                        <option value="Belarus">
                                                            Belarus
                                                        </option>
                                                        <option value="Belgium">
                                                            Belgium
                                                        </option>
                                                        <option value="Belize">
                                                            Belize
                                                        </option>
                                                        <option value="Benin">
                                                            Benin
                                                        </option>
                                                        <option value="Bermuda">
                                                            Bermuda
                                                        </option>
                                                        <option value="Bhutan">
                                                            Bhutan
                                                        </option>
                                                        <option value="Bolivia, Plurinational State Of">
                                                            Bolivia, Plurinational State Of
                                                        </option>
                                                        <option value="Bosnia And Herzegovina">
                                                            Bosnia And Herzegovina
                                                        </option>
                                                        <option value="Botswana">
                                                            Botswana
                                                        </option>
                                                        <option value="Brazil">
                                                            Brazil
                                                        </option>
                                                        <option value="British Indian Ocean Territory">
                                                            British Indian Ocean Territory
                                                        </option>
                                                        <option value="Brunei Darussalam">
                                                            Brunei Darussalam
                                                        </option>
                                                        <option value="Bulgaria">
                                                            Bulgaria
                                                        </option>
                                                        <option value="Burkina Faso">
                                                            Burkina Faso
                                                        </option>
                                                        <option value="Burundi">
                                                            Burundi
                                                        </option>
                                                        <option value="Cambodia">
                                                            Cambodia
                                                        </option>
                                                        <option value="Cameroon">
                                                            Cameroon
                                                        </option>
                                                        <option value="Canada">
                                                            Canada
                                                        </option>
                                                        <option value="Cape Verde">
                                                            Cape Verde
                                                        </option>
                                                        <option value="Cayman Islands">
                                                            Cayman Islands
                                                        </option>
                                                        <option value="Central African Republic">
                                                            Central African Republic
                                                        </option>
                                                        <option value="Chad">
                                                            Chad
                                                        </option>
                                                        <option value="Chile">
                                                            Chile
                                                        </option>
                                                        <option value="China">
                                                            China
                                                        </option>
                                                        <option value="Christmas Island">
                                                            Christmas Island
                                                        </option>
                                                        <option value="Cocos (Keeling) Islands">
                                                            Cocos (Keeling) Islands
                                                        </option>
                                                        <option value="Colombia">
                                                            Colombia
                                                        </option>
                                                        <option value="Comoros">
                                                            Comoros
                                                        </option>
                                                        <option value="Congo">
                                                            Congo
                                                        </option>
                                                        <option value="Congo, The Democratic Republic Of The Congo">
                                                            Congo, The Democratic Republic Of The Congo
                                                        </option>
                                                        <option value="Cook Islands">
                                                            Cook Islands
                                                        </option>
                                                        <option value="Costa Rica">
                                                            Costa Rica
                                                        </option>
                                                        <option value="Cote D'Ivoire">
                                                            Cote D'Ivoire
                                                        </option>
                                                        <option value="Croatia">
                                                            Croatia
                                                        </option>
                                                        <option value="Cuba">
                                                            Cuba
                                                        </option>
                                                        <option value="Cyprus">
                                                            Cyprus
                                                        </option>
                                                        <option value="Czech Republic">
                                                            Czech Republic
                                                        </option>
                                                        <option value="Denmark">
                                                            Denmark
                                                        </option>
                                                        <option value="Djibouti">
                                                            Djibouti
                                                        </option>
                                                        <option value="Dominica">
                                                            Dominica
                                                        </option>
                                                        <option value="Dominican Republic">
                                                            Dominican Republic
                                                        </option>
                                                        <option value="Ecuador">
                                                            Ecuador
                                                        </option>
                                                        <option value="Egypt">
                                                            Egypt
                                                        </option>
                                                        <option value="El Salvador">
                                                            El Salvador
                                                        </option>
                                                        <option value="Equatorial Guinea">
                                                            Equatorial Guinea
                                                        </option>
                                                        <option value="Eritrea">
                                                            Eritrea
                                                        </option>
                                                        <option value="Estonia">
                                                            Estonia
                                                        </option>
                                                        <option value="Ethiopia">
                                                            Ethiopia
                                                        </option>
                                                        <option value="Falkland Islands (Malvinas)">
                                                            Falkland Islands (Malvinas)
                                                        </option>
                                                        <option value="Faroe Islands">
                                                            Faroe Islands
                                                        </option>
                                                        <option value="Fiji">
                                                            Fiji
                                                        </option>
                                                        <option value="Finland">
                                                            Finland
                                                        </option>
                                                        <option value="France">
                                                            France
                                                        </option>
                                                        <option value="French Guiana">
                                                            French Guiana
                                                        </option>
                                                        <option value="French Polynesia">
                                                            French Polynesia
                                                        </option>
                                                        <option value="Gabon">
                                                            Gabon
                                                        </option>
                                                        <option value="Gambia">
                                                            Gambia
                                                        </option>
                                                        <option value="Georgia">
                                                            Georgia
                                                        </option>
                                                        <option value="Germany">
                                                            Germany
                                                        </option>
                                                        <option value="Ghana">
                                                            Ghana
                                                        </option>
                                                        <option value="Gibraltar">
                                                            Gibraltar
                                                        </option>
                                                        <option value="Greece">
                                                            Greece
                                                        </option>
                                                        <option value="Greenland">
                                                            Greenland
                                                        </option>
                                                        <option value="Grenada">
                                                            Grenada
                                                        </option>
                                                        <option value="Guadeloupe">
                                                            Guadeloupe
                                                        </option>
                                                        <option value="Guam">
                                                            Guam
                                                        </option>
                                                        <option value="Guatemala">
                                                            Guatemala
                                                        </option>
                                                        <option value="Guernsey">
                                                            Guernsey
                                                        </option>
                                                        <option value="Guinea">
                                                            Guinea
                                                        </option>
                                                        <option value="Guinea-Bissau">
                                                            Guinea-Bissau
                                                        </option>
                                                        <option value="Guyana">
                                                            Guyana
                                                        </option>
                                                        <option value="Haiti">
                                                            Haiti
                                                        </option>
                                                        <option value="Holy See (Vatican City State)">
                                                            Holy See (Vatican City State)
                                                        </option>
                                                        <option value="Honduras">
                                                            Honduras
                                                        </option>
                                                        <option value="Hong Kong">
                                                            Hong Kong
                                                        </option>
                                                        <option value="Hungary">
                                                            Hungary
                                                        </option>
                                                        <option value="Iceland" selected="">
                                                            Iceland
                                                        </option>
                                                        <option value="India">
                                                            India
                                                        </option>
                                                        <option value="Indonesia">
                                                            Indonesia
                                                        </option>
                                                        <option value="Iran, Islamic Republic Of Persian Gulf">
                                                            Iran, Islamic Republic Of Persian Gulf
                                                        </option>
                                                        <option value="Iraq">
                                                            Iraq
                                                        </option>
                                                        <option value="Ireland">
                                                            Ireland
                                                        </option>
                                                        <option value="Isle Of Man">
                                                            Isle Of Man
                                                        </option>
                                                        <option value="Israel">
                                                            Israel
                                                        </option>
                                                        <option value="Italy">
                                                            Italy
                                                        </option>
                                                        <option value="Jamaica">
                                                            Jamaica
                                                        </option>
                                                        <option value="Japan">
                                                            Japan
                                                        </option>
                                                        <option value="Jersey">
                                                            Jersey
                                                        </option>
                                                        <option value="Jordan">
                                                            Jordan
                                                        </option>
                                                        <option value="Kazakhstan">
                                                            Kazakhstan
                                                        </option>
                                                        <option value="Kenya">
                                                            Kenya
                                                        </option>
                                                        <option value="Kiribati">
                                                            Kiribati
                                                        </option>
                                                        <option value="Korea, Democratic People's Republic Of Korea">
                                                            Korea, Democratic People's Republic Of Korea
                                                        </option>
                                                        <option value="Korea, Republic Of South Korea">
                                                            Korea, Republic Of South Korea
                                                        </option>
                                                        <option value="Kuwait">
                                                            Kuwait
                                                        </option>
                                                        <option value="Kyrgyzstan">
                                                            Kyrgyzstan
                                                        </option>
                                                        <option value="Laos">
                                                            Laos
                                                        </option>
                                                        <option value="Latvia">
                                                            Latvia
                                                        </option>
                                                        <option value="Lebanon">
                                                            Lebanon
                                                        </option>
                                                        <option value="Lesotho">
                                                            Lesotho
                                                        </option>
                                                        <option value="Liberia">
                                                            Liberia
                                                        </option>
                                                        <option value="Libyan Arab Jamahiriya">
                                                            Libyan Arab Jamahiriya
                                                        </option>
                                                        <option value="Liechtenstein">
                                                            Liechtenstein
                                                        </option>
                                                        <option value="Lithuania">
                                                            Lithuania
                                                        </option>
                                                        <option value="Luxembourg">
                                                            Luxembourg
                                                        </option>
                                                        <option value="Macao">
                                                            Macao
                                                        </option>
                                                        <option value="Macedonia">
                                                            Macedonia
                                                        </option>
                                                        <option value="Madagascar">
                                                            Madagascar
                                                        </option>
                                                        <option value="Malawi">
                                                            Malawi
                                                        </option>
                                                        <option value="Malaysia">
                                                            Malaysia
                                                        </option>
                                                        <option value="Maldives">
                                                            Maldives
                                                        </option>
                                                        <option value="Mali">
                                                            Mali
                                                        </option>
                                                        <option value="Malta">
                                                            Malta
                                                        </option>
                                                        <option value="Marshall Islands">
                                                            Marshall Islands
                                                        </option>
                                                        <option value="Martinique">
                                                            Martinique
                                                        </option>
                                                        <option value="Mauritania">
                                                            Mauritania
                                                        </option>
                                                        <option value="Mauritius">
                                                            Mauritius
                                                        </option>
                                                        <option value="Mayotte">
                                                            Mayotte
                                                        </option>
                                                        <option value="Mexico">
                                                            Mexico
                                                        </option>
                                                        <option value="Micronesia, Federated States Of Micronesia">
                                                            Micronesia, Federated States Of Micronesia
                                                        </option>
                                                        <option value="Moldova">
                                                            Moldova
                                                        </option>
                                                        <option value="Monaco">
                                                            Monaco
                                                        </option>
                                                        <option value="Mongolia">
                                                            Mongolia
                                                        </option>
                                                        <option value="Montenegro">
                                                            Montenegro
                                                        </option>
                                                        <option value="Montserrat">
                                                            Montserrat
                                                        </option>
                                                        <option value="Morocco">
                                                            Morocco
                                                        </option>
                                                        <option value="Mozambique">
                                                            Mozambique
                                                        </option>
                                                        <option value="Myanmar">
                                                            Myanmar
                                                        </option>
                                                        <option value="Namibia">
                                                            Namibia
                                                        </option>
                                                        <option value="Nauru">
                                                            Nauru
                                                        </option>
                                                        <option value="Nepal">
                                                            Nepal
                                                        </option>
                                                        <option value="Netherlands">
                                                            Netherlands
                                                        </option>
                                                        <option value="Netherlands Antilles">
                                                            Netherlands Antilles
                                                        </option>
                                                        <option value="New Caledonia">
                                                            New Caledonia
                                                        </option>
                                                        <option value="New Zealand">
                                                            New Zealand
                                                        </option>
                                                        <option value="Nicaragua">
                                                            Nicaragua
                                                        </option>
                                                        <option value="Niger">
                                                            Niger
                                                        </option>
                                                        <option value="Nigeria">
                                                            Nigeria
                                                        </option>
                                                        <option value="Niue">
                                                            Niue
                                                        </option>
                                                        <option value="Norfolk Island">
                                                            Norfolk Island
                                                        </option>
                                                        <option value="Northern Mariana Islands">
                                                            Northern Mariana Islands
                                                        </option>
                                                        <option value="Norway">
                                                            Norway
                                                        </option>
                                                        <option value="Oman">
                                                            Oman
                                                        </option>
                                                        <option value="Pakistan">
                                                            Pakistan
                                                        </option>
                                                        <option value="Palau">
                                                            Palau
                                                        </option>
                                                        <option value="Palestinian Territory, Occupied">
                                                            Palestinian Territory, Occupied
                                                        </option>
                                                        <option value="Panama">
                                                            Panama
                                                        </option>
                                                        <option value="Papua New Guinea">
                                                            Papua New Guinea
                                                        </option>
                                                        <option value="Paraguay">
                                                            Paraguay
                                                        </option>
                                                        <option value="Peru">
                                                            Peru
                                                        </option>
                                                        <option value="Philippines">
                                                            Philippines
                                                        </option>
                                                        <option value="Pitcairn">
                                                            Pitcairn
                                                        </option>
                                                        <option value="Poland">
                                                            Poland
                                                        </option>
                                                        <option value="Portugal">
                                                            Portugal
                                                        </option>
                                                        <option value="Puerto Rico">
                                                            Puerto Rico
                                                        </option>
                                                        <option value="Qatar">
                                                            Qatar
                                                        </option>
                                                        <option value="Romania">
                                                            Romania
                                                        </option>
                                                        <option value="Russia">
                                                            Russia
                                                        </option>
                                                        <option value="Rwanda">
                                                            Rwanda
                                                        </option>
                                                        <option value="Reunion">
                                                            Reunion
                                                        </option>
                                                        <option value="Saint Barthelemy">
                                                            Saint Barthelemy
                                                        </option>
                                                        <option value="Saint Helena, Ascension And Tristan Da Cunha">
                                                            Saint Helena, Ascension And Tristan Da Cunha
                                                        </option>
                                                        <option value="Saint Kitts And Nevis">
                                                            Saint Kitts And Nevis
                                                        </option>
                                                        <option value="Saint Lucia">
                                                            Saint Lucia
                                                        </option>
                                                        <option value="Saint Martin">
                                                            Saint Martin
                                                        </option>
                                                        <option value="Saint Pierre And Miquelon">
                                                            Saint Pierre And Miquelon
                                                        </option>
                                                        <option value="Saint Vincent And The Grenadines">
                                                            Saint Vincent And The Grenadines
                                                        </option>
                                                        <option value="Samoa">
                                                            Samoa
                                                        </option>
                                                        <option value="San Marino">
                                                            San Marino
                                                        </option>
                                                        <option value="Sao Tome And Principe">
                                                            Sao Tome And Principe
                                                        </option>
                                                        <option value="Saudi Arabia">
                                                            Saudi Arabia
                                                        </option>
                                                        <option value="Senegal">
                                                            Senegal
                                                        </option>
                                                        <option value="Serbia">
                                                            Serbia
                                                        </option>
                                                        <option value="Seychelles">
                                                            Seychelles
                                                        </option>
                                                        <option value="Sierra Leone">
                                                            Sierra Leone
                                                        </option>
                                                        <option value="Singapore">
                                                            Singapore
                                                        </option>
                                                        <option value="Slovakia">
                                                            Slovakia
                                                        </option>
                                                        <option value="Slovenia">
                                                            Slovenia
                                                        </option>
                                                        <option value="Solomon Islands">
                                                            Solomon Islands
                                                        </option>
                                                        <option value="Somalia">
                                                            Somalia
                                                        </option>
                                                        <option value="South Africa">
                                                            South Africa
                                                        </option>
                                                        <option value="South Sudan">
                                                            South Sudan
                                                        </option>
                                                        <option value="South Georgia And The South Sandwich Islands">
                                                            South Georgia And The South Sandwich Islands
                                                        </option>
                                                        <option value="Spain">
                                                            Spain
                                                        </option>
                                                        <option value="Sri Lanka">
                                                            Sri Lanka
                                                        </option>
                                                        <option value="Sudan">
                                                            Sudan
                                                        </option>
                                                        <option value="Suriname">
                                                            Suriname
                                                        </option>
                                                        <option value="Svalbard And Jan Mayen">
                                                            Svalbard And Jan Mayen
                                                        </option>
                                                        <option value="Swaziland">
                                                            Swaziland
                                                        </option>
                                                        <option value="Sweden">
                                                            Sweden
                                                        </option>
                                                        <option value="Switzerland">
                                                            Switzerland
                                                        </option>
                                                        <option value="Syrian Arab Republic">
                                                            Syrian Arab Republic
                                                        </option>
                                                        <option value="Taiwan">
                                                            Taiwan
                                                        </option>
                                                        <option value="Tajikistan">
                                                            Tajikistan
                                                        </option>
                                                        <option value="Tanzania, United Republic Of Tanzania">
                                                            Tanzania, United Republic Of Tanzania
                                                        </option>
                                                        <option value="Thailand">
                                                            Thailand
                                                        </option>
                                                        <option value="Timor-Leste">
                                                            Timor-Leste
                                                        </option>
                                                        <option value="Togo">
                                                            Togo
                                                        </option>
                                                        <option value="Tokelau">
                                                            Tokelau
                                                        </option>
                                                        <option value="Tonga">
                                                            Tonga
                                                        </option>
                                                        <option value="Trinidad And Tobago">
                                                            Trinidad And Tobago
                                                        </option>
                                                        <option value="Tunisia">
                                                            Tunisia
                                                        </option>
                                                        <option value="Turkey">
                                                            Turkey
                                                        </option>
                                                        <option value="Turkmenistan">
                                                            Turkmenistan
                                                        </option>
                                                        <option value="Turks And Caicos Islands">
                                                            Turks And Caicos Islands
                                                        </option>
                                                        <option value="Tuvalu">
                                                            Tuvalu
                                                        </option>
                                                        <option value="Uganda">
                                                            Uganda
                                                        </option>
                                                        <option value="Ukraine">
                                                            Ukraine
                                                        </option>
                                                        <option value="United Arab Emirates">
                                                            United Arab Emirates
                                                        </option>
                                                        <option value="United Kingdom">
                                                            United Kingdom
                                                        </option>
                                                        <option value="United States">
                                                            United States
                                                        </option>
                                                        <option value="Uruguay">
                                                            Uruguay
                                                        </option>
                                                        <option value="Uzbekistan">
                                                            Uzbekistan
                                                        </option>
                                                        <option value="Vanuatu">
                                                            Vanuatu
                                                        </option>
                                                        <option value="Venezuela, Bolivarian Republic Of Venezuela">
                                                            Venezuela, Bolivarian Republic Of Venezuela
                                                        </option>
                                                        <option value="Vietnam">
                                                            Vietnam
                                                        </option>
                                                        <option value="Virgin Islands, British">
                                                            Virgin Islands, British
                                                        </option>
                                                        <option value="Virgin Islands, U.S.">
                                                            Virgin Islands, U.S.
                                                        </option>
                                                        <option value="Wallis And Futuna">
                                                            Wallis And Futuna
                                                        </option>
                                                        <option value="Yemen">
                                                            Yemen
                                                        </option>
                                                        <option value="Zambia">
                                                            Zambia
                                                        </option>
                                                        <option value="Zimbabwe">
                                                            Zimbabwe
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3 columnBox2">
                                                    <label class="labels">Highest Level Of Education</label>
                                                    <select class="form-control" name="education_level" required="">
                                                        <option value="Grade 1">Select Highest Level Of Education</option>
                                                        <optgroup label="Primary">
                                                            <option value="Grade 1">
                                                                Grade 1
                                                            </option>
                                                            <option value="Grade 2">
                                                                Grade 2
                                                            </option>
                                                            <option value="Grade 3">
                                                                Grade 3
                                                            </option>
                                                            <option value="Grade 4">
                                                                Grade 4
                                                            </option>
                                                            <option value="Grade 5">
                                                                Grade 5
                                                            </option>
                                                            <option value="Grade 6">
                                                                Grade 6
                                                            </option>
                                                            <option value="Grade 7">
                                                                Grade 7
                                                            </option>
                                                            <option value="Grade 8">
                                                                Grade 8
                                                            </option>
                                                        </optgroup>
                                                        <optgroup label="Secondary">
                                                            <option value="Grade 9">
                                                                Grade 9
                                                            </option>
                                                            <option value="Grade 10">
                                                                Grade 10
                                                            </option>
                                                            <option value="Grade 11">
                                                                Grade 11
                                                            </option>
                                                            <option value="Grade 12">
                                                                Grade 12 / High School
                                                            </option>
                                                        </optgroup>
                                                        <optgroup label="Undergraduate">
                                                            <option value="1-Year Post-Secondary Certificate">
                                                                1-Year
                                                                Post-Secondary Certificate
                                                            </option>
                                                            <option value="2-Year Undergraduate Diploma">
                                                                2-Year Undergraduate Diploma
                                                            </option>
                                                            <option value="3-Year Undergraduate Advanced Diploma">
                                                                3-Year Undergraduate
                                                                Advanced Diploma
                                                            </option>
                                                            <option value="3-Year Bachelors Degree">
                                                                3-Year Bachelors Degree
                                                            </option>
                                                            <option value="4-Year Bachelors Degree">
                                                                4-Year Bachelors Degree
                                                            </option>
                                                        </optgroup>
                                                        <optgroup label="Postgraduate">
                                                            <option value="Postgraduate Certificate / Diploma">
                                                                1-Year
                                                                Postgraduate Certificate / Diploma
                                                            </option>
                                                            <option value="Master Degree">Master Degree
                                                            </option>
                                                            <option value="Doctoral Degree(Phd, M.D, ...)">
                                                                Doctoral Degree(Phd, M.D,
                                                                ...)
                                                            </option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3 columnBox2">
                                                    <label class="labels">Grading Scheme</label>
                                                    <select class="form-control" name="education_scheme_grade"
                                                        required="">
                                                        <option value="Grade 1">Select Grading
                                                            Scheme
                                                        </option>
                                                        <option value="Letter Grade: Fail - Outstanding">
                                                            Letter Grade: Fail -
                                                            Outstanding
                                                        </option>
                                                        <option value="Letter Grade: F to AA / A+">
                                                            Letter Grade: F to AA / A+
                                                        </option>
                                                        <option value="Letter Grade Scale: F - O">
                                                            Letter Grade Scale: F - O
                                                        </option>
                                                        <option value="Letter Grade Division/Class">Letter Grade
                                                            Division/Class
                                                        </option>
                                                        <option value="Higher Education Grade Point 10 Scale">
                                                            Higher Education Grade
                                                            Point 10 Scale
                                                        </option>
                                                        <option value="Higher Education Percentage Scale 0-100">
                                                            Higher Education
                                                            Percentage Scale 0-100
                                                        </option>
                                                        <option value="Higher Education (Degree) Division Scale">Higher
                                                            Education
                                                            (Degree) Division Scale
                                                        </option>
                                                        <option
                                                            value="Hingher Education (Bachelor and Above) Percentage Scale 0-100">
                                                            Hingher Education (Bachelor and Above) Percentage Scale 0-100
                                                        </option>
                                                        <option
                                                            value="Hingher Education (Bachelor and Above) Grade Point 10 Scale">
                                                            Hingher Education (Bachelor and Above) Grade Point 10 Scale
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3 columnBox2">
                                                    <label class="labels">Grade Average</label><input type="text"
                                                        class="form-control" name="education_average_grade"
                                                        placeholder="Grade Average" value="" required="">
                                                </div>
                                            </div>
                                            <div class="mt-2 text-end">
                                                <button class="btn btn-primary profile-button" type="submit">
                                                    Save Profile
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
