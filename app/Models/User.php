<?php

namespace App\Models;

use App\Domain\Interfaces\UserEntity;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements UserEntity
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // -----------------------------------------------------------------------
    // UserEntity methods

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getPassword(): HashedPasswordValueObject
    {
        return new HashedPasswordValueObject($this->attributes['password']);
    }

    public function setPassword(PasswordValueObject $password): void
    {
        $this->attributes['password'] = (string) $password->hashed();
    }

    // -----------------------------------------------------------------------
    // Mutators
    //
    // @todo replace these methods with value object casting
    // @see https://laravel.com/docs/8.x/eloquent-mutators#value-object-casting
    //

    public function getEmailAttribute():string
    {
        return $this->attributes['email'];
    }

    public function setEmailAttribute(string $email): void
    {
        $this->setEmail($email);
    }

    public function getPasswordAttribute(): HashedPasswordValueObject
    {
        return new HashedPasswordValueObject($this->attributes['password']);
    }

    public function setPasswordAttribute(PasswordValueObject $password): void
    {
        $this->setPassword($password);
    }
}
