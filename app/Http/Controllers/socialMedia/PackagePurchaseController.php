<?php

namespace App\Http\Controllers\socialMedia;

use App\Http\Controllers\Controller;
use App\Models\SocialPackageBreakDown;
use App\Models\SocialPackageFeatureDtls;
use App\Models\SocialPackageMst;
use Illuminate\Http\Request;
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
            $price              = $package_break_down?->price;
            $discounted_amount  = $package_break_down?->discounted_amount;
            $discount           = $price-$discounted_amount;
            $discount_per       = $package_break_down?->discount_per;
            $desc_link          = $package_break_down?->desc_link;
            $dist_msg           = $discount>0 ? '<span class="uk-text-muted"><del>৳'.$price.'</del></span>' : "";
            $dist_per_msg       = $discount_per>0 ? ' <p class="uk-text-success">Plan discount -'.$discount_per.'% <span class="uk-text-danger">-৳ '.$price.'</span></p>' :  "<p class='uk-text-success'>Plan discount $discount_per%";

            $package_data_array = array(
                'selected_package_id'=>$id,
                'description_link'=>$desc_link,
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
            $package_data_array = array_merge($package_info,$payment_info);
            Session::put('package_info',$package_data_array);
            $banks = array();
            $bank_type_drop_down  = createDropDownUiKit( "payment-type","", $payment_type_array,"", 1, "-- Select --","", "loadDropDown('".route('loadBankName')."', this.value, 'bank-name-container');",0,0 );
            $bank_list  = createDropDownUiKit( "bank-name","", $banks,"", 1, "-- Select --","", "",0,0 );
            $load_img_onchange = 'onchange="loadFile(event,'."'imgOutput'".')"';
            return $html = '
            <div class="uk-container uk-margin-large-top">
                <div id="bank-details">
                    <div class="uk-card uk-card-primary uk-card-hover uk-card-body uk-light">
                        <h3 class="uk-card-title">Bank Details</h3>
                        <p style="color:red;"> Bank :brack Bank; Acc No: 6t6756757u8,6t6756757u8, Branch:TTt, Card Holder:XXXX </>
                    </div>
                </div>
                <form class="uk-form-stacked">
                    ' . csrf_field() . '
                    <div class="uk-grid-small uk-child-width-1-3@l uk-child-width-1-2@m uk-child-width-1-1@s" uk-grid>
                        <div>
                            <label class="uk-form-label" for="payment-type">Payment Type</label>
                            <div id="payment-type-container" class="uk-form-controls">
                                '. $bank_type_drop_down.'
                            </div>
                                <div class="uk-text-danger" id="payment-type-error"></div>
                        </div>

                        <div>
                            <label class="uk-form-label" for="bank-name">Bank Name</label>
                            <div id="bank-name-container" class="uk-form-controls">
                                '. $bank_list.'
                            </div>
                            <div class="uk-text-danger" id="bank-name-error"></div>
                        </div>

                        <div>
                            <label class="uk-form-label" for="account_holder">Account Holder</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="account_holder" type="text" placeholder="Enter Account Holder Name">
                            </div>
                            <div class="uk-text-danger uk-margin-small-top" id="account-holder-error"></div>
                        </div>
                        <div>
                            <label class="uk-form-label" for="account_no">Account No</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="account_no" type="text" placeholder="Enter Account No">
                            </div>
                            <div class="uk-text-danger uk-margin-small-top" id="account-error"></div>
                        </div>
                        <div>
                            <label class="uk-form-label" for="branch">Branch</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="branch" type="text" placeholder="Enter branch Name">
                            </div>
                            <div class="uk-text-danger uk-margin-small-top" id="branch-error"></div>
                        </div>
                        <div>
                            <label class="uk-form-label" for="transaction-id">Transaction ID</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="transaction-id" type="text" placeholder="Enter Transaction ID Name">
                            </div>
                            <div class="uk-text-danger uk-margin-small-top" id="Transaction ID-error"></div>
                        </div>
                        <div>
                            <label class="uk-form-label" for="image">Image or Screen Shot</label>
                            <div uk-form-custom="target: true" class="uk-form-custom uk-first-column">
                                <input id="image" type="file" name="image" '.$load_img_onchange.'>
                                <input class="uk-input uk-form-width-large" type="text" placeholder="Upload File" disabled="">
                                <div class="uk-text-danger" id="image-error"></div>
                            </div>
                        </div>

                        <div>
                            <img id="imgOutput" style="height:80px;" src="">
                        </div>
                    </div>
                    <div class="uk-text-center ">
                        <button class="button primary" type="button" id="submit-payment">Submit</button>
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
        return createDropDownUiKit( "bank-name","", "SELECT id,name from banks where bank_type=$request->data order by name","id,name", 1, "-- Select --","", "",0,0 );
    }

    public function submitPayment(Request $request)
    {
        // Validation rules
        $request->validate([
            'payment-type' => 'required|in:1,2',
            'bank-name' => 'required_if:payment-type,1',
            'account_holder' => 'required|string|max:255',
            'account_no' => 'required|numeric',
            'branch' => 'nullable|string|max:255',
            'transaction-id' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Logic to save the data or perform actions

        return response()->json(['success' => true, 'message' => 'Form submitted successfully']);
    }

}
