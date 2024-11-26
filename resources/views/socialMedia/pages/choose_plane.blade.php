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
                <div class="uk-width-1-3@m uk-flex-last@m pl-sm-0">
                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-text-center">
                        <div class="uk-margin">
                            <p class="uk-text-meta">Subtotal <span class="uk-text-muted"><del>US$ 717.60</del></span></p>
                            <p class="uk-text-lead uk-text-bold">US$ 141.60</p>
                        </div>
                        <p class="uk-text-success">Plan discount -80% <span class="uk-text-danger">-US$ 576.00</span></p>
                        {{-- <button class="uk-button uk-button-text uk-margin-small-bottom">Have a coupon code?</button> --}}
                        <button class="uk-button uk-button-primary uk-border-rounded uk-margin-small-top">Continue</button>
                    </div>
                </div>
                <div class="uk-width-2-3@m mt-sm-3 pl-sm-0 p-sm-4">
                    <div class="uk-container uk-margin-top">
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                          <!-- Hosting Plan Header -->
                          <h2 class="uk-text-bold">Business Web Hosting</h2>

                          <!-- Period Selection -->
                          <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-small-top">
                            <label for="period" class="uk-text-bold">Period</label>
                            <select id="period" class="uk-select uk-width-small" style="width:200px;">
                              <option value="48">48 months</option>
                              <option value="24">24 months</option>
                              <option value="12">12 months</option>
                            </select>
                          </div>

                          <!-- Price Details -->
                          <div class="uk-margin">
                            <div class="uk-flex uk-flex-between uk-flex-middle">
                              <p class="uk-text-danger uk-text-bold uk-margin-remove">SAVE US$ 576.00</p>
                              <div class="uk-text-right">
                                <p class="uk-text-lead uk-text-bold uk-margin-remove">US$ 2.95 / month</p>
                                <p class="uk-text-meta uk-margin-remove"><del>US$ 14.95 / month</del></p>
                              </div>
                            </div>
                          </div>

                          <!-- Renewal Note -->
                          {{-- <p class="uk-text-meta uk-margin-remove">Renews at US$ 8.99/month on 23/11/2028. Cancel anytime!</p> --}}

                          <!-- Free Benefits -->
                         {{--  <p class="uk-text-bold uk-margin-top">
                            Great news! Your <span class="uk-text-primary">FREE domain</span> + <span class="uk-text-success">3 months FREE</span> are included with this order.
                          </p> --}}
                        </div>
                      </div>
                </div>
            </div>
        </div>
   </div>
@endsection

@section('javaScript')

@endsection
