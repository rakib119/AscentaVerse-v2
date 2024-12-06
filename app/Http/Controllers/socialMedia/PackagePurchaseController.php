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

        $data = explode("*", $request->data);
        if ($data[1])
        {
            $package_info = session('package_info')??array();

            $payment_info = array(
                'payment_method'=>$data[1]
            );
            $package_data_array = array_merge($package_info,$payment_info);
            Session::put('package_info',$package_data_array);
            return $html = `
            <div class="uk-container uk-margin-large-top">
                <form class="uk-form-stacked">
                    <div class="uk-grid-small uk-child-width-1-3@l uk-child-width-1-2@m uk-child-width-1-1@s" uk-grid>
                        <!-- Name Field -->
                        <div>
                            <label class="uk-form-label" for="name">Name</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="name" type="text" placeholder="Enter your name">
                            </div>
                            <div class="uk-text-danger uk-margin-small-top" id="nameError" style="display: none;">
                                Please enter a valid name.
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label class="uk-form-label" for="email">Email</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="email" type="email" placeholder="Enter your email">
                            </div>
                            <div class="uk-text-danger uk-margin-small-top" id="emailError" style="display: none;">
                                Please enter a valid email address.
                            </div>
                        </div>

                        <!-- Gender Field (Select Dropdown) -->
                        <div>
                            <label class="uk-form-label" for="gender">Gender</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" id="gender">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="uk-text-danger uk-margin-small-top" id="genderError" style="display: none;">
                                Please select a gender.
                            </div>
                        </div>

                        <!-- Phone Field -->
                        <div>
                            <label class="uk-form-label" for="phone">Phone</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="phone" type="text" placeholder="Enter your phone number">
                            </div>
                            <div class="uk-text-danger uk-margin-small-top" id="phoneError" style="display: none;">
                                Please enter a valid phone number.
                            </div>
                        </div>

                        <!-- Country Field (Select Dropdown) -->
                        <div>
                            <label class="uk-form-label" for="country">Country</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" id="country">
                                    <option value="">Select Country</option>
                                    <option value="us">United States</option>
                                    <option value="uk">United Kingdom</option>
                                    <option value="bd">Bangladesh</option>
                                </select>
                            </div>
                            <div class="uk-text-danger uk-margin-small-top" id="countryError" style="display: none;">
                                Please select a country.
                            </div>
                        </div>

                        <!-- Message Field -->
                        <div>
                            <label class="uk-form-label" for="message">Message</label>
                            <div class="uk-form-controls">
                                <textarea class="uk-textarea" id="message" rows="3" placeholder="Enter your message"></textarea>
                            </div>
                            <div class="uk-text-danger uk-margin-small-top" id="messageError" style="display: none;">
                                The message field cannot be empty.
                            </div>
                        </div>

                        <!-- Address Field -->
                        <div>
                            <label class="uk-form-label" for="address">Address</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="address" type="text" placeholder="Enter your address">
                            </div>
                            <div class="uk-text-danger uk-margin-small-top" id="addressError" style="display: none;">
                                Please enter a valid address.
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button class="uk-button uk-button-primary uk-width-1-1" type="button" onclick="validateForm()">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            `;

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
}
