<?php

namespace App\Dtos;

class CategoryDto
{
    public readonly string $name;
    public readonly string $logo;

    public readonly string $slug;

    private function __construct(string $name, string $logo, string $slug)
    {
        $this->name = $name;
        $this->logo = $logo;
        $this->slug = $slug;
    }

    public static function create(string $name, string $logo, string $slug): CategoryDto
    {
        return new self($name, $logo, $slug);
    }
}
