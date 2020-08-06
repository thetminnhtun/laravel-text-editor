@extends('layouts.adminlte')

@section('content')
<trumbowyg-edit :post="{{ $post }}"></trumbowyg-edit>
@endsection