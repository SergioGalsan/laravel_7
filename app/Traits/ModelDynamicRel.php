<?php
    
namespace App\Traits;

// Para relações dinamicas entre os modelos, caso contrario seria necessário mapear os relacionamentos um por um
trait ModelDynamicRel
{
	// Diferente da with normal, com essa é possível carregar informações de um rel que não foi mapeado no model
  public static function _with($relationTable)
  {    		
  		$class = new static;
  		$class->relationTable = $relationTable;
  		return $class->newQuery()->with(['rel']);
  }
  
  // Esperado nome da classe modelo e o tipo de rel (hasOne[default], hasMany, etc) ex: ['TbCecad', 'hO']
  public function rel($relationTable = [])
  {        
      $relationTable = empty($relationTable) ? (array) $this->relationTable : (array) $relationTable;
   		if(empty($relationTable[1]) || $relationTable[1] == 'hO')
        return $this->hasOne("App\Models\\$relationTable[0]",$this->primaryKey,$this->primaryKey);
      if($relationTable[1] == 'hM')
        return $this->hasMany("App\Models\\$relationTable[0]",$this->primaryKey,$this->primaryKey);
  }

}