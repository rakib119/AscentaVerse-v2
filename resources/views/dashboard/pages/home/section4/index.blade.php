
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
                           <li class="breadcrumb-item active">Right Section(4)</li>
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
                                        <form action="{{route('homeS4.publish')}}" method="post">
                                            @csrf
                                            <button class="btn btn-warning" type="submit">Publish</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="form py-3">
                                    @php
                                      $update_id =   $data?->id;
                                      $route = $update_id ? route('homeS4.title_update',$update_id) : route('homeS4.title_store');
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
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="btn1">Button
                                                        <span class="text-danger">*</span></label>
                                                    <input id="btn1" type="text" class="form-control"
                                                        value="{{ $data->btn1 ?? old('btn1') }}" name="btn1"
                                                        placeholder="Enter button 1">
                                                    @error('btn1')
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
                                        <h2 class="text-primary mb-4">Service Entry</h2>
                                    </div>
                                </div>
                                <div >

                                    @if (session('error'))
                                        <h4 class="text-danger">Error: {{ session('error') }} ** </h4>
                                    @endif
                                    <form action="{{ route('homeS4.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="section_id" value="6">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="title"> Title <span class="text-danger">*</span></label>
                                                    <input id="title" type="text" class="form-control" value="{{ old('title')  }}" name="title" placeholder="Enter title" autofocus>
                                                    @error('title')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="thumbnail"> Thumbnail <span class="text-danger">*(w=220px, h:220px)</span> </label>
                                                    <input id="thumbnail" type="file" class="form-control" name="thumbnail" onchange="cropImage(this,'thumbnail_hidden',220,220,'imgOutput')">
                                                    <input id="thumbnail_hidden" type="hidden"  class="form-control" name="thumbnail_hidden">

                                                    @error('thumbnail')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="mb-3">
                                                        <img id="imgOutput" height="80">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="button_name">Button Name <span class="text-danger">*</span></label>
                                                    <input id="button_name" type="text" class="form-control" value="{{ old('button_name') }}" name="button_name" placeholder="Enter button name" >
                                                    @error('button_name')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="icon">Icon <span class="text-danger">*</span></label>
                                                    <input id="icon" type="text" class="form-control" value="{{ old('icon') }}" name="icon" >
                                                    @error('icon')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="short_description">Short Description <span class="text-danger">*&nbsp;&nbsp;NB: max 350 characters</span></label>

                                                    <textarea  id="short_description" type="text" class="form-control" name="short_description" placeholder="Enter short_description" cols="30" rows="2">{{old('short_description')}}</textarea>
                                                    @error('short_description')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="is_displayed_in_home">Is displayed in home page?</label>
                                                    <input type="checkbox" name="is_displayed_in_home" id="is_displayed_in_home" {{old('is_displayed_in_home')==1 ? 'checked' : '1' }}>
                                                    @error('is_displayed_in_home')
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
                                        <h2 class=" mb-4">Service List</h2>
                                    </div>
                                    <div>
                                        <h4 class=" text-danger mb-4">NB: Only Four data displayed in home page.</h4>
                                    </div>
                                </div>
                                <table id="myTable" class="table table-centered table-nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>SL</th>
                                            <th>Title </th>
                                            <th>Short Desc. </th>
                                            <th>Button Name. </th>
                                            <th>Displayed </th>
                                            <th>Img. </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $services as $v)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{ Str::substr($v->title, 0, 50)."..."}}</td>
                                            <td>{{ Str::substr($v->short_description, 0, 50)."..." }}</td>
                                            <td>{{ $v->button_name }}</td>
                                            <td> <span class="badge bg-{{ $v->is_displayed_in_home==1 ? 'primary' : 'warning' }}">{{ $v->is_displayed_in_home==1 ? 'Home' : 'Service' }}</span> </td>
                                            <td>
                                                <img width="50" src="{{asset('assets/images/services/'.$v->thumbnail)}}" alt="{{$v->thumbnail}}"> </td>
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
                                                       <li><a class="dropdown-item" href="{{route('homeS4.edit',$update_id)}}">Edit</a>
                                                        <li><a class="dropdown-item" href="{{route('homeS4.details.edit',$update_id)}}">Details</a>
                                                       <li>
                                                            <form id="deleteData{{$v->id}}" action="{{ route('homeS4.destroy', $update_id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <a style="cursor: pointer;"  class="dropdown-item" onclick="deleteData({{$v->id}})">Delete</a>
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


