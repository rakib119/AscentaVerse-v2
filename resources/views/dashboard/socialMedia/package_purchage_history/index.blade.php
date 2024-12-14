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
                         <h4>Purchase History</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Purchase List</a></li>
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
                                <h2 class="header-title mb-4">Purchase List</h2>
                                <div class="table-responsive">
                                    <table id="usersTable" class="table table-centered table-nowrap mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>SL</th>
                                                <th>Img</th>
                                                <th>Purchase By</th>
                                                <th>Pkg Name</th>
                                                <th>Sub Pkg Name</th>
                                                <th>Pkg Value</th>
                                                <th>Dist. %</th>
                                                <th>Payment</th>
                                                <th>Bank Name</th>
                                                <th>Branch</th>
                                                <th>Acc. Holder</th>
                                                <th>Acc. No</th>
                                                <th>Trnx Id	</th>
                                                <th>Com. Acc</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ( $history as $v)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @php
                                                        $img_link = asset('social-media/assets/images/package_purchase_img/'.$v->image);
                                                        $payment_status_array = array(0=>'pending',1=>'Confirmed',2=>'Reject');
                                                        $badge_color_array = array(0=>'info',1=>'success',2=>'danger');
                                                    @endphp
                                                    <a target="_blank" href="{{$img_link}}">
                                                        <img height="30" src="{{$img_link}}" alt="not found">
                                                    </a>
                                                </td>
                                                <td>{{ $v->purchase_by}}</td>
                                                <td>{{ $v->package_name	}}</td>
                                                <td>{{ $v->sub_package_name	}}</td>
                                                <td>{{ $v->package_value }}</td>
                                                <td>{{ $v->discount_per }}%</td>
                                                <td>{{ $v->payment_amount }}</td>
                                                <td>{{ $v->bank_name }}</td>
                                                <td>{{ $v->branch }}</td>
                                                <td>{{ $v->account_holder }}</td>
                                                <td>{{ $v->account_no }}</td>
                                                <td>{{ $v->transaction_id }}</td>
                                                <td>{{ $v->company_account_no }}</td>
                                                <td> <span class="badge bg-{{$badge_color_array[$v->payment_status]}}"> {{$payment_status_array[$v->payment_status]}} </span></td>
                                                <td>
                                                    <a class="btn btn-success" href="">Accept</a>
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
