<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReuniaoModel extends Model
{
    protected $table = 'reuniao'; 
    protected $fillable = ['titulo', 'descricao', 'data', 'id_user'];
    use HasFactory;


    public function relUsers()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}

