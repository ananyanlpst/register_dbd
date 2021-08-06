<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ConnectDB extends Model
{
    use HasFactory;

    protected $table = 'register';

    public function checkData($tax_id, $email){
        $count = DB::table($this->table)->where('tax_id', $tax_id)->orWhere('email', $email)->count();
        return $count;
    }

    public function insertData($data){

        $count = $this->checkData($data['tax_id'], $data['email']);

        if($count < 1){
            $result = DB::table($this->table)->insert($data);

            if($result){
                return array(
                    'status' => true,
                    'msg' => 'Insert Successfully!'
                );
            } else {
                return array(
                    'status' => false,
                    'msg' => 'Insert Unsuccessfully.'
                );
            }
        } else {
            return array(
                'status' => false,
                'msg' => 'This system already has an account.'
            );
        }
    }

}
