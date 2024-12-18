<?php
// страница продукти
$books = [];

$search = $_GET['search'] ?? '';

//правим заявка към БД
$query = "SELECT * FROM books WHERE title LIKE :search";
$stmt = ($pdo->prepare($query));
$stmt->execute([':search' => "%$search%"]);
while ($row = $stmt->fetch()) {
    $fav_query = "SELECT id FROM favorite_books_users WHERE user_id = :user_id AND book_id = :book_id";
    $fav_stmt = $pdo->prepare($fav_query);
    $fav_params = [
        ':user_id' => $_SESSION['user_id'] ?? 0,
        ':book_id' => $row['id']
    ];
    $fav_stmt->execute($fav_params);
    $row['is_favorite'] = $fav_stmt->fetch() ? 1 : 0;

    $books[] = $row;
}

//debug($books);

if (!empty($search)) {
    setcookie('last_search', $search, time() + 3600, '/', 'localhost', false, false);
}
?>

<div class="row">
    <form class="mb-4" method="GET">
        <div class="input-group">
            <input type="hidden" name="page" value="books">
            <input type="text" class="form-control" placeholder="Търси книга" name="search" value="<?php echo $search ?>">
            <button class="btn btn-primary" type="submit">Търсене</button>
        </div>
    </form>
    <?php
    if (isset($_COOKIE['last_search'])) {
        echo '
                <div class="alert alert-info" role="alert">
                Последно търсене: ' . $_COOKIE['last_search'] . '
                </div>
            ';
    }
    ?>
</div>
<?php
if (count($books) == 0) {
    echo '
            <div class="alert alert-warning" role="alert">
                Няма намерени продукти
            </div>
        ';
} else {
    echo ' <div class="d-flex flex-wrap justify-content-between">';
    foreach ($books as $book) {
        $fav_btn = $edit_delete_buttons = '';
        if (isset($_SESSION['user_name'])) {
            if ($book['is_favorite'] == '1') {
                $fav_btn = '
                <div class="card-footer text-center">
                            <button class="btn btn-danger btn-sm remove-favorite"  data-book="' . $book['id'] . '">Премахни от любими</button>
                        </div>
                ';
            } else {
                $fav_btn = '
            <div class="card-footer text-center">
                            <button class="btn btn-primary btn-sm add-favorite"  data-book="' . $book['id'] . '">Добави в любими</button>
                        </div>
            ';
            }
        }
        if (is_admin()) {
            $edit_delete_buttons = ' 
            <div class="card-header d-flex flex-row justify-content-between">
                        <a href="?page=edit_book&id=' . $book['id'] . '" class="btn btn-sm btn-warning">Редактирай</a>
                        <form method="POST" action="./handlers/handel_delete_book.php">
                            <input type="hidden" name="id" value="' . $book['id'] . '">
                            <button type="submit" class="btn btn-sm btn-danger">Изтрий</button>
                        </form>
                    </div>
                    ';
        }
        echo '
                <div class="card mb-4" style="width: 14rem;"> ' . $edit_delete_buttons . '
                   
                    <img src="uploads/' . htmlspecialchars($book['image']) . '" class="card-img-top" alt="Book Image">
                    <div class="card-body">
                        <h5 class="card-title">' . htmlspecialchars($book['title']) . '</h5>
                        <p class="card-text">' . htmlspecialchars($book['price']) . '</p>
                    </div>
                        ' . $fav_btn . '
                </div>
            ';
    }
    echo '</div>';
}
?>