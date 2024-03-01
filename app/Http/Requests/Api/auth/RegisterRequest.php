<?php

namespace App\Http\Requests\Api\auth;

use App\Http\Requests\base\ApiRequest;


class RegisterRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'phone'=>'required|unique:users,phone',
            'password'=>'required|confirmed|min:8'
        ];
    }
}
