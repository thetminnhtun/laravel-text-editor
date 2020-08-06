@extends('layouts.adminlte')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="{{ route('trumbowyg.index') }}" class="btn btn-primary">
                <i class="fas fa-long-arrow-alt-left mr-1"></i> Back
            </a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $post->title }}</h3>
                    <i class="text-muted">Post on {{ $post->created_at->diffForHumans() }}</i>
                    <p>{!! $post->content !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection