<?php

declare(strict_types=1);

namespace Edalicio\EvolutionApi\DTOs;

class ProxyConfigDTO
{
    public function __construct(
        public readonly ?string $proxyHost = null,
        public readonly ?string $proxyPort = null,
        public readonly ?string $proxyProtocol = null,
        public readonly ?string $proxyUsername = null,
        public readonly ?string $proxyPassword = null
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            proxyHost: $data['proxyHost'] ?? null,
            proxyPort: $data['proxyPort'] ?? null,
            proxyProtocol: $data['proxyProtocol'] ?? null,
            proxyUsername: $data['proxyUsername'] ?? null,
            proxyPassword: $data['proxyPassword'] ?? null
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'proxyHost' => $this->proxyHost,
            'proxyPort' => $this->proxyPort,
            'proxyProtocol' => $this->proxyProtocol,
            'proxyUsername' => $this->proxyUsername,
            'proxyPassword' => $this->proxyPassword,
        ], fn($value) => !is_null($value));
    }
}
