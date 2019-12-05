<?php

namespace App\Http\Controllers;

use App\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Rental;
use DateTime;

class PenyewaController extends Controller
{
    public function index(){
        $gedung = Building::all();
        $verif = $gedung->where('verif','=','1');
        $edit = $gedung->where('edit','=',1);

        return view('user.index')
            ->with('verif', $verif)
            ->with('edit', $edit);
    }
    public function DetailGedung($id){
        $detailGedung = Building::find($id);

        return view('user.gedung',['detailGedung'=>$detailGedung]);
    }
    public function sewa(){
        
        $id = Auth::user()->id;
        $sewa = \App\Rental::where('id_loaner',$id)->get()->all();

        foreach ($sewa as $item) {
            # code...
            $tanggal1 = date('m-d-Y', strtotime($item->day_over));
            $tanggal2 = date('m-d-Y', strtotime($item->day_start));
            $datetime1 = new DateTime($item->day_over);
            $datetime2 = new DateTime($item->day_start);
            $selisih = $datetime1->diff($datetime2);
            $hari = $selisih;
        }
        // dd($selisih->days);

        return view('user.cart', compact(['sewa', 'hari']));
    }
}
