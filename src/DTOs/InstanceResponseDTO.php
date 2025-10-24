<?php

declare(strict_types=1);

namespace Edalicio\EvolutionApi\DTOs;

class InstanceResponseDTO
{

    public function __construct(
        public readonly string $instanceName,
        public readonly string $instanceId,
        public readonly string $status,
        public readonly ?string $webhookWaBusiness = null,
        public readonly ?string $accessTokenWaBusiness = null,
        public readonly ?array $hash = null,
        public readonly ?array $settings = null,
        public readonly ?string $message = null,
        public readonly ?\DateTimeInterface $createdAt = null
    ) {}
    public static function fromSuccessResponse(array $apiResponse): self {
        return new self(
            instanceName: $apiResponse['instanceName'],
            instanceId: $apiResponse['instanceId'],
            status: $apiResponse['status'],
            webhookWaBusiness: $apiResponse['webhook_wa_business'] ?? null,
            accessTokenWaBusiness: $apiResponse['access_token_wa_business'] ?? null,
            hash: $apiResponse['hash'] ?? null,
            settings: $apiResponse['settings'] ?? null,
            createdAt: isset($apiResponse['createdAt']) ? new \DateTimeImmutable($apiResponse['createdAt']) : null
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
            createdAt: new \DateTime()
        );
    }

}
