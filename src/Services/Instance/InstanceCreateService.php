<?php

namespace Edalicio\EvolutionApi\Services\Instance;

use Edalicio\EvolutionApi\DTOs\CreateInstanceDTO;
use Edalicio\EvolutionApi\DTOs\InstanceResponseDTO;
use Illuminate\Support\Facades\Http;

class InstanceCreateService
{
    private string $baseUrl;
    private \Illuminate\Http\Client\PendingRequest $http;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('evolution-api.base_url', 'http://192.168.1.78:8081'), '/');
        $this->http = Http::withHeaders([
            'Content-Type' => 'application/json',
            'apikey' => config('evolution-api.global_api_key', '429683C4C977415CAAFCCE10F7D57E11'),
        ]);
    }

    public function handle(CreateInstanceDTO $data): InstanceResponseDTO
    {
        try {
            $response = $this->http->post("{$this->baseUrl}/instance/create", [
                'instanceName' => $data->instanceName,
                'qrcode' => $data->qrcode,
                'integration' => $data->integration,
            ]);

            if ($response->failed()) {
                return InstanceResponseDTO::fromErrorResponse($response->json() ?? [
                    'message' => 'Erro desconhecido ao criar instância',
                ]);
            }

            return InstanceResponseDTO::fromSuccessResponse($response->json());
        } catch (\Throwable $e) {
            dd($e->getMessage());
            return InstanceResponseDTO::fromErrorResponse([
                'message' => $e->getMessage(),
            ]);
        }
    }
}
