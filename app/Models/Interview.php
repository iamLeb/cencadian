<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    //relationships
    public function interviewer() {
        return $this->belongsTo(User::class, 'interviewer_id');
    }

    public function application() {
        return $this->belongsTo(Application::class, 'application_id');
    }
}
