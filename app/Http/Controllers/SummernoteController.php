<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SummernoteStoreRequest;
use App\Http\Requests\SummernoteUpdateRequest;

class SummernoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::when(request('search'), function($q) {
            return $q->where('title', 'like', '%' . request('search') . '%');
        })->latest()->paginate();
        return view('summernote.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('summernote.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SummernoteStoreRequest $request)
    {
        $input = $request->only('title', 'content');
        $input['content'] = $this->uploadImage($input['content']);
        Post::create($input);
        return redirect()->route('summernote.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('summernote.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('summernote.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SummernoteUpdateRequest $request, $id)
    {
        $post = Post::find($id);
        $input = $request->only('title', 'content');
        $input['content'] = $this->uploadImage($post['content']);
        $post->update($input);
        return redirect()->route('summernote.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('summernote.index');
    }

    /**
     * Upload image if content has images
     *
     * @param string $content
     * @return string
     */
    private function uploadImage($content)
    {
        // Enable custom element
        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $image) {
            $src = $image->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                // preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                // $mimeType = $groups['mime'];
                $mimeType = explode('/', mime_content_type($src))[1];
                $path = '/images/' . uniqid('', true) . '.' . $mimeType;
                Storage::put($path, file_get_contents($src));
                $image->removeAttribute('src');
                $image->setAttribute('src', Storage::url($path));
            }
        }
        return $dom->savehtml();
    }
}
