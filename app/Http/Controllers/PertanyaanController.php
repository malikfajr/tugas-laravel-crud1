<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class PertanyaanController extends Controller
{
    public function index() {
      $questions = Question::get_all();
      $test = "<p> Ini uji coba string </p>";

      return view('pages.pertanyaan')
              ->with(compact('questions'))
              ->with(compact('test'));
    }

    public function create()
    {
      return view('pages.form_pertanyaan');
    }

    public function store(Request $req) {
      $data = $req->all();
      unset($data['_token']);
      unset($data['files']);

      $question = Question::insert($data);
      if ($question) {
        return redirect()->route('pertanyaan');
      }
    }

    public function edit($id)
    {
      $question = Question::findById($id);
      return view('pages.form_update_pertanyaan', compact('question'));
    }

    public function update(Request $req, $id) {
      $data = $req->all();
      unset($data['_token']);

      $question = Question::findByIdAndUpdate($id, $data);
      return $question;
    }
    public function delete($id) {
      $data[] = Question::findByIdAndDelete($id);
      return $data;
    }

    public function show($id) {
      $question = Question::findById($id);
      $answers = Answer::findByQuestionId($id);

      return view('pages.jawaban', compact('question', 'answers'));
    }

    public function solved(Request $req) {
      $this->validate($req, [
            'id'  => 'required',
            'solved' => 'required',
        ]);
      $id = $req->input('id');
      $data['solved'] = $req->input('solved');

      $question = Question::findByIdAndUpdate($id, $data);
      return $question;
    }
}
