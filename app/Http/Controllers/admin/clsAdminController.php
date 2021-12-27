<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin\Admin;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Cookie;

class clsAdminController extends Controller
{
    public function AdminLogin()
    {
        /*$password = '12344321';
        $password = $password.PassKey;
        echo $password = Hash::make($password);
        die;*/

        if(Session::has('SystemAdminSession'))
        {
            return redirect('adminpanel')->with('response', 'Please Login again..!');
        }
        return view('admin_panel.login');
    }

    public function AdminDashboard()
    {
        return view('admin_panel.index');
    }

    public function AdminLoginProcess(Request $request)
    {
        try
        {
            global $dNow;
            global $DBConnection;

            $DBConnection->beginTransaction();

            $dTempPassword = "";

            $sUserName 	 = $request->input('uname');
            $sPassword 	 = $request->input('password');

            $sTime = time() + 60 * 60 * 24 * 365;

            $validatedData = array(
                'uname' => 'required|regex:/^[a-zA-Z]+$/u|max:255|min:4',
                'password' => 'required|max:255|min:8'
            );

            $validator = Validator::make($request->all(), $validatedData);

            if($validator->fails())
            {
                throw new \Exception('WrongCredentials');
            }

            $dTempPassword = $sPassword.PassKey;

            $aCheckUser = admin::SELECT("user_name", "user_password")
                ->where("user_name", $sUserName)
                ->where("status", 1)->first();

            if( ! empty($aCheckUser))
            {
                $sUserName 		= $aCheckUser->user_name;
                $hashedPassword = $aCheckUser->user_password;

                if (Hash::check($dTempPassword, $hashedPassword)){

                    ////****************SetUserInfoCookie*********************///
                    /**/$sEncryptedUName = Crypt::encryptString($sUserName); /**/
                    ///******SetUserInfoCookie*******************************///

                    //****************StoreUserInfoIntoSession*************//
                    \session(['SystemAdminSession' => $sEncryptedUName]);
                    //****************StoreUserInfoIntoSession*************//

                    return redirect('adminpanel')->with('response', 'Logged in successfully..!');

                }
                else
                    throw new \Exception('WrongCredentials');

            }else
            {
                throw new \Exception('WrongCredentials');
            }

            $DBConnection->commit();


        }catch(\Exception $exception)
        {
            $sMessage = $exception->getMessage();
            $DBConnection->rollBack();

            if($sMessage == "WrongCredentials")
                return Redirect::back()->with('response', 'Incorrect Credentials..!');
            else
                return Redirect::back()->with('response', 'Incorrect Credentials..!');
        }
    }
    public function Logout()
    {
        \Session::forget('SystemAdminSession');
        \Cookie::queue(Cookie::forget('SystemAdminCookie'));
        Session::flush();
        Session::save();
        return redirect('/adminlogin')->with('response', 'Logout successfully..!');
    }
}
