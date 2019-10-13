<?php

namespace App\Models\Auth\Traits\Relationship;

use App\Models\Auth\SocialAccount;
use App\Models\Auth\PasswordHistory;
use App\Models\Tickets\Ticket;
/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialAccount::class);
    }

    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->hasMany(PasswordHistory::class);
    }

    /**
     * @return mixed
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'created_by');
    }
}
