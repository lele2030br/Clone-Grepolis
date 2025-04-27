<?php
require_once '../src/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
                $stmt->bind_param('ss', $username, $password);
                    
                        if ($stmt->execute()) {
                                $user_id = $conn->insert_id;
                                        $conn->query("INSERT INTO cities (user_id, name) VALUES ($user_id, 'Cidade Inicial')");
                                                $_SESSION['user_id'] = $user_id;
                                                        header('Location: index.php');
                                                                exit;
                                                                    } else {
                                                                            $error = "Erro ao registrar. Usuário pode já existir.";
                                                                                }
                                                                                }
                                                                                ?>

                                                                                <!DOCTYPE html>
                                                                                <html lang="pt-BR">
                                                                                <head>
                                                                                    <meta charset="UTF-8">
                                                                                        <title>Registrar - Império Antigo</title>
                                                                                        </head>
                                                                                        <body>
                                                                                        <h1>Registro</h1>

                                                                                        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

                                                                                        <form method="post">
                                                                                            Usuário: <input type="text" name="username" required><br>
                                                                                                Senha: <input type="password" name="password" required><br>
                                                                                                    <button type="submit">Registrar</button>
                                                                                                    </form>

                                                                                                    <p><a href="login.php">Já tem uma conta? Entrar</a></p>
                                                                                                    </body>
                                                                                                    </html>