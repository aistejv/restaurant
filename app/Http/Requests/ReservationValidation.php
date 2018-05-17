<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationValidation extends FormRequest
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
          'name' => 'required',
          'surname' => 'required',
          'number_of_persons' => 'required',
          'email' => 'required|email',
          'phone' => 'required|numeric',
          'date' => 'required',
          'time' => 'required',
        ];
    }
    public function messages(){
      return[
        'name.required' => 'Please enter your name',
        'surname.required' => 'Please enter your surname',
        'number_of_persons.required' => 'Please enter the number of people',
        'email.required' => 'Please enter your email',
        'phone.required' => 'Please enter your phone number',
        'date.required' => 'Please enter the date',
        'time.required' => 'Please enter the time',
      ];
    }
}
