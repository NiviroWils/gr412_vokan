<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    protected $primaryKey = 'room_id';

    public $timestamps = false;
    protected $fillable = ['room_name', 'type_id', 'division_id'];

    public function type()
    {
        return $this->belongsTo(Room_type::class, 'type_id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }
}
