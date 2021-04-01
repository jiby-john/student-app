<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentMarkRequest extends FormRequest
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
            'student_id'=>'required',
            'subject1'=>'required|integer',
            'subject2'=>'required|integer',
            'subject3'=>'required|integer',
            'total_marks'=>'integer',
            'term' => 'required|max:100'
        ];
        return $rule;

    }

    public function messages()
    {
        return [
            'student_id.required' => 'Student name is required',
            'subject1.required' => 'Maths mark is required',
            'subject2.required' => 'Science mark is required',
            'subject3.required' => 'History mark is required',
            'subject1.integer' => 'Maths mark must be an integer',
            'subject2.integer' => 'Science mark must be an integer',
            'subject3.integer' => 'History mark must be an integer',
            'term.required' => 'Term is required',
        ];
    }
}
