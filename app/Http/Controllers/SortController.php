<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SortController extends Controller
{
    public function sort()
    {
        $gedung = \App\Building::all();

        foreach ($gedung as $gedung) {

            //Harga
            if ($gedung->cost <= 500000) {  //sangat murah
                $c1 = 0.2;
            } elseif ($gedung->cost <= 1500000) {  //murah
                $c1 = 0.4;
            } elseif ($gedung->cost <= 3000000) {  //cukup murah
                $c1 = 0.6;
            } elseif ($gedung->cost <= 4500000) {  //mahal
                $c1 = 0.8;
            } else {   //sangat mahal
                $c1 = 1;
            }

            //kapasitas
            if ($gedung->capacity <= 150) {  //sangat kecil
                $c2 = 0.2;
            } elseif ($gedung->capacity <= 300) { //kecil
                $c2 = 0.4;
            } elseif ($gedung->capacity <= 450) { //sedang
                $c2 = 0.6;
            } elseif ($gedung->capacity <= 600) { //besar
                $c2 = 0.8;
            } else {  //sangat besar
                $c2 = 1;
            }

            //fasilitas
            $fx = 0;
            $fasilitas = array("$gedung->ac", "$gedung->proyektor", "$gedung->toilet", "$gedung->rganti", "$gedung->parking", "$gedung->musholla", "$gedung->podium");
            for ($i = 0; $i < 7; $i++) {
                if ($fasilitas[$i] == 0) {
                    $fx = 1 + $fx;
                } else {
                    $fx = 0 + $fx;
                }
            }
            if ($fx <= 1) {
                $c3 = 0.2;
            } elseif ($fx <= 3) {
                $c3 = 0.4;
            } elseif ($fx <= 4) {
                $c3 = 0.6;
            } elseif ($fx <= 6) {
                $c3 = 0.8;
            } else {
                $c3 = 1;
            }

            //lokasi
            if ($gedung->capacity == "sangat tidak strategis") {  //sangat kecil
                $c4 = 0.2;
            } elseif ($gedung->capacity == "tidak strategis") { //kecil
                $c4 = 0.4;
            } elseif ($gedung->capacity == "cukup strategis") { //sedang
                $c4 = 0.6;
            } elseif ($gedung->capacity == "strategis") { //besar
                $c4 = 0.8;
            } else {  //sangat besar
                $c4 = 1;
            }
        }
    }

    public function cost()
    {
        $Xij =array_sum();
        $minxij = array_sum();
        $Rij = $minxij/$Xij;
    }

    public function benefit(){
        $Xij =array_sum() ;
        $maxxij = array_sum();
        $Rij = $maxxij/$Xij;
    }

    public function total(){

    }
}
