<?php

declare(strict_types=1);

namespace Edalicio\EvolutionApi\DTOs;

class InstanceResponseDTO
{

    public function __construct(
        public readonly string $instanceName,
        public readonly string $instanceId,
        public readonly string $status,
        public readonly ?string $message = null,
    ) {}
    public static function fromSuccessResponse(array $apiResponse): self {
        return new self(
            instanceName: $apiResponse['instance']['instanceName'],
            instanceId: $apiResponse['instance']['instanceId'],
            status: $apiResponse['instance']['status'],
        );
    }
    public static function fromErrorResponse(array $apiResponse): self
    {
        $errorMessage = $apiResponse['response']['message'][0] ?? $apiResponse['error'] ?? 'Unknown error';

        return new self(
            instanceName: '', // Será preenchido posteriormente
            instanceId: '',
            status: 'error',
            message: $errorMessage,
        );
    }

}
