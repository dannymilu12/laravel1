<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PutRequest extends FormRequest
{
    // acciones con los datos antes de la validacion
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        //dd($this->route("post")->id); // obtiene informacion de la ruta, identificador (post = parametro de la lista de rutas)
        return [
            //reglas de validacion del formulario post
            "title" => "required|min:5|max:200",
            "slug" => "required|min:5|max:200|unique:categories,slug," . $this->route("category")->id,
          
        ];
    }
}

