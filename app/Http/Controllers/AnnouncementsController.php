<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class AnnouncementsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $announcements = Announcement::latest()->when(Str::of($keyword)->isNotEmpty(), fn (Builder $builder) => $builder->where('title', 'like', "%{$keyword}%") )->get();

        return view('announcements.index', compact('announcements'));
    }


    public function create()
    {
        return view('announcements.create');
    }


    public function store(AnnouncementRequest $request)
    {
        $slug = Str::of($request->slug)->slug();
        $request->merge(['slug' => $slug]);
        Announcement::create($request->all());

        return redirect()->route('announcement.index')->with('message.flash', __('Berhasil menambahkan pengumuman baru'));
    }


    public function edit(AnnouncementRequest $request, string $slug)
    {
        $announcement = Announcement::findSlug($slug)->first();

        abort_if(is_null($announcement), 404);


        return view('announcements.edit', compact('announcement'));
    }


    public function update(AnnouncementRequest $request, string $slug)
    {
        $announcement = Announcement::findSlug($slug);

        abort_if(is_null($announcement), 404);

        $slug = Str::of($request->slug)->slug();
        $request->merge(['slug' => $slug]);
        $announcement->update($request->all());

        return redirect()->route('announcement.index')->with('message.flash', 'Berhasil simpan perubahan pengumuman');
    }


    public function destroy(int $id)
    {
        $infographic = Announcement::findOrFail($id);
        $infographic->delete();

        return redirect()->route('announcement.index')->with('message.flash', 'Berhasil hapus pengumuman');
    }
}
