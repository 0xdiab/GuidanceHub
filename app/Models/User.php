<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'position',
        'summary',
        'session_price',
        'is_admin',
        'image',
        'linkedin_url',
        'x_url',
        'cv_url',
        'github_url',
        'gender',
        'account_type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    public function mentorSessions()
    {
        return $this->hasMany(MentorSession::class, 'mentor_id');
    }

    public function menteeSessions()
    {
        return $this->hasMany(MentorSession::class, 'mentee_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skill_user', 'mentor_id', 'skill_id')->withTimestamps();
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'specialization_user', 'mentor_id', 'specialization_id')->withTimestamps();
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'user_language')
                    ->withPivot('proficiency')
                    ->withTimestamps();
    }

    // User have many reviews
    public function reviews()
    {
        return $this->hasMany(Review::class, 'mentee_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'mentee_id');
    }
}
