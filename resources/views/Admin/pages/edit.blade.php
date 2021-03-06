@extends('adminlte::page')

@section('title', 'Editar Página')
    
@section('content_header')
    <h1>Editar Página</h1>
@endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <h5>
                <i class="fas fa-exclamation-triangle"></i>
                Ocorreu um erro
            </h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pages.update', ['page'=> $page->id]) }}" method="POST" class="form-horizontal">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Título</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" value="{{ $page->title }}" class="form-control @error('title') is-invalid @enderror">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Corpo</label>
                            <div class="col-sm-10">
                                <textarea name="body" id="" cols="30" rows="10"  class="form-control bodyfield">{{ $page->body }}</textarea>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input type="submit" value="Salvar" class="btn btn-success">
                            </div>
                    </div>
                    
                </form>
            </div>
        </div>
<script src="https://cdn.tiny.cloud/1/iaq9p3t3mcnjx75ll78u2imqm1jsoyysf0i5jrywhozlvlku/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      
<script>
    tinymce.init({
        selector:'textarea.bodyfield',
        height:300,
        menubar: false,
        plugins: ['link', 'table', 'image', 'autoresizer', 'lists'],
        toolbar: ['undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table | link image | bullist numlist'],
        content_css: [
            '{{asset('assets/css/content.css')}}'
        ],
        images_upload_url:'{{ route('imageupload') }}',
        images_upload_credentials: true,
        convert_urls: false
    });    
</script>    
@endsection