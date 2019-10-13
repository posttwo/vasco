<?php

namespace App\Models\Tickets;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Recordable as RecordableTrait;
use Altek\Accountant\Contracts\Recordable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Auth\User;

use Ticket;

class TicketQueue extends Model implements Recordable
{
    use SoftDeletes, RecordableTrait;

    protected $fillable = ['name'];

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

}
