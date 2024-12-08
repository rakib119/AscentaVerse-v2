@php
    $selected_package_info = session('package_info')??array();
    extract($selected_package_info);
    // print_r($selected_package_info); die;
    $payment_type_array = array(
        1=>"Bank",
        2=>"Mobile Banking"
    );
@endphp
@extends('socialMedia.commonFile.socialLayouts1')
@section('topBar')
    @include('socialMedia.commonFile.topBar')
@endsection

@section('leftBar')
    @include('socialMedia.commonFile.leftBarV1')
@endsection
@section('mainContent')
   <!-- contents -->
   <div class="main_content">
        <div class="main_content_inner p-sm-0 ml-sm-4">
            <h1> Upgrade To Premium </h1>

            <div id="main_payment_container2" style="display: none;">
                {{-- style="display: none;" --}}
                <div class="uk-container uk-margin-large-top">
                    <form class="uk-form-stacked">
                        <div class="uk-grid-small uk-child-width-1-3@l uk-child-width-1-2@m uk-child-width-1-1@s" uk-grid>

                            <div>
                                <label class="uk-form-label" for="paymentType">Payment Type</label>
                                <div id="paymentTypeContainer" class="uk-form-controls">
                                    {!!createDropDownUiKit( "paymentType","", $payment_type_array,"", 1, "-- Select --",20, "loadDropDown('".route('loadBankName')."', this.value, 'division-container');",0,0 )!!}
                                </div>
                                 <div class="uk-text-danger" id="paymentTypeError"></div>
                            </div>
                            <div>
                                <label class="uk-form-label" for="bank_name">Bank Name</label>
                                <div id="bankNameContainer" class="uk-form-controls">
                                    {!!createDropDownUiKit( "bankName","", array(),"", 1, "-- Select --",20, "",0,0 )!!}
                                </div>
                                <div class="uk-text-danger" id="bankNameError"></div>
                            </div>

                            <!-- Email Field -->
                            <div>
                                <label class="uk-form-label" for="email">Email</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="email" type="email" placeholder="Enter your email">
                                </div>
                                <div class="uk-text-danger uk-margin-small-top" id="emailError" style="display: none;">
                                    Please enter a valid email address.
                                </div>
                            </div>

                            <!-- Gender Field (Select Dropdown) -->
                            <div>
                                <label class="uk-form-label" for="gender">Gender</label>
                                <div class="uk-form-controls">
                                    <select class="uk-select" id="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="uk-text-danger uk-margin-small-top" id="genderError" style="display: none;">
                                    Please select a gender.
                                </div>
                            </div>

                            <!-- Phone Field -->
                            <div>
                                <label class="uk-form-label" for="phone">Phone</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="phone" type="text" placeholder="Enter your phone number">
                                </div>
                                <div class="uk-text-danger uk-margin-small-top" id="phoneError" style="display: none;">
                                    Please enter a valid phone number.
                                </div>
                            </div>


                            <!-- Message Field -->
                            <div>
                                <label class="uk-form-label" for="message">Message</label>
                                <div class="uk-form-controls">
                                    <textarea class="uk-textarea" id="message" rows="3" placeholder="Enter your message"></textarea>
                                </div>
                                <div class="uk-text-danger uk-margin-small-top" id="messageError" style="display: none;">
                                    The message field cannot be empty.
                                </div>
                            </div>

                            <!-- Address Field -->
                            <div>
                                <label class="uk-form-label" for="address">Address</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="address" type="text" placeholder="Enter your address">
                                </div>
                                <div class="uk-text-danger uk-margin-small-top" id="addressError" style="display: none;">
                                    Please enter a valid address.
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button class="uk-button uk-button-primary uk-width-1-1" type="button" onclick="validateForm()">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="main_payment_container">

            </div>
            <div id="package_container">
                <div class="uk-position-relative" uk-grid>
                    <div class="uk-width-1-2@m mt-sm-3 pl-sm-0 p-sm-4">
                        <div class="uk-container uk-margin-top">
                            <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                            <!-- Hosting Plan Header -->
                            <h2 class="uk-text-bold">{{$package->package_name}}</h2>

                            <!-- Period Selection -->
                            <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-small-top">
                                <label for="period" class="uk-text-bold">Package</label>
                                @php
                                    $data ="'".route('social.load_subtotal')."',this.value,'subtotal_container'";
                                @endphp
                                <select id="period" onChange="loadHtmlElement({{$data}})" class="uk-select uk-width-small" style="width:200px;">
                                    <option value="0"> --Select Package--</option>
                                    @foreach ($package_break_down as $row)
                                        <option value="{{$row->id}}" {{ isset($selected_package_id) ? ($selected_package_id==$row->id ?'selected':''):"" }} > {{$row->sub_package_name." (৳".$row->discounted_amount.")"}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-1-2@m mt-sm-3 pl-sm-0 p-sm-4">
                        <div id="subtotal_container">
                            {{-- DATA COME FROM AJAX REQUEST --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
   </div>
@endsection

@section('javaScript')
    @if (count($selected_package_info))
        @if (isset($payment_method) && $payment_method)
            <script>
                package_id  = {{isset($selected_package_id)?$selected_package_id:""}};
                route       = '{{route('social.load_payment_method')}}';
                method_id   = {{$payment_method}};

                $( document ).ready(function() {
                    $('#package_container').css('display', 'none');
                    getPaymentComponent(method_id,route,package_id,'main_payment_container',true);
                });
            </script>
        @else
            <script>
                    route = '{{route('social.load_subtotal')}}';
                    package_id = {{isset($selected_package_id)?$selected_package_id:""}};
                    $( document ).ready(function() {
                        loadHtmlElement(route,package_id,'subtotal_container');
                    });
            </script>
        @endif
    @endif

@endsection
