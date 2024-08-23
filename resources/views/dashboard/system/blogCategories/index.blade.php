
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Blog Category</a></li>
                                <li class="breadcrumb-item active">Blog Category List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
         </div>
         <div class="container-fluid">
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h2>Blog Category Entry</h2>
                                </div>
                                <div class="form py-3">
                                    <form action="{{ route('blog-category.store')  }}"  method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="name">Category Name
                                                        <span class="text-danger">*</span></label>
                                                    <input id="name" type="text" class="form-control"
                                                        value="{{ old('name')  }}" name="name"
                                                        placeholder="Enter Category name" autofocus>
                                                    @error('name')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 mt-3">
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-success">Save </button>
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
                                        <h2 class=" mb-4">Blog Category List</h2>
                                    </div>
                                </div>
                                <table id="myTable" class="table table-centered table-nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>SL</th>
                                            <th>Category Name </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $categories as $v)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{  $v->name }}</td>
                                            <td >
                                                <a href="{{route('blog-category.edit',Crypt::encrypt($v->id))}}" class="btn btn-primary">Edit</a>
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

