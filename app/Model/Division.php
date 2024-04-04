<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = 'divisions';
    public $timestamps = false;
    protected $fillable =
        ['division_name',
            'type_id',
            'division_id'
        ];


    public function type()
    {
        return $this->belongsTo(Division_type::class, 'type_id');
    }
}
