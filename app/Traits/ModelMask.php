<?php
    
namespace App\Traits;

use App\Classes\Mask;

trait ModelMask
{
	
	// Para mascarar passando a mascara como parâmetro, aceita no padrão '###.###.###-##'
	public function mask($field,$mask){
	    return Mask::apply($this->$field,$mask);
	}

	public function maskCpf($field){
	    return Mask::apply($this->$field,'CPF');
	}

	public function maskCnpj($field){
	    return Mask::apply($this->$field,'CNPJ');
	}

	public function maskCpfCnpj($field){
	    return Mask::apply($this->$field,'CPF_CNPJ');
	}

	public function maskCep($field){
	    return Mask::apply($this->$field,'CEP');
	}

	public function maskConta($field){
	    return Mask::apply($this->$field,'CONTA');
	}

	public function maskCartao($field){
	    return Mask::apply($this->$field,'CARTAO');
	}

	public function maskFone($field){
	    return Mask::apply($this->$field,'FONE');
	}

	public function maskMoeda($field){
	    return Mask::moeda($this->$field);
	}

  public function maskAtivoInativo($field){
      return Mask::ativoInativo($this->$field);
  }

  public function maskSimNao($field){
      return Mask::simNao($this->$field);
  }

  public function maskWithoutExt($field){
      return Mask::withoutExt($this->$field);
  }

  public function maskDtToBd($val){
      return Mask::dtToBd($val);
  }

	
	public function unmask($field){
	    return Mask::unmask($this->$field);
	}

  public function unmaskValue($value){
      return Mask::unmask($value);
  }	

}