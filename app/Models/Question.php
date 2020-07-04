<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Question {
  public static function get_all() {
    return DB::table('questions')->get();
  }

  public static function insert($data) {
    $date = \Carbon\Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
    $data['created_at'] = $date;
    $data['updated_at'] = $date;

    return DB::table('questions')->insert($data);
  }

  public static function findById($id) {
    return DB::table('questions')->where('id', $id)->first();
  }

  public static function findByIdAndDelete($id) {
    $Atable = DB::table('answers')->where('question_id', $id)->delete();
    $Qtable = DB::table('questions')->where('id', $id)->delete();
    return 1;
  }

  public static function findByIdAndUpdate($id, $data) {
    $data['updated_at'] = \Carbon\Carbon::now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
    return DB::table('questions')->where('id', $id)->update($data);
  }
}
