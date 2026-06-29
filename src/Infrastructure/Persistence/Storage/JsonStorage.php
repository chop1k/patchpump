<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Storage;

use RuntimeException;

/**
 * Represents a single JSON file that stores a list of mixed-type data.
 *
 * This class follows Elegant Objects principles:
 * - Single Responsibility: manages ONE file
 * - Immutable where possible: readonly properties
 * - Encapsulation: hides implementation details
 * - Clear intent: methods express what they do
 * - Constructor-based initialization
 * - No getters/setters: only behavior methods
 * - Throws exceptions on invalid states
 *
 * Usage:
 *     $storage = new JsonStorage('/tmp/data.json');
 *     $storage = $storage->append(['name' => 'John', 'age' => 30]);
 *     $storage = $storage->append(['name' => 'Jane', 'count' => 5]);
 *
 *     $items = $storage->items();  // Mixed type items
 *     $count = $storage->count();
 *
 *     $storage = $storage->clear();
 */
final readonly class JsonStorage
{
    /**
     * Path to the JSON file.
     */
    private string $filePath;

    /**
     * Constructor with file path validation.
     *
     * @param string $filePath Absolute or relative path to JSON file
     *
     * @throws RuntimeException If path is invalid
     */
    public function __construct(string $filePath)
    {
        if (empty($filePath)) {
            throw new RuntimeException('File path cannot be empty');
        }

        $this->filePath = $filePath;

        // Ensure directory exists
        $directory = dirname($filePath);
        if ('.' !== $directory && !is_dir($directory)) {
            if (!mkdir($directory, recursive: true)) {
                throw new RuntimeException(sprintf('Cannot create directory: %s', $directory));
            }
        }

        // Create empty file if doesn't exist
        if (!file_exists($filePath)) {
            $this->writeJsonToFile([]);
        }
    }

    /**
     * Get all items from the file.
     *
     * @return array<mixed> List of items with mixed types
     *
     * @throws RuntimeException If file cannot be read or is invalid JSON
     */
    public function items(): array
    {
        return $this->readJsonFromFile();
    }

    /**
     * Get total number of items in storage.
     *
     * @return int Item count
     */
    public function count(): int
    {
        return count($this->items());
    }

    /**
     * Check if storage is empty.
     *
     * @return bool True if no items
     */
    public function isEmpty(): bool
    {
        return 0 === $this->count();
    }

    /**
     * Append a single item to storage.
     *
     * @param mixed $item Item of any type to append
     *
     * @return self New instance with appended data
     *
     * @throws RuntimeException If write fails
     */
    public function append(mixed $item): self
    {
        $items = $this->items();
        $items[] = $item;
        $this->writeJsonToFile($items);

        return $this;
    }

    /**
     * Append multiple items to storage.
     *
     * @param array<mixed> $newItems Items to append
     *
     * @return self New instance with appended data
     *
     * @throws RuntimeException If write fails
     */
    public function appendMany(array $newItems): self
    {
        $items = $this->items();
        $items = array_merge($items, $newItems);
        $this->writeJsonToFile($items);

        return $this;
    }

    /**
     * Replace item at specific index.
     *
     * @param int   $index Position to replace
     * @param mixed $item  New item value
     *
     * @return self New instance with replaced item
     *
     * @throws RuntimeException If index is out of bounds
     */
    public function replace(int $index, mixed $item): self
    {
        if ($index < 0) {
            throw new RuntimeException('Index cannot be negative');
        }

        $items = $this->items();

        if (!isset($items[$index])) {
            throw new RuntimeException(sprintf('Index %d is out of bounds', $index));
        }

        $items[$index] = $item;
        $this->writeJsonToFile($items);

        return $this;
    }

    /**
     * Remove item at specific index.
     *
     * @param int $index Position to remove
     *
     * @return self New instance with removed item
     *
     * @throws RuntimeException If index is out of bounds
     */
    public function remove(int $index): self
    {
        if ($index < 0) {
            throw new RuntimeException('Index cannot be negative');
        }

        $items = $this->items();

        if (!isset($items[$index])) {
            throw new RuntimeException(sprintf('Index %d is out of bounds', $index));
        }

        unset($items[$index]);
        $this->writeJsonToFile(array_values($items));

        return $this;
    }

    /**
     * Remove multiple items by indices.
     *
     * @param array<int> $indices Positions to remove (in reverse order)
     *
     * @return self New instance with removed items
     *
     * @throws RuntimeException If any index is out of bounds
     */
    public function removeMany(array $indices): self
    {
        // Sort indices in reverse to avoid shifting issues
        rsort($indices);

        $items = $this->items();

        foreach ($indices as $index) {
            if ($index < 0 || !isset($items[$index])) {
                throw new RuntimeException(sprintf('Index %d is out of bounds', $index));
            }
            unset($items[$index]);
        }

        $this->writeJsonToFile(array_values($items));

        return $this;
    }

    /**
     * Filter items by callback predicate.
     *
     * @param callable(mixed): bool $predicate Function that returns true for items to keep
     *
     * @return self New instance with filtered items
     */
    public function filter(callable $predicate): self
    {
        $items = $this->items();
        $filtered = array_filter($items, $predicate);
        $this->writeJsonToFile(array_values($filtered));

        return $this;
    }

    /**
     * Map items through callback function.
     *
     * @param callable(mixed): mixed $mapper Function to transform each item
     *
     * @return self New instance with mapped items
     */
    public function map(callable $mapper): self
    {
        $items = $this->items();
        $mapped = array_map($mapper, $items);
        $this->writeJsonToFile($mapped);

        return $this;
    }

    /**
     * Get first item matching predicate.
     *
     * @param callable(mixed): bool $predicate Search condition
     *
     * @return mixed|null Found item or null
     */
    public function find(callable $predicate): mixed
    {
        foreach ($this->items() as $item) {
            if ($predicate($item)) {
                return $item;
            }
        }

        return null;
    }

    /**
     * Check if any item matches predicate.
     *
     * @param callable(mixed): bool $predicate Test condition
     *
     * @return bool True if at least one item matches
     */
    public function contains(callable $predicate): bool
    {
        return null !== $this->find($predicate);
    }

    /**
     * Get item at specific index.
     *
     * @param int $index Position to retrieve
     *
     * @return mixed Item at index
     *
     * @throws RuntimeException If index is out of bounds
     */
    public function at(int $index): mixed
    {
        if ($index < 0) {
            throw new RuntimeException('Index cannot be negative');
        }

        $items = $this->items();

        if (!isset($items[$index])) {
            throw new RuntimeException(sprintf('Index %d is out of bounds', $index));
        }

        return $items[$index];
    }

    /**
     * Get first item in storage.
     *
     * @return mixed First item
     *
     * @throws RuntimeException If storage is empty
     */
    public function first(): mixed
    {
        if ($this->isEmpty()) {
            throw new RuntimeException('Storage is empty');
        }

        return $this->at(0);
    }

    /**
     * Get last item in storage.
     *
     * @return mixed Last item
     *
     * @throws RuntimeException If storage is empty
     */
    public function last(): mixed
    {
        if ($this->isEmpty()) {
            throw new RuntimeException('Storage is empty');
        }

        return $this->at($this->count() - 1);
    }

    /**
     * Clear all items from storage.
     *
     * @return self New instance with empty storage
     *
     * @throws RuntimeException If write fails
     */
    public function clear(): self
    {
        $this->writeJsonToFile([]);

        return $this;
    }

    /**
     * Sort items with custom comparison function.
     *
     * @param callable(mixed, mixed): int $comparator Comparison function
     *
     * @return self New instance with sorted items
     */
    public function sort(callable $comparator): self
    {
        $items = $this->items();
        usort($items, $comparator);
        $this->writeJsonToFile($items);

        return $this;
    }

    /**
     * Reverse items order.
     *
     * @return self New instance with reversed items
     */
    public function reverse(): self
    {
        $items = array_reverse($this->items());
        $this->writeJsonToFile($items);

        return $this;
    }

    /**
     * Get file path (for debugging/monitoring).
     *
     * @return string Absolute path to storage file
     */
    public function filePath(): string
    {
        return $this->filePath;
    }

    /**
     * Check if storage file exists.
     *
     * @return bool True if file exists
     */
    public function exists(): bool
    {
        return file_exists($this->filePath);
    }

    /**
     * Get file size in bytes.
     *
     * @return int File size
     */
    public function size(): int
    {
        if (!$this->exists()) {
            return 0;
        }

        return filesize($this->filePath) ?: 0;
    }

    /**
     * Read JSON from file with error handling.
     *
     * @return array<mixed> Parsed JSON data
     *
     * @throws RuntimeException If file cannot be read or JSON is invalid
     */
    private function readJsonFromFile(): array
    {
        if (!file_exists($this->filePath)) {
            throw new RuntimeException(sprintf('File not found: %s', $this->filePath));
        }

        if (!is_readable($this->filePath)) {
            throw new RuntimeException(sprintf('File is not readable: %s', $this->filePath));
        }

        $content = file_get_contents($this->filePath);

        if (false === $content) {
            throw new RuntimeException(sprintf('Cannot read file: %s', $this->filePath));
        }

        $data = json_decode($content, associative: true);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new RuntimeException(sprintf('Invalid JSON in file %s: %s', $this->filePath, json_last_error_msg()));
        }

        return is_array($data) ? $data : [];
    }

    /**
     * Write data to JSON file with error handling.
     *
     * @param array<mixed> $data Data to write
     *
     * @throws RuntimeException If write fails
     */
    private function writeJsonToFile(array $data): void
    {
        $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        if (false === $json) {
            throw new RuntimeException(sprintf('Cannot encode data to JSON: %s', json_last_error_msg()));
        }

        $result = file_put_contents($this->filePath, $json);

        if (false === $result) {
            throw new RuntimeException(sprintf('Cannot write to file: %s', $this->filePath));
        }
    }
}
