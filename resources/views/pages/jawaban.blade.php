@extends('layouts.main')

@section('title', 'Jawaban')

@section('content')
  <div class="content-header">
    <div class="container-fluid border-bottom">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">{{$question->title}}</h1>
        </div>
        <div class="col-sm-6 text-right">
          Solved :
            @if(!$question->solved)
              <a href="#" class="btn btn-warning">False</a>
            @else
              <a href="#jawaban{{$question->solved}}" class="btn btn-success">True</a>
            @endif
        </div>
        <div class="col-sm-12 mt-1">
          {!! $question->content !!}
        </div>
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-3">
              <small>Created at : {{$question->created_at}}</small> &nbsp;
            </div>
            <div class="col-sm-3">
              <small>Updated at : {{$question->updated_at}}</small> &nbsp;
            </div>
          </div>
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
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              @foreach($answers as $key => $answer)
              <!-- timeline item -->
              <div id="jawaban{{$answer->id}}">
                {!! $answer->id == $question->solved ? '<i class="far fa-check-circle bg-green"></i>' : '<i class="fas fa-clock bg-gray"></i>' !!}

                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> {{$answer->created_at}}</span>
                  <!-- <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3> -->

                  <div class="timeline-body">
                    {!! $answer->content !!}
                  </div>
                  <div class="timeline-footer">
                    @if($answer->id == $question->solved)
                      <a class="btn btn-success btn-sm" href="#">Solved</a>
                    @else
                      <a class="btn btn-default btn-sm text-dark" onclick="setSolved({{$answer->id}})" href="#">Solve</a>
                    @endif
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              @endforeach

            </div>
          </div>
          <!-- /.col -->
        </div>
      @endif
      <div class="row">
        <div class="col-sm-12">
          <form action="/jawaban/{{$question->id}}" method="post">
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
    function setSolved(solved) {
      var id = {{$question->id}}
      $.ajax({
        url: '/pertanyaan/solved',
        method: 'PUT',
        dataType: 'JSON',
        data: {
          "_token": "{{csrf_token()}}",
          id,
          solved
        },
        success: function(res){
          location.reload()
        }
      })
    }
  </script>
@endpush
