<?php

namespace App\Http\Requests\Security\UsersRequests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            //
        ];
    }
}
