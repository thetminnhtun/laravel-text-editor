<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::when(request('search'), function ($q) {
            return $q->where('title', 'like', '%' . request('search') . '%');
        })->latest()->paginate();
        return view('trumbowyg.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trumbowyg.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only('title', 'content');
        $input['content'] = $this->uploadImage($input['content']);
        $post = Post::create($input);
        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('trumbowyg.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('trumbowyg.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $input = $request->only('title', 'content');
        $input['content'] = $this->uploadImage($input['content']);
        $post->update($input);
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('trumbowyg.index');
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
        $dom->loadHtml('<?xml encoding="UTF-8">'. $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
