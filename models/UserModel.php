<?php

namespace models;

use core\Model;

class UserModel extends Model
{

    public function register($login, $password)
    {
        $pdo = $this->db->getConnection();

        $username = trim($login) ?? '';
        $password = trim($password) ?? '';

        if (empty($username) || empty($password)) {
            return "All fields are required";
        }

        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);

        $error = null;

        if ($stmt->fetch()) {
            $error = "User already exists";
        } else {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            if ($stmt->execute([$username, $hashedPassword])) {

                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['user_id'] = $pdo->lastInsertId();
                $_SESSION['username'] = $username;

                header("Location: index");
                exit;
            } else {
                $error = "Registration error";
            }
        }

        return $error ?? null;
    }

    public function login($login, $password)
    {
        $pdo = $this->db->getConnection();

        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($login ?? '');
            $password = $password ?? '';

            if (empty($username) || empty($password)) {
                $error = "All fields are required";
            } else {

                $stmt = $pdo->prepare("SELECT id, password FROM users WHERE username = ?");
                $stmt->execute([$username]);
                $user = $stmt->fetch();

                if ($user && password_verify($password, $user['password'])) {
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }

                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $username;

                    header("Location: index");
                    exit;
                } else {
                    $error = "Invalid username or password";
                }
            }
        }

        return $error ?? null;
    }
}
