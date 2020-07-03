@extends('layouts.main')

@section('title', 'Jawaban')

@section('content')
  <div class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">{{$question[0]->title}}</h1>
        </div>
        <div class="col-sm-6 text-right">
          Created at : {{$question[0]->created_at}} &nbsp;&nbsp;&nbsp;
          Solved :
            @if(!$question[0]->solved)
              <a href="#" class="btn btn-warning">False</a>
            @else
              <a href="#jawaban{{$question[0]->solved}}" class="btn btn-success">True</a>
            @endif
        </div>
        <div class="col-sm-12">
          {!! $question[0]->content !!}
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      @if(!count($answers))
        <div class="row">
          <div class="col-sm-12">
            Belum ada jawaban
          </div>
        </div>
      @else
        <div class="row mb-2">
          <div class="col-sm-12 mb-2">
            <strong><h4>{{ count($answers) }} Answer</h4></strong>
          </div>
          @foreach($answers as $key => $answer)
            <div class="col-sm-12 border-bottom">
              {!! $answer->content !!}
            </div>
          @endforeach
        </div>
      @endif
      <div class="row">
        <div class="col-sm-12">
          <form action="/jawaban/{{$question[0]->id}}" method="post">
            @csrf
            <div class="form-group">
              <label for="textarea">Beri Jawaban:</label>
              <textarea name="content" id="textarea" class="textarea form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>
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
