<?php

namespace App\Http\Controllers;

use App\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Payment;
use PDF;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Sewa = Payment::all();
        return view('owner.penyewa', compact('Sewa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $user = Auth::user()->id;
        DB::table('rentals')->insert([
            'id_building'=>$request->id,
            'day_start'=>$request->day_start,
            'day_over'=>$request->day_over,
            'id_loaner'=>$user,
        ]);

        $id = Auth::user()->id;
        $sewa = \App\Rental::all()->where('id_loaner','=',$id);


        return view('user.cart')->with('sewa', $sewa);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rental::find($id)->delete();
        return redirect('/sewa')->with('status', 'Data Gedung Berhasil di hapus');
    }

    public function bayar($id)
    {
        $data = Rental::findOrFail($id);
        // dd($data);

        return view('user.bayar', compact('data'));
    }

    public function post_bayar(Request $request)
    {
        // dd($request->all());
        $data = new \App\Payment;
        $data->id_rental = $request->id;
        $data->day_payment = date('m-d-Y');
        $data->salary = $request->bayar;

        $image = $request->file('bukti_tf');
        if ($image) {
            $image_path = $image->store('bukti_tf', 'public');
            $data->bukti_tf = $image_path;
        }
        $data->approvement = 'proses';
        $data->save();
        
        return redirect('/');
    }

    public function indexcheckout()
    {
        //
        $checkout = DB::table('payments')
        ->join('rentals', 'rentals.id','=','payments.id_rental')
        ->join('buildings', 'buildings.id','=','rentals.id_building')
        ->get();

        return view('user/checkout', compact('checkout'));
    }

    public function verifbayar(Request $request, $id)
    {

        $penyewa = DB::table('payments')
                ->where('id_rental', $id )
                ->update([
                    'approvement' => 'verifikasi'
                    ]);
        return redirect()->back();

    }

    public function cetak($id)
    {
        //
        $checkout = DB::table('payments')
                    ->join('rentals', 'rentals.id','=','payments.id_rental')
                    ->join('buildings', 'buildings.id','=','rentals.id_building')
                    ->join('users', 'rentals.id_loaner','=','users.id')
                    ->where('id_rental', $id )
                    ->get();

        $pdf = PDF::loadview('masyarakat/pdf', compact('checkout'));
        return $pdf->stream();
        // dd($checkout);
    }
}
