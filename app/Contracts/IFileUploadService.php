<?php

namespace App\Contracts;

interface IFileUploadService
{
    public function save(mixed $file, string $category): string;

    public function delete(string $path): bool;
}
