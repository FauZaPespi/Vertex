<?php

namespace Fauza\Template\Models;

class Conversation
{
    private int $id; // Conversation ID
    private array $messages; // Array of Message IDs

    public function __construct(int $id)
    {
        $this->id = $id;
        $this->messages = [];
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getMessages(): array
    {
        return $this->messages;
    }
    public function addMessage($message): void
    {
        $this->messages[] = $message;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'messages' => $this->messages,
        ];
    }
    public function fromArray(array $data): void
    {
        if (isset($data['id']) && isset($data['messages'])) {
            $this->id = $data['id'];
            $this->messages = $data['messages'];
        } else {
            throw new \InvalidArgumentException("Invalid data array to populate Conversations object.");
        }
    }

    /*
     * Insert the all conversation class into the database
     */
    public function insert() {
        $sql = "INSERT INTO conversations (id, messages, media_ids) VALUES (:id, :messages, :media_ids)";
        $params = [
            ':id' => $this->id,
            ':messages' => $this->messages,
        ];
        Database::run($sql, $params);
    }
}
