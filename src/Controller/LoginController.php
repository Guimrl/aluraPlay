<?php

declare(strict_types = 1);

namespace src\mvc\Controller;

class LoginController implements Controller
{
    private \PDO $pdo;

    public function __construct()
    {
        $dbPath = __DIR__ . '/../banco.sqlite';
        $this->pdo = new \PDO("sqlite:$dbPath");
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $sql = 'SELECT * FROM users WHERE email = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->execute();

        $userData = $stmt->fetch(\PDO::FETCH_ASSOC);
        $correctPassword = password_verify($password, $userData['password'] ?? '');

        if ($correctPassword) {
            header('Location: /');
        } else {
            header('Location: /login?sucesso=0');
        }
    }
}
