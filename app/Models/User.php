<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
        'mentoring',
        'responsibility',
        'codestyle',
        'result'
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class, 'voted_for_id', 'id');
    }

    public function getMentoringAttribute()
    {

        return $mentoring = $this->votes()->whereHas('category', function (Builder $query) {
            $query->where('name', 'mentoring');
        })->sum('vote_value');
    }

    public function getResponsibilityAttribute()
    {
        return $responsibility = $this->votes()->whereHas('category', function (Builder $query) {
            $query->where('name', 'responsibility');
        })->sum('vote_value');
    }

    public function getCodestyleAttribute()
    {
        return $codestyle = $this->votes()->whereHas('category', function (Builder $query) {
            $query->where('name', 'codestyle');
        })->sum('vote_value');
    }

    public function getResultAttribute()
    {
        $result = $this->mentoring + $this->responsibility + $this->codestyle + $this->fulltime;
        return number_format($result, 2);
    }
}
