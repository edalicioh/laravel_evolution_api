<?php

declare(strict_types=1);

namespace Edalicio\EvolutionApi\DTOs;

class SQSConfigDTO
{
    public function __construct(
        public readonly ?bool $enabled = null,
        public readonly ?array $events = null
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            enabled: $data['enabled'] ?? null,
            events: $data['events'] ?? null
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'enabled' => $this->enabled,
            'events' => $this->events,
        ], fn($value) => !is_null($value));
    }
}
