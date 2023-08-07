<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Создание заказа в RetailCRM</title>
</head>
<body>
<h1>Создание заказа в RetailCRM</h1>

<form action="create_order.php" method="post">
    <label for="product">Выберите товар:</label>
    <select name="product" id="product">
        <option value="product_id_1">Товар 1</option>
        <option value="product_id_2">Товар 2</option>
        <!-- Добавьте остальные товары здесь -->
    </select>

    <br>

    <label for="name">Имя:</label>
    <input type="text" name="name" required>

    <br>

    <label for="phone">Номер телефона:</label>
    <input type="tel" name="phone" required>

    <br>

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <br>

    <input type="submit" value="Создать заказ">
</form>
</body>
</html>
