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
                            <li class="breadcrumb-item active">Team Edit</li>
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
                                        <h2 class=" mb-4">Update Team</h2>
                                    </div>
                                    <div>
                                        <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                                    </div>
                                </div>
                                <div class="form py-3">
                                    @if (session('error'))
                                        <h4 class="text-danger">Error: {{ session('error') }} ** </h4>
                                    @endif
                                    <form action="{{ route('team.update',$team->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                            <input type="hidden" name="section_id" value="8">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="name"> Name <span class="text-danger">*</span></label>
                                                    <input id="name" type="text" class="form-control" value="{{ old('name') ?? $team->name  }}" name="name" placeholder="Enter name" autofocus>
                                                    @error('name')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="photo"> Photo <span class="text-danger">*(w=270px, h:374px)</span> </label>
                                                    <input id="photo" type="file"  class="form-control" name="photo" onchange="cropImage(this,'thumbnail',260,260,'imgOutput',270,374)">
                                                    <input type="hidden" id="thumbnail" name="thumbnail">
                                                    @error('photo')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="mb-3">
                                                        <img id="imgOutput" src="{{asset('assets/images/teams/'. $team->photo)}}" height="80">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="designation">Designation <span class="text-danger">*</span></label>
                                                    <input id="designation" type="text" class="form-control" value="{{ old('designation')?? $team->designation }}" name="designation" placeholder="Enter designation" >
                                                    @error('designation')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="button_name">Button Name <span class="text-danger">*</span></label>
                                                    <input id="button_name" type="text" class="form-control" value="{{ old('button_name') ?? $team->button_name }}" name="button_name" placeholder="Enter button name" >
                                                    @error('button_name')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="icon1">Icon 1 <span class="text-danger">*</span></label>
                                                    <select id="icon1" type="text" class="form-control" name="icon1">
                                                        @foreach ($social_icons as $icon)
                                                            <option {{ $team->icon1 == $icon->id ? 'selected':''}} value="{{$icon->id}}">{{$icon->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('icon1')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="link1">Link 1 <span class="text-danger">*</span></label>
                                                    <input id="link1" placeholder="social link 1" type="text" class="form-control" value="{{ old('link1') ?? $team->link1 }}" name="link1" >
                                                    @error('link1')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="icon2">Icon 2 <span class="text-danger">*</span></label>
                                                    <select id="icon2" type="text" class="form-control" name="icon2">
                                                        @foreach ($social_icons as $icon)
                                                            <option {{ $team->icon2 == $icon->id ? 'selected':''}} value="{{$icon->id}}" >{{$icon->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('icon2')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="link2">Link 2 <span class="text-danger">*</span></label>
                                                    <input id="link2" placeholder="social link 2" type="text" class="form-control" value="{{ old('link2') ?? $team->link2 }}" name="link2" >
                                                    @error('link2')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="icon3">Icon 3 <span class="text-danger">*</span></label>
                                                    <select id="icon3" type="text" class="form-control" name="icon3">
                                                        @foreach ($social_icons as $icon)
                                                            <option {{ $team->icon3 == $icon->id ? 'selected':''}} value="{{$icon->id}}" > {{$icon->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('icon3')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="link3">Link 3 <span class="text-danger">*</span></label>
                                                    <input id="link3" placeholder="social link 3" type="text" class="form-control" value="{{ old('link3') ?? $team->link3 }}" name="link3" >
                                                    @error('link3')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="short_description">Short Description <span class="text-danger">*&nbsp;&nbsp;NB: max 500 characters</span></label>

                                                    <textarea  id="short_description" type="text" class="form-control" name="short_description" placeholder="Enter short_description" cols="30" rows="2">{{old('short_description') ?? $team->short_description}}</textarea>
                                                    @error('short_description')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="description">Description <span class="text-danger">*&nbsp;&nbsp;NB: max 3500 characters</span></label>

                                                    <textarea  id="description" type="text" class="form-control" name="description" placeholder="Enter description" cols="30" rows="2">{{old('description') ?? $team->description}}</textarea>
                                                    @error('description')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="details_title">Details Title <span class="text-danger">*</span></label>
                                                    <input id="details_title" type="text" class="form-control" value="{{old('details_title') ?? $team->details_title}}" name="details_title" placeholder="Ex: Information" >
                                                    @error('details_title')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="phone">Phone <span class="text-danger">*</span></label>
                                                    <input id="phone" type="text" class="form-control" value="{{old('phone') ?? $team->phone}}" name="phone" placeholder="+880 1233333333 <br>+880 124444444 " >
                                                    @error('phone')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                                    <input id="email" type="email" class="form-control" value="{{old('email') ?? $team->email}}" name="email" placeholder="email1@gmail.com" >
                                                    @error('email')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="address">Address <span class="text-danger">*</span></label>
                                                    <input id="address" type="text" class="form-control" value="{{ old('address') ?? $team->address }}" name="address" placeholder="Ave 14th Street, us-1212,<br>San Franciso, USA 4200." >
                                                    @error('address')
                                                        <h6 class="text-danger"> {{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="is_displayed_in_home">Is displayed in home page?</label>
                                                    <input type="checkbox" name="is_displayed_in_home" id="is_displayed_in_home" {{$team->is_displayed_in_home ==1 ? 'checked' : '1' }}>
                                                    @error('is_displayed_in_home')
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
