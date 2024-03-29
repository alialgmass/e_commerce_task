<?php

namespace App\Http\Requests\Api\Cart;

use App\Http\Requests\base\ApiRequest;


class ChangeItemCountRequest extends ApiRequest
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
              'product_id'=>'required|exists:carts,product_id',
               'operation'=>'required|in:+,-'
          ];

    }
}
