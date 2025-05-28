<?php get_header(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин книг</title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
</head>
<body>
   <!-- Header -->
<header class="site-header">
    <nav class="header-nav">
        <a href="#about">О нас</a>
        <a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>">Магазин</a>
        <a href="#new-books">Новинки</a>
        <a href="#classic-books">Классика</a>
        <a href="#popular-books">Популярное</a>
    </nav>
</header>

<!-- Banner Section -->
<!-- Баннер -->
<section class="banner-section">
    <div class="banner-overlay"></div>
    <div class="banner-content">
        <h1>МАГАЗИН КНИГ</h1>
        <p>Ваш мир знаний и вдохновения начинается здесь!</p>
        <p>В нашем магазине собраны лучшие книги для любого читателя: от классики до новинок. Мы предлагаем широкий выбор качественных изданий, удобную доставку и индивидуальный подход к каждому покупателю. Читайте книги — открывайте новые горизонты!</p>
    </div>
</section>

    <!-- Main Content -->
    <main class="site-content">
        <?php
        // Получаем массивы с ID товаров
        $categorized_products = categorize_products_by_excerpt();
        $novinki = $categorized_products['novinki'];
        $klassika = $categorized_products['klassika'];
        $populyarnye = $categorized_products['populyarnye'];
        ?>

        <!-- Новинки -->
        <section id="new-books" class="book-section">
            <h2>Новинки</h2>
            <?php
            if (!empty($novinki)) {
                echo '<ul class="product-list">';
                foreach ($novinki as $product_id) {
                    $product = wc_get_product($product_id);
                    if ($product) {
                        echo '<li class="product-item">';
                        echo '<a href="' . get_permalink($product_id) . '">';
                        echo '<img src="' . wp_get_attachment_image_url($product->get_image_id(), 'thumbnail') . '" alt="' . $product->get_name() . '">';
                        echo '<h3>' . $product->get_name() . '</h3>';
                        echo '<p>' . wc_price($product->get_price()) . '</p>';
                        echo '</a>';
                        echo '<form action="' . esc_url(wc_get_cart_url()) . '" method="post" class="add-to-cart-form">';
                        echo '<button type="submit" name="add-to-cart" value="' . $product_id . '" class="add-to-cart-button">Купить</button>';
                        echo '</form>';
                        echo '</li>';
                    }
                }
                echo '</ul>';
            } else {
                echo '<p>Нет доступных новинок.</p>';
            }
            ?>
        </section>

        <!-- Популярные -->
        <section id="popular-books" class="book-section">
            <h2>Популярные</h2>
            <?php
            if (!empty($populyarnye)) {
                echo '<ul class="product-list">';
                foreach ($populyarnye as $product_id) {
                    $product = wc_get_product($product_id);
                    if ($product) {
                        echo '<li class="product-item">';
                        echo '<a href="' . get_permalink($product_id) . '">';
                        echo '<img src="' . wp_get_attachment_image_url($product->get_image_id(), 'thumbnail') . '" alt="' . $product->get_name() . '">';
                        echo '<h3>' . $product->get_name() . '</h3>';
                        echo '<p>' . wc_price($product->get_price()) . '</p>';
                        echo '</a>';
                        echo '<form action="' . esc_url(wc_get_cart_url()) . '" method="post" class="add-to-cart-form">';
                        echo '<button type="submit" name="add-to-cart" value="' . $product_id . '" class="add-to-cart-button">Купить</button>';
                        echo '</form>';
                        echo '</li>';
                    }
                }
                echo '</ul>';
            } else {
                echo '<p>Нет популярных товаров.</p>';
            }
            ?>
        </section>

        <!-- Классика -->
        <section id="classic-books" class="book-section">
            <h2>Классика</h2>
            <?php
            if (!empty($klassika)) {
                echo '<ul class="product-list">';
                foreach ($klassika as $product_id) {
                    $product = wc_get_product($product_id);
                    if ($product) {
                        echo '<li class="product-item">';
                        echo '<a href="' . get_permalink($product_id) . '">';
                        echo '<img src="' . wp_get_attachment_image_url($product->get_image_id(), 'thumbnail') . '" alt="' . $product->get_name() . '">';
                        echo '<h3>' . $product->get_name() . '</h3>';
                        echo '<p>' . wc_price($product->get_price()) . '</p>';
                        echo '</a>';
                        echo '<form action="' . esc_url(wc_get_cart_url()) . '" method="post" class="add-to-cart-form">';
                        echo '<button type="submit" name="add-to-cart" value="' . $product_id . '" class="add-to-cart-button">Купить</button>';
                        echo '</form>';
                        echo '</li>';
                    }
                }
                echo '</ul>';
            } else {
                echo '<p>Нет товаров в категории "Классика".</p>';
            }
            ?>
        </section>

        <!-- О нас -->
        <section id="about" class="book-section">
            <div class="about">
                <h2>О нас</h2>
                <p>
                    Мы - небольшой, но уютный магазин книг, где каждый найдет что-то для души. 
                    Наша цель - предоставить вам доступ к лучшим произведениям мировой литературы, 
                    будь то новинки, популярные издания или классика.
                </p>
                <p>
                    Почему стоит выбрать нас:
                </p>
                <ul>
                    <li>Широкий ассортимент книг для всех возрастов.</li>
                    <li>Доступные цены и регулярные акции.</li>
                    <li>Быстрая доставка по всей стране.</li>
                    <li>Поддержка отечественных авторов и издательств.</li>
                </ul>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="footer-content">
            <p>Контакты: +7 xxx xxx xx xx | info@mail.ru</p>
            <p>© Все права защищены, 2025</p>
        </div>
    </footer>
</body>
</html>
<?php get_footer(); ?>
