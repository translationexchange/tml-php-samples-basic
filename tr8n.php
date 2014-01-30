<?php require_once(__DIR__ . '/vendor/tr8n/tr8n-client-sdk/library/Tr8n.php'); ?>
<?php tr8n_init_client_sdk("http://localhost:3000", "53b2c5e7ce2e10726", "b66c578907938519f"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo tr8n_current_language()->locale; ?>"
      lang="<?php echo tr8n_current_language()->locale; ?>"
      dir="<?php echo tr8n_current_language()->direction(); ?>">

<head>
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
    <?php include(__DIR__ . '/vendor/tr8n/tr8n-client-sdk/library/Tr8n/Includes/Scripts.php'); ?>

    <style>
        body {
            padding: 80px;
            font-size: 50px;
        }
    </style>
</head>
<body>

<?php

tre("Hello [bold: World]", array("bold" => "<span style='font-size:20px'>{\$0}</span>"));

?>


</body>
</html>
<?php tr8n_complete_request() ?>