<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Aprendiz;

class AprendizPolicy {

    public function before(User $user, string $ability) {
        if ($user->isRole('admin')) {
            return true;
        }
    }

    public function viewAny(User $user): bool {
        return in_array($user->role, ['admin', 'instructor', 'aprendiz']);
    }

    public function view(User $user, Aprendiz $aprendiz): bool {
        return in_array($user->role, ['admin', 'instructor', 'aprendiz']);
    }

    public function create(User $user): bool {
        return in_array($user->role, ['admin', 'instructor']);
    }

    public function update(User $user, Aprendiz $aprendiz): bool {
        return in_array($user->role, ['admin', 'instructor']);
    }

    public function delete(User $user, Aprendiz $aprendiz): bool {
        return $user->isRole('admin');
    }
}
