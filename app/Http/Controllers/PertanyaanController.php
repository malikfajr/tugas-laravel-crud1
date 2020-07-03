<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

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
}
