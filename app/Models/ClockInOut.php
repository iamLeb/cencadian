<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClockInOut extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $dates = ['clock_in', 'clock_out'];

    public function getDurationAttribute()
    {
        if ($this->clock_in && $this->clock_out) {
            $clockIn = Carbon::parse($this->clock_in);
            $clockOut = Carbon::parse($this->clock_out);
            return $clockOut->diffForHumans($clockIn, true); // readable format
        }

        return null;
    }


    // Relationaship
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
