<?php

namespace App\Http\Controllers\socialMedia;

use App\Http\Controllers\Controller;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Session;
use Mpdf\Mpdf;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;

class UserInfoController extends Controller
{
    public function __construct()
    {
        if (!session('religionArray'))
        {
            $religionArray = array(1=>'Buddhism', 2=>'Christianity', 3=>'Confucianism', 4=>'Hinduism', 5=>'Islam', 6=>'Jainism', 7=>'Judaism', 8=>'Shinto', 9=>'Sikhism', 10=>'Taoism',  11=>'Zoroastrianism');
            Session::put('religionArray', $religionArray);

        }
        if (!session('professionArray'))
        {
            $professionArray = array(1=>'Student', 2=>'Govt. Service Holder', 3=>'Private Job Holder', 4=>'Busieness Man', 5=>'Freelancer', 6=>'House Wife', 7=>'Farmer');
            Session::put('professionArray', $professionArray);
        }
        if (!session('country_arr'))
        {
            $country_arr    = return_library_array('SELECT id,name from countries where id=20 order by name','id','name');
            Session::put('country_arr', $country_arr);
        }
        if (!session('division_arr'))
        {
            $division_arr   = return_library_array('SELECT id,name from divisions order by name','id','name');
            Session::put('division_arr', $division_arr);
        }
        if (!session('district_arr'))
        {
            $district_arr   = return_library_array('SELECT id,name from districts order by name','id','name');
            Session::put('district_arr', $district_arr);
        }
        if (!session('upazila_arr'))
        {
            $upazila_arr    = return_library_array('SELECT id,name from upazilas order by name','id','name');
            Session::put('upazila_arr', $upazila_arr);
        }
    }
    public function myInfo()
    {
        $web_info   = Session::get('web_field_info', []);
        $user       = auth()->id();
        return view('socialMedia.pages.myInfo', compact('user','web_info'));
    }
    public function submitStep($step, Request $request)
    {
        // Validation rules based on the step
        $validationRules = $this->getValidationRules($step);

        // Validate the request data
        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            // Return errors if validation fails
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        // Store the data to session
        $this->storeStepData($step, $request);

        // Load the next step's HTML
        $nextStep = $step + 1;
        $nextStepView = 'socialMedia.commonFile.multistep_forms.step' . $nextStep;
        // Check if the next step exists
        if (view()->exists($nextStepView)) {
            $html = view($nextStepView)->render();
            return response()->json([
                'success' => true,
                'html' => $html,
            ]);
        }


        // If no next step, consider the form complete
        return response()->json([
            'success' => true,
            'message' => 'Form completed successfully!',
            'msg' => $nextStepView,
        ]);
    }

    public function loadStep($step)
    {
        // Load the previous step's data from the session
        $stepView = 'socialMedia.commonFile.multistep_forms.step' . $step;

        if (view()->exists($stepView)) {
            $html = view($stepView)->render();
            return response()->json([
                'success' => true,
                'html' => $html,
            ]);
        }

        return response()->json(['success' => false]);
    }

    // Define validation rules for each step (same as before)
    private function getValidationRules($step)
    {

        switch ($step) {
            case 1:
                return [
                    'verification_type' => 'required|array|min:1',
                    'verification_type.*' => 'in:1,2',
                ];
            case 2:
                return [
                    'full_name'     => 'required|max:255',
                    'first_name'    => 'required|max:80',
                    'middle_name'   => 'nullable|max:80',
                    'last_name'     => 'nullable|max:80',
                    'gender'        => 'required',
                    'profession'    => 'required',
                    'religion'      => 'required',
                    'mobile'        => 'required',
                    'email'         => 'required|email',
                    'nid_or_dob'    => 'nullable',
                    'documents'     => 'nullable',
                    'country'       => 'required',
                    'district'      => 'required',
                    'division'      => 'required',
                    'upazila'       => 'required',
                    'postcode'      => 'required',
                    'address'       => 'required',
                    'audio_verification_code' =>'nullable',
                    'video_verification_code' => 'nullable'
                ];
            case 3:
                return [
                    'father_full_name'          => 'required|max:255',
                    'father_first_name'         => 'required|max:80',
                    'father_middle_name'        => 'nullable|max:80',
                    'father_last_name'          => 'nullable|max:80',
                    'father_profession'         => 'required',
                    'father_religion'           => 'required',
                    'father_mobile'             => 'nullable',
                    'father_email'              => 'nullable',
                    'father_nid_or_dob'         => 'nullable',
                    'father_documents'          => 'nullable',
                    'mother_full_name'          => 'required',
                    'mother_first_name'         => 'required',
                    'mother_middle_name'        => 'nullable',
                    'mother_last_name'          => 'nullable',
                    'mother_profession'         => 'required',
                    'mother_religion'           => 'required',
                    'mother_mobile'             => 'required',
                    'mother_email'              => 'nullable|email',
                    'mother_nid_or_dob'         => 'nullable',
                    'mother_documents'          => 'nullable',
                    'emergency_full_name'       => 'required',
                    'emergency_first_name'      => 'required',
                    'emergency_middle_name'     => 'nullable',
                    'emergency_last_name'       => 'nullable',
                    'emergency_profession'      => 'required',
                    'emergency_religion'        => 'required',
                    'emergency_mobile'          => 'required',
                    'emergency_email'           => 'nullable',
                    'emergency_nid_or_dob'      => 'nullable',
                    'emergency_documents'       => 'nullable',
                    'emergency_documents'       => 'nullable',
                ];
            case 4:
                return [
                    'address' => 'required|string|max:255',
                ];
            default:
                return [];
        }
    }

