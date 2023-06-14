<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['jmeno', 'prijmeni', 'email', 'narozeni'];
    protected $table = 'member';

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'member_tag');
    }
}
