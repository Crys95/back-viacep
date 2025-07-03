<?php

namespace App\Services\CepServices;

use Illuminate\Support\Facades\Http;

class CepServices
{
    private $viaCEP;

    public function __construct()
    {
        $this->viaCEP = config('services.apiCep.url');
    }

    public function ViaCEP($data)
    {
        $cep = preg_replace('/[^0-9]/', '', $data['cep']);

        if (strlen($cep) !== 8) {
            return response()->json(['error' => 'CEP inválido.'], 422);
        }

        $response = Http::get($this->viaCEP . "ws/{$cep}/json/");

        if ($response->failed()) {
            return response()->json(['error' => 'Erro ao consultar o ViaCEP.'], 500);
        }

        $dados = $response->json();

        return response()->json($dados);
    }
}
