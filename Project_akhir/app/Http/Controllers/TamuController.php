<?php

namespace App\Http\Controllers;

use App\Exports\ExportTamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_tamu = DB::table('tamu') 
             ->select('tamu.*', 'tamu.nama AS nama')->get();
           return view('tamu.index',compact('ar_tamu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tamu.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('tamu')->insert([
            'nama' => $request->nama,
            'gender' => $request->gender,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
      ]
  );


      return redirect('/tamu');
  }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tamu = DB::table('tamu')
->where('tamu.id','=', $id)->get();
return view('tamu.show',compact('tamu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
         $tamu = DB::table('tamu')->where('id', '=', $id)->get();
        return view('tamu.edit', compact('tamu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       DB::table('tamu')->where('id', $id)->update([
       'nama' => $request->nama,
       'gender' => $request->gender,
       'no_hp' => $request->no_hp,
       'alamat' => $request->alamat,
       ]);
       return redirect('/tamu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
DB::table('tamu')->where('id',$id)->delete();
return redirect('/tamu');

    }

    public function tamuPDF()
    {
        $ar_tamu = DB::table('tamu') 
        ->select('tamu.*', 'tamu.nama AS nama')->get();
         $pdf = PDF::loadView('tamu.pdf',['ar_tamu'=>$ar_tamu]);
       return $pdf->download('datatamu.pdf');
 
    }
    public function export_excel(){
        return Excel::download(new ExportTamu, "tamu.xlsx");
    }
}
