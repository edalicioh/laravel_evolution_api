<?php

declare(strict_types=1);

namespace Edalicio\EvolutionApi\DTOs;

class WebhookConfigDTO
{
    public function __construct(
        public readonly ?string $url = null,
        public readonly ?bool $byEvents = null,
        public readonly ?bool $base64 = null,
        public readonly ?array $headers = null,
        public readonly ?array $events = null
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            url: $data['url'] ?? null,
            byEvents: $data['byEvents'] ?? null,
            base64: $data['base64'] ?? null,
            headers: $data['headers'] ?? null,
            events: $data['events'] ?? null
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'url' => $this->url,
            'byEvents' => $this->byEvents,
            'base64' => $this->base64,
            'headers' => $this->headers,
            'events' => $this->events,
        ], fn($value) => !is_null($value));
    }
}
