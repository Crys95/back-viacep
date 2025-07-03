<?php

namespace App\Http\Requests\CepRequest;

use App\Http\Requests\NoRedirect;
use Illuminate\Foundation\Http\FormRequest;

class CepRequest extends FormRequest
{

    use NoRedirect;


    public function rules(): array
    {
        return [
            'cep' => ['required', 'regex:/^\d{5}-?\d{3}$/']
        ];
    }

}
