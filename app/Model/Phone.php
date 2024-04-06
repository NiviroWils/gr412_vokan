<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phones';
    protected $primaryKey = 'phone_id';
    public $timestamps = false;
    protected $fillable = ['phone_id','phone', 'subscriber_id', 'room_id'];

    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class, 'subscriber_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
