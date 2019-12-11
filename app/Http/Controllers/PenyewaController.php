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
        // dd($sewa);
        return view('user.cart', compact(['sewa']));
    }
}
