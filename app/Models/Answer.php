<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Answer {
  public static function findByQuestionId($id) {
    return DB::table('answers')->where('question_id', $id)->get();
  }

  public static function insert($data) {
    $date = \Carbon\Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
    $data['created_at'] = $date;
    $data['updated_at'] = $date;

    return DB::table('answers')->insert($data);
  }

  // public static findByQuestionIdAndDelete($id)
  // {
  //   return DB::table('answers')->where('question_id', $id)->delete();
  // }
}
