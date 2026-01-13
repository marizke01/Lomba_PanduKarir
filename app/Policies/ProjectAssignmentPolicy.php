<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ProjectAssignment;

class ProjectAssignmentPolicy
{
    /**
     * User hanya boleh submit project miliknya sendiri
     */
    public function submit(User $user, ProjectAssignment $assignment): bool
    {
        return $user->id === $assignment->user_id;
    }
}

