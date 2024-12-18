<?php
// редакция на продукт
$book_id = intval($_GET['id'] ?? 0);

if ($book_id > 0) {
    $query = "SELECT * FROM books WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $book_id]);
    $book = $stmt->fetch();
}

//debug($book);
?>

<form class="border rounded p-4 w-50 mx-auto" method="POST" action="./handlers/handel_edit_book.php" enctype="multipart/form-data">
    <h3 class="text-center">Редактирай информация за книга</h3>
    <div class="mb-3">
        <label for="title" class="form-label">Заглавие:</label>
        <input type="text" class="form-control" id="title" name="title" value="<?php echo $book['title'] ?? '' ?>">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Цена:</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo $book['price'] ?? '' ?>">
    </div>
    <div class=" mb-3">
        <label for="image" class="form-label">Изображение:</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
    </div>
    <div class=" mb-3">
        <img class="img-fluid" src="uploads/<?php echo $book['image'] ?>" alt="<?php echo $book['title'] ?>">
    </div>
    <input type="hidden" name="id" value="<?php echo $book['id'] ?>">
    <button type="submit" class="btn btn-success mx-auto">Редактирай</button>
</form>