<?php

use App\Models\DeletePhotoLink;
use App\Models\Route;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

if (!function_exists('uploadImage')) {
    function uploadImage($basepath,$request,$field_name,$isBase64=0)
    {
        try {
            if ($isBase64==1)
            {
                //Image From Base64
                $imageData = $request->input($field_name);

                // Extract the image extension and data
                if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $matches)) {
                    $extension = $matches[1];
                    $imageData = substr($imageData, strpos($imageData, ',') + 1);
                    $imageData = base64_decode($imageData);

                    // Generate a unique filename
                    $image_name = Str::random(25) . '.' . $extension;

                    // Save image to public folder
                    $path = base_path($basepath . $image_name);
                    file_put_contents($path, $imageData);
                    // return $image_name;
                    return "1*".$image_name;
                }
                else{
                    return "1*0";
                }
            }
            else
            {
                //Image From File
                if ($request->hasFile($field_name))
                {
                    $manager    = new ImageManager(new Driver());
                    $image_file = $request->file($field_name);
                    $image_name = Str::random(25).'.'.$image_file->getClientOriginalExtension();
                    $image      = $manager->read($image_file);
                    $path       = base_path($basepath . $image_name);
                    $image->save($path);
                    return "1*".$image_name;
                }
                else{
                    return "1*0";
                }
            }


        } catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
}
if (!function_exists('insertDeleteLink')) {
    function insertDeleteLink($file_location,$section_id)
    {
        try {
           if( file_exists($file_location))
            {
                DeletePhotoLink::insert([
                    'link'=> $file_location,
                    'section_id'=> $section_id,
                    'created_by'=> auth()->id(),
                    'created_at'=> Carbon::now(),
                ]);
            }

            return 1;
        } catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
}
if (!function_exists('changeStatus')) {
    function changeStatus($table_name, $idArray,$status_id=0)
    {
        try {
            DB::table($table_name)
                ->whereIn('id',$idArray)
                ->update
                (
                    [
                        'status_active' => $status_id,
                        'updated_by' => auth()->id(),
                        'updated_at' => Carbon::now(),
                    ]
                );

            return 1;
        } catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
}
if (!function_exists('deleteFile')) {
    function deleteFile($section)
    {
        try {
            $links = DeletePhotoLink::where(['section_id'=>$section,'status_active'=>1])->get()->toArray();
            $idArray = array();
            foreach ($links as $v) {
                $idArray[$v['id']] = $v['id'];
                if(file_exists($v['link']))
                {
                    unlink($v['link']);
                }
            }
            changeStatus('delete_photo_links', $idArray,0);
            return 1;
        } catch (Exception $e)
        {
            return $e->getMessage();
        }


    }
}
if (!function_exists('returnArray')) {
    function returnArray($table_name,$columns,$key,$value, $cond='')
    {
        try {

           return $data = DB::raw("select $columns form $table_name  $cond");

        } catch (Exception $e)
        {
            return $e->getMessage();
        }


    }
}
if (!function_exists('storeMenuIntoSession')) {
    function storeMenuIntoSession()
    {
        // return auth()->user()->role_id;
        $main_menu_array = $permission_route = array();
        if (auth()->user())
        {
            if (auth()->user()->role_id == 2) //TEAM MEMBERS
            {
                $user_id = auth()->id();
                $submenus=DB::table('permissions','a')
                    ->join('main_menus as b', 'b.id', '=', 'a.menu_id')
                    ->select('b.menu_name','b.route_name','a.permission_string','b.root_menu_id','a.id','a.menu_id')
                    ->where('a.user_id',$user_id)
                    ->orderBy('b.sequence')
                    ->get();
                // return $submenus;
                $sub_menu_array=$permission_route_type=array();
                foreach ($submenus as $v)
                {
                    $sub_menu_array[$v->root_menu_id][$v->id]['name'] = $v->menu_name;
                    $sub_menu_array[$v->root_menu_id][$v->id]['route'] = $v->route_name;
                    $permission_route_type[$v->menu_id] = $v->permission_string;
                    $permission_menu[$v->menu_id] = $v->menu_id;
                }
                // return $permission_menu;
                $menues= DB::table('main_menus')->select('menu_name', 'id')->where(['status_active'=>1,'root_menu_id'=>null])
                ->orderBy('sequence')
                ->get();
                $main_menu_array= array();

                foreach ($menues as $v)
                {
                    if(isset($sub_menu_array[$v->id]))
                    {
                        foreach ($sub_menu_array[$v->id] as $root_menu_id=>$r)
                        {
                            $main_menu_array[$v->menu_name][$root_menu_id]['name'] = $r['name'];
                            $main_menu_array[$v->menu_name][$root_menu_id]['route'] = $r['route'];
                        }
                    }

                }


                $routes = Route::select('id','route','route_type','menu_id')->whereIn('menu_id', $permission_menu)->orderBy('id')->get();
                $permission_route = array();
                foreach ($routes as $v)
                {
                    $route      = $v->route;
                    $route_type = $v->route_type;
                    $menu_id    = $v->menu_id;
                    $str_id     = isset($permission_route_type[$menu_id])?$permission_route_type[$menu_id]:'';
                    $type_arr   = explode(',',$str_id);
                    $type_arr2  = array();
                    foreach ($type_arr as $type)
                    {
                        $type_arr2[$type]= $type;
                    }
                    // echo $route."\n";
                    if (isset($type_arr2[$route_type])) {
                        $permission_route[$route]=$route;
                    }

                }
            }
            if (auth()->user()->role_id == 1) // ADMIN
            {
                $submenus = DB::table('main_menus','b')
                    ->select('b.menu_name','b.route_name','b.root_menu_id','b.id')
                    ->where('route_name','!=',null)
                    ->orderBy('b.sequence')
                    ->get();
                // return $submenus;
                $sub_menu_array=array();
                foreach ($submenus as $v)
                {
                    $sub_menu_array[$v->root_menu_id][$v->id]['name'] = $v->menu_name;
                    $sub_menu_array[$v->root_menu_id][$v->id]['route'] = $v->route_name;
                }
                // return $sub_menu_array;
                $menues= DB::table('main_menus')->select('menu_name', 'id')->where(['status_active'=>1,'root_menu_id'=>null])
                ->orderBy('sequence')
                ->get();
                $main_menu_array= array();
                foreach ($menues as $v)
                {
                    if(isset($sub_menu_array[$v->id]))
                    {
                        foreach ($sub_menu_array[$v->id] as $menu_id=>$r)
                        {
                            $main_menu_array[$v->menu_name][$menu_id]['name'] = $r['name'];
                            $main_menu_array[$v->menu_name][$menu_id]['route'] = $r['route'];
                        }
                    }
                }
                // return $main_menu_array;

                $routes = Route::select('route')->get();
                $permission_route = array();
                foreach ($routes as $v)
                {
                    $permission_route[$v->route]=$v->route;
                }
            }
        }
        // return $permission_route;
        Session::put('main_menu_array', $main_menu_array);
        Session::put('permission_route', $permission_route);
    }
}
if (!function_exists('routeType')) {
    function routeType()
    {
        return $route_type_array = [1=>'Menu',2=>'Save',3=>'Update',4=>'Delete',5=>'Details',6=>'Published'];
    }
}
?>
