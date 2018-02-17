<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Questionairs extends Model {

    protected $table = 'questionairs';

    public static function show($id) {
        return DB::table('questionairs')->where('id', $id)
                        ->first();
    }

    public static function getAll() {
        return DB::table('questionairs')
                        ->get();
    }

    public static function deleteqQuestionair($id) {

        return DB::table('questionairs')->where('id', '=', $id)->delete();
    }

}
