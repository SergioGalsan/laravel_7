<?php
    
namespace App\Traits;

use App\Classes\Helpers;

// Para relações dinamicas entre os modelos, caso contrario seria necessário mapear os relacionamentos um por um
trait ModelEvents
{
    
    public static function new()
    {
        return new static();
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function($model)
        {
            // Sobe 1 na chave primaria
            $model->attributes[$model->primaryKey] = $model->max($model->primaryKey) + 1;
            // Converte as datas pecadoras
            foreach ($model->dates as $date) {
              if( !empty($model->attributes[$date]) ) 
                $model->attributes[$date] = $model->maskDtToBd($model->attributes[$date]); 
            }

            if($model->table == 'frm.tb_solicitacao')
                $model->attributes['NR_AGENCIA'] = intval($model->attributes['NR_AGENCIA']);
        });
    } 

}