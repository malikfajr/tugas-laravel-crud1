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

  public static function get_where($id)
  {
    return DB::table('questions')->where('id', $id)->get();
  }
}
