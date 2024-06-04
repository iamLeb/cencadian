<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    { return $this->type === 'admin'; }
    public function isCompany(): bool
    { return $this->type === 'company'; }
    public function isIntern(): bool
    { return $this->type === 'intern'; }
    public function isHired(): bool
    { return $this->type === 'hired'; }

    //Relationship
    public function application()
    {
        return $this->hasOne(Application::class);
    }

    public function serviceRequest()
    {
        return $this->hasMany(ServiceRequest::class);
    }
    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function interview()
    {
        return $this->hasMany(Interview::class, 'interviewer_id');
    }

    public function emergency()
    {
        return $this->hasOne(Emergency::class);
    }

    public function clock()
    {
        return $this->hasMany(ClockInOut::class);
    }

    public function ownedDocuments() {
        return $this->hasMany(Document::class, 'owner_id');
    }

    public function documentAccesses() {
        return $this->hasMany(DocumentAccess::class, 'user_id');
    }
}
