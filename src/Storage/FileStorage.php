<?php

namespace VentiLog\Storage;

class FileStorage
{
    // 1. TODO: Create a method 'append(string $filename, string $content)'.

    // 2. TODO: Inside append, add logic to check if a directory exists for the current Year/Month.
    // Reference: use date('Y') and date('m'). If folder doesn't exist, use mkdir().

    // 3. TODO: Use file_put_contents with the FILE_APPEND flag.
    public function append(string $filename, string $content)
    {
        $directory = dirname($filename);
        if (!is_dir($directory)) {
            mkdir($directory, 0764, true);
        }
        file_put_contents($filename, $content, FILE_APPEND);
    }
}