<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class editePostRequest extends FormRequest
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
             'title' => 'required|min:3|unique:posts,id,'.$this->id 
           
            ,
            'description' => 'required|min:10'
            ,
            'user_id'=>'exists:users,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The Title Is Required Please Fill It',
            'title.min:3'=>'THe Min Char is 3',
            'title.unique'=>'The Title Do not reapet '
        ];
    }
}
