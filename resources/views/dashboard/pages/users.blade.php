@extends('dashboard.layout.dashboard')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection
@section('javacript')
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"> </script>
    <script>
        $(document).ready( function () {
           $('#usersTable').DataTable();
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
                         <h4>Users</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">User List</a></li>
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
                                <h2 class="header-title mb-4">Users</h2>
                                <div class="table-responsive">
                                    <table id="usersTable" class="table table-centered table-nowrap mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ( $users->where('is_admin','!=','1') as $user)
                                            <tr>
                                                <td>{{ $loop->index+1}}</td>
                                                <td>{{ $user->name}}</td>
                                                <td>{{ $user->email}}</td>
                                                <td>{{ $user->phone}}</td>
                                                <td>
                                                    @if ($user->personalInfo && $user->fatherInfo && $user->motherInfo)
                                                        <a class="btn btn-success" href="{{route('user_details',$user->id)}}">Details</a>
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
    </div>
</div>
@endsection
