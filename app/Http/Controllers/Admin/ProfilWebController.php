<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilWebController extends Controller
{
    public function index()
    {
        $profil = ProfilWeb::first();
        return view('admin.profil-web.index', compact('profil'));
    }

    public function store(Request $request)
    {
        ProfilWeb::create($request->all());
        return redirect()->back()->with('success','Profil website dibuat');
    }

    public function update(Request $request, $id)
    {
        ProfilWeb::findOrFail($id)->update($request->all());
        return redirect()->back()->with('success','Profil website diperbarui');
    }
}