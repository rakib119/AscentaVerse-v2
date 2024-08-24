@extends('dashboard.layout.dashboard')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
{{-- Javascript --}}
@section('javacript')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function()
        {
            $('#content').summernote();
        });
    </script>
@endsection
@section('content')
    <div class="main-content">
        <div class="page-content">
            <!-- start page title -->
            <div class="page-title-box">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="page-title">
                                <h4>Edit Pages</h4>
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item "><a href="javascript:void(0)">Page</a>
                                    <li class="breadcrumb-item "><a href="{{ route('content.index') }}">Page List</a> </li>
                                    <li class="breadcrumb-item active">Edit Page</li>
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
                                        <h2>Update Page</h2>
                                        <a href="{{ url()->previous() }}" class="btn btn-success">Back</a>
                                    </div>
                                    <div class="form py-3">
                                        <form action="{{ route('content.update',$DynamicContent->id)  }}" enctype="multipart/form-data" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="content_id">Page For
                                                            <span class="text-danger">*</span></label>
                                                            <select  name="content_id" id="content_id" type="text" class="form-select" >
                                                                <option value="">--Select Page--</option>
                                                                @foreach ($page_array as $id => $page_name)
                                                                    <option {{ $id== $DynamicContent->content_id ? 'selected' : '' }} value="{{$id}}"> {{$page_name}} </option>
                                                                @endforeach
                                                            </select>
                                                        @error('content_id')
                                                            <h6 class="text-danger"> {{ $message }}</h6>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" >Content
                                                            <span class="text-danger">*</span></label>
                                                            <Textarea name="content" id="content"
                                                             class="form-control">{{ $DynamicContent->content }}</Textarea>
                                                        @error('content')
                                                            <h6 class="text-danger"> {{ $message }}</h6>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 mt-3">
                                                    <div class="mb-3">
                                                        <button type="submit" class="btn btn-success">Update </button>
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
