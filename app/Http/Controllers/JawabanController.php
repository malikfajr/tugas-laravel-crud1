<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class JawabanController extends Controller
{
  public function index($question_id) {
    $question = Question::get_where($question_id);
    $answers = Answer::get_where($question_id);
    // dd($question);
    return view('pages.jawaban')
            ->with(compact('question'))
            ->with(compact('answers'));
  }

  public function store(Request $req, $question_id) {
    $data = $req->all();
    $data['question_id'] = $question_id;
    unset($data['_token']);
    unset($data['files']);

    $question = Answer::insert($data);
    if ($question) {
      return redirect()->route('jawaban', [$question_id]);
    }
  }
}
