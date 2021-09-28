<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{

    public function register(Request $request) {

        if($request->submit)
        {
            $validated = $request->validate([
                'fname'     => 'required',
                'lname'     => 'required',
                'username'  => 'required',
                'email'     => 'required|unique:register',
                'pwd'       => 'required',
                'city'      => 'required',
                'state'     => 'required',
                'contact'   => 'required',
                'gender'    => 'required',
                'dd'        => 'required',
                'mm'        => 'required',
                'yy'        => 'required',
                'hobby'     => 'required',
                'image'     => 'required',
            ]);

            if($request->file()) 
            {
                $fileName = time().'-'.$request->image->getClientOriginalName();
                $request->image->move('upload/register/images/', $fileName);
            }
            else
            {
                $fileName = "";
            }
            
            $birthdateArr = array($request->dd,$request->mm,$request->yy);
            $birthdate = implode("-", $birthdateArr);

            $hobbyArr = $request->hobby;
            if(!empty($hobbyArr))
            {
                $hobbyStr = implode(",", $hobbyArr);
            }
            else
            {
                $hobbyStr = "";
            }

            $role = "Seller";

            $saveArr = array(
                'fname'     => $request->fname,
                'lname'     => $request->lname,
                'username'  => $request->username,
                'email'     => $request->email,
                'pwd'       => $request->pwd,
                'city'      => $request->city,
                'state'     => $request->state,
                'contact'   => $request->contact,
                'role'      => $role,
                'gender'    => $request->gender,
                'birthdate' => $birthdate,
                'hobby'     => $hobbyStr,
                'image'     => $fileName
            );

            DB::table('register')->insert($saveArr);
            return redirect('/login');
        }

        return view('register');
    }


    public function login(Request $request) {
        
        if(session('user_id')) {
            return redirect('/dashboard');
        }

        if($request->submit) {
            $username = $request->username;
            $email = $request->email;
            $pwd = $request->pwd;
            $checkUser = DB::table('register')->where('username',$username)->where('email',$email)->where('pwd',$pwd)->where('status',1);
            if($checkUser->count()==1)
            {
                $user = $checkUser->first();
                // echo '<pre>';
                // print_r($user); die;
                session(['user_id' => $user->id, 'user_fname' => $user->fname, 'user_lname' => $user->lname, 'user_image' => $user->image]);
                return redirect('/dashboard');
            }
            else
            {
                $msg = "Given Credentials are not Valid For Sign in !";
                echo '<h3 style="color: aqua;">'.$msg.'</h3>';
            }
        }
        return view('login');
    }


    public function dashboard() {

        if(!session('user_id')) {
            return redirect('/login');
        }
        // echo session('user_id');
        return view('dashboard');
    }


    public function logout(Request $request) {

        if(!session('user_id')) {
            return redirect('/login');
        }
        $request->session()->forget('user_id','user_fname','user_lname','user_image');
        return redirect('/login');
    }


    public function add_register(Request $request) {
        
        if(!session('user_id')) {
            return redirect('/login');
        }

        if($request->submit)
        {
            $validated = $request->validate([
                'fname'     => 'required',
                'lname'     => 'required',
                'username'  => 'required',
                'email'     => 'required|unique:admins',
                'pwd'       => 'required',
                'city'      => 'required',
                'state'     => 'required',
                'contact'   => 'required',
                'role'      => 'required',
                'gender'    => 'required',
                'dd'        => 'required',
                'mm'        => 'required',
                'yy'        => 'required',
                'hobby'     => 'required',
                'image'     => 'required',
            ]);

            if($request->file()) 
            {
                $fileName = time().'-'.$request->image->getClientOriginalName();
                $request->image->move('upload/register/images/', $fileName);
            }
            else
            {
                $fileName = "";
            }
            
            $birthdateArr = array($request->dd,$request->mm,$request->yy);
            $birthdate = implode("-", $birthdateArr);

            $hobbyArr = $request->hobby;
            if(!empty($hobbyArr))
            {
                $hobbyStr = implode(",", $hobbyArr);
            }
            else
            {
                $hobbyStr = "";
            }

            $saveArr = array(
                'fname'     => $request->fname,
                'lname'     => $request->lname,
                'username'  => $request->username,
                'email'     => $request->email,
                'pwd'       => $request->pwd,
                'city'      => $request->city,
                'state'     => $request->state,
                'contact'   => $request->contact,
                'role'      => $request->role,
                'gender'    => $request->gender,
                'birthdate' => $birthdate,
                'hobby'     => $hobbyStr,
                'image'     => $fileName
            );

            DB::table('register')->insert($saveArr);
            return redirect('/register/view');
        }

        return view('add-register');
    }


    public function add_admin(Request $request) {
        
        if(!session('user_id')) {
            return redirect('/login');
        }

        if($request->submit)
        {
            $validated = $request->validate([
                'fname'     => 'required',
                'lname'     => 'required',
                'username'  => 'required',
                'email'     => 'required|unique:admins',
                'pwd'       => 'required',
                'city'      => 'required',
                'state'     => 'required',
                'contact'   => 'required',
                'gender'    => 'required',
                'dd'        => 'required',
                'mm'        => 'required',
                'yy'        => 'required',
                'hobby'     => 'required',
                'image'     => 'required',
            ]);

            if($request->file()) 
            {
                $fileName = time().'-'.$request->image->getClientOriginalName();
                $request->image->move('upload/admin/images/', $fileName);
            }
            else
            {
                $fileName = "";
            }
            
            $birthdateArr = array($request->dd,$request->mm,$request->yy);
            $birthdate = implode("-", $birthdateArr);

            $hobbyArr = $request->hobby;
            if(!empty($hobbyArr))
            {
                $hobbyStr = implode(",", $hobbyArr);
            }
            else
            {
                $hobbyStr = "";
            }

            $saveArr = array(
                'fname'     => $request->fname,
                'lname'     => $request->lname,
                'username'  => $request->username,
                'email'     => $request->email,
                'pwd'       => $request->pwd,
                'city'      => $request->city,
                'state'     => $request->state,
                'contact'   => $request->contact,
                'gender'    => $request->gender,
                'birthdate' => $birthdate,
                'hobby'     => $hobbyStr,
                'image'     => $fileName
            );

            DB::table('admins')->insert($saveArr);
            return redirect('/admin/view');
        }

        return view('add-admin');
    }


    public function add_seller(Request $request) {
        
        if(!session('user_id')) {
            return redirect('/login');
        }

        if($request->submit)
        {
            $validated = $request->validate([
                'fname'     => 'required',
                'lname'     => 'required',
                'username'  => 'required',
                'email'     => 'required|unique:register',
                'pwd'       => 'required',
                'city'      => 'required',
                'state'     => 'required',
                'contact'   => 'required',
                'gender'    => 'required',
                'dd'        => 'required',
                'mm'        => 'required',
                'yy'        => 'required',
                'hobby'     => 'required',
                'image'     => 'required',
            ]);

            if($request->file()) 
            {
                $fileName = time().'-'.$request->image->getClientOriginalName();
                $request->image->move('upload/register/images/', $fileName);
            }
            else
            {
                $fileName = "";
            }
            
            $birthdateArr = array($request->dd,$request->mm,$request->yy);
            $birthdate = implode("-", $birthdateArr);

            $hobbyArr = $request->hobby;
            if(!empty($hobbyArr))
            {
                $hobbyStr = implode(",", $hobbyArr);
            }
            else
            {
                $hobbyStr = "";
            }

            $role = "Seller";

            $saveArr = array(
                'fname'     => $request->fname,
                'lname'     => $request->lname,
                'username'  => $request->username,
                'email'     => $request->email,
                'pwd'       => $request->pwd,
                'city'      => $request->city,
                'state'     => $request->state,
                'contact'   => $request->contact,
                'role'      => $role,
                'gender'    => $request->gender,
                'birthdate' => $birthdate,
                'hobby'     => $hobbyStr,
                'image'     => $fileName
            );

            DB::table('register')->insert($saveArr);
            return redirect('/seller/view');
        }

        return view('add-seller');
    }


    public function add_brand(Request $request) {

        if(!session('user_id')) {
            return redirect('/login');
        }

        if($request->submit)
        {
            $validated = $request->validate([
                'bname'      => 'required',
                'image'      => 'required',
                'seller_id'  => 'required',
            ]);

            if($request->file()) 
            {
                $fileName = time().'-'.$request->image->getClientOriginalName();
                $request->image->move('upload/brand/images/', $fileName);
            }
            else
            {
                $fileName = "";
            }
            
            $saveArr = array(
                'bname'     => $request->bname,
                'image'     => $fileName,
                'seller_id' => $request->seller_id
            );

            DB::table('brands')->insert($saveArr);
            return redirect('/brand/view');
        }

        return view('add-brand');
    }


    public function add_category(Request $request) {
        
        if(!session('user_id')) {
            return redirect('/login');
        }

        if($request->submit)
        {
            $validated = $request->validate([
                'cname'      => 'required',
                'image'      => 'required',
                'brand_id'   => 'required',
            ]);

            if($request->file()) 
            {
                $fileName = time().'-'.$request->image->getClientOriginalName();
                $request->image->move('upload/category/images/', $fileName);
            }
            else
            {
                $fileName = "";
            }
            
            $saveArr = array(
                'cname'     => $request->cname,
                'image'     => $fileName,
                'brand_id' => $request->brand_id
            );

            DB::table('category')->insert($saveArr);
            return redirect('/category/view');
        }

        return view('add-category');
    }


    public function add_product(Request $request) {
        
        if(!session('user_id')) {
            return redirect('/login');
        }

        if($request->submit)
        {
            $validated = $request->validate([
                'title'       => 'required',
                'description' => 'required',
                'image'       => 'required',
                'price'       => 'required',
                'quantity'    => 'required',
                'category_id' => 'required'
            ]);

            if($request->file()) 
            {
                $fileName = time().'-'.$request->image->getClientOriginalName();
                $request->image->move('upload/product/images/', $fileName);
            }
            else
            {
                $fileName = "";
            }

            $saveArr = array(
                'title'       => $request->title,
                'description' => $request->description,
                'image'       => $fileName,
                'price'       => $request->price,
                'quantity'    => $request->quantity,
                'category_id' => $request->category_id
            );

            DB::table('products')->insert($saveArr);
            return redirect('/product/view');
        }

        return view('add-product');
    }


    public function view_register(Request $request) {

        if(!session('user_id')) {
            return redirect('/login');
        }

        $searchTxt = $request->get('searchTxt');
        // echo $searchTxt;

        if($searchTxt == "")
        {
            $users = DB::table('register')->Paginate(5);
            // echo "<pre>";
            // print_r($users); die;
        }
        else
        {
            $users = DB::table('register')->where('fname','like','%'.$searchTxt.'%')->orWhere('email','like','%'.$searchTxt.'%')->Paginate(5);
            // echo "<pre>";
            // print_r($users); die;
            $users->appends(['searchTxt'=>$searchTxt]);
        }

        $array['myusers'] = $users;
        return view('view-register',$array);
    }


    public function view_admin(Request $request) {

        if(!session('user_id')) {
            return redirect('/login');
        }

        $searchTxt = $request->get('searchTxt');
        // echo $searchTxt;

        if($searchTxt == "")
        {
            $users = DB::table('admins')->Paginate(5);
            // echo "<pre>";
            // print_r($users); die;
        }
        else
        {
            $users = DB::table('admins')->where('fname','like','%'.$searchTxt.'%')->orWhere('email','like','%'.$searchTxt.'%')->Paginate(5);
            // echo "<pre>";
            // print_r($users); die;
            $users->appends(['searchTxt'=>$searchTxt]);
        }

        $array['myusers'] = $users;
        return view('view-admin',$array);
    }


    public function view_seller(Request $request) {

        if(!session('user_id')) {
            return redirect('/login');
        }

        $searchTxt = $request->get('searchTxt');
        // echo $searchTxt;

        if($searchTxt == "")
        {
            $users = DB::table('register')->where('role','Seller')->Paginate(5);
            // echo "<pre>";
            // print_r($users); die;
        }
        else
        {
            $users = DB::table('register')->where('role','Seller')->where('fname','like','%'.$searchTxt.'%')->orWhere('email','like','%'.$searchTxt.'%')->Paginate(5);
            // echo "<pre>";
            // print_r($users); die;
            $users->appends(['searchTxt'=>$searchTxt]);
        }

        $array['myusers'] = $users;
        return view('view-seller',$array);
    }


    public function view_brand(Request $request) {

        if(!session('user_id')) {
            return redirect('/login');
        }

        $searchTxt = $request->get('searchTxt');
        // echo $searchTxt;

        if($searchTxt == "")
        {
            $users = DB::table('brands')->Paginate(5);
            // echo "<pre>";
            // print_r($users); die;
        }
        else
        {
            $users = DB::table('brands')->where('bname','like','%'.$searchTxt.'%')->Paginate(5);
            // echo "<pre>";
            // print_r($users); die;
            $users->appends(['searchTxt'=>$searchTxt]);
        }

        $array['myusers'] = $users;
        return view('view-brand',$array);
    }

    
    public function view_category(Request $request) {

        if(!session('user_id')) {
            return redirect('/login');
        }

        $searchTxt = $request->get('searchTxt');
        // echo $searchTxt;

        if($searchTxt == "")
        {
            $users = DB::table('category')->Paginate(5);
            // echo "<pre>";
            // print_r($users); die;
        }
        else
        {
            $users = DB::table('category')->where('cname','like','%'.$searchTxt.'%')->Paginate(5);
            // echo "<pre>";
            // print_r($users); die;
            $users->appends(['searchTxt'=>$searchTxt]);
        }

        $array['myusers'] = $users;
        return view('view-category',$array);
    }    

    
    public function view_product(Request $request) {

        if(!session('user_id')) {
            return redirect('/login');
        }

        $searchTxt = $request->get('searchTxt');
        // echo $searchTxt;

        if($searchTxt == "")
        {
            $users = DB::table('products')->Paginate(5);
            // echo "<pre>";
            // print_r($users); die;
        }
        else
        {
            $users = DB::table('products')->where('title','like','%'.$searchTxt.'%')->Paginate(5);
            // echo "<pre>";
            // print_r($users); die;
            $users->appends(['searchTxt'=>$searchTxt]);
        }

        $array['myusers'] = $users;
        return view('view-product',$array);
    }


    public function update_register(Request $request,$edit_id) {

        if(!session('user_id')) {
            return redirect('/login');
        }

        $user = DB::table('register')->where('id',$edit_id)->first();
        // echo "<pre>";
        // print_r($user); die;
            
        $array['user'] = $user;
        $array['hobby'] = explode(',', $user->hobby);    
        $array['birthdate'] = explode('-', $user->birthdate);

        if($request->submit)
        {
            $validated = $request->validate([
                'fname'     => 'required',
                'lname'     => 'required',
                'username'  => 'required',
                'email'     => 'required',
                'pwd'       => 'required',
                'city'      => 'required',
                'state'     => 'required',
                'contact'   => 'required',
                'role'      => 'required',
                'gender'    => 'required',
                'dd'        => 'required',
                'mm'        => 'required',
                'yy'        => 'required',
                'hobby'     => 'required',
            ]);
            if($request->file()) 
            {
                $fileName = time().'-'.$request->image->getClientOriginalName();
                $request->image->move('upload/register/images/', $fileName);
                if(!empty($user->image))
                {
                    unlink(public_path('upload/register/images/'.$user->image));            
                }
                else
                {
                    $user->image = "";
                }
            }
            else
            {
                $fileName = @$user->image;
            }

            $birthdateArr = array($request->dd,$request->mm,$request->yy);
            $birthdate = implode("-", $birthdateArr);

            $hobbyArr = $request->hobby;
            $hobbyStr = implode(",", $hobbyArr);

            $saveArr = array(
                'fname'     => $request->fname,
                'lname'     => $request->lname,
                'username'  => $request->username,
                'email'     => $request->email,
                'pwd'       => $request->pwd,
                'city'      => $request->city,
                'state'     => $request->state,
                'contact'   => $request->contact,
                'role'      => $request->role,
                'gender'    => $request->gender,
                'birthdate' => $birthdate,
                'hobby'     => $hobbyStr,
                'image'     => $fileName
            );

            DB::table('register')->where('id',$edit_id)->update($saveArr);
            return redirect('/register/view');

        }

        return view('add-register',$array);

    }


    public function update_admin(Request $request,$edit_id) {

        if(!session('user_id')) {
            return redirect('/login');
        }

        $user = DB::table('admins')->where('id',$edit_id)->first();
        // echo "<pre>";
        // print_r($user); die;
            
        $array['user'] = $user;
        $array['hobby'] = explode(',', $user->hobby);    
        $array['birthdate'] = explode('-', $user->birthdate);

        if($request->submit)
        {
            $validated = $request->validate([
                'fname'     => 'required',
                'lname'     => 'required',
                'username'  => 'required',
                'email'     => 'required',
                'pwd'       => 'required',
                'city'      => 'required',
                'state'     => 'required',
                'contact'   => 'required',
                'gender'    => 'required',
                'dd'        => 'required',
                'mm'        => 'required',
                'yy'        => 'required',
                'hobby'     => 'required',
            ]);
            if($request->file()) 
            {
                $fileName = time().'-'.$request->image->getClientOriginalName();
                $request->image->move('upload/admin/images/', $fileName);
                if(!empty($user->image))
                {
                    unlink(public_path('upload/admin/images/'.$user->image));            
                }
                else
                {
                    $user->image = "";
                }
            }
            else
            {
                $fileName = @$user->image;
            }

            $birthdateArr = array($request->dd,$request->mm,$request->yy);
            $birthdate = implode("-", $birthdateArr);

            $hobbyArr = $request->hobby;
            $hobbyStr = implode(",", $hobbyArr);

            $saveArr = array(
                'fname'     => $request->fname,
                'lname'     => $request->lname,
                'username'  => $request->username,
                'email'     => $request->email,
                'pwd'       => $request->pwd,
                'city'      => $request->city,
                'state'     => $request->state,
                'contact'   => $request->contact,
                'gender'    => $request->gender,
                'birthdate' => $birthdate,
                'hobby'     => $hobbyStr,
                'image'     => $fileName
            );

            DB::table('admins')->where('id',$edit_id)->update($saveArr);
            return redirect('/admin/view');

        }

        return view('add-admin',$array);

    }


    public function update_seller(Request $request,$edit_id) {

        if(!session('user_id')) {
            return redirect('/login');
        }

        $user = DB::table('sellers')->where('id',$edit_id)->first();
        // echo "<pre>";
        // print_r($user); die;
            
        $array['user'] = $user;
        $array['hobby'] = explode(',', $user->hobby);    
        $array['birthdate'] = explode('-', $user->birthdate);

        if($request->submit)
        {
            $validated = $request->validate([
                'fname'     => 'required',
                'lname'     => 'required',
                'username'  => 'required',
                'email'     => 'required',
                'pwd'       => 'required',
                'city'      => 'required',
                'state'     => 'required',
                'contact'   => 'required',
                'gender'    => 'required',
                'dd'        => 'required',
                'mm'        => 'required',
                'yy'        => 'required',
                'hobby'     => 'required',
            ]);
            if($request->file()) 
            {
                $fileName = time().'-'.$request->image->getClientOriginalName();
                $request->image->move('upload/seller/images/', $fileName);
                if(!empty($user->image))
                {
                    unlink(public_path('upload/seller/images/'.$user->image));            
                }
                else
                {
                    $user->image = "";
                }
            }
            else
            {
                $fileName = @$user->image;
            }

            $birthdateArr = array($request->dd,$request->mm,$request->yy);
            $birthdate = implode("-", $birthdateArr);

            $hobbyArr = $request->hobby;
            $hobbyStr = implode(",", $hobbyArr);

            $saveArr = array(
                'fname'     => $request->fname,
                'lname'     => $request->lname,
                'username'  => $request->username,
                'email'     => $request->email,
                'pwd'       => $request->pwd,
                'city'      => $request->city,
                'state'     => $request->state,
                'contact'   => $request->contact,
                'gender'    => $request->gender,
                'birthdate' => $birthdate,
                'hobby'     => $hobbyStr,
                'image'     => $fileName
            );

            DB::table('sellers')->where('id',$edit_id)->update($saveArr);
            return redirect('/seller/view');

        }

        return view('add-seller',$array);
        
    }


    public function update_brand(Request $request,$edit_id) {

        if(!session('user_id')) {
            return redirect('/login');
        }

        $user = DB::table('brands')->where('id',$edit_id)->first();
        // echo "<pre>";
        // print_r($user); die;
            
        $array['user'] = $user;

        if($request->submit)
        {
            $validated = $request->validate([
                'bname'     => 'required',
                'seller_id' => 'required',
            ]);
            if($request->file()) 
            {
                $fileName = time().'-'.$request->image->getClientOriginalName();
                $request->image->move('upload/brand/images/', $fileName);
                if(!empty($user->image))
                {
                    unlink(public_path('upload/brand/images/'.$user->image));            
                }
                else
                {
                    $user->image = "";
                }
            }
            else
            {
                $fileName = @$user->image;
            }

            $saveArr = array(
                'bname'     => $request->bname,
                'image'     => $fileName,
                'seller_id' => $request->seller_id
            );

            DB::table('brands')->where('id',$edit_id)->update($saveArr);
            return redirect('/brand/view');

        }

        return view('add-brand',$array);
    }


    public function update_category(Request $request,$edit_id) {

        if(!session('user_id')) {
            return redirect('/login');
        }

        $user = DB::table('category')->where('id',$edit_id)->first();
        // echo "<pre>";
        // print_r($user); die;
            
        $array['user'] = $user;

        if($request->submit)
        {
            $validated = $request->validate([
                'cname'     => 'required',
                'brand_id'  => 'required',
            ]);
            if($request->file()) 
            {
                $fileName = time().'-'.$request->image->getClientOriginalName();
                $request->image->move('upload/category/images/', $fileName);
                if(!empty($user->image))
                {
                    unlink(public_path('upload/category/images/'.$user->image));            
                }
                else
                {
                    $user->image = "";
                }
            }
            else
            {
                $fileName = @$user->image;
            }

            $saveArr = array(
                'cname'     => $request->cname,
                'image'     => $fileName,
                'brand_id' => $request->brand_id
            );

            DB::table('category')->where('id',$edit_id)->update($saveArr);
            return redirect('/category/view');

        }

        return view('add-category',$array);        
    }


    public function update_product(Request $request,$edit_id) {

        if(!session('user_id')) {
            return redirect('/login');
        }

        $user = DB::table('products')->where('id',$edit_id)->first();
        // echo "<pre>";
        // print_r($user); die;
            
        $array['user'] = $user;

        if($request->submit)
        {
            $validated = $request->validate([
                'title'       => 'required',
                'description' => 'required',
                'price'       => 'required',
                'quantity'    => 'required',
                'category_id' => 'required',
            ]);
            if($request->file()) 
            {
                $fileName = time().'-'.$request->image->getClientOriginalName();
                $request->image->move('upload/product/images/', $fileName);
                if(!empty($user->image))
                {
                    unlink(public_path('upload/product/images/'.$user->image));            
                }
                else
                {
                    $user->image = "";
                }
            }
            else
            {
                $fileName = @$user->image;
            }

            $saveArr = array(
                'title'       => $request->title,
                'description' => $request->description,
                'image'       => $fileName,
                'price'       => $request->price,
                'quantity'    => $request->quantity,
                'category_id' => $request->category_id
            );

            DB::table('products')->where('id',$edit_id)->update($saveArr);
            return redirect('/product/view');

        }

        return view('add-product',$array);          
    }


    public function delete_register($delete_id) {

        if(!session('user_id')) {
            return redirect('/login');
        }

        $user = DB::table('register')->where('id',$delete_id)->first();
        // echo "<pre>";
        // print_r($user); die;
        
        if(!empty($user->image))
        {
            unlink(public_path('upload/register/images/'.$user->image));            
        }
        else
        {
            $user->image = "";
        }
        
        DB::table('register')->where('id',$delete_id)->delete();
        return redirect('/register/view');

    }


    public function delete_admin($delete_id) {

        if(!session('user_id')) {
            return redirect('/login');
        }

        $user = DB::table('admins')->where('id',$delete_id)->first();
        // echo "<pre>";
        // print_r($user); die;
        
        if(!empty($user->image))
        {
            unlink(public_path('upload/admin/images/'.$user->image));            
        }
        else
        {
            $user->image = "";
        }
        
        DB::table('admins')->where('id',$delete_id)->delete();
        return redirect('/admin/view');

    }


    public function delete_seller($delete_id) {

        if(!session('user_id')) {
            return redirect('/login');
        }

        $user = DB::table('sellers')->where('id',$delete_id)->first();
        // echo "<pre>";
        // print_r($user); die;
        
        if(!empty($user->image))
        {
            unlink(public_path('upload/seller/images/'.$user->image));            
        }
        else
        {
            $user->image = "";
        }
        
        DB::table('sellers')->where('id',$delete_id)->delete();
        return redirect('/seller/view');
        
    }


    public function delete_brand($delete_id) {

        if(!session('user_id')) {
            return redirect('/login');
        }

        $user = DB::table('brands')->where('id',$delete_id)->first();
        // echo "<pre>";
        // print_r($user); die;
        
        if(!empty($user->image))
        {
            unlink(public_path('upload/brand/images/'.$user->image));            
        }
        else
        {
            $user->image = "";
        }
        
        DB::table('brands')->where('id',$delete_id)->delete();
        return redirect('/brand/view');
        
    }


    public function delete_category($delete_id) {

        if(!session('user_id')) {
            return redirect('/login');
        }

        $user = DB::table('category')->where('id',$delete_id)->first();
        // echo "<pre>";
        // print_r($user); die;
        
        if(!empty($user->image))
        {
            unlink(public_path('upload/category/images/'.$user->image));            
        }
        else
        {
            $user->image = "";
        }
        
        DB::table('category')->where('id',$delete_id)->delete();
        return redirect('/category/view');
        
    }


    public function delete_product($delete_id) {

        if(!session('user_id')) {
            return redirect('/login');
        }

        $user = DB::table('products')->where('id',$delete_id)->first();
        // echo "<pre>";
        // print_r($user); die;
        
        if(!empty($user->image))
        {
            unlink(public_path('upload/product/images/'.$user->image));            
        }
        else
        {
            $user->image = "";
        }
        
        DB::table('products')->where('id',$delete_id)->delete();
        return redirect('/product/view');
        
    }


    public function ajax_update_register_status(Request $request) {

        $arr = array('status'=>$request->status);
        DB::table('register')->where('id',$request->user_id)->update($arr);
        echo "success";
        
    }
    
    
}