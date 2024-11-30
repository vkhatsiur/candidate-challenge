<?php

namespace App\Dtos;

class CategoryDto
{
    public readonly string $name;
    public readonly string $logo;

    private function __construct(string $name, string $logo)
    {
        $this->name = $name;
        $this->logo = $logo;
    }

    public static function create(string $name, string $logo): CategoryDto
    {
        return new self($name, $logo);
    }
}
