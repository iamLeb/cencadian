<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentAccess extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    //relationships
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function document() {
        return $this->belongsTo(Document::class, 'document_id');
    }
}
