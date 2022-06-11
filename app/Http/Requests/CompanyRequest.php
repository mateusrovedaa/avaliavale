<?php

namespace App\Http\Requests;

class CompanyRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() === 'PUT') {
            return [
                'description' => 'nullable',
                'category_id' => 'required|exists:categories,id',
            ];
        }

        return [
            'name' => 'required',
            'description' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'logo' => 'file',
        ];
    }
}
