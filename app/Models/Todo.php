<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'todoes';

    protected $with = ['owner', 'assignto'];

    public function owner()
    {
        return $this->hasOne(User::class, 'id', 'owner');
    }
    
    public function assignto()
    {
        return $this->hasOne(User::class, 'id', 'assignto');
    }
}
