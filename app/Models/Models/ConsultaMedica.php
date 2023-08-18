<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConsultaMedica extends Model
{
    use HasFactory;
    protected $table = "consultasmedicas";
    protected $primaryKey = "id";
    protected $foreingKey = "id_consulta";
    use SoftDeletes;

    public function consultasmed(){
        return $this->belongsTo(Consulta::class, 'id_consulta');
    }
}
