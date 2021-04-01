<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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

        $rule = [
            'name'=>'required|max:100',
            'age'=>'required|integer',
            'gender'=>'required',
            'reporting_teacher' => 'required'
        ];
        return $rule;

    }

    public function messages()
    {
        return [
            'name.required' => 'Student name is required',
            'name.max' => 'Student name must not be greater than 100 characters',
            'age.required' => 'Age is required',
            'age.integer' => 'Age must be an integer',
            'gender.required' => 'Gender is required',
            'reporting_teacher.required' => 'Teacher is required',
        ];
    }
}
