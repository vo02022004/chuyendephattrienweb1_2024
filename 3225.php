<?php
$url_host = 'http://' . $_SERVER['HTTP_HOST'];
$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = $url_host . $matches[1][0];
$url_path = str_replace('\\', '/', $url_path);

if (!class_exists('lessc')) {
    $dir_block = dirname($_SERVER['SCRIPT_FILENAME']);
    require_once($dir_block . '/libs/lessc.inc.php');
}
$less = new lessc;
$less->compileFile('less/3225.less', outFname: 'css/3225.css');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Grid</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/3225.css">

</head>

<body>

    <div class="container mt-5">
        <div class=" row g-2">
            <div class="col-md-6">
                <p class="mb-0">Showing 1-9 of 12 results</p>
            </div>
            <div class="col-md-6 text-md-right">
                <select class="form-select" aria-label="Default sorting">
                    <option selected>Default sorting</option>
                    <option value="1">Sort by price</option>
                    <option value="2">Sort by popularity</option>
                    <option value="3">Sort by rating</option>
                </select>
            </div>
            <div class="product-card px-3 py-3 col-lg-4 col-md-6 col-sm-12">
                <div class="hover-overlay">
                    View cart &rarr;
                </div>
                <img src="image/shop-list-01.jpg" alt="Personal accounting">
                <h3 class="product-title">Personal accounting</h3>
                <div class="product-rating">★★★★★</div>
                <p class="product-price">$25</p>
            </div>

            <div class="product-card px-3 py-3 col-lg-4 col-md-6 col-sm-12">
                <div class="hover-overlay">
                    View cart &rarr;
                </div>
                <img src="image/shop-list-01.jpg" alt="Personal accounting">
                <h3 class="product-title">Art therapy</h3>
                <div class="product-rating">★★★★☆</div>
                <p class="product-price">$29</p>
            </div>

            <div class="product-card px-3 py-3 col-lg-4 col-md-6 col-sm-12">
                <div class="hover-overlay">
                    View cart &rarr;
                </div>
                <img src="image/shop-list-01.jpg" alt="Personal accounting">
                <h3 class="product-title">Ceramics basics</h3>
                <div class="product-rating">★★★★★</div>
                <p class="product-price">$35</p>
            </div>

            <div class="product-card px-3 py-3 col-lg-4 col-md-6 col-sm-12">
                <div class="hover-overlay">
                    View cart &rarr;
                </div>
                <img src="image/shop-list-01.jpg" alt="Personal accounting">
                <h3 class="product-title">Creative writing</h3>
                <div class="product-rating">★★★★★</div>
                <p class="product-price">$34</p>
            </div>

            <div class="product-card px-3 py-3 col-lg-4 col-md-6 col-sm-12">
                <div class="hover-overlay">
                    View cart &rarr;
                </div>
                <img src="image/shop-list-01.jpg" alt="Personal accounting">
                <h3 class="product-title">Learn Italian</h3>
                <div class="product-rating">★★★★★</div>
                <p class="product-price">$19</p>
            </div>

            <div class="product-card px-3 py-3 col-lg-4 col-md-6 col-sm-12">
                <div class="hover-overlay">
                    View cart &rarr;
                </div>
                <img src="image/shop-list-01.jpg" alt="Personal accounting">
                <span class="new-badge">New</span>
                <h3 class="product-title">House design mastery</h3>
                <div class="product-rating">★★★☆☆</div>
                <p class="product-price">$29</p>
            </div>
        </div>
    </div>
</body>

</html>