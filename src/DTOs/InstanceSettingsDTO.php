<?php

declare(strict_types=1);

namespace Edalicio\EvolutionApi\DTOs;

class InstanceSettingsDTO
{
    public function __construct(
        public readonly ?bool $rejectCall = null,
        public readonly ?string $msgCall = null,
        public readonly ?bool $groupsIgnore = null,
        public readonly ?bool $alwaysOnline = null,
        public readonly ?bool $readMessages = null,
        public readonly ?bool $readStatus = null,
        public readonly ?bool $syncFullHistory = null
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            rejectCall: $data['rejectCall'] ?? null,
            msgCall: $data['msgCall'] ?? null,
            groupsIgnore: $data['groupsIgnore'] ?? null,
            alwaysOnline: $data['alwaysOnline'] ?? null,
            readMessages: $data['readMessages'] ?? null,
            readStatus: $data['readStatus'] ?? null,
            syncFullHistory: $data['syncFullHistory'] ?? null
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'rejectCall' => $this->rejectCall,
            'msgCall' => $this->msgCall,
            'groupsIgnore' => $this->groupsIgnore,
            'alwaysOnline' => $this->alwaysOnline,
            'readMessages' => $this->readMessages,
            'readStatus' => $this->readStatus,
            'syncFullHistory' => $this->syncFullHistory,
        ], fn($value) => !is_null($value));
    }
}
