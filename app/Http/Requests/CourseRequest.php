<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            "name" => "required",
            "description" => "required",
            "slug" => "required",
            "level_id" => "required",
            "category_id" => "required",
            "user_id" => "required",
            "price" => "required",
            "title" => "required",
            "seodescription" => "required",
            "keywords" => "required",
            "image" =>
                "required|image|dimensions:max_width=1280,max_height=900",
        ];
    }
}
