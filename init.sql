$password = password_hash('judge123', PASSWORD_DEFAULT);
$pdo->prepare("INSERT INTO judges (username, password) VALUES (?, ?)")->execute(['judge1', $password]);
