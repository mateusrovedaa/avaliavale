<?php

namespace App\Http\Requests;

class QuestionRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'type' => 'required|in:text,number,list',
            'valid_answers' => 'required_if:type,list',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
