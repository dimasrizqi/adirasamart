<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Session;
use Carbon\Carbon;


class amController extends Controller
{
    public function index(){
        $jumlahtemuan = DB::table('gmp_temuan')->count();
        $datatemuan = DB::table('gmp_temuan')->where('status',0)->where('id_user',session()->get('id_user'))->orderBy('created_at','DESC')->Paginate(8);
        return view('gmp_temuan.index',[
            'datatemuan'=>$datatemuan,
            ],compact('jumlahtemuan'));
    }
    
    public function print(Request $request){
       
    }

    public function create(){
        return view('gmp_temuan.create');
       
    }
    
   
   public function store(Request $request){
       $request->validate([
            'filename' => 'required',
            'filename.*' => 'mimes:jpg,jpeg,png|max:10000'
        ]);
        if ($request->hasfile('filename')) { 
            $files = [];
            foreach ($request->file('filename') as $file) {
                if ($file->isValid()) {
                    $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$file->getClientOriginalName());
                    $file->move(public_path('images'), $filename);                    
                    $files[] = [
                        'id_user' => session()->get('id_user'),
                        'filename' => $filename,
                        'status' => 0,
                        'description' => $request->deskripsi,
                    ];
                }
            }
           DB::table('gmp_temuan')->insert( $files);         
           return redirect()->route('gmptemuan.index');
       
        }else{
            echo'Gagal';
        }
   }
    
    
    public function update(Request $request,  $id)
    {
    $data_insert[] = array(
    'id_user' => session()->get('id_user'),
    'nama_link' =>  $request->nama_link,
    'shortlink' =>  $shortlink,
    'url_asli' =>  $request->url_asli
    );
    
    }
    
    
    
    public function edit(Request $request,$id)
    {
        $datashortlink = DB::table('shortlink')->where('shortlink',$id)->first();
        $host = $request->getSchemeAndHttpHost(); 
        
        return view('shortlink.edit',[
            'datashortlink'=>$datashortlink,
            'host'=>$host
            ]);
    }
    public function destroy($id)

    {
        DB::table('shortlink')->where('id','=', $id)->delete();
        
        return redirect()->route('shortlink.index') -> with('deleted','berhasil menghapus');
    }
    
    public function shortlink($shortlink){
        
        $datashortlink = DB::table('shortlink')->where('shortlink',$shortlink)->first();
        if ($datashortlink === null){
           echo('url tidak ditemukan');
        }else{
        return redirect($datashortlink->url_asli);
        }
       
   }
    
}
