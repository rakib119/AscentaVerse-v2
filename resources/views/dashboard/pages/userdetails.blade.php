@extends('dashboard.layout.dashboard')
@php
    $userinfo = DB::table('user_infos')->where('user_id',auth()?->id())->first();
    $userinfoArray = (array)$userinfo;
    extract($userinfoArray); //Array to variable
    $verification_type_arr  = explode(',',$verification_type);
    $religionArray      = session('religionArray');
    $professionArray    = session('professionArray');
    $country_arr        = session('country_arr');
    $division_arr       = session('division_arr');
    $district_arr       = session('district_arr');
    $upazila_arr        = session('upazila_arr');
@endphp
@section('content')
<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>User Information</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item  "><a href="javascript:void(0)">Information</a>
                                <li class="breadcrumb-item active">User Information</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="container-fluid">
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-4">User Info</h4>
                                <form action=" " enctype="multipart/form-data" method="post">
                                    @csrf
                                    @method('PUT')
                                    <!-- Step 1 -->
                                    <div class="row p-4">
                                        <div class="col-md-6 d-flex align-items-center">
                                            <h5 class="fw-bold mb-2 me-3">Verification Type: </h5>
                                            <div class="form-check me-3">
                                                <input readonly class="form-check-input" id="flexCheckedDisabled1" name="verification_type[]" value="1" type="checkbox"
                                                    {{ in_array(1, $verification_type_arr) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexCheckedDisabled1">Employee</label>
                                            </div>
                                            <div class="form-check">
                                                <input readonly class="form-check-input" id="flexCheckedDisabled2" name="verification_type[]" value="2" type="checkbox"
                                                    checked>
                                                <label class="form-check-label" for="flexCheckedDisabled2">Freelancer</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Step 1 -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Full Name *</label>
                                            <input type="text" name="full_name" class="form-control" id="full_name" value="{{ $full_name ?? '' }}" placeholder="Full Name" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">First Name *</label>
                                            <input type="text" name="first_name" class="form-control" id="first_name" onkeyup="completeFull_name('first_name*middle_name*last_name', 'full_name')" placeholder="First Name" value="{{ $first_name ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Middle Name *</label>
                                            <input type="text" name="middle_name" class="form-control" onkeyup="completeFull_name('first_name*middle_name*last_name', 'full_name')" id="middle_name" placeholder="Middle Name" value="{{ $middle_name ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Last Name *</label>
                                            <input type="text" name="last_name" class="form-control" onkeyup="completeFull_name('first_name*middle_name*last_name', 'full_name')" id="last_name" placeholder="Last Name" value="{{ $last_name ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Gender *</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" value="1" {{ isset($gender) && $gender == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" value="2" {{ isset($gender) && $gender == 2 ? 'checked' : '' }}>
                                                <label class="form-check-label">Female</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" value="3" {{ isset($gender) && $gender == 3 ? 'checked' : '' }}>
                                                <label class="form-check-label">Other</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Country *</label>
                                            <div id="country-container">
                                                {!! createDropDownBootstrap( "country", "", $country_arr, "", 1, "-- Select --", 20, "loadDropDown('" . route('loadDivision') . "', this.value, 'division-container');", 0, 0 ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Division *</label>
                                            <div id="division-container">
                                                @php $division = isset($division) ? $division : ""; @endphp
                                                {!! createDropDownBootstrap( "division", "", $division_arr, "", 1, "-- Select --", "$division", "loadDropDown('" . route('loadDistrict') . "', this.value, 'district-container');", 0, 0 ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">District *</label>
                                            <div id="district-container">
                                                @php $district = isset($district) ? $district : ""; @endphp
                                                {!! createDropDownBootstrap( "district", "", $district_arr, "", 1, "-- Select --", "$district", "loadDropDown('" . route('loadUpazila') . "', this.value, 'upazila-container');", 0, 0 ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Upazila *</label>
                                            <div id="upazila-container">
                                                @php $upazila = isset($upazila) ? $upazila : ""; @endphp
                                                {!! createDropDownBootstrap( "upazila", "", $upazila_arr, "", 1, "-- Select --", "$upazila", "", 0, 0 ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Postal Code *</label>
                                            <input type="text" name="postcode" class="form-control" placeholder="Postal Code" value="{{ $postcode ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Address *</label>
                                            <textarea class="form-control" rows="1" name="address" placeholder="Address">{{ $address ?? '' }}</textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Profession *</label>
                                            @php $profession = isset($profession) ? $profession : ""; @endphp
                                            {!! createDropDownBootstrap( "profession", "", $professionArray, "", 1, "-- Select --", "$profession", "", 0, 0 ) !!}
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Religion *</label>
                                            <div class="form-group">
                                                @php $religion = isset($religion) ? $religion : ""; @endphp
                                                {!! createDropDownBootstrap( "religion", "", $religionArray, "", 1, "-- Select --", "$religion", "", 0, 0 ) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Mobile *</label>
                                            <input type="text" name="mobile" class="form-control" placeholder="Mobile" value="{{ $mobile ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">E-mail *</label>
                                            <input type="email" name="email" class="form-control" placeholder="E-mail" value="{{ $email ?? '' }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">NID OR DOB Certificate *</label>
                                            <input type="file" name="nid_or_dob" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Document *</label>
                                            <input type="file" name="document" class="form-control">
                                        </div>
                                    </div>

                                    <div class="{{ !in_array(1, $verification_type_arr) ? 'd-none' : '' }}">
                                        <h1 class="fw-bold text-center mb-4">Employee Verification</h1>
                                        <div class="mb-3 text-center">
                                            <p class="fw-bold">NB: Please contact 0174146545 via WhatsApp for verification code and video call verification.</p>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Audio Verification Code *</label>
                                                <input type="text" name="audio_verification_code" class="form-control" placeholder="Audio Verification Code" value="{{ $audio_verification_code ?? '' }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Video Verification Code *</label>
                                                <input type="text" name="video_verification_code" class="form-control" placeholder="Video Verification Code" value="{{ $video_verification_code ?? '' }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 mt-3">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Update Photo</button>
                                            </div>
                                        </div>
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

@endsection
