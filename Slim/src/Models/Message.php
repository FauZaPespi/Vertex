<?php

namespace Fauza\Template\Models;

class Message
{
    public int $id;
    public string $content;
    public string $type;

    public function __construct(int $id, string $content, string $type)
    {
        $this->id = $id;
        $this->content = $content;
        $this->type = $type;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'type' => $this->type
        ];
    }

    public function fromArray(array $data): void
    {
        if (isset($data['id']) && isset($data['content']) && isset($data['type'])) {
            $this->id = $data['id'];
            $this->content = $data['content'];
            $this->type = $data['type'];
        } else {
            throw new \InvalidArgumentException("Invalid data array to populate Message object.");
        }
    }
    /**
     * Insert the message in the database
     */
    public function insert()
    {
        $sql = "INSERT INTO messages (content, type) VALUES (:content, :type)";
        $params = [
            ':content' => $this->content,
            ':type' => $this->type
        ];
        $stmt = Database::run($sql, $params);
        $this->id = (int)Database::db()->lastInsertId();
    }
    /**
     * Fetch a message by ID from the database
     */
    public static function fetchById(int $id): ?Message
    {
        $sql = "SELECT * FROM messages WHERE id = :id";
        $params = [':id' => $id];
        $stmt = Database::run($sql, $params);
        $data = $stmt->fetch();
        if ($data) {
            return new Message((int)$data['id'], $data['content'], $data['type']);
        }
        return null;
    }
    /**
     * Delete the message in the database
     */
    public function delete(): void
    {
        if (!isset($this->id)) {
            throw new \RuntimeException("Cannot delete a message without an ID.");
        }
        $sql = "DELETE FROM messages WHERE id = :id";
        $params = [':id' => $this->id];
        Database::run($sql, $params);
    }

    /**
     * Update the message in the database
     */
    public function update(): void
    {
        if (!isset($this->id)) {
            throw new \RuntimeException("Cannot update a message without an ID.");
        }
        $sql = "UPDATE messages SET content = :content, type = :type WHERE id = :id";
        $params = [
            ':content' => $this->content,
            ':type' => $this->type,
            ':id' => $this->id
        ];
        Database::run($sql, $params);
    }
}
