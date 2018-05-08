<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishValidation extends FormRequest
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
          'title' => 'required',
          'description' => 'required',
          'price' => 'required|numeric',
          'main_id' => 'required',
          'image_url' => 'required',
        ];
    }

    public function messages(){
      return[
        'title.required' => 'Please enter the title of the dish',
        'description.required' => 'Please enter the description',
        'price.required' => 'Please enter the price',
        'main_id.required' => 'Please enter which main the dish belongs to',
        'image_url.required' => 'Please enter url of the image',
      ];
    }
}
