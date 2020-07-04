<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class JawabanController extends Controller
{
  public function index($id) {
    $question = Question::findById($id);
    $answers = Answer::findByQuestionId($id);

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
      return redirect("/pertanyaan/" . $question_id);
    }
  }
}
