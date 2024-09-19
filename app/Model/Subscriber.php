<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $table = 'subscribers';
    protected $primaryKey = 'subscriber_id';
    public $timestamps = false;
    protected $fillable = ['name', 'surname', 'patronymic', 'birth_date', 'division_id', 'image_path'];


    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }
    public function phones()
    {
        return $this->hasMany(Phone::class, 'subscriber_id', 'subscriber_id');
    }
}
