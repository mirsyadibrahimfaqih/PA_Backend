<?php

namespace App\Http\Controllers;
use App\Exports\ExportBuku;
use App\Models\Jabatan;
use App\Models\Tamu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class Buku_tamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_buku = DB::table('buku_tamu')
        ->join('jabatan', 'jabatan.id', '=', 'buku_tamu.jabatan_id')
          ->join('tamu', 'tamu.id', '=', 'buku_tamu.tamu_id')
       ->select('buku_tamu.*', 'jabatan.nama AS jbtn', 'tamu.nama AS pen')
       
       ->get();
     return view('buku.index',compact('ar_buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ar_jabatan = Jabatan::all();
        $ar_tamu = Tamu::all();

        return view('buku.form', compact('ar_jabatan', 'ar_tamu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('buku_tamu')->insert([
            'tgl_bertamu' => $request->tgl_bertamu,
            'tamu_id' => $request->tamu_id,
            'jabatan_id' => $request->jabatan_id,
            'keperluan' => $request->keperluan
      ]
  );

      // Redirect ke halaman utama
      return redirect('/buku_tamu');
  }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
  $buku = DB::table('buku_tamu')
  ->join('jabatan', 'jabatan.id', '=', 'buku_tamu.jabatan_id')
  ->join('tamu', 'tamu.id', '=', 'buku_tamu.tamu_id')
  ->select('buku_tamu.*', 'jabatan.nama AS jbtn', 'tamu.nama AS pen')
  ->where('buku_tamu.id','=', $id)->get();
  return view('buku.show',compact('buku'));
      }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
                $buku = DB::table('buku_tamu')->where('id', '=', $id)->get();
                $ar_jabatan = Jabatan::all();
                $ar_tamu = Tamu::all();
                return view('buku.edit', compact('buku', 'ar_jabatan', 'ar_tamu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       DB::table('buku_tamu')->where('id', $id)->update([
       'tgl_bertamu' => $request->tgl_bertamu,
       'tamu_id' => $request->tamu_id,
       'jabatan_id' => $request->jabatan_id,
       'keperluan' => $request->keperluan,
       ]);
       return redirect('/buku_tamu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
DB::table('buku_tamu')->where('id',$id)->delete();
return redirect('/buku_tamu');

    }
    public function bukuPDF()
    {
        $ar_buku = DB::table('buku_tamu')
        ->join('jabatan', 'jabatan.id', '=', 'buku_tamu.jabatan_id')
          ->join('tamu', 'tamu.id', '=', 'buku_tamu.tamu_id')
       ->select('buku_tamu.*', 'jabatan.nama AS jbtn', 'tamu.nama AS pen')->get();
         $pdf = PDF::loadView('buku.pdf',['ar_buku'=>$ar_buku]);
       return $pdf->download('dataBuku.pdf');
 
    }

    public function export_excel(){
        return Excel::download(new ExportBuku, "buku.xlsx");
    }
}