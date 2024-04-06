<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $table = 'subscribers'; // Укажите имя таблицы, если оно отличается от стандартного наименования
    protected $primaryKey = 'subscriber_id';
    public $timestamps = false;
    protected $fillable = ['name', 'surname', 'patronymic', 'birth_date', 'division_id']; // Укажите поля, которые разрешено заполнять массово

    // Определите отношение с моделью Division
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }
    public function phones()
    {
        return $this->hasMany(Phone::class, 'subscriber_id', 'subscriber_id');
    }
}
