<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function answers(){
        return $this->hasMany(AnswerModel::class);
    }
    
}
