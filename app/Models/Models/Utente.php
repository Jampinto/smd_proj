<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Utente extends Model
{
    protected $table = "utentes";
    protected $primaryKey = "id";
    use HasFactory;

    // protected $fillable = [
    //     'nome',
    //     'morada',
    //     'genero',
    //     'email',
    //     'nutente'
    // ];
    use SoftDeletes;

    public function consultas(){
        return $this->hasMany(Consulta::class, 'id_utente');
    }
}
