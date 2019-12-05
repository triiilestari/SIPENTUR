<?php

namespace App\Http\Controllers;

use App\Building;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Auth;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gedung = Building::all();
        if (Auth::user()->id_role == 2) {
            return view('owner.indexgedung', compact('gedung'));
        } else if (Auth::user()->id_role == 1) {
            return view('admin.indexgedung', compact('gedung'));
        } else if (Auth::user()->id_role == 3) {
            return view('masyarakat.indexsewa', compact('gedung'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('owner.creategedung');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);


        $request->validate([
            'building_file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        // dd($request); 
        //cari inputan file dari form
        $file = $request->file('building_file');
        // dd($file);
        // nama folder di public
        $folder = 'file';

        // nama file yang disimpan ke folder public
        $file_foto = time() . "_" . $file->getClientOriginalName();

        // pindah file dari form ke folder laravel
        $file->move($folder, $file_foto);



        Building::create([
            'id_owner' => Auth::id(),
            'name_building' => $request->building_name,
            'address_building' => $request->building_address,
            'cost' => $request->building_cost,
            'capacity' => $request->building_capacity,
            'ac' => $request->has('ac') ? '1' : '0',
            'proyektor' => $request->has('proyektor') ? '1' : '0',
            'musholla' => $request->has('musholla') ? '1' : '0',
            'podium' => $request->has('podium') ? '1' : '0',
            'parking' => $request->has('parking') ? '1' : '0',
            'toilet' => $request->has('toilet') ? '1' : '0',
            'rganti' => $request->has('rganti') ? '1' : '0',
            'description' => $request->building_description,
            'files' => $file_foto
        ]);

        // Gedung::create([
        // 'id_owner' => Auth::id(),
        // 'NamaGedung' => $request->NamaGedung,
        // 'AlamatGedung' => $request->AlamatGedung,
        // 'Biaya' => $request->Biaya,
        // 'Kapasitas' => $request->Kapasitas,
        // 'Keterangan' => $request->Keterangan,
        // 'File' => $file_foto,
        // 'Kriteria' => !empty($request->Kriteria) ? $request->Kriteria : "Sedang" ,
        // 'Verifikasi' => !empty($request->Verifikasi) ? $request->Verifikasi : false
        // ]);


        return redirect()->back()->with('status', 'Data Gedung Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gedung $gedung)
    {
        //
        if (Auth::user()->hasAnyRole('owner')) {
            return view('owner.showgedung', ['gedung' => $gedung]);
        } else if (Auth::user()->hasAnyRole('admin')) {
            return view('admin.showgedung', ['gedung' => $gedung]);
        } else if (Auth::user()->hasAnyRole('masyarakat')) {
            return view('masyarakat.showgedung', ['gedung' => $gedung]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function adminverif(Building $gedung)
    {
        $gedung->update([
            'verif' => 1,
            'submission' => 0
        ]);

        return redirect()->back();
    }

    public function adminverifedit(Building $gedung)
    {

        $gedung->update([
            'submission' => 0,
            'verif' => 0,
            'edit' => 1
        ]);

        return redirect()->back();
    }

    public function edit(Building $gedung)
    {
        $gedung->update([
            'verif' => 0,
            'submission' => 0,
            'edit' => 0
        ]);
        // dd($gedung);
        return redirect()->back();
    }

    public function verification()
    {
        
        return view('admin.showgedung', compact('gedung'));
    }

    public function verificationedit()
    {
        
        return view('admin.showgedung', compact('gedung'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $gedung)
    {
        //

        // return view('admin.showgedung', ['gedung'=> $request]);
        // if (Auth::user()->hasAnyRole('owner')){
        //     return view('owner.indexgedung', ['gedung'=> $gedung]);
        // }
        // else if (Auth::user()->hasAnyRole('admin')){
        //     return view('admin.indexgedung', ['gedung'=> $gedung]);

        // dd($request);

        if (
            $request->building_name == $gedung->name_building &&
            $request->building_address == $gedung->address_building &&
            $request->building_cost == $gedung->cost &&
            $request->building_capacity == $gedung->capacity &&
            $request->building_description == $gedung->description &&
            $request->building_file == null &&
            $request->ac == null &&
            $request->proyektor == null &&
            $request->podium == null &&
            $request->rganti == null &&
            $request->musholla == null &&
            $request->parking == null &&
            $request->toilet == null 
        ) {
            return redirect()->back()->with('stay', 'Data Gedung Tidak ada yang di ubah');
        } else {
            if ($request->building_file) {
                $request->validate([
                    'building_file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
                ]);

                //cari inputan file dari form
                $file = $request->file('building_file');

                // nama folder di public
                $folder = 'file';

                // nama file yang disimpan ke folder public
                $file_foto = time() . "_" . $file->getClientOriginalName();

                // pindah file dari form ke folder laravel
                $file->move($folder, $file_foto);
                $gedung->update([
                    'name_building' => $request->building_name,
                    'address_building' => $request->building_address,
                    'cost' => $request->building_cost,
                    'capacity' => $request->building_capacity,
                    'description' => $request->building_description,
                    'files' => $request->building_file,
                    'proyektor' => $request->has('proyektor') ? '1' : '0',
                    'musholla' => $request->has('musholla') ? '1' : '0',
                    'podium' => $request->has('podium') ? '1' : '0',
                    'parking' => $request->has('parking') ? '1' : '0',
                    'toilet' => $request->has('toilet') ? '1' : '0',
                    'rganti' => $request->has('rganti') ? '1' : '0',
                    'verif' => 1,
                    'edit' => 0

                ]);
            } else {
                $gedung->update([
                    'name_building' => $request->building_name,
                    'address_building' => $request->building_address,
                    'cost' => $request->building_cost,
                    'capacity' => $request->building_capacity,
                    'description' => $request->building_description,
                    'proyektor' => $request->has('proyektor') ? '1' : '0',
                    'musholla' => $request->has('musholla') ? '1' : '0',
                    'podium' => $request->has('podium') ? '1' : '0',
                    'parking' => $request->has('parking') ? '1' : '0',
                    'toilet' => $request->has('toilet') ? '1' : '0',
                    'rganti' => $request->has('rganti') ? '1' : '0',
                    'verif' => 1,
                    'edit' => 0
                ]);
            }

            return redirect()->back()->with('status', 'Data Gedung Berhasil di ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gedung $gedung)
    {
        //
        Gedung::destroy($gedung->id);
        return redirect('owner.indexgedung')->with('status', 'Data Gedung Berhasil di hapus');
    }
}
