<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consulta extends Model
{
    use HasFactory;
    protected $table = "consultas";
    protected $primaryKey = "id";
    protected $foreingKey = "id_utente";
    use SoftDeletes;
    
        protected $fillable = [
        'peso',
        'altura',
        'glicose',
        'fumador',
        'pad',
        'pas',
        'pressao_arterial'
    ];

    public function consultas_medicas(){
        return $this->hasMany(ConsultaMedica::class, 'id_consulta');
    }

    public function utentes(){
        return $this->belongsTo(Utente::class, 'id_utente');
    }


}
