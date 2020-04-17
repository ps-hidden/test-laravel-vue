<?php

namespace App\Model\Entity;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $logo
 * @property string $role
 * @property string $password
 *
 * @method Builder isAdmin()
 * @method Builder isModerator()
 *
 * @mixin Builder
 * @mixin Model
 */
class UserEntity extends Authenticatable
{
    use Notifiable;

    const ROLE_ADMIN = 'ADMIN';
    const ROLE_MODERATOR = 'MODERATOR';
    const ROLE_MEMBER = 'MEMBER';

    protected $table = 'users';

    public $timestamps = false;

    protected $perPage = 10;

    protected $fillable = ['name', 'email', 'logo', 'role', 'password'];

    protected $hidden = ['password', 'remember_token'];

    protected $appends = ['logo_url'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo
            ? config('app.url') .'/storage'. $this->logo
            : null;
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = \Hash::make($password);
    }

    public function setRoleAttribute($role)
    {
        $this->attributes['role'] = defined(self::class . '::ROLE_' . $role) ? $role : self::ROLE_MEMBER;
    }

    public function scopeIsAdmin(Builder $query)
    {
        return $query->where('role', self::ROLE_ADMIN);
    }

    public function scopeIsModerator(Builder $query)
    {
        return $query->whereIn('role', [self::ROLE_ADMIN, self::ROLE_MODERATOR]);
    }
}
