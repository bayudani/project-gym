<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function member(){
        return $this->hasOne(Member::class,'member_code');
    }
}
