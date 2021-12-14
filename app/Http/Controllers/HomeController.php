<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\SurveyMaster;
use App\SurveyResult;

class HomeController extends Controller
{
    public function index()
    {
       return view('survey.landing_survey');
    }

    public function createSurvey(Request $request)
    {
        $rules = [
            'nd_internet'                    => 'required',
            'nama_pelanggan'                 => 'required',
            'nomor_hp_pelanggan'             => 'required',
            'prosedur_pemasangan_kompetitor' => 'required',
            'tarif_bulanan_kompetitor'       => 'required',
            'jalur_psb_kompetitor'           => 'required',
            'alasan_cabut_indihome'          => 'required',
            'alasan_langganan_indihome'      => 'required',
            'attachment'                     => 'required',
            'bersedia_winback'               => 'required'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return redirect('/survey#survey')->withErrors($isValid->errors());
        }else{
            $getWitel = SurveyMaster::where('nd_internet',$request->input('nd_internet'))->first();
            if($request->has('attachment')){
                $f = $request->file('attachment');
                $name = Str::random(10).$f->getClientOriginalName();
                $f->move(public_path('/assets/uploads'),$name);
            }else{
                $name = 'UPLOAD FILE';
            }
                
            
            $data = [
                'nd_internet'                    => $request->input('nd_internet'),
                'nama_pelanggan'                 => $request->input('nama_pelanggan'),
                'nomor_hp_pelanggan'             => $request->input('nomor_hp_pelanggan'),
                'prosedur_pemasangan_kompetitor' => $request->input('prosedur_pemasangan_kompetitor'),
                'tarif_bulanan_kompetitor'       => $request->input('tarif_bulanan_kompetitor'),
                'jalur_psb_kompetitor'           => $request->input('jalur_psb_kompetitor'),
                'alasan_cabut_indihome'          => $request->input('alasan_cabut_indihome'),
                'alasan_langganan_indihome'      => $request->input('alasan_langganan_indihome'),
                'cwitel'                         => $getWitel->cwitel,
                'attachment'                     => $name,
                'bersedia_winback'               => $request->input('bersedia_winback'),
                'paket_winback'                  => $request->input('paket_winback')
            ];

            $insert = SurveyHasil::insert($data);

            if($insert){
                return redirect()->back()->with('success','Survery berhasil ditambahkan!');
            }else{
                return redirect()->back()->with('error','Gagal menambahkan survey, silahkan coba lagi.');
            }
        }
    }

    public function getData($nd_internet)
    {
        $query = SurveyMaster::where('nd_internet',$nd_internet)->first();
        return response()->json($query);
    }
}
