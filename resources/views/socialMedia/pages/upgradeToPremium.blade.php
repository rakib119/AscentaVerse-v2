@php
    $userinfo = DB::table('user_infos')->select('is_final_submited')->where('user_id',auth()?->id())->first();
    $is_final_submited     = $userinfo?->is_final_submited;
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

            <h1 c> Upgrade To Premium </h1>

            <div class="uk-position-relative" uk-grid>
                @include('socialMedia.commonFile.settings.rightPannel')
                <div class="uk-width-2-3@m mt-sm-3 pl-sm-0 p-sm-4">
                        <div class="uk-child-width-1-2@m uk-grid-small uk-grid-match" uk-grid>
                            <div>
                                <div class="uk-card uk-card-default  uk-card-body rounded">
                                    <h4 class="uk-card-title">PREMIUM PACKAGE</h4>
                                    <p>Get our premium package with exclusive savings and flexible payment options.</p>

                                    <!-- Package Information Section -->
                                    <div class="uk-margin">
                                        <p><strong>Original Price:</strong> <span class="uk-text-danger">15,000 TAKA</span></p>
                                        <p><strong>Discount:</strong> 14%</p>
                                        <p><strong>Total Payable:</strong> <span class="uk-text-primary">12,900 TAKA</span></p>
                                        <p><strong>Your Savings:</strong> <span class="uk-text-success">2,100 TAKA</span></p>
                                    </div>

                                    <!-- Payment Options Section -->
                                    <div class="uk-margin">
                                        <h4 class="uk-heading-line"><span>Payment Options</span></h4>
                                        <p>Select a partial payment option if needed:</p>

                                        <ul class="uk-list uk-list-divider">
                                            <li><input class="uk-radio" type="radio" name="payment-option" value="10000"> 10,000 TAKA</li>
                                            <li><input class="uk-radio" type="radio" name="payment-option" value="6000"> 6,000 TAKA</li>
                                            <li><input class="uk-radio" type="radio" name="payment-option" value="3000"> 3,000 TAKA</li>
                                        </ul>
                                    </div>

                                    <!-- Confirmation and Payment Buttons -->
                                    <div class="uk-margin">
                                        <label>
                                            <input class="uk-checkbox" type="checkbox" id="confirm-checkbox"> I have reviewed the terms and agree.
                                        </label>
                                    </div>

                                    <div class="uk-margin uk-flex uk-flex-middle uk-flex-between">
                                        <button class="button primary transition-3d-hover" type="button" id="manual-payment-button" disabled>Manual</button>
                                        <button class="button primary transition-3d-hover" type="button" id="online-payment-button" disabled>Online</button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-default  uk-card-body rounded">
                                    <h4 class="uk-card-title">PREMIUM PACKAGE</h4>
                                    <p>Get our premium package with exclusive savings and flexible payment options.</p>

                                    <!-- Package Information Section -->
                                    <div class="uk-margin">
                                        <p><strong>Original Price:</strong> <span class="uk-text-danger">15,000 TAKA</span></p>
                                        <p><strong>Discount:</strong> 14%</p>
                                        <p><strong>Total Payable:</strong> <span class="uk-text-primary">12,900 TAKA</span></p>
                                        <p><strong>Your Savings:</strong> <span class="uk-text-success">2,100 TAKA</span></p>
                                    </div>

                                    <!-- Payment Options Section -->
                                    <div class="uk-margin">
                                        <h4 class="uk-heading-line"><span>Payment Options</span></h4>
                                        <p>Select a partial payment option if needed:</p>

                                        <ul class="uk-list uk-list-divider">
                                            <li><input class="uk-radio" type="radio" name="payment-option" value="10000"> 10,000 TAKA</li>
                                            <li><input class="uk-radio" type="radio" name="payment-option" value="6000"> 6,000 TAKA</li>
                                            <li><input class="uk-radio" type="radio" name="payment-option" value="3000"> 3,000 TAKA</li>
                                        </ul>
                                    </div>

                                    <!-- Confirmation and Payment Buttons -->
                                    <div class="uk-margin">
                                        <label>
                                            <input class="uk-checkbox" type="checkbox" id="confirm-checkbox"> I have reviewed the terms and agree.
                                        </label>
                                    </div>

                                    <div class="uk-margin uk-flex uk-flex-middle uk-flex-between">
                                        <button class="button primary transition-3d-hover" type="button" id="manual-payment-button" disabled>Manual</button>
                                        <button class="button primary transition-3d-hover" type="button" id="online-payment-button" disabled>Online</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
   </div>
@endsection

@section('javaScript')

@endsection
