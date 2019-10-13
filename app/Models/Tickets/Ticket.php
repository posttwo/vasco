<?php

namespace App\Models\Tickets;

use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Recordable as RecordableTrait;
use Altek\Accountant\Contracts\Recordable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Auth\User;
use Illuminate\Support\Arr;

use App\Models\Tickets\TicketQueue;

class Ticket extends Model implements Recordable
{
    use SoftDeletes, RecordableTrait;

    protected $statuses = [
        10 => 'Openned',
        20 => 'Assigned',
        30 => 'Blocked',
        40 => 'Resolved',
        50 => 'Closed'
    ];

    public function getStatusAttribute($value){
        return Arr::get($this->statuses, $value);
    }

    public function setStatusAttribute($value){
        $this->attributes['status'] = array_search($value, $this->statuses); //make it a status ID
    }

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function queue(){
        return $this->belongsTo(TicketQueue::class);
    }
}
