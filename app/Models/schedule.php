<?php

namespace App\Models; // Пространство имен модели

use Illuminate\Database\Eloquent\Factories\HasFactory; // Импортируем трейты фабрик
use Illuminate\Database\Eloquent\Model; // Импортируем базовый класс модели

class Schedule extends Model // Объявляем модель Schedule
{
    use HasFactory; // Подключаем функциональность фабрик

    protected $table = 'schedules'; // Указываем таблицу базы данных, с которой будет работать модель

    protected $fillable = [ // Разрешенные для массового заполнения поля
        'date_start', // Поле начала
        'date_finish', // Поле окончания
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'schedule_user')
                    ->withPivot('id');
    }
}
