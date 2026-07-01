<?php

declare(strict_types=1);

final class SignupRepository
{
    public function __construct(private string $storagePath)
    {
        $dir = dirname($this->storagePath);

        if (!is_dir($dir) && !mkdir($dir, 0755, true) && !is_dir($dir)) {
            throw new RuntimeException('Unable to create storage directory.');
        }

        if (!file_exists($this->storagePath)) {
            $this->writeRecords([]);
        }
    }

    /**
     * @param array<string, mixed> $record
     */
    public function insert(array $record): void
    {
        $handle = fopen($this->storagePath, 'c+');

        if ($handle === false) {
            throw new RuntimeException('Unable to open signup storage.');
        }

        try {
            if (!flock($handle, LOCK_EX)) {
                throw new RuntimeException('Unable to lock signup storage.');
            }

            $contents = stream_get_contents($handle);
            $records = [];

            if (is_string($contents) && trim($contents) !== '') {
                $decoded = json_decode($contents, true);
                if (is_array($decoded)) {
                    $records = $decoded;
                }
            }

            $records[] = $record;

            ftruncate($handle, 0);
            rewind($handle);

            $encoded = json_encode($records, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            if ($encoded === false) {
                throw new RuntimeException('Unable to encode signup records.');
            }

            fwrite($handle, $encoded);
            fflush($handle);
        } finally {
            flock($handle, LOCK_UN);
            fclose($handle);
        }
    }

    /**
     * @param array<int, array<string, mixed>> $records
     */
    private function writeRecords(array $records): void
    {
        $encoded = json_encode($records, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        if ($encoded === false) {
            throw new RuntimeException('Unable to encode signup records.');
        }

        if (file_put_contents($this->storagePath, $encoded, LOCK_EX) === false) {
            throw new RuntimeException('Unable to write signup storage.');
        }
    }
}
