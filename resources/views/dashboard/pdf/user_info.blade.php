@php

    extract($userinfoArray); //Array to variable
    $verification_type_arr  = explode(',',$verification_type);
    $religionArray      = session('religionArray');
    $professionArray    = session('professionArray');
    $country_arr        = session('country_arr');
    $division_arr       = session('division_arr');
    $district_arr       = session('district_arr');
    $upazila_arr        = session('upazila_arr');
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $full_name ?? '' }} Pdf</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .card {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 8px;
            margin: 20px 0;
        }

        .card-body {
            padding: 20px;
        }

        h5, h3 {
            font-weight: 700;
            color: #333;
        }

        label {
            color: #495057;
            font-weight: 600;
        }

        input, textarea, select {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 10px;
            width: 100%;
            background-color: #fff;
            box-shadow: none;
        }

        input[readonly], textarea[readonly] {
            background-color: #e9ecef;
            cursor: not-allowed;
        }

        textarea {
            resize: none;
        }

        .form-check-input {
            margin-right: 10px;
        }

        .form-check-label {
            color: #495057;
        }
        .row {
            margin-bottom: 15px;
            display: flex;
        }

        h3 {
            margin-bottom: 20px;
        }

        h5 {
            font-size: 16px;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            color: #fff;
            background-color: #007bff;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .d-flex {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .d-none {
            display: none;
        }

        .text-center {
            text-align: center;
        }

        .my-4 {
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
        }
        #country-container, #division-container, #district-container, #upazila-container {
            width: 100%;
        }

        .mb-3 {
            margin-bottom: 15px;
        }

        .g-3 {
            gap: 15px;
        }

    </style>

</head>

