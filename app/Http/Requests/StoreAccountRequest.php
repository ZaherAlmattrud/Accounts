<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;


class StoreAccountRequest extends FormRequest
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
            //

            'title'=> 'required'
            ,'order'=>['required'  , Rule::unique('accounts')->ignore($this->account)]
            ,'parent_id'=>'nullable|exists:accounts,id'
            ,'debtor'=>'nullable'
            ,'creditor'=>'nullable'
        ];
    }
}
