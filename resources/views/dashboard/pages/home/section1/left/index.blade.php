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
                                        <form action="{{route('homeS1Left.publish')}}" method="post">
                                            @csrf
                                            <button class="btn btn-warning" type="submit">Publish</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="form py-3">
                                    @php
                                      $update_id =   $data?->id;
                                      $route = $update_id ? route('homeS1Left.update',$update_id) : route('homeS1Left.store');
                                      $button_name = $update_id ? 'Update' : 'Submit';
                                      $btn_class = $update_id ? 'btn-info' : 'btn-success';
                                    @endphp
                                    @if (session('error'))
                                        <h4 class="text-danger">Error: {{ session('error') }} ** </h4>
                                    @endif
                                    <form action="{{ $route }}" method="post">
                                        @csrf
                                        @if ($update_id)
                                            @method('put'){{-- FOR UPDATE ONLY --}}
                                        @endif
                                        <input type="hidden" name="section_id" value="1">
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
                                                    <label class="form-label" for="project_name">Description <span class="text-danger">*&nbsp;&nbsp;NB: max 600 characters</span></label>
                                                    <input id="short_description" type="text" class="form-control"
                                                        value="{{ $data->short_description ?? old('short_description') }}" name="short_description"
                                                        placeholder="Enter short description">

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
                                                    <label class="form-label" for="link1">Button 1 link
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
                                                    <label class="form-label" for="link2">Button 2 link
                                                        <span class="text-danger">*</span></label>
                                                    <input id="link2" type="text" class="form-control"
                                                        value="{{ $data->link2 ?? old('link2') }}" name="link2"
                                                        placeholder="Enter link 2" >
                                                    @error('link2')
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
