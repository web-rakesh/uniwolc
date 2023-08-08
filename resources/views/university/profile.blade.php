@extends('university.layouts.layout')
@section('content')
    <section class="dashboardPgaesSec bg-white">
        <div class="container rounded">
            <div class="dashboardPgaesSecinner">
                <div class="row rowBox">

                    <div class="col-md-9 columnBox border-right dasboardrightPart">
                        <div class="dasboardrightPartWrapper">
                            <div class="p-3 py-5 dasboardrightPartWrapperinner">
                                <h4 class="card-title text-center1 mb-0">Edit Profile</h4>
                                <hr>
                                <form method="post" action="{{ route('university.profile.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row rowBox2 mt-3">
                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">University Name</label>
                                            <input type="text" class="form-control" placeholder="" name="university_name"
                                                value="{{ $profileDetail->university_name ?? old('university_name') }}"
                                                required="">
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Phone No.</label><input type="text"
                                                class="form-control" name="phone_number"
                                                value="{{ $profileDetail->phone_number ?? old('phone_number') }}"
                                                required="">
                                        </div>
                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $profileDetail->email ?? old('email') }}">
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label>Study Permit / Visa ({{ $profileDetail->permit_visa ?? '' }})</label>
                                            <select class="form-control" name="permit_visa">
                                                <option selected="selected">I don't have this</option>
                                                <option>USA F1 Visa</option>
                                                <option>Canadian Study Permit or Visitor Visa</option>
                                                <option>
                                                    UK Student Visa (Tier 4) or short Term Study Visa
                                                </option>
                                                <option>Australian Student Visa</option>
                                                <option>Irish Stamp 2</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label>Nationality ({{ $profileDetail->country ?? '' }})</label>
                                            <select class="form-control" name="country">
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua And Barbuda">
                                                    Antigua And Barbuda
                                                </option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia And Herzegovina">
                                                    Bosnia And Herzegovina
                                                </option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">
                                                    British Indian Ocean Territory
                                                </option>
                                                <option value="British Virgin Islands">
                                                    British Virgin Islands
                                                </option>
                                                <option value="Brunei Darussalam">
                                                    Brunei Darussalam
                                                </option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">
                                                    Central African Republic
                                                </option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">
                                                    Christmas Island
                                                </option>
                                                <option value="Cocos (Keeling) Islands">
                                                    Cocos (Keeling) Islands
                                                </option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Côte D'Ivoire">Côte D'Ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Democratic Republic of Congo">
                                                    Democratic Republic of Congo
                                                </option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="description">description</option>
                                                <option value="displayOrder">displayOrder</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">
                                                    Dominican Republic
                                                </option>
                                                <option value="doubleData">doubleData</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">
                                                    Equatorial Guinea
                                                </option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Europe">Europe</option>
                                                <option value="Falkland Islands (Malvinas)">
                                                    Falkland Islands (Malvinas)
                                                </option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">
                                                    French Polynesia
                                                </option>
                                                <option value="French Southern Territories">
                                                    French Southern Territories
                                                </option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard Island And Mcdonald Islands">
                                                    Heard Island And Mcdonald Islands
                                                </option>
                                                <option value="hidden">hidden</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran">Iran</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Kosovo">Kosovo</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="label">label</option>
                                                <option value="Lao People'S Democratic Republic">
                                                    Lao People'S Democratic Republic
                                                </option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libya">Libya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macao">Macao</option>
                                                <option value="Macedonia, The Former Yugoslav Republic Of">
                                                    Macedonia, The Former Yugoslav Republic Of
                                                </option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">
                                                    Marshall Islands
                                                </option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia, Federated States Of">
                                                    Micronesia, Federated States Of
                                                </option>
                                                <option value="Moldova">Moldova</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">
                                                    Netherlands Antilles
                                                </option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">
                                                    Northern Mariana Islands
                                                </option>
                                                <option value="North Korea">North Korea</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Other">Other</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestine">Palestine</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">
                                                    Papua New Guinea
                                                </option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="readOnly">readOnly</option>
                                                <option value="Réunion">Réunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russia">Russia</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Helena">Saint Helena</option>
                                                <option value="Saint Kitts And Nevis">
                                                    Saint Kitts And Nevis
                                                </option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Pierre And Miquelon">
                                                    Saint Pierre And Miquelon
                                                </option>
                                                <option value="Saint Vincent And The Grenadines">
                                                    Saint Vincent And The Grenadines
                                                </option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome And Principe">
                                                    Sao Tome And Principe
                                                </option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia And Montenegro">
                                                    Serbia And Montenegro
                                                </option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">
                                                    Solomon Islands
                                                </option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia And South Sandwich Islands">
                                                    South Georgia And South Sandwich Islands
                                                </option>
                                                <option value="South Korea">South Korea</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard And Jan Mayen">
                                                    Svalbard And Jan Mayen
                                                </option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syrian Arab Republic">
                                                    Syrian Arab Republic
                                                </option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania">Tanzania</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-Leste">Timor-Leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad And Tobago">
                                                    Trinidad And Tobago
                                                </option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks And Caicos Islands">
                                                    Turks And Caicos Islands
                                                </option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="U.S. Virgin Islands">
                                                    U.S. Virgin Islands
                                                </option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">
                                                    United Arab Emirates
                                                </option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">
                                                    United States Minor Outlying Islands
                                                </option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="value">value</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="Wallis And Futuna">
                                                    Wallis And Futuna
                                                </option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                                <option value="Aland Islands">Aland Islands</option>
                                                <option value="Bosnia Herzegovina">
                                                    Bosnia Herzegovina
                                                </option>
                                                <option value="Saint Barthélemy">
                                                    Saint Barthélemy
                                                </option>
                                                <option value="Brunei">Brunei</option>
                                                <option value="Bonaire, Sint Eustatius and Saba">
                                                    Bonaire, Sint Eustatius and Saba
                                                </option>
                                                <option value="Congo (Democratic Republic of the)">
                                                    Congo (Democratic Republic of the)
                                                </option>
                                                <option value="Ivory Coast">Ivory Coast</option>
                                                <option value="Curacao">Curacao</option>
                                                <option value="Falkland Islands">
                                                    Falkland Islands
                                                </option>
                                                <option value="Micronesia">Micronesia</option>
                                                <option value="Guernsey">Guernsey</option>
                                                <option value="South Georgia and the South Sandwich Islands">
                                                    South Georgia and the South Sandwich Islands
                                                </option>
                                                <option value="Hong Kong - SAR China">
                                                    Hong Kong - SAR China
                                                </option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Jersey">Jersey</option>
                                                <option value="St Kitts and Nevis">
                                                    St Kitts and Nevis
                                                </option>
                                                <option value="Korea North">Korea North</option>
                                                <option value="Korea South">Korea South</option>
                                                <option value="Laos">Laos</option>
                                                <option value="St Lucia">St Lucia</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Saint Martin (French part)">
                                                    Saint Martin (French part)
                                                </option>
                                                <option value="Macedonia">Macedonia</option>
                                                <option value="Burma (Myanmar)">
                                                    Burma (Myanmar)
                                                </option>
                                                <option value="Macao - SAR China">
                                                    Macao - SAR China
                                                </option>
                                                <option value="Palestinian Authority">
                                                    Palestinian Authority
                                                </option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Saudi Arabia, Kingdom of">
                                                    Saudi Arabia, Kingdom of
                                                </option>
                                                <option value="St Helena">St Helena</option>
                                                <option value="South Sudan">South Sudan</option>
                                                <option value="Sao Tomé e Principe">
                                                    Sao Tomé e Principe
                                                </option>
                                                <option value="Sint Maarten (Dutch part)">
                                                    Sint Maarten (Dutch part)
                                                </option>
                                                <option value="Syria">Syria</option>
                                                <option value="East Timor">East Timor</option>
                                                <option value="Vatican City">Vatican City</option>
                                                <option value="St Vincent">St Vincent</option>
                                                <option value="Virgin Islands (British)">
                                                    Virgin Islands (British)
                                                </option>
                                                <option value="Virgin Islands (U.S.)">
                                                    Virgin Islands (U.S.)
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">University Address</label>
                                            <textarea class="form-control" name="address" rows="3">{{ $profileDetail->address ?? old('address') }}</textarea>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">About University</label>
                                            <textarea class="form-control" name="about_university" rows="3">{{ $profileDetail->about_university ?? old('about_university') }}</textarea>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Features</label>
                                            <textarea class="form-control" name="feature" rows="3">{{ $profileDetail->feature ?? old('feature') }}</textarea>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Location</label>
                                            <textarea class="form-control" name="location" rows="3">{{ $profileDetail->location ?? old('location') }}</textarea>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels"><b>Institution Details</b></label>
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Founded</label>
                                            <input type="text" class="form-control" name="founded"
                                                value="{{ $profileDetail->founded ?? old('founded') }}">
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">School ID</label>
                                            <input type="text" class="form-control" name="school_id"
                                                value="{{ $profileDetail->school_id ?? old('school_id') }}">
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Provider ID number</label>
                                            <input type="text" class="form-control" name="provider_id_number"
                                                value="{{ $profileDetail->provider_id_number ?? old('provider_id_number') }}">
                                        </div>

                                        <div class="col-md-6 mb-3 columnBox2">
                                            <label class="labels">Institution type</label>
                                            <input type="text" class="form-control" name="institution_type"
                                                value="{{ $profileDetail->institution_type ?? old('institution_type') }}">
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Blocked Countries
                                                ({{ $profileDetail->blocked_country ?? '' }})</label>

                                            <select class="form-control" name="blocked_country">
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua And Barbuda">
                                                    Antigua And Barbuda
                                                </option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia And Herzegovina">
                                                    Bosnia And Herzegovina
                                                </option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">
                                                    British Indian Ocean Territory
                                                </option>
                                                <option value="British Virgin Islands">
                                                    British Virgin Islands
                                                </option>
                                                <option value="Brunei Darussalam">
                                                    Brunei Darussalam
                                                </option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">
                                                    Central African Republic
                                                </option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">
                                                    Christmas Island
                                                </option>
                                                <option value="Cocos (Keeling) Islands">
                                                    Cocos (Keeling) Islands
                                                </option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Côte D'Ivoire">Côte D'Ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Democratic Republic of Congo">
                                                    Democratic Republic of Congo
                                                </option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="description">description</option>
                                                <option value="displayOrder">displayOrder</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">
                                                    Dominican Republic
                                                </option>
                                                <option value="doubleData">doubleData</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">
                                                    Equatorial Guinea
                                                </option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Europe">Europe</option>
                                                <option value="Falkland Islands (Malvinas)">
                                                    Falkland Islands (Malvinas)
                                                </option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">
                                                    French Polynesia
                                                </option>
                                                <option value="French Southern Territories">
                                                    French Southern Territories
                                                </option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard Island And Mcdonald Islands">
                                                    Heard Island And Mcdonald Islands
                                                </option>
                                                <option value="hidden">hidden</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran">Iran</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Kosovo">Kosovo</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="label">label</option>
                                                <option value="Lao People'S Democratic Republic">
                                                    Lao People'S Democratic Republic
                                                </option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libya">Libya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macao">Macao</option>
                                                <option value="Macedonia, The Former Yugoslav Republic Of">
                                                    Macedonia, The Former Yugoslav Republic Of
                                                </option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">
                                                    Marshall Islands
                                                </option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia, Federated States Of">
                                                    Micronesia, Federated States Of
                                                </option>
                                                <option value="Moldova">Moldova</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">
                                                    Netherlands Antilles
                                                </option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">
                                                    Northern Mariana Islands
                                                </option>
                                                <option value="North Korea">North Korea</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Not Applicable">Not Applicable</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Other">Other</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestine">Palestine</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">
                                                    Papua New Guinea
                                                </option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="readOnly">readOnly</option>
                                                <option value="Réunion">Réunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russia">Russia</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Helena">Saint Helena</option>
                                                <option value="Saint Kitts And Nevis">
                                                    Saint Kitts And Nevis
                                                </option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Pierre And Miquelon">
                                                    Saint Pierre And Miquelon
                                                </option>
                                                <option value="Saint Vincent And The Grenadines">
                                                    Saint Vincent And The Grenadines
                                                </option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome And Principe">
                                                    Sao Tome And Principe
                                                </option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia And Montenegro">
                                                    Serbia And Montenegro
                                                </option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">
                                                    Solomon Islands
                                                </option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia And South Sandwich Islands">
                                                    South Georgia And South Sandwich Islands
                                                </option>
                                                <option value="South Korea">South Korea</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard And Jan Mayen">
                                                    Svalbard And Jan Mayen
                                                </option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syrian Arab Republic">
                                                    Syrian Arab Republic
                                                </option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania">Tanzania</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-Leste">Timor-Leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad And Tobago">
                                                    Trinidad And Tobago
                                                </option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks And Caicos Islands">
                                                    Turks And Caicos Islands
                                                </option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="U.S. Virgin Islands">
                                                    U.S. Virgin Islands
                                                </option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">
                                                    United Arab Emirates
                                                </option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">
                                                    United States Minor Outlying Islands
                                                </option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="value">value</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="Wallis And Futuna">
                                                    Wallis And Futuna
                                                </option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                                <option value="Aland Islands">Aland Islands</option>
                                                <option value="Bosnia Herzegovina">
                                                    Bosnia Herzegovina
                                                </option>
                                                <option value="Saint Barthélemy">
                                                    Saint Barthélemy
                                                </option>
                                                <option value="Brunei">Brunei</option>
                                                <option value="Bonaire, Sint Eustatius and Saba">
                                                    Bonaire, Sint Eustatius and Saba
                                                </option>
                                                <option value="Congo (Democratic Republic of the)">
                                                    Congo (Democratic Republic of the)
                                                </option>
                                                <option value="Ivory Coast">Ivory Coast</option>
                                                <option value="Curacao">Curacao</option>
                                                <option value="Falkland Islands">
                                                    Falkland Islands
                                                </option>
                                                <option value="Micronesia">Micronesia</option>
                                                <option value="Guernsey">Guernsey</option>
                                                <option value="South Georgia and the South Sandwich Islands">
                                                    South Georgia and the South Sandwich Islands
                                                </option>
                                                <option value="Hong Kong - SAR China">
                                                    Hong Kong - SAR China
                                                </option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Jersey">Jersey</option>
                                                <option value="St Kitts and Nevis">
                                                    St Kitts and Nevis
                                                </option>
                                                <option value="Korea North">Korea North</option>
                                                <option value="Korea South">Korea South</option>
                                                <option value="Laos">Laos</option>
                                                <option value="St Lucia">St Lucia</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Saint Martin (French part)">
                                                    Saint Martin (French part)
                                                </option>
                                                <option value="Macedonia">Macedonia</option>
                                                <option value="Burma (Myanmar)">
                                                    Burma (Myanmar)
                                                </option>
                                                <option value="Macao - SAR China">
                                                    Macao - SAR China
                                                </option>
                                                <option value="Palestinian Authority">
                                                    Palestinian Authority
                                                </option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Saudi Arabia, Kingdom of">
                                                    Saudi Arabia, Kingdom of
                                                </option>
                                                <option value="St Helena">St Helena</option>
                                                <option value="South Sudan">South Sudan</option>
                                                <option value="Sao Tomé e Principe">
                                                    Sao Tomé e Principe
                                                </option>
                                                <option value="Sint Maarten (Dutch part)">
                                                    Sint Maarten (Dutch part)
                                                </option>
                                                <option value="Syria">Syria</option>
                                                <option value="East Timor">East Timor</option>
                                                <option value="Vatican City">Vatican City</option>
                                                <option value="St Vincent">St Vincent</option>
                                                <option value="Virgin Islands (British)">
                                                    Virgin Islands (British)
                                                </option>
                                                <option value="Virgin Islands (U.S.)">
                                                    Virgin Islands (U.S.)
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Average Time to Receive Letter of Acceptance</label>
                                            <textarea class="form-control" name="letter_of_acceptance" rows="3">{{ $profileDetail->letter_of_acceptance ?? old('letter_of_acceptance') }}</textarea>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">Top Disciplines</label>
                                            <textarea class="form-control" name="disciplines" rows="3">{{ $profileDetail->disciplines ?? old('disciplines') }}</textarea>
                                        </div>

                                        <div class="col-md-12 mb-3 columnBox2">
                                            <label class="labels">University Pictures</label>
                                            <input type="file" name="university_picture[]" class="form-control"
                                                multiple="" accept="image/png, image/jpeg">

                                        </div>

                                        @foreach ($profileDetail->getMedia('university-picture') ?? [] as $image)
                                            <div class="col-md-3 mb-3 columnBox2">
                                                <img src="{{ $image->getUrl() }}" alt="{{ $image->getUrl() }}"
                                                    class="w-20 h-20 shadow">
                                            </div>
                                        @endforeach

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
