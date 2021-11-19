<?php

namespace App\Entities;

class Task
{
    private int $id;
    private string $content;
    private string $timestamp;
    private int $completed;
    private int $archived;

    public function getId(): int
    {
        return $this->id;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    public function getCompleted(): int
    {
        return $this->completed;
    }

    public function getArchived(): int
    {
        return $this->archived;
    }

}