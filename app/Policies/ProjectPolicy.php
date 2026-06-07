<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;

class ProjectPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, [User::ROLE_ADMIN, User::ROLE_EDITOR, User::ROLE_VIEWER], true);
    }

    public function view(User $user, Project $project): bool
    {
        return $this->viewAny($user);
    }

    public function create(User $user): bool
    {
        return in_array($user->role, [User::ROLE_ADMIN, User::ROLE_EDITOR], true);
    }

    public function update(User $user, Project $project): bool
    {
        return in_array($user->role, [User::ROLE_ADMIN, User::ROLE_EDITOR], true);
    }

    public function delete(User $user, Project $project): bool
    {
        return $user->isAdmin();
    }
}
