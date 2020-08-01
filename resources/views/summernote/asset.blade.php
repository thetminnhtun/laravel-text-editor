@section('style')
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.css">
@endsection

@section('script')
<script src="/plugins/summernote/summernote-bs4.js"></script>
<script>
    $('#content').summernote({
        placeholder: 'Write something in your mind',
        tabsize: 2,
        height: 300,
    });
</script>
@endsection