<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use App\Models\Post;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $posts = Post::latest()->when(Str::of($keyword)->isNotEmpty(), fn (Builder $builder) => $builder->where('title', 'like', "%{$keyword}%") )->paginate(30);

        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(PostRequest $request)
    {
        $slug = Str::of($request->title)->slug();
        $picture = $request->file('picture');
        $filename = date('YmdHi'). $picture->getClientOriginalName();
        $pictureUrl = $picture->storeAs('post', $filename);
        $request->merge(['slug' => $slug, 'picture_url' => $pictureUrl]);

        $post = Post::create($request->except('_token', '_method'));

        return redirect()->route('post.index')->with('message.flash', __('Berhasil menambahkan post baru'));
    }


    public function edit(PostRequest $request, string $slug)
    {
        $post = Post::findSlug($slug)->first();

        abort_if(is_null($post), 404);

        return view('posts.edit', compact('post'));
    }


    public function update(PostRequest $request, string $slug)
    {
        $post = Post::findSlug($slug)->first();

        abort_if(is_null($post), 404);

        $slug = Str::of($request->title)->slug();
        $pictureUrl = $post->picture_url;

        if ($request->hasFile('picture_url')) {
            $picture = $request->file('picture');
            $filename = date('YmdHi'). $picture->getClientOriginalName();
            $pictureUrl = $picture->storeAs('post', $filename);
        }
        $request->merge(['slug' => $slug, 'picture_url' => $pictureUrl]);

        $post->update($request->except('_token', '_method'));

        return redirect()->route('post.index')->with('message.flash', 'Berhasil simpan perubahan post');
    }


    public function destroy(int $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post.index')->with('message.flash', 'Berhasil hapus post');
    }




}
