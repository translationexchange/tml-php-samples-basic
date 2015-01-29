<?php require_once(__DIR__ . '/vendor/translationexchange/tml/library/tml.php'); ?>
<?php tml_init(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"
      lang="<?php echo tml_current_language()->locale; ?>"
      dir="<?php echo tml_current_language()->direction(); ?>">

<head>
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
    <?php tml_scripts() ?>

    <style>
        body {
            padding: 80px;
            font-size: 50px;
        }
    </style>
</head>
<body>

<?php

class User {
    public $name, $gender;
    function __construct($name, $gender = "male") {
        $this->name = $name;
        $this->gender = $gender;
    }
    function __toString() {
        return $this->name;
    }
    function fullName() {
        return $this->name;
    }
}

class Number {
    public $value;
    function __construct($value) {
        $this->value = $value;
    }
    function __toString() {
        return "" . $this->value;
    }
}

$male = new User("Michael", "male");
$female = new User("Anna", "female");


tre("Hello World");
echo("<br><br>");

tre("Invite", "An invitation");
echo("<br><br>");

tre("Invite", "Action to invite someone");
echo("<br><br>");

tre("Hello {user}", array("user" => "Michael"));
echo("<br><br>");

tre("Hello {user}", array("user" => $male));
echo("<br><br>");

tre("Hello {user}", array("user" => array($male, "Michael B.")));
echo("<br><br>");

tre("Hello {user}", array("user" => array("object" => $male, "value" => "Tom")));
echo("<br><br>");

tre("Hello {user}", array("user" => array("object" => $male, "attribute" => "name")));
echo("<br><br>");

tre("Hello {user}", array("user" => array("object" => $male, "method" => "fullName")));
echo("<br><br>");

tre("Hello {user}", array("user" => array("object" => array("name" => "Alex"), "attribute" => "name")));
echo("<br><br>");

tre("Hello {user.name}, you are a {user.gender}", array("user" => $male));
echo("<br><br>");

tre("You have {count|| one: message, other: messages}", array("count" => 5));
echo("<br><br>");

tre("You have {count|| message, messages}", array("count" => 1));
echo("<br><br>");

tre("You have {count|| message}", array("count" => 1));
echo("<br><br>");

tre("{user|| male: родился, female: родилась, other: родился/лась } в Россие.", array("user" => $male), array("locale" => "ru"));
echo("<br><br>");

tre("{user|| male: родился, female: родилась, other: родился/лась } в Россие.", array("user" => $female), array("locale" => "ru"));
echo("<br><br>");

tre("{user| He, She} likes this movie. ", array("user" => $male));
echo("<br><br>");

tre("{user| He, She} likes this movie. ", array("user" => $female));
echo("<br><br>");

tr("{user| male: He, female: She} likes this movie.", array("user" => $male));
echo("<br><br>");

tr("{user| Born on}: ", array("user" => $male));
echo("<br><br>");

tre("Hello [bold: World]", array("bold" => function($value) { return "<strong>" . $value . "</strong>";} ));
echo("<br><br>");

tre("Hello [bold: World]", array("bold" => '<strong>{$0}</strong>'));
echo("<br><br>");

tre("Hello [bold: World]");
echo("<br><br>");


tre("You have [link: {count||message}]", array(
        "count" => 10,
        "link" => function($value) { return "<a href='http://www.google.com'> $value </a>"; }
    )
);
echo("<br><br>");

tre("[bold: {user}], you have [italic: [link: [bold: {count}] {count|message}]]!", array(
        "user" => $male,
        "count" => 10,
        "italic" => '<i>{$0}</i>',
        "bold" => '<strong>{$0}</strong>',
        "link" => function($value) { return "<a href='http://www.google.com'> $value </a>"; }
    )
);
echo("<br>");

trhe("
        <p>Tr8n can even <b>convert HTML to TML</b>, <i>translate TML</i> and <u>substitute it back into HTML</u>.</p>
    ");


trhe("
        <p>Tr8n can even <b style='font-size:20px;'>convert HTML to TML</b>, <i style='color:blue'>translate TML</i> and <u>substitute it back into HTML</u>.</p>
    ");
echo("<br><br>");

for($i=0; $i<10; $i++) {
    tre("You have {count||message}", array("count" => $i)); echo("<br>");
}
echo("<br><br>");


tre("{actor} tagged {target} in a photo {target|he, she} just uploaded.", array("actor" => $male, "target" => $female));
echo("<br><br>");

tre("{actor} tagged {target} in a photo {target|he, she} just uploaded.", array("actor" => $female, "target" => $male));
echo("<br><br>");

tre("This is {user::pos} photo", array("user" => $male, "value" => tr($male->name)));
echo("<br><br>");

?>



</body>
</html>

<?php tml_complete_request() ?>