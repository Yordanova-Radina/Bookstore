<?php
require_once('../db.php');

$response = [
    'success' => true,
    'data' => [],
    'error' => '',
];

$book_id = intval($_POST['book_id'] ?? 0);


if ($book_id <= 0) {
    $response['success'] = false;
    $response['error'] = 'Невалидни данни за книга!';
} else {

    $user_id = $_SESSION['user_id'];
    $query = "INSERT INTO favorite_books_users (user_id, book_id) VALUES (:user_id, :book_id)";
    $stmt = $pdo->prepare($query);
    $params = [
        ':user_id' => $user_id,
        ':book_id' => $book_id
    ];

    if (!$stmt->execute($params)) {
        $response['success'] = false;
        $response['error'] = 'Възникна грешка при добавяне на книгата в любими';
    }
}

echo json_encode($response);
exit;
