<?php
// app/Auth/ApiUser.php
namespace App\Auth;

use Illuminate\Contracts\Auth\Authenticatable;

class ApiUser implements Authenticatable
{
    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->attributes['id'];
    }

    public function getAuthPassword()
    {
        return null;
    }

    public function getRememberToken() {}
    public function setRememberToken($value) {}
    public function getRememberTokenName() {}

    public function getAuthPasswordName()
    {
        return 'password';
    }

    public function __get($key)
    {
        return $this->attributes[$key] ?? null;
    }

    public function toArray()
    {
        return $this->attributes;
    }
}
