<?php
require_once '../src/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
        $password = $_POST['password'];

            $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
                $stmt->bind_param('s', $username);
                    $stmt->execute();
                        $stmt->store_result();
                            
                                if ($stmt->num_rows > 0) {
                                        $stmt->bind_result($user_id, $hashed_password);
                                                $stmt->fetch();
                                                        if (password_verify($password, $hashed_password)) {
                                                                    $_SESSION['user_id'] = $user_id;
                                                                                header('Location: index.php');
                                                                                            exit;
                                                                                                    }
                                                                                                        }
                                                                                                            $error = "Usuário ou senha inválidos.";
                                                                                                            }
                                                                                                            ?>

                                                                                                            <!DOCTYPE html>
                                                                                                            <html lang="pt-BR">
                                                                                                            <head>
                                                                                                                <meta charset="UTF-8">
                                                                                                                    <title>Login - Império Antigo</title>
                                                                                                                    </head>
                                                                                                                    <body>
                                                                                                                    <h1>Login</h1>

                                                                                                                    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

                                                                                                                    <form method="post">
                                                                                                                        Usuário: <input type="text" name="username" required><br>
                                                                                                                            Senha: <input type="password" name="password" required><br>
                                                                                                                                <button type="submit">Entrar</button>
                                                                                                                                </form>

                                                                                                                                <p><a href="register.php">Registrar nova conta</a></p>
                                                                                                                                </body>
                                                                                                                                </html>