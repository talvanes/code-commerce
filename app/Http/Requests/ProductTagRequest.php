<?php

namespace PortalComercial\Http\Requests;

use PortalComercial\Http\Requests\Request;

class ProductTagRequest extends Request
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
            'tag' => 'unique:tags,name'
        ];
    }
}
