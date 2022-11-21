<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hymn extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getBriefBodyAttribute() {
        return explode('<ol>', $this->body)[0];
    }
}
