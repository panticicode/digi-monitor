<?php

namespace App\Http\Requests\Templates;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        if (request()->type == 'sms') {
            $role = [
                'name' => 'required',
                'type' => 'required',
                'content' => 'required'
            ];
        } 
        if (request()->type == 'email') {
            $role = [
                'name' => 'required',
                'type' => 'required',
                'subject' => 'required',
                'content' => 'required'
            ];
        } 
     
        return $role;
    }
}
