
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Content</a></li>
                                <li class="breadcrumb-item active">Content List</li>
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
                                        <h2 class=" mb-4">Page List</h2>
                                    </div>
                                    <div class="float-end d-none d-sm-block">
                                        {{-- <a href="{{route('content.create')}}" class="btn btn-success">Create Page</a> --}}
                                    </div>
                                </div>
                                <table id="myTable" class="table table-centered table-nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>SL</th>
                                            <th>Page Name</th>
                                            <th>Content</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $contents as $v)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $page_array[$v->content_id]  }}</td>
                                            <td>{{ Str::substr($v->content, 0, 50)."..." }}</td>
                                            <td >
                                                <a href="{{route('content.edit',$v->id)}}" class="btn btn-warning">Edit</a>
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

