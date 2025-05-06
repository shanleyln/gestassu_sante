<?php
// app/Auth/ApiUserProvider.php

namespace App\Auth;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class ApiUserProvider implements UserProvider
{
    public function retrieveById($identifier)
    {
        // Stocke les utilisateurs API dans la session sous leur ID
        $userData = session("api_user_{$identifier}");

        return $userData ? new ApiUser($userData) : null;
    }

    public function retrieveByToken($identifier, $token) {}
    public function updateRememberToken(Authenticatable $user, $token) {}
    public function retrieveByCredentials(array $credentials) {}
    public function validateCredentials(Authenticatable $user, array $credentials) {}
    public function rehashPasswordIfRequired(Authenticatable $user, array $credentials, bool $force = false): bool
    {
        return false;
    }
}

