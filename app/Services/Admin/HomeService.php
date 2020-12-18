<?php
namespace App\Services\Admin;

use Illuminate\Http\Request;
use App\Models\Motel;
use App\Models\Owner;

class HomeService
{
    //Xử lý logic serve

    public function notification() {
        $datas['accounts'] = Owner::get()->where('status', '0')->count();
        $datas['posts'] = Motel::get()->where('status', '0')->count();

        return $datas;
    }



}
