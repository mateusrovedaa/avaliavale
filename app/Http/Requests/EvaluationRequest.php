<?php

namespace App\Http\Requests;

class EvaluationRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'comment' => 'required',
            'company_id' => 'required|exists:companies,id',
            'answer' => 'nullable|array',
        ];
    }
}
