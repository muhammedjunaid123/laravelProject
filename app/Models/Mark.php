<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mark extends Model
{
    protected $fillable = [
        'mathematics',
        'science',
        'english',
        'history',
        'std_id'
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'std_id');
    }
}
