<?php 

include_once("config.php");
include_once("err_handler.php");
include_once("db_connect.php");
include_once("functions.php");

include_once("find_token.php");

if(!isset($_GET['type'])) {
    echo ajax_echo(
        "Ошибка!", // Заголовок ответа
        "Вы не указали GET параметр type", // Описание ответа
        true, // Наличие ошибка
        "ERROR", // Результат ответа
        null // Дополнительные данные для ответа
    );
    exit();
}

if(preg_match_all("/^(list_product)$/ui", $_GET['type'])){
    $query = "SELECT `id`, `name`, `desc`, `price` FROM `products`";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    $arr_list = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_list, $row);
    }

    
    echo ajax_echo(
        "Список товаров", // Заголовок ответа
        "Вывод списка товаров", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        $arr_list // Дополнительные данные для ответа
    );

    exit();
}

if(preg_match_all("/^(list_users)$/ui", $_GET['type'])){
    $query = "SELECT `id`, `first_name`, `second_name`, `middle_name`, `gender`, `date_of_birth` FROM `users`";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    $arr_list = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_list, $row);
    }

    
    echo ajax_echo(
        "Список пользователей", // Заголовок ответа
        "Вывод списка пользователей", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        $arr_list // Дополнительные данные для ответа
    );

    exit();
}

if(preg_match_all("/^(list_uslugy)$/ui", $_GET['type'])){
    $query = "SELECT `id`, `name`, `price`, `desc` FROM `uslugy`";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    $arr_list = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_list, $row);
    }

    
    echo ajax_echo(
        "Список корзин", // Заголовок ответа
        "Вывод списка услуг", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        $arr_list // Дополнительные данные для ответа
    );

    exit();
}

if(preg_match_all("/^(list_comments)$/ui", $_GET['type'])){
    $query = "SELECT `id`, `user_id`, `product_id`, `comment`, `date_of_append`, `del` FROM `comments`";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    $arr_list = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_list, $row);
    }

    
    echo ajax_echo(
        "Список отзывов", // Заголовок ответа
        "Вывод списка отзывов", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        $arr_list // Дополнительные данные для ответа
    );

    exit();
}

if(preg_match_all("/^(list_tools)$/ui", $_GET['type'])){
    $query = "SELECT `id`, `name`, `count` FROM `tools`";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    $arr_list = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_list, $row);
    }

    
    echo ajax_echo(
        "Список заказов", // Заголовок ответа
        "Вывод списка инструментов", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        $arr_list // Дополнительные данные для ответа
    );

    exit();
}

else if(preg_match_all("/^(add_product)$/ui", $_GET['type'])){
    if(!isset($_GET['name'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр name", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['price'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр price", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['desc'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр price", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    $query = "INSERT INTO `products`(`name`, `price`, `desc`) VALUES ('" . $_GET['name'] . "', '". $_GET['price'] ."', '". $_GET['desc'] ."')";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    echo ajax_echo(
        "Успех", // Заголовок ответа
        "Новый товар был добавлен в базу данных", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        null // Дополнительные данные для ответа
    );
    exit();
}

else if(preg_match_all("/^(add_user)$/ui", $_GET['type'])){
    if(!isset($_GET['first_name'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр first_name", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['second_name'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр second_name", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['middle_name'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр middle_name", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['gender'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр gender", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['date_of_birth'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр date_of_birth", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    $query = "INSERT INTO `users`(`first_name`, `second_name`, `middle_name`, `gender`, `date_of_birth`) VALUES ('" . $_GET['first_name'] . "', '". $_GET['second_name'] ."', '". $_GET['middle_name'] ."', '". $_GET['gender'] ."', '". $_GET['date_of_birth'] ."')";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    echo ajax_echo(
        "Успех", // Заголовок ответа
        "Новый пользователь был добавлен в базу данных", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        null // Дополнительные данные для ответа
    );
    exit();
}

else if(preg_match_all("/^(add_tools)$/ui", $_GET['type'])){
    if(!isset($_GET['name'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр name", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['count'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр count", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    

    $query = "INSERT INTO `tools`(`name`, `count`) VALUES ('" . $_GET['name'] . "', '". $_GET['count'] ."')";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    echo ajax_echo(
        "Успех", // Заголовок ответа
        "Новый инструмент был добавлен в базу данных", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        null // Дополнительные данные для ответа
    );
    exit();
}

else if(preg_match_all("/^(upd_product)$/ui", $_GET['type'])){
    if(!isset($_GET['name'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр name", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['desc'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр desc", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['price'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр price", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
        if(!isset($_GET['id'])) {
            echo ajax_echo(
                "Ошибка!", // Заголовок ответа
                "Вы не указали GET параметр id", // Описание ответа
                true, // Наличие ошибка
                "ERROR", // Результат ответа
                null // Дополнительные данные для ответа
        );
        exit();
    }
    $query = "UPDATE `products` SET `name` = '". $_GET['name'] ."', `desc` = '". $_GET['desc'] ."', `price` = '". $_GET['price'] ."' WHERE `id` = '". $_GET['id'] ."'";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    echo ajax_echo(
        "Успех", // Заголовок ответа
        "Обновление товара прошло успешно", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        null // Дополнительные данные для ответа
    );
    exit();
}

else if(preg_match_all("/^(upd_tools)$/ui", $_GET['type'])){
    if(!isset($_GET['name'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр name", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['count'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр count", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
        if(!isset($_GET['id'])) {
            echo ajax_echo(
                "Ошибка!", // Заголовок ответа
                "Вы не указали GET параметр id", // Описание ответа
                true, // Наличие ошибка
                "ERROR", // Результат ответа
                null // Дополнительные данные для ответа
        );
        exit();
    }
    $query = "UPDATE `tools` SET `name` = '". $_GET['name'] ."', `count` = '". $_GET['count'] ."' WHERE `id` = '". $_GET['id'] ."'";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    echo ajax_echo(
        "Успех", // Заголовок ответа
        "Обновление списка инструментов прошло успешно", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        null // Дополнительные данные для ответа
    );
    exit();
}

else if(preg_match_all("/^(upd_uslugy)$/ui", $_GET['type'])){
    if(!isset($_GET['name'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр name", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['price'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр price", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['desc'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр desc", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
        if(!isset($_GET['id'])) {
            echo ajax_echo(
                "Ошибка!", // Заголовок ответа
                "Вы не указали GET параметр id", // Описание ответа
                true, // Наличие ошибка
                "ERROR", // Результат ответа
                null // Дополнительные данные для ответа
        );
        exit();
    }
    $query = "UPDATE `uslugy` SET `name` = '". $_GET['name'] ."', `price` = '". $_GET['price'] ."', `desc` = '". $_GET['desc'] ."' WHERE `id` = '". $_GET['id'] ."'";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    echo ajax_echo(
        "Успех", // Заголовок ответа
        "Обновление заказа прошло успешно", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        null // Дополнительные данные для ответа
    );
    exit();
}

echo ajax_echo(
    "Заголовок", // Заголовок ответа
    "текст", // Описание ответа
    false, // Наличие ошибка
    "SUCCESS", // Результат ответа
    array( 
        0,1,2,3,4,5,6
    ) // Дополнительные данные для ответа
);