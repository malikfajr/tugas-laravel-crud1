@extends('layouts.main')

@section('title', 'Buat Pertanyaan')

@section('content')
  <h2>Buat Pertanyaan</h2>
  <form action="/pertanyaan" method="post">
    @csrf
    <div class="form-group">
      <label for="title">Judul :</label>
      <input type="text" class="form-control" id="title" placeholder="Masukan Judul Pertanyaan" name="title">
    </div>
    <div class="form-group">
      <label for="textarea">Isi Pertanyaan:</label>
      <textarea name="content" id="textarea" class="textarea form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection

@push('stylesheet')
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('/adminlte/plugins/summernote/summernote-bs4.css')}}">
@endpush

@push('script')
  <!-- summernote -->
  <script src="{{asset('/adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <script>
    $(document).ready(function(){
      $('#textarea').summernote();
    })
  </script>
@endpush
