<?php

namespace App\Http\Controllers\API;

use App\Post;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
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
        return Post::when(request('search'), function ($q) {
            return $q->where('title', 'like', '%' . request('search') . '%');
        })->latest()->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
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
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
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
    public function destroy(Post $post)
    {
        $post->delete();
        return $post;
    }

    /**
     * Upload image if content has images.
     *
     * @param string $content
     * @return string
     */
    private function uploadImage($content)
    {
        // Enable custom element
        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        $dom->loadHtml('<?xml encoding="UTF-8">' . $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
