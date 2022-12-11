<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function accessKetua(User $user)
    {
        return $user->isKetua;
    }

    public function accessMahasiswa(User $user)
    {
        return ! $this->accessKetua($user);
    }
}
