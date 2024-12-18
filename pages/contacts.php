<?php
// страница контакти

//debug($_POST);

if (isset($_POST['submit'])) {
    $errors = [];
    foreach ($_POST as $key => $value) {
        //debug($key . '=>' . $value);
        //echo '<br>';
        if ($key != 'submit' && empty($value)) {
            $errors[] = "Полето $key не е попълнено!";
        }
    }
    debug($errors);
    if (count($errors) == 0) {
        echo '  <div class="alert alert-success" role="alert">
                    Здравейте, ' . $_POST['name'] . '! Вашият отзив беше изпратен успешно! Моля очаквайте отговор на ' . $_POST['email'] . '!
                </div>';
    } else {
        echo '  <div class="alert alert-warning" role="alert">
                    ' . implode('<br>', $errors) . '
                </div>';
    }
}

?>
<h1>Оставете своя отзив!</h1>
<form method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Имена</label>
        <input type="text" class="form-control" id="name" placeholder="Вашите имена" name="name">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Имейл</label>
        <input type="email" class="form-control" id="email" placeholder="Имейл адресът Ви" name="email">
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Оставете мнението си тук</label>
        <textarea class="form-control" id="message" rows="4" name="message"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Изпрати</button>
</form>