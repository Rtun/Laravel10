<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defuncion extends Model
{
    use HasFactory;
    protected $table = 'upload_defunciones_20230919201302';
    protected $primaryKey = 'estado_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $atributes = ['fecha', 'casos'];

    public function estados():BelongsTo
   {
    return $this->belongsTo(Estado::class, 'estado_id');
   }
}
