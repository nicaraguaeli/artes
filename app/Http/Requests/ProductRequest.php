<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'codigo'=>'unique:products|required',
            'nombre'=>'max:50|required',
            'precio'=>'required',
            'descripcion'=>'required',
            'materiales'=>'max:50|required',
            'category_gender_id'=>'required',
            'size_id'=>'required',
            'imagen'=> 'required|array',
            'imagen.*'=>'required|image|mimes:jpeg,png,jpg,gif',
        ];
    }

    public function attributes()
    {
        return[
            'codigo'=>'Código de Producto',
            'nombre'=>'Nombre de Producto',
            'precio'=>'Precio',
            'descripcion'=>'Descripción',
            'materiales'=>'Materiales',
            'category_gender_id'=>'Categoria del Producto',
            'size_id'=>'Talla del Producto',
            'imagen'=>'Imagen del Producto'
        ];
    }
}
