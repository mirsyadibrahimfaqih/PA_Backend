<?php

namespace App\Http\Controllers;
use App\Exports\ExportJabatan;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_jabatan = DB::table('jabatan')
             ->select('jabatan.*', 'jabatan.nama AS nama')->get();
           return view('jabatan.index',compact('ar_jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jabatan.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('jabatan')->insert([
            'nama' => $request->nama,
      ]
  );

      return redirect('/jabatan');
  }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $jabatan = DB::table('jabatan')
->where('jabatan.id','=', $id)->get();
return view('jabatan.show',compact('jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
                
         $jabatan = DB::table('jabatan')->where('id', '=', $id)->get();
        return view('jabatan.edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       DB::table('jabatan')->where('id', $id)->update([
       'nama' => $request->nama,
       ]);
       return redirect('/jabatan');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
DB::table('jabatan')->where('id',$id)->delete();
return redirect('/jabatan');

    }

    public function jabatanPDF()
    {
        $ar_jabatan = DB::table('jabatan') 
        ->select('jabatan.*', 'jabatan.nama AS nama')->get();
         $pdf = PDF::loadView('jabatan.pdf',['ar_jabatan'=>$ar_jabatan]);
       return $pdf->download('datajabatan.pdf');
 
    }
    public function export_excel(){
        return Excel::download(new ExportJabatan, "jabatan.xlsx");
    }
}
