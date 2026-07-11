<div class="container" id="booknow">
<div class="row">
<div class="col-lg-6 m-auto">
<div class="title-style-one text-center mb-60 lg-mb-40 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
<h2 class="main-title fw-500 tx-dark m0">Book Now</h2>
</div>
</div>

<div class="col-xxl-11 m-auto">
<div class="form-style-four wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
<form method="POST" class="contact_form mb-3" autocomplete="off" id="tourid" action="{{route('tour.send')}}">
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<div class="input-bg-group position-relative controls">
 <div class="row">   
<div class="col-sm-6">   
<div class="d-block">
<div class="input-group-meta form-group mb-50">
<label class="d-block" for="">Name*</label>
<input type="text" name="name" id="name">
<span class="text-danger error-text name_error"> </span>
</div>
</div>
</div>
<div class="col-sm-6"> 
<div class="d-block">
<div class="input-group-meta form-group mb-60">
<label class="d-block">Email*</label>
<input type="email" name="email" id="email">
<span class="text-danger error-text email_error"> </span>
</div>
</div>
</div>

<div class="col-sm-4"> 
<div class="d-block">
<div class="input-group-meta form-group mb-60">
<label class="d-block" for="">Phone*</label>
<input type="text" name="phone" id="phone">
<span class="text-danger error-text phone_error"> </span>
</div>
</div>
</div>

<div class="col-sm-4"> 
<div class="d-block">
<div class="input-group-meta form-group mb-60">
<label class="d-block" for="">Country*</label>
<select name="country" id="country">
<option selected="" value="">Select Country</option>
<option value="Afghanistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antarctica">Antarctica</option>
<option value="Antigua and Barbuda">Antigua and Barbuda</option>
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
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British IndianOcean">British IndianOcean</option>
<option value="British Virgin Islands">British Virgin Islands</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Rep.">Central African Rep.</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Islands">Cocos Islands</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French SouthernTerr.">French SouthernTerr.</option>
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
<option value="Heard &amp; McDonald">Heard &amp; McDonald</option>
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
<option value="Ivory Coast">Ivory Coast</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea, North">Korea, North</option>
<option value="Korea, South">Korea, South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Micronesia,Fed. St.">Micronesia,Fed. St.</option>
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
<option value="Netherlands Antilles">Netherlands Antilles</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Northern Mariana Isl.">Northern Mariana Isl.</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau">Palau</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Philippines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="S.Georgia &amp; S.Sand.">S.Georgia &amp; S.Sand.</option>
<option value="Saint Kitts &amp; Nevis">Saint Kitts &amp; Nevis</option>
<option value="Saint Lucia">Saint Lucia</option>
<option value="St.Vincent &amp; Gren.">St.Vincent &amp; Gren.</option>
<option value="Samoa">Samoa</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Seychelles">Seychelles</option>
<option value="Seychelles">Seychelles</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="St. Helena">St. Helena</option>
<option value="St. Pierre &amp; Miquelon">St. Pierre &amp; Miquelon</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Svalbard &amp; J.Mayen">Svalbard &amp; J.Mayen</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad and Tobago">Trinidad and Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Isl.">Turks &amp; Caicos Isl.</option>
<option value="Tuvalu">Tuvalu</option>
<option value="U.S.Minor Outlying Isl.">U.S.Minor Outlying Isl.</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Emirates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="U.S.A.">U.S.A.</option>
<option value="Uruguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City">Vatican City</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands">Virgin Islands</option>
<option value="Wallis &amp; Futuna Isl.">Wallis &amp; Futuna Isl.</option>
<option value="Western Sahara">Western Sahara</option>
<option value="Yemen">Yemen</option>
<option value="Yugoslavia (Former)">Yugoslavia (Former)</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select>
<span class="text-danger error-text phone_error"> </span>
</div>
</div>
</div>

<div class="col-sm-4"> 
<div class="d-block">
<div class="input-group-meta form-group mb-60">
<label class="d-block">Arrival Date*</label>
<input type="date" name="arrival_date" id="arrival_date" class="hasDatepicker"> 
<span class="text-danger error-text arrival_date_error"> </span>

</div>
</div>
</div>


<div class="col-sm-6"> 
<div class="d-block">
<div class="input-group-meta form-group mb-60">
<label class="d-block">No of Travelers*</label>
<input name="notravelers" type="number" min="1" id="notravelers"> 
<span class="text-danger error-text notravelers_error"> </span>
</div>
</div>
</div>


<div class="col-sm-6"> 
<div class="d-block">
<div class="input-group-meta form-group mb-60">
<label class="d-block">Type of Car Require*</label>
<select  name="car_required" id="car_required">
 @php 
 $vichelelists = \App\Models\Car::where('status',1)->orderBy('sort_order','ASC')->get()
 @endphp   
<option value="">Select Vehicle type</option>
@if(!$vichelelists->isEmpty())
@foreach($vichelelists as $cars)
<option value="{{$cars->title}}">{{$cars->title}}</option>
@endforeach
@endif
<option value="Not Required">Not Required</option>
</select>
<span class="text-danger error-text car_required_error"> </span>
</div>
</div>
</div>

<div class="col-sm-6"> 
<div class="d-block">
<div class="input-group-meta form-group mb-60">
<label class="d-block">Type of Hotels Require(*)</label>
<select name="hotel_required" id="hotel_required">
<option value="">Select Hotel Category</option>
<option value="Five Star Luxury">Five Star Luxury</option>
<option value="Five Star">Five Star</option>
<option value="3 Star">3 Star</option>
<option value="Five Star Heritage">Five Star Heritage</option>
<option value="Not Required">Not Required</option>
</select> 
<span class="text-danger error-text hotel_required_error"> </span>
</div>
</div>
</div>


<div class="col-sm-6"> 
<div class="d-block">
<div class="input-group-meta form-group mb-60">
<label class="d-block">Budget*</label>
<select id="tour_budget" placeholder="Budget" name="tour_budget">
<option selected="selected">-Tour Budget-</option>
<option value="Flexible"> Flexible</option> 
<option value="Less than 500 USD"> Less than 500 USD</option> 
<option value="500-1000 USD">500-1000 USD</option> 
<option value="1000 Above USD">1000 Above USD</option> 
</select>
<span class="text-danger error-text tour_budget_error"> </span>
</div>
</div>
</div>

<div class="col-sm-12"> 
<div class="d-block">
<div class="input-group-meta form-group">
<textarea placeholder="Your message*" name="messages" id="messages"></textarea>
</div>
</div>
</div>

<div class="col-sm-12"> 
<div class="d-block mt-10">
<div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
@if ($errors->has('g-recaptcha-response'))
<span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
@endif
<span class="text-danger small error-text g-recaptcha-response_error"> </span>
</div>
</div>
<!-- /.input-bg-group -->
<button class="btn-one fw-500 w-100 fs-18 d-block mt-45">Send Message</button>
</div> 
</div>
</form>
</div> <!-- /.form-style-four -->
</div>
</div> 
</div>