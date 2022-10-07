<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Alert;
use App\Models\UsersModel;

class AuthenticationController extends Controller
{
    public function loginPage(Request $request)
    {
        $alert = $request->session()->get('alert');
        $alertSuccess = $request->session()->get('alertSuccess');
        $alertInfo = $request->session()->get('alertInfo');
        if($alertSuccess){
            $showalert = Alert::alertSuccess($alertSuccess);
        }else if($alertInfo){
            $showalert = Alert::alertinfo($alertInfo);
        }else{
            $showalert = Alert::alertDanger($alert);
        }

        $passing = array(
            'alert' => $showalert,
        );

        return view('auth.login', $passing);
    }

    public function loginProcess(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $data = UsersModel::checkEmail($email);

        if($data){
            $pass = $data->password;
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = array(
                    'userId' => $data->userId,
                    'username' => $data->username,
                    'role_id' => $data->role_id,
                    'role_name' => $data->role_name,
                    'kelompok_id' => $data->kelompok_id,
                    'email' => $data->email,
                    'isLogin' => TRUE
				);
                $request->session()->put($ses_data);
                return redirect('dashboard');
            }else{
                return redirect()->back()->with('alert', 'Wrong Password');
            }
        }else{
            return redirect()->back()->with('alert', 'Email Not Found');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}
