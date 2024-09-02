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
            $('#content1').summernote({
            });
            $('#content2').summernote({
            });
        });
    </script>
@endsection
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="page-title-box">
            <div class="container-fluid">
             <div class="row align-items-center">
                 <div class="col-sm-6">
                     <div class="page-title">
                         <h4>DashBoard</h4>
                         <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">DashBoard</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Blog Management</a></li>
                            <li class="breadcrumb-item active">Blog Details Edit</li>
                        </ol>
                     </div>
                 </div>
             </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h2 class=" mb-4">Update Blog Details</h2>
                                    </div>
                                    <div>
                                        <a href="{{ route('blog.index') }}" class="btn btn-warning">Back</a>
                                    </div>
                                </div>
                                <div class="form py-3">
                                    @if (session('error'))
                                        <h4 class="text-danger">Error: {{ session('error') }} ** </h4>
                                    @endif
                                    <form action="{{ route('blog.details.update') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="blog_id" value="{{$id ?? '' }}">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="photo1"> Photo 1 <span class="text-info">*(w=900px, h:450px)</span> </label>
                                                    <input id="photo1" type="file"  class="form-control" name="photo1" onchange="loadFile(event,'imgOutput')">
                                                    @error('photo1')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="mb-3">
                                                        <img id="imgOutput" src="{{asset('assets/images/blogs/details/'.$details?->photo1)}}" height="80">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="content1">Content 1 <span class="text-info">*&nbsp;&nbsp;NB: max {{number_format(4294967295) }} characters</span></label>

                                                    <textarea  id="content1" type="text" class="form-control" name="content1" placeholder="Enter content1" cols="30" rows="2">{{ old('content1')?? $details?->content1   }}</textarea>
                                                    @error('content1')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="photo2"> Photo 2 <span class="text-info">*(w=390px, h:290px)</span> </label>
                                                    <input id="photo2" type="file"  class="form-control" name="photo2" onchange="loadFile(event,'imgOutput2')">
                                                    <input id="video_link" type="text" value="{{$details?->video_link}}" placeholder="Video link: https://www.youtube.com/watch?v=ekQKl4JyFEQ" class="form-control" name="video_link">
                                                    @error('photo2')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                    @error('video_link')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="mb-3">
                                                        <img id="imgOutput2" src="{{asset('assets/images/blogs/details/'.$details?->photo2)}}" height="80">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="photo3"> Photo 3 <span class="text-info">*(w=390px, h:290px)</span> </label>
                                                    <input id="photo3" type="file"  class="form-control" name="photo3" onchange="loadFile(event,'imgOutput3')">
                                                    @error('photo3')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="mb-3">
                                                        <img id="imgOutput3" src="{{asset('assets/images/blogs/details/'.$details?->photo3)}}" height="80">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="content2">Content 2 <span class="text-info">*&nbsp;&nbsp;NB: max {{number_format(4294967295) }} characters</span></label>

                                                    <textarea  id="content2" type="text" class="form-control" name="content2" placeholder="Enter content2" cols="30" rows="2">{{ old('content2') ?? $details?->content2  }}</textarea>
                                                    @error('content2')
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
