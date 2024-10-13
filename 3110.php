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
$less->compileFile('less/3110.less', outFname: 'css/3110.css');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/3110.css">
</head>

<body>

    <section class="contact-section">
        <h2>SEND US MESSAGE</h2>
        <hr class="responsive-hr">

        <p class="description">
            Overcome faithful endless salvation enlightenment salvation overcome pious merciful
            ascetic madness holiest joy passion zarathustra suicide overcome snare.
        </p>

        <div class="info-boxes">
            <div class="info-box">
                <i class="icon-location"></i>
                <h3>ADDRESS</h3>
                <p>123 Western Street, Sydney, Australia</p>
            </div>
            <div class="info-box">
                <i class="icon-phone"></i>
                <h3>PHONE NUMBER</h3>
                <p>+456 789 0321</p>
            </div>
            <div class="info-box">
                <i class="icon-clock"></i>
                <h3>OPENING HOURS</h3>
                <p>All Days: 9am to 6pm</p>
            </div>
        </div>

        <form class="contact-form">
            <div class="input-row">
                <div class="input-group">
                    <i class="icon-user"></i>
                    <input type="text" placeholder="Your Name *" required>
                </div>
                <div class="input-group">
                    <i class="icon-envelope"></i>
                    <input type="email" placeholder="Email *" required>
                </div>
            </div>

            <div class="input-group message">
                <i class="icon-pencil"></i>
                <textarea placeholder="Enter your message *" required></textarea>
            </div>
        </form>
    </section>

</body>

</html>