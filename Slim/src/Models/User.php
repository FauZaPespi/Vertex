<?php

namespace Fauza\Template\Models;

class User
{
    private int $id; // User ID
    private string $username; // Username
    private string $email; // Email address
    private string $passwordHash; // Hashed password
    private array $conversationIds; // Array of Conversation IDs

    public function __construct(int $id, string $username, string $email, string $passwordHash)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getUsername(): string
    {
        return $this->username;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function checkPassword($incomePass): bool
    {
        return password_verify($incomePass, $this->passwordHash);
    }
    public function setPassword(string $newPassword): void
    {
        $this->passwordHash = password_hash($newPassword, PASSWORD_ARGON2_DEFAULT_MEMORY_COST);
    }

    public static function create($username, $email, $password): void
    {
        $passwordHash = password_hash($password, PASSWORD_ARGON2_DEFAULT_MEMORY_COST);
        $sql = "INSERT INTO users (username, email, passwordHash) VALUES (:username, :email, :passwordHash)";
        $params = [
            ':username' => $username,
            ':email' => $email,
            ':passwordHash' => $passwordHash
        ];
        Database::run($sql, $params);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email
        ];
    }
    public function fromArray(array $data): void
    {
        if (isset($data['id']) && isset($data['username']) && isset($data['email']) && isset($data['passwordHash'])) {
            $this->id = $data['id'];
            $this->username = $data['username'];
            $this->email = $data['email'];
            $this->passwordHash = $data['passwordHash'];
        } else {
            throw new \InvalidArgumentException("Invalid data array to populate User object.");
        }
    }
    public function getConversations(): array
    {
        return $this->conversationIds;
    }

    public static function exists($username, $email): bool
    {
        $sql = "SELECT COUNT(*) as count FROM users WHERE username = :username OR email = :email";
        $params = [
            ':username' => $username,
            ':email' => $email
        ];
        $stmt = Database::run($sql, $params);
        $data = $stmt->fetch();
        return $data['count'] > 0;
    }

    public static function findByUsername($username): ?User
    {
        $sql = "SELECT * FROM users WHERE username = :username";
        $params = [':username' => $username];
        $stmt = Database::run($sql, $params);
        $data = $stmt->fetch();
        if ($data) {
            return new User((int)$data['id'], $data['username'], $data['email'], $data['passwordHash']);
        }
        return null;
    }
}
