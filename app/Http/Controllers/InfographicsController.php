<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfographicRequest;
use Illuminate\Http\Request;
use App\Models\Infographic;

class InfographicsController extends Controller
{
    public function index()
    {

        $infographics = Infographic::latest()->get();

        return view('infographics.index', compact('infographics'));
    }


    public function create()
    {
        return view('infographics.create');
    }


    public function store(InfographicRequest $request)
    {
        $picture = $request->file('picture');
        $filename = date('YmdHi'). $picture->getClientOriginalName();
        $pictureUrl = $picture->storeAs('infographic', $filename);

        $request->merge(['picture_url' => $pictureUrl]);

        Infographic::create($request->all());

        return redirect()->route('infographic.index')->with('message.flash', __('Berhasil menambahkan infografis baru'));
    }


    public function destroy(int $id)
    {
        $infographic = Infographic::findOrFail($id);
        $infographic->delete();

        return redirect()->route('infographics.index')->with('message.flash', 'Berhasil hapus infografis');
    }
}
