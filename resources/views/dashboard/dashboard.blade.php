@extends('dashboard.layout.dashboard')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection
@section('javacript')
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"> </script>
    <script>
        $(document).ready( function () {
           $('#usersTable').DataTable();
           $('#messagesTable').DataTable();
        } );
    </script>
@endsection
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
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
                        <div class="row">
                            <div class="col-xl-4 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <p class="font-size-16">Total Users</p>
                                            <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                                <span class="avatar-title rounded-circle bg-soft-primary">
                                                        <i class="mdi mdi-account-multiple-outline text-primary font-size-20"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-22">{{$users->count()}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <p class="font-size-16">Teams Members</p>
                                            <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                                <span class="avatar-title rounded-circle bg-soft-primary">
                                                    <i class="mdi mdi-account-multiple-outline text-primary font-size-20"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-22">{{$teams->count()}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <p class="font-size-16">New Messages</p>
                                            <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                                <span class="avatar-title rounded-circle bg-soft-primary">
                                                <i class="fas fa-envelope text-primary font-size-20"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-22">{{$messages->count()}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- MESSAGES --}}
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">New Messages</h4>
                    <div class="table-responsive">
                        <table id="messagesTable" class="table table-centered table-nowrap mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Is Replied?</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $message)
                                <tr style="background:{{ $message->status==0 ? 'linear-gradient(rgb(88, 88, 88) 0%, rgb(17, 17, 17) 100%)' : '#FFF' }} ;color:{{ $message->status==0 ? '#FFF' : '#495057' }} ;">
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{ Str::substr($message->name, 0, 25) }} {{Str::length($message->name)>25 ? "...":""}} </td>
                                    <td>{{ Str::substr($message->subject, 0, 70) }} {{Str::length($message->subject)>70 ? "...":""}}</td>
                                    <td>
                                        @if ($message->is_replied)
                                            <span class="badge bg-success">Replied</span>
                                        @else
                                            <span class="badge bg-danger">Not Replied</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{{route('contact.show', Crypt::encrypt($message->id))}}">Details</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- USER LIST --}}
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="header-title mb-4">Users</h2>
                        <div class="table-responsive">
                            <table id="usersTable" class="table table-centered table-nowrap mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Verification Code</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $users as $user)
                                    <tr>
                                        <td>{{ $loop->index+1}}</td>
                                        <td>{{ Str::substr($user->name, 0, 40) }}</td>
                                        <td>{{ $user->email}}</td>
                                        <td>{{ $user->mobile}}</td>
                                        <td>{{ $user->verification_code}}</td>
                                        <td>
                                            @if ($user->user_id )
                                                <a class="btn btn-success" href="{{route('user.details',
                                                Crypt::encrypt($user->id))}}">Details</a>
                                            @else
                                                <span class="badge bg-warning">Not Available</span>
                                            @endif
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
@endsection
