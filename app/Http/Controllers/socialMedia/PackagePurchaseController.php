<?php

namespace App\Http\Controllers\socialMedia;

use App\Http\Controllers\Controller;
use App\Models\CompanyBankDtls;
use App\Models\PackagePurchaseMst;
use App\Models\SocialPackageBreakDown;
use App\Models\SocialPackageFeatureDtls;
use App\Models\SocialPackageMst;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PackagePurchaseController extends Controller
{
    public function upgrade_to_premium()
    {
        $package = SocialPackageMst::select('id','package_name','short_desc','price','discount_per','discounted_amount','renewable_message')->where('status_active',1)->where('is_deleted',0)->get();
        $package_features = SocialPackageFeatureDtls::select('id','mst_id','feature','short_desc')->where('status_active',1)->where('is_deleted',0)->get();
        return view('socialMedia.pages.upgradeToPremium', compact('package','package_features'));
    }
    public function choose_plane($crypt_id)
    {
        $package_id = decrypt($crypt_id);
        $package = SocialPackageMst::select('id','package_name')->where('id',$package_id)->first();

        $package_break_down = SocialPackageBreakDown::select('id','mst_id','sub_package_name','desc_link','price','discount_per','discounted_amount')->where('status_active',1)->where('is_deleted',0)->where('mst_id',$package_id)->get();
        return view('socialMedia.pages.choose_plane', compact('package_break_down','package'));
    }

    public function load_package_subtotal(Request $request)
    {

        $id = $request->data;
        if ($id)
        {
            $package_break_down = SocialPackageBreakDown::select('id','mst_id','sub_package_name','desc_link','price','discount_per','discounted_amount')->where('status_active',1)->where('is_deleted',0)->where('id',$id)->first();

            // return session()->all();
            $mst_id             = $package_break_down?->mst_id;
            $price              = $package_break_down?->price;
            $discounted_amount  = $package_break_down?->discounted_amount;
            $discount           = $price-$discounted_amount;
            $discount_per       = $package_break_down?->discount_per;
            $desc_link          = $package_break_down?->desc_link;
            $dist_msg           = $discount>0 ? '<span class="uk-text-muted"><del>৳'.$price.'</del></span>' : "";
            $dist_per_msg       = $discount_per>0 ? ' <p class="uk-text-success">Plan discount -'.$discount_per.'% <span class="uk-text-danger">-৳ '.$price.'</span></p>' :  "<p class='uk-text-success'>Plan discount $discount_per%";

            $package_data_array = array(
                'package_id'            => $mst_id,
                'selected_package_id'   => $id,
                'description_link'      => $desc_link,
                'package_value'         => $price,
                'discount_per'          => $discount_per,
                'payable_amount'        => $discounted_amount,
            );
            Session::put('package_info',$package_data_array);
            $method_route ="'".route('social.load_payment_method')."'";
            $html_container ="'main_payment_container'";
            return  $html ='<div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-text-center">
                <div>
                    <p class="uk-text-meta">Subtotal '.$dist_msg.'</p>
                    <p class="uk-text-lead uk-text-bold"> ৳'.$package_break_down?->discounted_amount.'</p>
                </div>
                '.$dist_per_msg.'
                <div class="uk-margin uk-child-width-auto">
                    <label><input id="cbox" data-description-link="'.$desc_link.'" class="uk-checkbox" onclick="handleCheckboxClick(this)" type="checkbox">
                    Click here to read details
                    </label>

                </div>
                <div class="uk-margin uk-child-width-auto">
                    <label><input id="cbox" data-description-link="'.$desc_link.'" class="uk-checkbox" onclick="handleCheckboxClick(this)" type="checkbox">
                    Click here to read details
                    </label>

                </div>
                <div>
                    <h6 class="uk-text-danger uk-text-center" id="checkboxError"> </h6>
                    <button class="uk-button uk-button-secondary uk-border-rounded uk-margin-small-top" onclick=" getPaymentComponent(1,'.$method_route.', '.$id.', '.$html_container.')">Online Payment</button>
                    <button class="uk-button uk-button-primary uk-border-rounded uk-margin-small-top" onclick="getPaymentComponent(2,'.$method_route.', '.$id.', '.$html_container.')"">Ofline Payment</button>
                </div>

            </div>';
        }
        else
        {
            $package_data_array = array(
                'selected_package_id'=>'',
                'description_link'=>'',
            );
            Session::put('package_info',$package_data_array);
            return "";
        }



    }
    public function load_payment_method(Request $request)
    {

        $payment_type_array = array(
            1=>"Bank",
            2=>"Mobile Banking"
        );
        $data = explode("*", str_replace("'","",$request->data));

        if ($data[1])
        {
            $package_info = session('package_info')??array();
            $payment_info = array(
                'payment_method'=>$data[1]
            );

            $banks                  = array();
            $bank_type_drop_down    = createDropDownUiKit( "payment_type","", $payment_type_array,"", 1, "-- Select --","", "loadDropDown('".route('loadBankName')."', this.value, 'bank-name-container');loadHtmlElement('".route('loadBankDtls')."', this.value, 'bank-details');",0,0 );
            $bank_list              = createDropDownUiKit( "bank_name","", $banks,"", 1, "-- Select --","", "",0,0 );
            $load_img_onchange      = 'onchange="loadFile(event,'."'imgOutput'".')"';
            $url                    = route('submitManualPayment');
            $package_data_array     = array_merge($package_info,$payment_info);
            Session::put('package_info',$package_data_array);


            return $html = '
            <div class="uk-container uk-margin-large-top">
                <div id="bank-details">

                </div>
                <form class="uk-form-stacked" id="payment-form" action="'.$url.'">
                    ' . csrf_field() . '
                    <div class="uk-grid-small uk-child-width-1-3@l uk-child-width-1-2@m uk-child-width-1-1@s" uk-grid>
                        <div>
                            <label class="uk-form-label" for="payment_type">Payment Type</label>
                            <div id="payment-type-container" class="uk-form-controls">
                                '. $bank_type_drop_down.'
                            </div>
                                <div class="uk-text-danger uk-margin-small-top" id="payment_type_error"></div>
                        </div>
                        <div>
                            <label class="uk-form-label" for="company_account_no">Company Account No</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" name="company_account_no" id="company_account_no" type="text" placeholder="Company Account No">
                            </div>
                            <div class="uk-text-danger uk-margin-small-top" id="company_account_no_error"></div>
                        </div>
                        <div>
                            <label class="uk-form-label" for="bank-name">Bank Name</label>
                            <div id="bank-name-container" class="uk-form-controls">
                                '. $bank_list.'
                            </div>
                            <div class="uk-text-danger uk-margin-small-top" id="bank_name_error"></div>
                        </div>

                        <div>
                            <label class="uk-form-label" for="account_holder">Account Holder</label>
                            <div class="uk-form-controls">
                                <input name="account_holder" class="uk-input" id="account_holder" type="text" placeholder="Enter Account Holder Name">
                            </div>
                            <div class="uk-text-danger uk-margin-small-top" id="account_holder_error"></div>
                        </div>
                        <div>
                            <label class="uk-form-label" for="account_no">Account No</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" name="account_no" id="account_no" type="text" placeholder="Enter Account No">
                            </div>
                            <div class="uk-text-danger uk-margin-small-top" id="account_no_error"></div>
                        </div>
                        <div>
                            <label class="uk-form-label" for="branch">Branch</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="branch" type="text" name="branch"  placeholder="Enter branch Name">
                            </div>
                            <div class="uk-text-danger uk-margin-small-top" id="branch_error"></div>
                        </div>
                        <div>
                            <label class="uk-form-label" for="transaction-id">Transaction ID</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="transaction-id" name="transaction_id" type="text" placeholder="Enter Transaction ID Name">
                            </div>
                            <div class="uk-text-danger uk-margin-small-top" id="transaction_id_error"></div>
                        </div>
                        <div>
                            <label class="uk-form-label" for="image">Image or Screen Shot</label>
                            <div uk-form-custom="target: true" class="uk-form-custom uk-first-column">
                                <input id="image" type="file" name="image" '.$load_img_onchange.'>
                                <input class="uk-input uk-form-width-large" type="text" placeholder="Upload File" disabled="">
                                <div class="uk-text-danger uk-margin-small-top" id="image_error"></div>
                            </div>
                        </div>

                        <div>
                            <img id="imgOutput" style="height:80px;" src="">
                        </div>
                    </div>
                    <div class="uk-text-center ">
                        <button style="cursor:pointer;" class="button primary" type="button" id="submit-payment" onclick="submitPayment()" >Submit</button>
                    </div>
                </form>
            </div>
            ';

        }
        /* else
        {
            $package_data_array = array(
                'selected_package_id'=>'',
                'description_link'=>'',
            );
            Session::put('package_info',$package_data_array);
            return "";
        } */



    }

    public function loadBankName(Request $request)
    {
        return createDropDownUiKit( "bank_name","", "SELECT id,name from banks where bank_type=$request->data order by name","id,name", 1, "-- Select --","", "",0,0 );
    }
    public function loadBankDtls(Request $request)
    {
        $bank_dtls = CompanyBankDtls::where('bank_type',$request->data)->get();
        $th = "";
        if ($request->data==1)
        {
            $th = "<th>Branch</th>";
        }
        $header = "<tr>
                    <th>Bank Name</th>
                    <th>Account No</th>
                    $th
                </tr>";
        $body_tr=$td="";
        foreach ($bank_dtls as  $v)
        {
            if ($request->data==1)
            {
                $td = "<th>$v->branch</th>";
            }
            $body_tr .= "<tr>
                            <td>$v->bank_name</td>
                            <td>$v->account_number</td>
                            $td
                        </tr>";
        }

        $html = '<div class="uk-card uk-card-default uk-card-hover uk-card-body" style="margin-bottom:15px;">
                    <h3 class="uk-card-title">Bank Details</h3>
                    <table class="uk-table uk-table-striped">
                        <thead>
                             '.$header.'
                        </thead>
                        <tbody>
                            '.$body_tr.'
                        </tbody>
                    </table>
                </div>';
                return $html ;
    }

    public function submitPayment(Request $request)
    {

        // Validation rules
        $request->validate([
            'payment_type'      => 'required|in:1,2|not_in:0',
            'bank_name'         => 'required|numeric|not_in:0',
            'company_account_no'=> 'required|numeric',
            'account_holder'    => 'nullable|required_if:payment_type,1|string|max:255',
            'account_no'        => 'required|numeric',
            'branch'            => 'nullable|required_if:payment_type,1|string|max:255',
            'transaction_id'    => 'required|string|max:255',
            'image'             => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ],
        [
            'payment_type.not_in'        => 'The payment type is required.',
            'branch.required_if'         => 'The branch name is required.',
            'account_holder.required_if' => 'The account holder field is required.',
            'bank_name.not_in'           => 'The bank name  is required.',
            'bank_name.numeric'          => 'Invalid bank name.',
            'company_account_no.numeric' => 'Invalid company account no.',
            'account_no.numeric'         => 'Invalid account no.'
        ]);

        if (Session::get('package_info') == null || empty(Session::get('package_info'))) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong, please try again after some time.'
            ], 500);
        }
        $package_info = session('package_info');

        $msg_str = uploadImage( 'public/social-media/assets/images/package_purchase_img/',$request,'image'); //Custom Helpers
        $msgArr  = explode('*',$msg_str);
        PackagePurchaseMst::insert([
            'package_mst_id'        => $package_info['package_id'],
            'package_break_down_id' => $package_info['selected_package_id'],
            'user_id'               => auth()->id(),
            'package_value'         => $package_info['package_value'],
            'discount_per'          => $package_info['discount_per'],
            'payment_amount'        => $package_info['payable_amount'],
            'payment_method'        => $package_info['payment_method'],
            'payment_type'          => $request->payment_type,
            'bank_name'             => $request->bank_name,
            'account_holder'        => $request->account_holder,
            'company_account_no'    => $request->company_account_no,
            'account_no'            => $request->account_no,
            'branch'                => $request->branch,
            'transaction_id'        => $request->transaction_id,
            'image'                 => $msgArr[1],
            'created_by'            => auth()->id(),
            'created_at'            => Carbon::now(),
        ]);

        // Logic to save the data or perform actions
        Session::forget('package_info');
        return response()->json(['success' => true, 'message' => 'Form submitted successfully']);
    }
    public function package_purchage_history()
    {
       $history = DB::table('package_purchase_mst','a')
        ->leftJoin('users as b', 'b.id', '=','a.user_id' )
        ->leftJoin('social_package_break_down as c', 'c.id', '=','a.package_break_down_id' )
        ->leftJoin('social_package_mst as d', 'd.id', '=','a.package_mst_id' )
        ->leftJoin('banks as e', 'e.id', '=','a.bank_name' )
        ->select('c.sub_package_name','d.package_name','b.name as purchase_by','a.package_value','a.discount_per','a.payment_amount','e.name as bank_name','a.account_holder','a.company_account_no','a.account_no','a.branch','a.transaction_id','a.image','a.payment_status' )
        ->orderBy('a.id','desc')
        ->get();

        return view('dashboard.socialMedia.package_purchage_history.index', compact('history'));
    }

}
