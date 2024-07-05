<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Role;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Password;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;   
    }


    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator){

          throw new  HttpResponseException(response()->json([
                'status'=>false,
                'message'=> $validator->errors(),
           ],422));

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             'name'=>"required|string|max:15",
             'email'=>['required','string','email','unique:users'],
             'password'=> ['required','confirmed',password::defaults()],
             'role_id'=>['required' ,Rule::in(Role::Super_Admin,Role::Vendor_Admin,Role::Vendor_Staff)]
        ];
    }


    public function messages(){
        return [
            'name'=>"Name field is required",
            'email'=>"Email field is required",
            'password'=>"Password field is required",
             'role_id'=>"Role is required"
        ];
    }
}
