<?php

namespace App\Kernel\Http;

use App\Kernel\Upload\UploadedFileInterface;
use App\Kernel\Validator\Validator;

interface RequestInterface
{
    public static function createGlobals() : static;
    public function uri() : string;
    public function method() : string;
    public function input(string $key, $default = ''): mixed;
    public function file(string $key): ?UploadedFileInterface;
    public function setValidator(Validator $validator): void;
    public function validate(array $rules): bool;
    public function errors(): array;
}