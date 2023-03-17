<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreRequest extends FormRequest
{
    // acciones con los datos antes de la validacion
    protected function prepareForValidation()
    {
        # code...
        $this->merge([
            //"slug" => Str::slug($this->title)
            //"slug" => Str::of($this->title)->slug()->append("_adicional")
            "slug" => Str($this->title)->slug()
        ]);
    }

    static function myRules()
    {
        # code...
        return [
            //reglas de validacion del formulario post
            "title" => "required|min:5|max:200",
            "slug" => "required|min:5|max:200|unique:posts",
            "content" => "required|min:5",
            "category_id" => "required|integer",
            "description" => "required|min:5",
            "posted" => "required"
        ];
    }

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
        return $this->myRules();
    }
}
