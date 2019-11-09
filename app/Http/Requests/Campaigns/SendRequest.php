<?php

namespace App\Http\Requests\Campaigns;

use Illuminate\Foundation\Http\FormRequest;

class SendRequest extends FormRequest
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
        if(request()->current == 'later' ) {
            $role = [
                'type' => 'required',
                'template_id' => 'required',
                'group_id' => 'required',
                'date' => 'required|date',
                'time' => 'required'
            ];
        }
        if (request()->current == 'now' ) {
            $role = [
                'type' => 'required',
                'template_id' => 'required',
                'group_id' => 'required',
            ];
        }

        return $role;
    }

    // public function messages()
    // {
    //     if (request()->current == 'later' ) {
    //         if (request()->date < now()) {
    //             $message = [
    //                 'date.required' => 'The entry date is smaller than the current date'
    //             ];
    //         }
    //     }
        
    //     return $message;
    // }
}
