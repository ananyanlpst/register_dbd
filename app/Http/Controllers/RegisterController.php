<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ConnectDB;

class RegisterController extends Controller
{
    protected $ConnectDB;

    public function __construct(){
        $this->ConnectDB = new ConnectDB();
    }

    public function register(Request $request){
        extract($request->all());
        $data = array(
            'company' => $input_company,
            'tax_id' => $input_taxid,
            'firstname' => $input_firstname,
            'lastname' => $input_lastname,
            'email' => $input_email,
            'telephone' => $input_telephone,
            'province' => $input_province,
            'username' => $input_username,
            // 'password' => $input_password,
            'password' => Hash::make($input_password)
        );

        $result = $this->ConnectDB->insertData($data);
        
        if($result['status']){
            return redirect()->back()->with('res', $result);
        } else {
            return redirect()->back()->withInput()->with('res', $result);
        }
    }
}