<body>
    <div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Step 1 -->
                        <div class="row p-4">
                            <div class="col-md-6 d-flex align-items-center">
                                <h5 class="fw-bold mb-2 me-3">Verification Type: </h5>
                                <div class="form-check me-3">
                                    <input readonly class="form-check-input" value="1" type="checkbox"
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
                        <!-- Step 2 -->
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Full Name *</label>
                                <input type="text" name="full_name" class="form-control" id="full_name" value="{{ $full_name ?? '' }}" placeholder="Full Name" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">First Name *</label>
                                <input type="text" name="first_name" class="form-control"  value="{{ $first_name ?? '' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Middle Name *</label>
                                <input type="text" class="form-control" value="{{ $middle_name ?? '' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Last Name *</label>
                                <input type="text"  class="form-control" value="{{ $last_name ?? '' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Gender *</label>
                                <div class="d-flex">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" value="1" {{ isset($gender) && $gender == 1 ? 'checked' : '' }} readonly>
                                        <label class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check px-5">
                                        <input class="form-check-input" type="radio" value="2" {{ isset($gender) && $gender == 2 ? 'checked' : '' }} readonly>
                                        <label class="form-check-label">Female</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="3" {{ isset($gender) && $gender == 3 ? 'checked' : '' }} readonly>
                                        <label class="form-check-label">Other</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Country *</label>
                                <div id="country-container">
                                    {!! createDropDownBootstrap( "country", "", $country_arr, "", 1, "-- Select --", 20, "", 1, 0 ) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Division *</label>
                                <div id="division-container">
                                    @php $division = isset($division) ? $division : ""; @endphp
                                    {!! createDropDownBootstrap( "division", "", $division_arr, "", 1, "-- Select --", "$division", "", 1, 0 ) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">District *</label>
                                <div id="district-container">
                                    @php $district = isset($district) ? $district : ""; @endphp
                                    {!! createDropDownBootstrap( "district", "", $district_arr, "", 1, "-- Select --", "$district", "", 1, 0 ) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Upazila *</label>
                                <div id="upazila-container">
                                    @php $upazila = isset($upazila) ? $upazila : ""; @endphp
                                    {!! createDropDownBootstrap( "upazila", "", $upazila_arr, "", 1, "-- Select --", "$upazila", "", 1, 0 ) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Postal Code *</label>
                                <input type="text" class="form-control" value="{{ $postcode ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Address *</label>
                                <textarea class="form-control" rows="1">{{ $address ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Profession *</label>
                                @php $profession = isset($profession) ? $profession : ""; @endphp
                                {!! createDropDownBootstrap( "profession", "", $professionArray, "", 1, "-- Select --", "$profession", "", 1, 0 ) !!}
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Religion *</label>
                                <div class="form-group">
                                    @php $religion = isset($religion) ? $religion : ""; @endphp
                                    {!! createDropDownBootstrap( "religion", "", $religionArray, "", 1, "-- Select --", "$religion", "", 1, 0 ) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Mobile *</label>
                                <input type="text" class="form-control" value="{{ $mobile ?? '' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">E-mail *</label>
                                <input type="email" class="form-control" value="{{ $email ?? '' }}" readonly>
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
                            <h3 class="fw-bold text-center my-4">Employee Verification</h3>
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
                            <!-- Step 3 -->
                        <div class="row">
                            <h3 class="fw-bold text-center my-4">Guardian Information (Father)</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Full Name *</label>
                                <input type="text" name="full_name" class="form-control" id="full_name" value="{{ $father_full_name ?? '' }}" placeholder="Full Name" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">First Name *</label>
                                <input type="text" name="first_name" class="form-control"  value="{{ $father_first_name ?? '' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Middle Name *</label>
                                <input type="text" class="form-control" value="{{ $father_middle_name ?? '' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Last Name *</label>
                                <input type="text"  class="form-control" value="{{ $father_last_name ?? '' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Profession *</label>
                                @php $profession = isset($profession) ? $profession : ""; @endphp
                                {!! createDropDownBootstrap( "profession", "", $professionArray, "", 1, "-- Select --", "$father_profession", "", 1, 0 ) !!}
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Religion *</label>
                                <div class="form-group">
                                    @php $religion = isset($religion) ? $religion : ""; @endphp
                                    {!! createDropDownBootstrap( "religion", "", $religionArray, "", 1, "-- Select --", "$father_religion", "", 1, 0 ) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Mobile *</label>
                                <input type="text" class="form-control" value="{{ $father_mobile ?? '' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">E-mail *</label>
                                <input type="email" class="form-control" value="{{ $father_email ?? '' }}" readonly>
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
                        <div class="row">
                            <h3 class="fw-bold text-center my-4">Guardian Information (Mother)</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Full Name *</label>
                                <input type="text" name="full_name" class="form-control" id="full_name" value="{{ $mother_full_name ?? '' }}" placeholder="Full Name" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">First Name *</label>
                                <input type="text" name="first_name" class="form-control"  value="{{ $mother_first_name ?? '' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Middle Name *</label>
                                <input type="text" class="form-control" value="{{ $mother_middle_name ?? '' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Last Name *</label>
                                <input type="text"  class="form-control" value="{{ $mother_last_name ?? '' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Profession *</label>
                                @php $profession = isset($profession) ? $profession : ""; @endphp
                                {!! createDropDownBootstrap( "profession", "", $professionArray, "", 1, "-- Select --", "$mother_profession", "", 1, 0 ) !!}
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Religion *</label>
                                <div class="form-group">
                                    @php $religion = isset($religion) ? $religion : ""; @endphp
                                    {!! createDropDownBootstrap( "religion", "", $religionArray, "", 1, "-- Select --", "$mother_religion", "", 1, 0 ) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Mobile *</label>
                                <input type="text" class="form-control" value="{{ $mother_mobile ?? '' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">E-mail *</label>
                                <input type="email" class="form-control" value="{{ $mother_email ?? '' }}" readonly>
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
                        <div class="row">
                            <h3 class="fw-bold text-center my-4">Emergency Contact Person</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Full Name *</label>
                                <input type="text" name="full_name" class="form-control" id="full_name" value="{{ $emergency_full_name ?? '' }}" placeholder="Full Name" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">First Name *</label>
                                <input type="text" name="first_name" class="form-control"  value="{{ $emergency_first_name ?? '' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Middle Name *</label>
                                <input type="text" class="form-control" value="{{ $emergency_middle_name ?? '' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Last Name *</label>
                                <input type="text"  class="form-control" value="{{ $emergency_last_name ?? '' }}" readonly>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Relation *</label>
                                <input type="text"  class="form-control" value="{{ $emergency_relation ?? '' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Profession *</label>
                                @php $profession = isset($profession) ? $profession : ""; @endphp
                                {!! createDropDownBootstrap( "profession", "", $professionArray, "", 1, "-- Select --", "$emergency_profession", "", 1, 0 ) !!}
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Religion *</label>
                                <div class="form-group">
                                    @php $religion = isset($religion) ? $religion : ""; @endphp
                                    {!! createDropDownBootstrap( "religion", "", $religionArray, "", 1, "-- Select --", "$emergency_religion", "", 1, 0 ) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Mobile *</label>
                                <input type="text" class="form-control" value="{{ $emergency_mobile ?? '' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">E-mail *</label>
                                <input type="email" class="form-control" value="{{ $emergency_email ?? '' }}" readonly>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