    // Store data logic
    private function storeStepData($step, $request)
    {
        $userId = auth()->id();
        $data = $this->getStepData($step, $request);
        if($step == 2)
        {
            if ($request->hasFile('nid_or_dob'))
            {
                $msg_str    = uploadMultiImage('public/social-media/assets/images/user_documents/',$request,'nid_or_dob');
                $msgArr     = explode('*',$msg_str);
                $data['nid_or_dob'] = $msgArr[1];
            }
            if ($request->hasFile('documents'))
            {
                $msg_str2    = uploadMultiImage('public/social-media/assets/images/user_documents/',$request,'documents');
                $msgArr2     = explode('*',$msg_str2);
                $data['documents'] = $msgArr2[1];
            }
        }
        if($step == 3)
        {
            // FATHER'S DOCUMENTS
            if ($request->hasFile('father_nid_or_dob'))
            {
                $msg_str    = uploadMultiImage('public/social-media/assets/images/user_documents/',$request,'father_nid_or_dob');
                $msgArr     = explode('*',$msg_str);
                $data['father_nid_or_dob'] = $msgArr[1];
            }

            // MOTHER'S DOCUMENTS
            if ($request->hasFile('mother_nid_or_dob'))
            {
                $msg_str3    = uploadMultiImage('public/social-media/assets/images/user_documents/',$request,'mother_nid_or_dob');
                $msgArr3     = explode('*',$msg_str3);
                $data['mother_nid_or_dob'] = $msgArr3[1];
            }
            //EMERGENCY PERSON'S DOCUMENTS
            if ($request->hasFile('emergency_nid_or_dob'))
            {
                $msg_str5    = uploadMultiImage('public/social-media/assets/images/user_documents/',$request,'emergency_nid_or_dob');
                $msgArr5     = explode('*',$msg_str5);
                $data['emergency_nid_or_dob'] = $msgArr5[1];
            }
        }

        // Check if user info exists, and update or insert accordingly
        UserInfo::updateOrCreate(
            ['user_id' => $userId],
            $data
        );
    }

