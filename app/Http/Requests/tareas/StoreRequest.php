<?php

namespace App\Http\Requests\tareas;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
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
        return [
            "nombre"=>"required|min:5|max:100",
            "descripcion"=>"required|min:5|max:255",
            "fecha"=>"required|date",
            "categoria_id"=>"required",
            "estado"=>"nullable|integer"
        ];
    }
}
