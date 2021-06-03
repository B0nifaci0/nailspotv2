<?php

namespace App\Http\Controllers\Admin;

use App\Models\Nosotros;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class NosotroController extends Controller
{

    public function index()
    {   
        $nosotros = Nosotros::latest('id')->get()->take(1);
        
        return view('admin.nosotros.index',compact('nosotros'));
    }

    public function create()
    {
        return view('admin.nosotros.create');
    }

    public function store(Request $request)
    {
        //return $request;
        $request->validate([
            'about_us' => 'required',
            'vision' => 'required',
            'mision' => 'required',
            'valors' => 'required', 
            'what_do' => 'required',
            'how_do' => 'required', 
            'own_expert' => 'required',
            'exp_nailspot' => 'required',
            'cargo_yohana' => 'required',
            'cargo_renato' => 'required',
            'cargo_aron' => 'required',
            'oficio_yohana' => 'required',
            'oficio_renato' => 'required',
            'oficio_aron' => 'required',
            'pasatiempo_yohana' => 'required',
            'pasatiempo_renato' => 'required',
            'pasatiempo_aron' => 'required',
            'video_identify' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'],
            'video_exp_users' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'],
            'video_exp_judge' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'],

        ]);
        
        $url_identify = explode('=', $request->video_identify);
        $url_identify = $url_identify[1];
        //return $url_identify;

        $url_exp_users = explode('=', $request->video_exp_users);
        $url_exp_users = $url_exp_users[1];
        //return $url_exp_users;

        $url_exp_judge = explode('=', $request->video_exp_judge);
        $url_exp_judge = $url_exp_judge[1];
        //return $url_exp_judge;
        

        $data['about_us'] = $request->about_us;
        $data['vision'] = $request->vision;
        $data['mision'] = $request->mision;
        $data['valors'] = $request->valors;
        $data['what_do'] = $request->what_do;
        $data['how_do'] = $request->how_do;
        $data['own_expert'] = $request->own_expert;
        $data['exp_nailspot'] = $request->exp_nailspot;
        $data['oficio_yohana'] = $request->oficio_yohana;
        $data['cargo_yohana'] = $request->cargo_yohana;
        $data['pasatiempo_yohana'] = $request->pasatiempo_yohana;
        $data['cargo_renato'] = $request->cargo_renato;
        $data['oficio_renato'] = $request->oficio_renato;
        $data['pasatiempo_renato'] = $request->pasatiempo_renato;
        $data['cargo_aron'] = $request->cargo_aron;
        $data['oficio_aron'] = $request->oficio_aron;
        $data['pasatiempo_aron'] = $request->pasatiempo_aron;
        $data['video_identify'] = $url_identify;
        $data['video_exp_users'] = $url_exp_users;
        $data['video_exp_judge'] = $url_exp_judge;
  
        
        $nosotros = Nosotros::create($data);

        $nosotros->save();


        return redirect()->route('admin.nosotros.index')->with('info', 'La informacion se creo con exito!');
    }

    public function edit($id)
    {   
        $nosotros = Nosotros::findOrFail($id);
        return view('admin.nosotros.edit', compact('nosotros'));
    }

    public function update(Request $request, $id)
    {
        //return $request;
        $nosotros = Nosotros::findOrFail($id);

        $request->validate([
            'about_us' => 'required',
            'vision' => 'required',
            'mision' => 'required',
            'valors' => 'required', 
            'what_do' => 'required',
            'how_do' => 'required', 
            'own_expert' => 'required',
            'exp_nailspot' => 'required',
            'cargo_yohana' => 'required',
            'cargo_renato' => 'required',
            'cargo_aron' => 'required',
            'oficio_yohana' => 'required',
            'oficio_renato' => 'required',
            'oficio_aron' => 'required',
            'pasatiempo_yohana' => 'required',
            'pasatiempo_renato' => 'required',
            'video_identify' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'],
            'video_exp_users' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'],
            'video_exp_judge' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'],
        ]);
        
        //configuracion par aque se vean los videos. 
        $url_identify = explode('=', $request->video_identify);
        $url_identify = $url_identify[1];
        //return $url_identify;

        $url_exp_users = explode('=', $request->video_exp_users);
        $url_exp_users = $url_exp_users[1];
        //return $url_exp_users;

        $url_exp_judge = explode('=', $request->video_exp_judge);
        $url_exp_judge = $url_exp_judge[1];
        //return $url_exp_judge;
        //termina configuracion

        $nosotros->about_us = $request->about_us;
        $nosotros->vision = $request->vision;
        $nosotros->mision = $request->mision;
        $nosotros->valors = $request->valors;
        $nosotros->what_do = $request->what_do;
        $nosotros->how_do = $request->how_do;
        $nosotros->own_expert = $request->own_expert;
        $nosotros->exp_nailspot = $request->exp_nailspot;
        $nosotros->oficio_yohana = $request->oficio_yohana;
        $nosotros->cargo_yohana = $request->cargo_yohana;
        $nosotros->pasatiempo_yohana = $request->pasatiempo_yohana;
        $nosotros->oficio_renato = $request->oficio_renato;
        $nosotros->cargo_renato = $request->cargo_renato;
        $nosotros->pasatiempo_renato = $request->pasatiempo_renato;
        $nosotros->cargo_aron = $request->cargo_aron;
        $nosotros->oficio_aron = $request->oficio_aron;
        $nosotros->pasatiempo_aron = $request->pasatiempo_aron;
        $nosotros->video_identify = $url_identify;
        $nosotros->video_exp_users = $url_exp_users;
        $nosotros->video_exp_judge = $url_exp_judge;

        $nosotros->save();
        return redirect()->route('admin.nosotros.index', $nosotros)->with('info', 'La información de nosotros se actualizo con exito!');
    }

    public function destroy( $id)
    {
        $nosotros = Nosotros::destroy($id);
        return redirect()->route('admin.nosotros.index', compact('nosotros'))->with('info', 'La informacion de nosotros se elimino con exito!');
    }


}
