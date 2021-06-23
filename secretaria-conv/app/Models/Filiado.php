<?php

namespace App\Models;

use App\Http\Requests\FiliadoFormRequest;
use Illuminate\Database\Eloquent\Model;

class Filiado extends Model
{
    public $timestamps = false;
    //protected $fillable = ['nome'];

    //EVITA O ERRO Call to a member function format() on string
    //protected $dates = ['nascimento'];

    public function validaImagem(FiliadoFormRequest $request){

        if($request->hasFile('imageFiliado') && $request->file('imageFiliado')->isValid()){

            $requestImage = $request->imageFiliado;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() .strtotime("now") . "." . $extension);

            $requestImage->move(public_path('img/filiados'), $imageName);

            return $imageName;
        }
    }
    public function validaCPF($cpf) {

        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;

    }
}
