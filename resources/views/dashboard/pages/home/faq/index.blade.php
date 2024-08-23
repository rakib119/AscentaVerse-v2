
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Faq</a></li>
                                <li class="breadcrumb-item active">Faq List</li>
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
                                        <form action="{{route('faq.publish')}}" method="post">
                                            @csrf
                                            <button class="btn btn-warning" type="submit">Publish</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="form py-3">
                                    @php
                                      $update_id =   $data?->id;
                                      $route = $update_id ? route('faq.title_update',$update_id) : route('faq.title_store');
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
                                        <input type="hidden" name="section_id" value="7">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="lebel"> Lebel
                                                        <span class="text-danger">*&nbsp;&nbsp;NB: max 255 characters</span></label>
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
                                                        <span class="text-danger">*&nbsp;&nbsp;NB: max 600 characters</span></label>
                                                    <input id="title" type="text" class="form-control"
                                                        value="{{ $data->title ?? old('title') }}" name="title"
                                                        placeholder="Enter title" >
                                                    @error('title')
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
                                        <h2 class=" mb-4">Faq List</h2>
                                    </div>
                                    <div class="float-end d-none d-sm-block">
                                        <a href="{{route('faq.create')}}" class="btn btn-success">Add Faq</a>
                                    </div>
                                </div>
                                <table id="myTable" class="table table-centered table-nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>SL</th>
                                            <th>Question </th>
                                            <th>Answear </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $faqs as $faq)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{ Str::substr($faq->question, 0, 50)."..."}}</td>
                                            <td>{{ Str::substr($faq->answear, 0, 50)."..." }}</td>
                                            <td >
                                                <!-- Example single danger button -->
                                                <div class="btn-group">
                                                <button type="button" class="btn btn-primary has-arrow dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                   Action <i class="fas fa-angle-down"></i>
                                                </button>
                                                    <ul class="dropdown-menu">
                                                       <li><a class="dropdown-item" href="{{route('faq.edit',$faq->id)}}">Edit</a>
                                                       <li>
                                                            <form id="deleteData{{$faq->id}}" action="{{ route('faq.destroy', $faq->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <a style="cursor: pointer;"  class="dropdown-item" onclick="deleteData({{$faq->id}})">Delete</a>
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

