<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class loginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator){
          throw new HttpResponseException(response()->json([
            'status'=>false,
            'message'=>$validator->errors()
          ],422 
          ));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'=>"required|email",
            'password'=>"required"
        ];
    }


    public function messages(){
        return [
            'email'=>"Email is required",
            'password'=>"Password is required"
        ];
    }
}
