<?php

namespace App\Http\Requests\Finance;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserPaymentRequestStore extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::user()->can('send requests');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'amount' => ['required', 'integer', 'min:1000', 'max:10000000000'],
            'account_id' => ['required', 'integer', Rule::exists('user_accounts', 'id')->where('user_id', Auth::id())],
        ];
    }
}
