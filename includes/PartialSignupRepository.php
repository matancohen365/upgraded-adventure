<?php

declare(strict_types=1);

/**
 * PartialSignupRepository
 *
 * Stores partial (incomplete) signup form submissions for tracking and pixel purposes.
 * Records are upserted by session_id so repeated saves from the same visitor
 * overwrite the previous snapshot instead of accumulating duplicates.
 *
 * Storage file: data/partial_signups.json
 */
final class PartialSignupRepository
{
    public function __construct(private string $storagePath)
    {
        $dir = dirname($this->storagePath);

        if (!is_dir($dir) && !mkdir($dir, 0755, true) && !is_dir($dir)) {
            throw new RuntimeException('Unable to create partial storage directory.');
        }

        if (!file_exists($this->storagePath)) {
            $this->atomicWrite([]);
        }
    }

    /**
     * Insert or update a partial record keyed by session_id.
     *
     * @param array<string, mixed> $record
     */
    public function upsert(array $record): void
    {
        $handle = fopen($this->storagePath, 'c+');

        if ($handle === false) {
            throw new RuntimeException('Unable to open partial signup storage.');
        }

        try {
            if (!flock($handle, LOCK_EX)) {
                throw new RuntimeException('Unable to lock partial signup storage.');
            }

            $contents  = stream_get_contents($handle);
            $records   = [];

            if (is_string($contents) && trim($contents) !== '') {
                $decoded = json_decode($contents, true);
                if (is_array($decoded)) {
                    $records = $decoded;
                }
            }

            $sessionId = (string) ($record['session_id'] ?? '');

            // Find existing record index for this session
            $existingIndex = null;
            foreach ($records as $i => $existing) {
                if (isset($existing['session_id']) && $existing['session_id'] === $sessionId) {
                    $existingIndex = $i;
                    break;
                }
            }

            if ($existingIndex !== null) {
                // Merge: keep first_seen, update everything else
                $record['first_seen'] = $records[$existingIndex]['first_seen'] ?? $record['saved_at'];
                $records[$existingIndex] = $record;
            } else {
                $record['first_seen'] = $record['saved_at'];
                $records[] = $record;
            }

            ftruncate($handle, 0);
            rewind($handle);

            $encoded = json_encode($records, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            if ($encoded === false) {
                throw new RuntimeException('Unable to encode partial signup records.');
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
    private function atomicWrite(array $records): void
    {
        $encoded = json_encode($records, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        if ($encoded === false) {
            throw new RuntimeException('Unable to encode partial signup records.');
        }

        if (file_put_contents($this->storagePath, $encoded, LOCK_EX) === false) {
            throw new RuntimeException('Unable to write partial signup storage.');
        }
    }
}
