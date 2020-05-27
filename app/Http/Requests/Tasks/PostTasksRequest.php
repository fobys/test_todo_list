<?php

namespace App\Http\Requests\Tasks;

use Illuminate\Foundation\Http\FormRequest as BaseRequest;

/**
 * PostTasksRequest class
 */
class PostTasksRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
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
            'name' => 'required|string|max:255'
        ];
    }
}
