<?php
namespace App\Services\Admin;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Owner;

class AccountService
{
    //Xử lý logic serve

    public function successListAccount() {
    	return Owner::where('status','=','1')->paginate(8);
    }

    public function waitListAccount() {
    	return  Owner::where('status','=','0')->paginate(8);
    }

    public function approvalAccount($id) {
    	return Owner::find($id)->update(['status' => '1']);
    }



}
