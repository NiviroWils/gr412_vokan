<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class Division_type extends Model
{
    use HasFactory;
    protected $primaryKey = 'type_id';
    public $division_types = false;
    protected $fillable = [
        'type',
    ];}