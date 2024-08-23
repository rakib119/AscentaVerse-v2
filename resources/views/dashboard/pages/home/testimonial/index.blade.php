
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
                           <li class="breadcrumb-item active">Testimonial Management</li>
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
                                        <h2 class=" mb-4">Section Left Data</h2>
                                    </div>
                                    <div class="float-end d-none d-sm-block">
                                        <form action="{{route('testimonial.publish')}}" method="post">
                                            @csrf
                                            <button class="btn btn-warning" type="submit">Publish</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="form py-3">
                                    @php
                                      $update_id =   $data?->id;
                                      $route = $update_id ? route('testimonial.title_update',$update_id) : route('testimonial.title_store');
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
                                        <input type="hidden" name="section_id" value="6">
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
                                                    <label class="form-label" for="short_description">Short Description
                                                        <span class="text-danger">*&nbsp;&nbsp;NB: max 350 characters</span></label>
                                                    <textarea  id="short_description" type="text" class="form-control" name="short_description" placeholder="Enter short_description" cols="30" rows="2">{{ $data->short_description ?? old('short_description') }}</textarea>

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

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card py-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h2 class="text-primary mb-4">Testimonial Entry</h2>
                                    </div>
                                </div>
                                <div >

                                    @if (session('error'))
                                        <h4 class="text-danger">Error: {{ session('error') }} ** </h4>
                                    @endif
                                    <form action="{{ route('testimonial.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="section_id" value="10">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="name"> Name <span class="text-danger">*</span></label>
                                                    <input id="name" type="text" class="form-control" value="{{ old('name')  }}" name="name" placeholder="Ex: Mr. XXXXXX" autofocus>
                                                    @error('name')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="designation">Designation <span class="text-danger">*</span></label>
                                                    <input id="designation" type="text" class="form-control" value="{{ old('designation') }}" name="designation" placeholder="Ex: MD, X Group" >
                                                    @error('designation')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="rating">Rating <span class="text-danger">*</span></label>
                                                    <input id="rating" type="number" min="1" max="5" class="form-control" value="{{ old('rating')??5 }}" name="rating" >
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
                                                        <img id="imgOutput" height="80">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="comment">Comment <span class="text-danger">*&nbsp;&nbsp;NB: max 700 characters</span></label>

                                                    <textarea  id="comment" type="text" class="form-control" name="comment" placeholder="Enter comment" cols="30" rows="2">{{old('comment')}}</textarea>
                                                    @error('comment')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 mt-3">
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-primary">Save </button>
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
                                        <h2 class=" mb-4">Testimonial List</h2>
                                    </div>
                                </div>
                                <table id="myTable" class="table table-centered table-nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>SL</th>
                                            <th>Name </th>
                                            <th>Designation</th>
                                            <th>Rating </th>
                                            <th>Comment </th>
                                            <th>Photo </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $testimonials as $v)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $v->name }}</td>
                                            <td>{{ $v->designation }}</td>
                                            <td>
                                                <div style="color:#ffcc00; letter-spacing: 1px;">
                                                    @for ($i=0;$i<$v->rating;$i++)
                                                        {!! "<span class='fa fa-star'></span>" !!}
                                                    @endfor
                                                </div>

                                            </td>
                                            <td> {{ Str::substr($v->comment, 0, 40)."..." }} </td>
                                            <td>
                                                <img width="50" src="{{asset('assets/images/testimonials/'.$v->photo)}}" alt="{{$v->photo}}"> </td>
                                            <td >
                                                <!-- Example single danger button -->
                                                <div class="btn-group">
                                                <button type="button" class="btn btn-primary has-arrow dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                   Action <i class="fas fa-angle-down"></i>
                                                </button>
                                                    @php
                                                        $update_id = Crypt::encrypt($v->id);
                                                    @endphp
                                                    <ul class="dropdown-menu">
                                                       <li><a class="dropdown-item" href="{{route('testimonial.edit',$update_id)}}">Edit</a>
                                                       <li>
                                                            <form id="deleteData{{$update_id}}" action="{{ route('testimonial.destroy', $update_id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <a style="cursor: pointer;"  class="dropdown-item" onclick="deleteData({{$update_id}})">Delete</a>
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

