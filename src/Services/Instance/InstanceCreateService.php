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
        $this->baseUrl = env('EVOLUTION_API_BASE_URL', 'https://sub.domain.com');

        $this->http = Http::withHeaders([
            'Content-Type' => 'application/json',
            'apikey' => env('GLOBAL_API_KEY', ''),
        ]);
    }

    public function handle(CreateInstanceDTO $data): InstanceResponseDTO
    {

        try {

            $response = $this->http->post($this->baseUrl, $data->toArray());
            if ($response->failed()) {
                return InstanceResponseDTO::fromErrorResponse($response->json());
            }
            return InstanceResponseDTO::fromSuccessResponse($response->json());
        } catch (\Exception $e) {

            return new InstanceResponseDTO(
                instanceName: $data->instanceName,
                instanceId: '',
                status: 'error',
                message: $e->getMessage(),
            );

        }
    }
}
