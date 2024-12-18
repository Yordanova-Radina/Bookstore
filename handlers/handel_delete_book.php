<?php

require_once('../functions.php');
require_once('../db.php');

if (!is_admin()) {
    $_SESSION['flash']['message']['type'] = 'warning';
    $_SESSION['flash']['message']['text'] = 'Нямате достъп до тази страница!';

    header('Location: ../index.php');
    exit;
}

$book_id = intval($_POST['id'] ?? 0);

if ($book_id == 0) {
    $_SESSION['flash']['message']['type'] = 'danger';
    $_SESSION['flash']['message']['text'] = 'Невалидни данни за книга!';

    header('Location: ../index.php?page=books');
    exit;
}

$query = "DELETE FROM books WHERE id = :id";
$stmt = $pdo->prepare($query);
if ($stmt->execute([':id' => $book_id])) {
    $_SESSION['flash']['message']['type'] = 'success';
    $_SESSION['flash']['message']['text'] = 'Книгата е изтрита успешно!';
} else {
    $_SESSION['flash']['message']['type'] = 'danger';
    $_SESSION['flash']['message']['text'] = 'Възникна грешка при изтриването на книгата!';
}

header('Location: ../index.php?page=books');
exit;
