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
                            <li class="breadcrumb-item active">Right Section(3) Partners</li>
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
                                        <form action="{{route('homeS3Right.publish')}}" method="post">
                                            @csrf
                                            <button class="btn btn-warning" type="submit">Publish</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="form py-3">
                                    @php
                                      $update_id =   $data?->id;
                                      $route = $update_id ? route('homeS3Right.update',$update_id) : route('homeS3Right.store');
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
                                        <input type="hidden" name="section_id" value="3">
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
