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
                            <li class="breadcrumb-item active">Left Section(1)</li>
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
                                        <h2 class=" mb-4">Data</h2>
                                    </div>
                                    <div class="float-end d-none d-sm-block">
                                        <form action="{{route('homeS2.publish')}}" method="post">
                                            @csrf
                                            <button class="btn btn-warning" type="submit">Publish</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="form py-3">
                                    @php
                                      $update_id =   $data?->id;
                                      $route = $update_id ? route('homeS2.update',$update_id) : route('homeS2.store');
                                      $button_name  = $update_id ? 'Update' : 'Submit';
                                      $btn_class    = $update_id ? 'btn-info' : 'btn-success';
                                    @endphp
                                    @if (session('codeError'))
                                        <h4 class="text-danger">Error: {{ session('codeError') }} ** </h4>
                                    @endif
                                    <form action="{{ $route }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if ($update_id)
                                            @method('put'){{-- FOR UPDATE ONLY --}}
                                        @endif
                                        <input type="hidden" name="section_id" value="3"> {{-- Section Id 3--}}
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="lebel"> Lebel
                                                        <span class="text-danger">*</span></label>
                                                    <input id="lebel" type="text" class="form-control"
                                                        value="{{ $data->lebel ?? old('lebel')  }}" name="lebel"
                                                        placeholder="Enter lebel" autofocus>
                                                    @error('lebel')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="title">Title
                                                        <span class="text-danger">*</span></label>
                                                    <input id="title" type="text" class="form-control"
                                                        value="{{ $data->title ?? old('title') }}" name="title"
                                                        placeholder="Enter title" >
                                                    @error('title')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="short_description">Short Description <span class="text-danger">*&nbsp;&nbsp;NB: max 600 characters</span></label>
                                                    <input id="short_description" type="text" class="form-control"
                                                        value="{{ $data->short_description ?? old('short_description') }}" name="short_description"
                                                        placeholder="Enter short_description">

                                                    @error('short_description')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="btn1">Button 1
                                                        <span class="text-danger">*</span></label>
                                                    <input id="btn1" type="text" class="form-control"
                                                        value="{{ $data->btn1 ?? old('btn1') }}" name="btn1"
                                                        placeholder="Enter button 1">
                                                    @error('btn1')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="btn1">Button 2
                                                        <span class="text-danger">*</span></label>
                                                    <input id="btn2" type="text" class="form-control"
                                                        value="{{ $data->btn2 ?? old('btn2') }}" name="btn2"
                                                        placeholder="Enter button 2">
                                                    @error('btn2')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="btn1">Button 3
                                                        <span class="text-danger">*</span></label>
                                                    <input id="btn3" type="text" class="form-control"
                                                        value="{{ $data->btn3 ?? old('btn3') }}" name="btn3"
                                                        placeholder="Enter button 2">
                                                    @error('btn3')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="link1">Video 1 Caption
                                                        <span class="text-danger">*</span></label>
                                                    <input id="link1" type="text" class="form-control"
                                                        value="{{ $data->link1 ?? old('link1') }}" name="link1"
                                                        placeholder="Enter link 1" >
                                                    @error('link1')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="link2">Video 1 link
                                                        <span class="text-danger">*</span></label>
                                                    <input id="link2" type="text" class="form-control"
                                                        value="{{ $data->link2 ?? old('link2') }}" name="link2"
                                                        placeholder="Enter link 1" >
                                                    @error('link2')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="img1">Photo
                                                        <span class="text-danger">*&nbsp;&nbsp;(w=330px, h:415px)</span></label>
                                                    <input id="img1" type="file" class="form-control"
                                                        value="{{ $data->img1 ?? old('img1') }}" name="img1"
                                                        placeholder="Enter link 1" onchange="loadFile(event,'imgOutput')" accept=".jpg,.jpeg,.png">
                                                    @error('img1')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="img2">Photo Caption
                                                        <span class="text-danger">*</span></label>
                                                    <input id="img2" type="text" class="form-control"
                                                        value="{{ $data->img2 ?? old('img2') }}" name="img2"
                                                        placeholder="Enter link 1" >
                                                    @error('img2')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <img id="imgOutput" height="80" src="{{asset('assets/images/about/'.$data->img1)}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="description1">Description 1 <span class="text-danger">*&nbsp;&nbsp;NB: max 6000 characters</span></label>
                                                    <input  id="description1" type="text" class="form-control" value="{{ $data->description1 ?? old('description1') }}"  name="description1" placeholder="Enter Description For Button 1">

                                                    @error('description1')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="description2">Description 2 <span class="text-danger">*&nbsp;&nbsp;NB: max 6000 characters</span></label>

                                                    <input  id="description2" type="text" class="form-control" value="{{ $data->description2 ?? old('description2') }}"  name="description2" placeholder="Enter Description For Button 2">

                                                    @error('description2')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="description3">Description 3 <span class="text-danger">*&nbsp;&nbsp;NB: max 6000 characters</span></label>
                                                    <input  id="description3" type="text" class="form-control" value="{{ $data->description3 ?? old('description3') }}"  name="description3" placeholder="Enter Description For Button 3">
                                                    @error('description3')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 mt-3">
                                                <div class="mb-3">
                                                    <button type="submit" class="btn {{$btn_class}}">{{$button_name}} </button>
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
