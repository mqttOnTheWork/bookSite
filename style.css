<?php
// Файл functions.php

// Функция для распределения товаров по массивам на основе краткого описания
function categorize_products_by_excerpt() {
    // Получаем все товары WooCommerce
    $args = [
        'post_type'      => 'product', // Тип записи - товары WooCommerce
        'posts_per_page' => -1,       // Получаем все товары
        'post_status'    => 'publish', // Только опубликованные товары
    ];

    $products = new WP_Query($args);

    // Инициализируем массивы для категорий
    $novinki = [];
    $klassika = [];
    $populyarnye = [];

    // Проходим по всем товарам
    if ($products->have_posts()) {
        while ($products->have_posts()) {
            $products->the_post();
            $product_id = get_the_ID(); // ID товара
            $excerpt = get_the_excerpt(); // Краткое описание товара

            // Проверяем наличие ключевых слов в кратком описании
            if (strpos(mb_strtolower($excerpt), 'новинка') !== false) {
                $novinki[] = $product_id; // Добавляем в массив "новинки"
            } elseif (strpos(mb_strtolower($excerpt), 'классика') !== false) {
                $klassika[] = $product_id; // Добавляем в массив "классика"
            } elseif (strpos(mb_strtolower($excerpt), 'популярное') !== false) {
                $populyarnye[] = $product_id; // Добавляем в массив "популярные"
            }
        }
    }

    // Возвращаем массивы с результатами
    return [
        'novinki'     => $novinki,
        'klassika'    => $klassika,
        'populyarnye' => $populyarnye,
    ];
}

