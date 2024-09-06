<?php

namespace App\Policies;

use App\Models\Jobse;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobsePolicy
{
    public function apply(User $user, Jobse $job): bool
    {
        return !$job->hasUserApplied($user);
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Jobse $jobse): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Jobse $jobse): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Jobse $jobse): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Jobse $jobse): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Jobse $jobse): bool
    {
        return false;
    }
}
