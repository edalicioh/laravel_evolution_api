<?php
declare(strict_types=1);

namespace Edalicio\EvolutionApi\Enums;

enum IntegrationType: string
{
    case WHATSAPP_BAILEYS = 'WHATSAPP-BAILEYS';
    case WHATSAPP_BUSINESS = 'WHATSAPP-BUSINESS';
    case EVOLUTION = 'EVOLUTION';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function options(): array
    {
        return [
            self::WHATSAPP_BAILEYS->value => 'WhatsApp Baileys',
            self::WHATSAPP_BUSINESS->value => 'WhatsApp Business',
            self::EVOLUTION->value => 'Evolution',
        ];
    }

    public function label(): string
    {
        return match($this) {
            self::WHATSAPP_BAILEYS => 'WhatsApp Baileys',
            self::WHATSAPP_BUSINESS => 'WhatsApp Business',
            self::EVOLUTION => 'Evolution',
        };
    }

    public function description(): string
    {
        return match($this) {
            self::WHATSAPP_BAILEYS => 'Integração com WhatsApp usando Baileys',
            self::WHATSAPP_BUSINESS => 'Integração com WhatsApp Business API',
            self::EVOLUTION => 'Integração com Evolution API nativa',
        };
    }

    public static function isValid(string $value): bool
    {
        return in_array($value, self::values());
    }

    public static function fromString(string $value): self
    {
        return match($value) {
            'WHATSAPP-BAILEYS' => self::WHATSAPP_BAILEYS,
            'WHATSAPP-BUSINESS' => self::WHATSAPP_BUSINESS,
            'EVOLUTION' => self::EVOLUTION,
            default => throw new \InvalidArgumentException("Invalid integration type: {$value}")
        };
    }
}
