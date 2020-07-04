@extends('layouts.main')

@section('title', 'Daftar Pertanyaan')

@section('content')
  <div class="row">
    <div class="col-10 mb-2 border-bottom">
      <h2>Daftar Pertanyaan</h2>
    </div>
    <div class="col-2">
      <a href="/pertanyaan/create" class="btn btn-primary btn-block">Buat Pertanyaan</a>
    </div>
    <div class="col-12">
      @if(!count($questions))
        <h3>Belum ada pertanyaan yang diunggah</h3>
      @else
        <table class="table table-bordered">
          <thead>
            @csrf
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Pertanyaan</th>
              <th>Actions</th>
              <th>Solved</th>
              <th>Tgl Upload</th>
            </tr>
          </thead>
          <tbody>
            @foreach($questions as $key => $question)
              <tr key="Q-{{$question->id}}">
                <td>{{$key + 1}}</td>
                <td>{{$question->title}}</td>
                <td>{!! $question->content !!}</td>
                <td>
                  <a href="/pertanyaan/{{$question->id}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                  <a href="/pertanyaan/{{$question->id}}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                  <a href="#" onclick="deleteQuestion({{$question->id}})" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
                <td>{{$question->solved ? 'True' : 'False'}}</td>
                <td>{{$question->created_at}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>
  </div>
@endsection

@push('script')
  <script type="text/javascript">
    function deleteQuestion(id){
      $.ajax({
          url: '/pertanyaan/' + id,
          type: 'DELETE',
          dataType: 'json',
          data: {
            "_token" : "{{ csrf_token() }}"
          },
          success: function(res){
            $(`tr[key=Q-${id}]`).remove();
            var rows = $('table tbody tr').length;
            if (!rows) {
              location.reload();
            }
          }
      })
    }
  </script>
@endpush
