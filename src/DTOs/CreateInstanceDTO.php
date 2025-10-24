<?php

declare(strict_types=1);

namespace Edalicio\EvolutionApi\DTOs;

use Edalicio\EvolutionApi\Enums\IntegrationType;
use Illuminate\Contracts\Support\Arrayable;

class CreateInstanceDTO implements Arrayable
{
    public function __construct(
        public readonly string $instanceName,
        public readonly ?string $token = null,
        public readonly ?string $number = null,
        public readonly bool $qrcode = true,
        public readonly IntegrationType  $integration = IntegrationType::WHATSAPP_BAILEYS,
        public readonly ?InstanceSettingsDTO $settings = null,
        public readonly ?ProxyConfigDTO $proxy = null,
        public readonly ?WebhookConfigDTO $webhook = null,
        public readonly ?RabbitMQConfigDTO $rabbitmq = null,
        public readonly ?SQSConfigDTO $sqs = null,
        public readonly ?string $chatwootAccountId = null,
        public readonly ?string $chatwootToken = null,
        public readonly ?string $chatwootUrl = null,
        public readonly ?bool $chatwootSignMsg = null,
        public readonly ?bool $chatwootReopenConversation = null,
        public readonly ?bool $chatwootConversationPending = null,
        public readonly ?bool $chatwootImportContacts = null,
        public readonly ?string $chatwootNameInbox = null,
        public readonly ?bool $chatwootMergeBrazilContacts = null,
        public readonly ?bool $chatwootImportMessages = null,
        public readonly ?int $chatwootDaysLimitImportMessages = null,
        public readonly ?string $chatwootOrganization = null,
        public readonly ?string $chatwootLogo = null
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            instanceName: $data['instanceName'],
            token: $data['token'] ?? null,
            number: $data['number'] ?? null,
            qrcode: $data['qrcode'] ?? true,
            integration: $data['integration'] ?? IntegrationType::WHATSAPP_BAILEYS,
            settings: isset($data['settings']) ? InstanceSettingsDTO::fromArray($data['settings']) : null,
            proxy: isset($data['proxy']) ? ProxyConfigDTO::fromArray($data['proxy']) : null,
            webhook: isset($data['webhook']) ? WebhookConfigDTO::fromArray($data['webhook']) : null,
            rabbitmq: isset($data['rabbitmq']) ? RabbitMQConfigDTO::fromArray($data['rabbitmq']) : null,
            sqs: isset($data['sqs']) ? SQSConfigDTO::fromArray($data['sqs']) : null,
            chatwootAccountId: $data['chatwootAccountId'] ?? null,
            chatwootToken: $data['chatwootToken'] ?? null,
            chatwootUrl: $data['chatwootUrl'] ?? null,
            chatwootSignMsg: $data['chatwootSignMsg'] ?? null,
            chatwootReopenConversation: $data['chatwootReopenConversation'] ?? null,
            chatwootConversationPending: $data['chatwootConversationPending'] ?? null,
            chatwootImportContacts: $data['chatwootImportContacts'] ?? null,
            chatwootNameInbox: $data['chatwootNameInbox'] ?? null,
            chatwootMergeBrazilContacts: $data['chatwootMergeBrazilContacts'] ?? null,
            chatwootImportMessages: $data['chatwootImportMessages'] ?? null,
            chatwootDaysLimitImportMessages: $data['chatwootDaysLimitImportMessages'] ?? null,
            chatwootOrganization: $data['chatwootOrganization'] ?? null,
            chatwootLogo: $data['chatwootLogo'] ?? null
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'instanceName' => $this->instanceName,
            'token' => $this->token,
            'number' => $this->number,
            'qrcode' => $this->qrcode,
            'integration' => $this->integration->value,
            'settings' => $this->settings?->toArray(),
            'proxy' => $this->proxy?->toArray(),
            'webhook' => $this->webhook?->toArray(),
            'rabbitmq' => $this->rabbitmq?->toArray(),
            'sqs' => $this->sqs?->toArray(),
            'chatwootAccountId' => $this->chatwootAccountId,
            'chatwootToken' => $this->chatwootToken,
            'chatwootUrl' => $this->chatwootUrl,
            'chatwootSignMsg' => $this->chatwootSignMsg,
            'chatwootReopenConversation' => $this->chatwootReopenConversation,
            'chatwootConversationPending' => $this->chatwootConversationPending,
            'chatwootImportContacts' => $this->chatwootImportContacts,
            'chatwootNameInbox' => $this->chatwootNameInbox,
            'chatwootMergeBrazilContacts' => $this->chatwootMergeBrazilContacts,
            'chatwootImportMessages' => $this->chatwootImportMessages,
            'chatwootDaysLimitImportMessages' => $this->chatwootDaysLimitImportMessages,
            'chatwootOrganization' => $this->chatwootOrganization,
            'chatwootLogo' => $this->chatwootLogo,
        ], fn($value) => !is_null($value));
    }
}
