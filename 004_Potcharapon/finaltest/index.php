  <?php include('include/head.php') ?>

<body>
  <?php include('include/navbar.php') ?>
    <header class="hero">
        <div class="hero-overlay">
            <div class="hero-content">
                <span class="subtitle">Spring / Summer 2026</span>
                <h1>Elevate Your Style</h1>
                <p>Discover the new collection featuring sustainable materials and timeless design.</p>
                <div class="hero-btns">
                    <a href="#" class="btn-primary">Shop Collection</a>
                    <a href="#" class="btn-secondary">View Lookbook</a>
                </div>
            </div>
        </div>
    </header>

    <section class="products">
        <div class="section-header">
            <h2>Featured Products</h2>
            <div class="line"></div>
        </div>

        <div class="product-grid">
            <div class="product-card">
                <div class="product-img" style="background-image: url('https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=500');">
                    <div class="overlay-btn">Quick View</div>
                </div>
                <div class="product-info">
                    <h3>Minimalist Watch</h3>
                    <p class="price">$120.00</p>
                    <button class="add-btn">Add to Cart</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-img" style="background-image: url('https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?q=80&w=500');">
                    <div class="overlay-btn">Quick View</div>
                </div>
                <div class="product-info">
                    <h3>Classic Sneakers</h3>
                    <p class="price">$85.00</p>
                    <button class="add-btn">Add to Cart</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-img" style="background-image: url('https://images.unsplash.com/photo-1505740420928-5e560c06d30e?q=80&w=500');">
                    <div class="overlay-btn">Quick View</div>
                </div>
                <div class="product-info">
                    <h3>Pro Headphones</h3>
                    <p class="price">$250.00</p>
                    <button class="add-btn">Add to Cart</button>
                </div>
            </div>
        </div>
    </section>
  <?php include('include/footer.php') ?>

</body>
</html>