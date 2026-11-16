<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Catalog extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'catalog';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'price',
        'description',
        'category',
        'img',
    ];

public function category()
{
    return $this->belongsTo(Categorys::class, 'category', 'id');
}
}

