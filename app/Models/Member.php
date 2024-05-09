<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    protected $fillable = [
        'id',
        'name',
        'address',
        'no_hp',
        'member_code',
        'expired_at',
    ];
    
    public function user(){
        return $this->hasOne(User::class);
    }
}
