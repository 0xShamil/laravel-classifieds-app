<?php

namespace App\Policies;

use App\Models\{User, Listing};
use Illuminate\Auth\Access\HandlesAuthorization;

class ListingPolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Listing $listing)
    {
        return $listing->ownedByUser($user);
    }

    public function update(User $user, Listing $listing)
    {
        return $listing->ownedByUser($user);
    }

    public function destroy(User $user, Listing $listing)
    {
        return $listing->ownedByUser($user);
    }
}
