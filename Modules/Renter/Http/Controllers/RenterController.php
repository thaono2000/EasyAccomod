<?php

namespace Modules\Renter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Motel;
use App\Models\LikeList;
use App\Models\Report;
use App\Models\Image;
use App\Models\Review;
use App\Models\Owner;
use App\Models\Renter;
use Illuminate\Support\Facades\Auth;

class RenterController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('renter::index');
    }

    public function listMotel()
    {
        $motels = Motel::paginate(5);

        return view('renter::list_motel', ['motels' => $motels]);
    }

    public function detailMotel($id)
    {
        $motel = Motel::findOrFail($id);

        return view('renter::detail_motel', ['motel' => $motel]);
    }

    public function likes($id) {
        $check = LikeList::get()->where('motel_id', $id)->where('renter_id', Auth::user()->id);
        if(count($check) == 0){
            LikeList::create(['motel_id' => $id, 'renter_id' => Auth::user()->id]);
        }
    }

    public function dislikes($id) {
        // dd(LikeList::find($id));
        LikeList::find($id)->delete();
    }

    public function likeLists() {
        $likelists = LikeList::paginate(5);
        // $motels = Motel::paginate(5);
        $user = Auth::user();

        return view('renter::list_like', ['user' => $user, 'likelists' => $likelists, 'motel' => Motel::get()]);
    }

    public function report(Request $request, $id) {
        Report::create(['report' => $request->report, 'motel_id' => $id, 'renter_id' => Auth::user()->id]);

        return redirect()->back()->with(['status' => 'Báo cáo vi phạm thành công']);
    }

    public function review(Request $request, $id) {
        Review::create(['motel_id' => $id, 'renter_id' => Auth::user()->id, 'review' => $request->review]);

        return redirect()->back();
    }
    
    public function formInformation() {
        return view('renter::information', ['user' => Auth::user()]);
    }
    public function myMotel() {
        return view('renter::my_motel', ['user' => Auth::user()]);
    }

    public function updateInformation(Request $request, $id) {
        $datas = $request->only('email', 'full_name', 'password');
        Renter::find($id)->update($datas);
        
        return redirect()->back()->with(['status' => 'Thay đổi thông tin thành công']);
    }
}
