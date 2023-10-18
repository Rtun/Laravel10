<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sospechoso extends Model
{
    use HasFactory;
    protected $table = 'upload_sospechosos_20230919201422';
    protected $primaryKey = 'estado_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $atributes = ['fecha', 'casos'];

   public function estados():BelongsTo
   {
    return $this->belongsTo(Estado::class, 'estado_id');
   }
}
