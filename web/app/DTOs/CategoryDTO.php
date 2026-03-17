<?php
namespace App\DTOs;

class CategoryDTO
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $description = null
    ) {}

    public static function fromRequest(array $validatedData): self
    {
        return new self(
            name: $validatedData['name'],
            description: $validatedData['description'] ?? null
        );
    }
}