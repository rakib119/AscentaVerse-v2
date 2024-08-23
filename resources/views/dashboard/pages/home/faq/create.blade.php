@extends('dashboard.layout.dashboard')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <!-- start page title -->
            <div class="page-title-box">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="page-title">
                                <h4>Add Faq</h4>
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item  "><a href="javascript:void(0)">Faq</a>
                                    <li class="breadcrumb-item active">Add Faq</li>
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h2>Add Faq</h2>
                                        <a href="{{ url()->previous() }}" class="btn btn-success">Back</a>
                                    </div>
                                    <div class="form py-3">
                                        <form action="{{ route('faq.store') }}" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="question">Question
                                                            <span class="text-danger">*</span></label>
                                                        <input id="question" type="text" class="form-control"
                                                            value="{{ old('question') }}" name="question"
                                                            placeholder="Enter question" autofocus>
                                                        @error('question')
                                                            <h6 class="text-danger"> {{ $message }}</h6>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" >Answear
                                                            <span class="text-danger">*</span></label>
                                                            <Textarea name="answear" id="answear"
                                                             class="form-control">{{ old('answear') }}</Textarea>
                                                        @error('answear')
                                                            <h6 class="text-danger"> {{ $message }}</h6>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 mt-3">
                                                    <div class="mb-3">
                                                        <button type="submit" class="btn btn-success">Submit </button>
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
    </div>
@endsection
