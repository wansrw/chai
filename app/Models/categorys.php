<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Categorys extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'categorys';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

public function products()
{
    return $this->hasMany(Catalog::class, 'category', 'id');
}
}
