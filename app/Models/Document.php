<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    //relationships
    public function owner() {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function documentAccesses() {
        return $this->hasMany(DocumentAccess::class, 'document_id');
    }   

}