    private function getStepData($step, $request)
    {
        switch ($step) {
            case 1:
                return [
                    'verification_type' => implode(',', $request->input('verification_type', []))
                ];
            case 2:
                return [
                    'full_name'     => $request->input('full_name'),
                    'first_name'    => $request->input('first_name'),
                    'middle_name'   => $request->input('middle_name'),
                    'last_name'     => $request->input('last_name'),
                    'gender'        => $request->input('gender'),
                    'profession'    => $request->input('profession'),
                    'religion'      => $request->input('religion'),
                    'mobile'        => $request->input('mobile'),
                    'email'         => $request->input('email'),
                    'nid_or_dob'    => $request->input('nid_or_dob'),
                    'documents'     => $request->input('documents'),
                    'country'       => $request->input('country'),
                    'district'      => $request->input('district'),
                    'upazila'       => $request->input('upazila'),
                    'division'      => $request->input('division'),
                    'postcode'      => $request->input('postcode'),
                    'address'       => $request->input('address'),
                    'audio_verification_code' => $request->input('audio_verification_code'),
                    'video_verification_code' => $request->input('video_verification_code')
                ];
            case 3:
                return [
                    'father_full_name'          => $request->input('father_full_name'),
                    'father_first_name'         => $request->input('father_first_name'),
                    'father_middle_name'        => $request->input('father_middle_name'),
                    'father_last_name'          => $request->input('father_last_name'),
                    'father_profession'         => $request->input('father_profession'),
                    'father_religion'           => $request->input('father_religion'),
                    'father_mobile'             => $request->input('father_mobile'),
                    'father_email'              => $request->input('father_email'),
                    'father_nid_or_dob'         => $request->input('father_nid_or_dob'),
                    'father_documents'          => $request->input('father_documents'),
                    'mother_full_name'          => $request->input('mother_full_name'),
                    'mother_first_name'         => $request->input('mother_first_name'),
                    'mother_middle_name'        => $request->input('mother_middle_name'),
                    'mother_last_name'          => $request->input('mother_last_name'),
                    'mother_profession'         => $request->input('mother_profession'),
                    'mother_religion'           => $request->input('mother_religion'),
                    'mother_mobile'             => $request->input('mother_mobile'),
                    'mother_email'              => $request->input('mother_email'),
                    'mother_nid_or_dob'         => $request->input('mother_nid_or_dob'),
                    'mother_documents'          => $request->input('mother_documents'),
                    'emergency_full_name'       => $request->input('emergency_full_name'),
                    'emergency_first_name'      => $request->input('emergency_first_name'),
                    'emergency_middle_name'     => $request->input('emergency_middle_name'),
                    'emergency_last_name'       => $request->input('emergency_last_name'),
                    'emergency_profession'      => $request->input('emergency_profession'),
                    'emergency_religion'        => $request->input('emergency_religion'),
                    'emergency_relation'        => $request->input('emergency_relation'),
                    'emergency_mobile'          => $request->input('emergency_mobile'),
                    'emergency_email'           => $request->input('emergency_email'),
                    'emergency_nid_or_dob'      => $request->input('emergency_nid_or_dob'),
                    'emergency_documents'       => $request->input('emergency_documents'),
                ];
            case 4:
                return [
                    'is_final_submited' => $request->input('is_final_submited')
                ];
            default:
                return [];
        }
    }
    public function loadDivision(Request $request)
    {
        if($request->data == 20)
        {
            return createDropDownUiKit( "division","", "SELECT id,name from divisions order by name","id,name", 1, "-- Select --","", "loadDropDown('".route('loadDistrict')."', this.value, 'district-container');",0,0 );
        }
    }
    public function loadDistrict(Request $request)
    {

        return createDropDownUiKit( "district","", "SELECT id,name from districts where division_id=$request->data order by name","id,name", 1, "-- Select --","", "loadDropDown('".route('loadUpazila')."', this.value, 'upazila-container');",0,0 );

    }
    public function loadUpazila(Request $request)
    {

        return createDropDownUiKit( "upazila","", "SELECT id,name from upazilas where district_id=$request->data order by name","id,name", 1, "-- Select --","", "",0,0 );

    }
    public function user_details($encrypt_id)
    {
        $id = decrypt($encrypt_id);
        $user = UserInfo::where('user_id', $id)->first();
        return view('dashboard.pages.userdetails', compact('user'));
    }
    public function generatePDF2($id)
    {
        try {
            $userinfo = DB::table('user_infos')->where('id',$id)->first();
            $userinfoArray = (array)$userinfo;

            $mpdf = new Mpdf();
            $data = [
                'userinfoArray' => $userinfoArray
            ];
            $html = view('dashboard.pdf.user_info', $data)->render();
            $mpdf->WriteHTML($html);

            return response($mpdf->Output('', 'S'))->header('Content-Type', 'application/pdf');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    public function generatePDF($id)
    {
        try {
            $userinfo = DB::table('user_infos')->where('id',$id)->first();
            $userinfoArray = (array)$userinfo;

            $mpdf = new Mpdf();
            $data = [
                'userinfoArray' => $userinfoArray
            ];
            // return view('dashboard.pdf.user_info', $data);
            $html = view('dashboard.pdf.user_info', $data)->render();

            $mpdf = new Mpdf();

            // Write HTML to PDF
            $mpdf->WriteHTML($html);

            // Output the PDF
            return response($mpdf->Output('', 'S'))->header('Content-Type', 'application/pdf');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

}
