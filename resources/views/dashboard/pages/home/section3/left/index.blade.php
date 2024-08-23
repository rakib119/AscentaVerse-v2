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
                            <li class="breadcrumb-item active">Right Section(1)</li>
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
                                        <h2 class=" mb-4">Partner Logo</h2>
                                    </div>
                                    <div class="float-end d-none d-sm-block">
                                        <form action="{{route('homeS3Left.publish')}}" method="post">
                                            @csrf
                                            <button class="btn btn-warning" type="submit">Publish</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="form py-3">
                                    @if (session('error'))
                                        <h4 class="text-danger">Error: {{ session('error') }} ** </h4>
                                    @endif
                                    <form action="{{ route('homeS3Left.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="section_id" value="5">{{-- Section Id 2 --}}
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="image_name"> Image
                                                        <span class="text-danger">* (w=140px, h:40px)</span></label>
                                                    <input id="image_name" type="file"  class="form-control"
                                                        value="{{ old('image_name')  }}" name="image_name"
                                                        placeholder="Enter Image"  accept="jpg,jpeg" autofocus>
                                                    @error('image_name')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 mt-3">
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-success">Upload </button>
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

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h2 class=" mb-4">Partner Logo List</h2>
                                    </div>
                                </div>
                                <table id="myTable" class="table table-centered table-nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>SL</th>
                                            <th>Logo </th>
                                            <th>Active Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($photos as $v)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td> <img src="{{asset('assets/images/partners/'.$v->image_name)}}" width="144" alt=""></td>
                                                <td> <span class="badge bg-{{ $v->status_active==1 ? 'info' : 'danger' }}">{{ $v->status_active==1 ? 'Active' : 'Inactive' }}</span></td>
                                                <td >
                                                    <!-- Example single danger button -->
                                                    <div class="btn-group">
                                                    <button type="button" class="btn btn-primary has-arrow dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action <i class="fas fa-angle-down"></i>
                                                    </button>
                                                        <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="{{route('homeS3Left.edit',$v->id)}}">Edit</a>
                                                        <li>
                                                                <form id="deleteData{{$v->id}}" action="{{ route('homeS3Left.destroy', $v->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <a style="cursor: pointer;"  class="dropdown-item" onclick="deleteData({{ $v->id }})">Delete</a>
                                                                </form>
                                                        </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
