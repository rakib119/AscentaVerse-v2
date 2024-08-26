@extends('dashboard.layout.dashboard')
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home Management</a></li>
                            <li class="breadcrumb-item active">Testimonial Edit</li>
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
                                        <h2 class=" mb-4">Update Testimonial</h2>
                                    </div>
                                    <div>
                                        <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                                    </div>
                                </div>
                                <div class="form py-3">
                                    @if (session('error'))
                                        <h4 class="text-danger">Error: {{ session('error') }} ** </h4>
                                    @endif
                                    <form action="{{ route('testimonial.update',$testimonial->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="section_id" value="10">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="name"> Name <span class="text-danger">*</span></label>
                                                    <input id="name" type="text" class="form-control" value="{{ $testimonial->name   }}" name="name" placeholder="Ex: Mr. XXXXXX" autofocus>
                                                    @error('name')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="designation">Designation <span class="text-danger">*</span></label>
                                                    <input id="designation" type="text" class="form-control" value="{{ $testimonial->designation  }}" name="designation" placeholder="Ex: MD, X Group" >
                                                    @error('designation')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="rating">Rating <span class="text-danger">*</span></label>
                                                    <input id="rating" type="number" min="1" max="5" class="form-control" value="{{ $testimonial->rating  }}" name="rating" >
                                                    @error('rating')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="photo"> Photo <span class="text-danger">*(w=119px, h:119px)</span> </label>
                                                    <input id="photo" type="file"  class="form-control" name="photo" onchange="loadFile(event,'imgOutput')">
                                                    @error('photo')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="mb-3">
                                                        <img id="imgOutput" src="{{asset('assets/images/testimonials/'.$testimonial->photo)}}" height="80">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="comment">Comment <span class="text-danger">*&nbsp;&nbsp;NB: max 700 characters</span></label>

                                                    <textarea  id="comment" type="text" class="form-control" name="comment" placeholder="Enter comment" cols="30" rows="2">{{$testimonial->comment }}</textarea>
                                                    @error('comment')
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
