<?php

namespace App\Services;

class JsonParser
{
    public function parseFile(string $pathToFile): array
    {
        $data = file_get_contents($pathToFile);

        return json_decode($data, true);
    }
}
