<?php


namespace KnightsGame\Classes;


class CircularIterator implements \Iterator, \Countable, \ArrayAccess
{

    private array $entries;

    public function __construct(array $entries)
    {
        $this->entries = $entries;
        $this->rewind();
    }

    /**
     * Return the current element
     * @return mixed
     */
    public function current()
    {
        return current($this->entries);
    }

    /**
     * Move forward to next element
     * @return void
     */
    public function next()
    {
        next($this->entries);

        if (!$this->current()) {
            $this->rewind();
        }
    }

    /**
     * Move backward to previous element
     * @return void
     */
    public function prev()
    {
        prev($this->entries);

        if (!$this->current()) {
            $this->end();
        }
    }

    /**
     * Return the key of the current element
     * @return int|string|null
     */
    public function key()
    {
        return key($this->entries);
    }

    /**
     * Checks if current position is valid
     * @return boolean
     */
    public function valid(): bool
    {
        return (bool)$this->current();
    }

    /**
     * Rewind the Iterator to the first element
     * @return void
     */
    public function rewind()
    {
        reset($this->entries);
    }

    /**
     * Rewind the Iterator to the last element
     * @return void
     */
    public function end()
    {
        end($this->entries);
    }

    /**
     * Get count of entries
     * @return int
     */
    public function count(): int
    {
        return count($this->entries);
    }

    /**
     * Check offset exists in entries
     * @param $offset
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->entries);
    }

    /**
     * Get value of offset in entries
     * @param $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->entries[$offset];
    }

    /**
     * Set value and offset in entries
     * @param $offset
     * @param $value
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->entries[$offset] = $value;
    }

    /**
     * Unset offset in entries
     * @param $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->entries[$offset]);
    }
}