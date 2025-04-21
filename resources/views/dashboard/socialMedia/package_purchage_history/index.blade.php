@php
    $payment_for_array = array(0=> '',1=> 'new package',2=> 'Renewal Fees');
@endphp
@extends('dashboard.layout.dashboard')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
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
                                    <table id="myTable" class="table table-centered table-nowrap mb-0" width="710">
                                        <thead class="thead-light">
                                            <tr>
                                                <th width="30">SL</th>
                                                <th width="40">Img</th>
                                                <th width="40">Purchase For</th>
                                                <th width="40">Purchase By</th>
                                                <th width="40">Pkg Name</th>
                                                <th width="40">Sub Pkg Name</th>
                                                <th width="40">Pkg Value</th>
                                                <th width="40">Dist. %</th>
                                                <th width="40">Payment</th>
                                                <th width="40">Bank Name</th>
                                                <th width="40">Branch</th>
                                                <th width="40">Acc. Holder</th>
                                                <th width="40">Acc. No</th>
                                                <th width="40">Trnx Id	</th>
                                                <th width="40">Com. Acc</th>
                                                <th width="40">Payment Status</th>
                                                <th width="40">Remarks</th>
                                                <th width="40">Action</th>
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
                                                        <img width="30" src="{{$img_link}}" alt="not found">
                                                    </a>
                                                </td>
                                                <td>{{ $payment_for_array[$v->payment_for] }}</td>
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
                                                <td>{{ $v->remarks }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary has-arrow dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> Action <i class="fas fa-angle-down"></i> </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('success-form').submit();">Success</a></li>
                                                                <li><a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('cancel-form').submit();">Reject</a></li>
                                                                <li><a class="dropdown-item" href="javascript:{}" onclick="document.getElementById('pending-form').submit();">Pending</a></li>

                                                                <form id="success-form" action="{{route('packagePurchage.status-update',$v->id)}}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="status" value="1">
                                                                </form>

                                                                <form id="cancel-form" action="{{route('packagePurchage.status-update',$v->id)}}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="status" value="2">
                                                                </form>

                                                                <form id="pending-form" action="{{route('packagePurchage.status-update',$v->id)}}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="status" value="0">
                                                                </form>
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
</div>
@endsection

@section('javacript')
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"> </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
