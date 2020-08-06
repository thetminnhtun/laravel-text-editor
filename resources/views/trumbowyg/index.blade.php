@extends('layouts.adminlte')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12 mb-3">
            <a href="{{ route('trumbowyg.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle mr-1"></i>Create
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0">Posts</h3>

                    <div class="card-tools">
                        <form>
                            <div class="input-group input-group-sm">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table text-nowrap table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th width="200">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>
                                    <a href="{{ route('trumbowyg.show', $post->id) }}" class="btn btn-link">
                                        {{ $post->title }}
                                    </a>
                                </td>
                                <td>{{ $post->created_at->toFormattedDateString() }}</td>
                                <td>
                                    <form action="{{ route('trumbowyg.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('trumbowyg.show', $post->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('trumbowyg.edit', $post->id) }}"
                                            class="btn btn-success btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">
                                    There is no post.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $posts->links() }}
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection