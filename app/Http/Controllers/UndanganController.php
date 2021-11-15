<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Undangan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportUndangan;

class UndanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $undangan = Undangan::orderby('created_at', 'desc')->get();
        $undangan = Undangan::where('status', '=', '0')->orderby('created_at', 'desc')->get();
        return view('front.undangan.index', compact('undangan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.undangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'nama' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'kategori' => 'required',
        ]);
        $form_data = array(

            'nama' =>  $request->nama,
            'jabatan' =>  $request->jabatan,
            'alamat' =>  $request->alamat,
            'kategori' =>  $request->kategori,

        );

        // dd($form_data);
        Undangan::create($form_data);

        return redirect()->route('undangan.index')->with('success','Data Tamu berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $undangan = Undangan::orderBy('created_at', 'desc')->paginate(5);
        // return view('front.undangan.show', compact('undangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $undangan = Undangan::findorfail($id);
        return view('front.undangan.edit', compact('undangan'));
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
        $this->validate($request, [
            'nama' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'kategori' => 'required',
        ]);

        $undangan_data = [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'kategori' => $request->kategori,
        ];

        Undangan::whereId($id)->update($undangan_data);

        return redirect()->route('undangan.index')->with('success','Data Tamu Berhasil di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $undangan = Undangan::findorfail($id);
        $undangan->delete();

        return redirect()->back()->with('success','Data Tamu Berhasil Dihapus');
    }

    public function hadir()
    {
        $undangan = Undangan::where('status', '=', '1')->orderby('created_at', 'desc')->get();
        return \view('front.undangan.hadir', \compact('undangan'));

        // return view('admin/draft', compact('data'));
    }

    public function status($id){
        $undangan = DB::table('undangans')->where('id',$id)->first();
        $status_sekarang = $undangan->status;

        if($status_sekarang ==1){
            DB::table('undangans')->where('id',$id)->update([
                'status'=>0
            ]);
        }else{
            DB::table('undangans')->where('id',$id)->update([
                'status'=>1
            ]);
        }
        return redirect()->back()->with('success','Draft Berhasil diubah');
    }

    public function exportundangan()
    {
        // $batches =Batch::orderBy('id', 'DESC')->get();
        // return Excel::download(new ExportUndangan, 'undangan.xlsx');
        // return (new BantuansExport)->download('bansos-'.time().'.xlsx');
    }
}
