<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cao_Fatura extends Model
{
    protected $table='cao_fatura';
    protected $dates =[
    	'data_emissao',
    ];
    public function setData_EmissaoAttribute($date)
    {
    	$this->attributes['data_emissao']=Carbon::parse($date)
    }
    public $timestamps = false;
}
