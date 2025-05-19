<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $primarykey="id";
    protected $table ="catalogo";

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'titulo',
        'descripcion',
        'genero',
        'director',
        'fecha_estreno'
    ];
}
