<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class Room_type extends Model
{
    use HasFactory;
    protected $primaryKey = 'type_id';
    public $room_types = false;
    protected $fillable = [
        'type',
    ];}