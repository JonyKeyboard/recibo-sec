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
}
