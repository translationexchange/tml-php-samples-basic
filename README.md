<p align="center">
  <img src="https://raw.github.com/tr8n/tr8n/master/doc/screenshots/tr8nlogo.png">
</p>


PHP Sample Application
========================

This sample application demonstrates some of the features of TML.


Installation
==================

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install


Integration
==================

Before you can proceed with the integration, please visit http://tr8nhub.com register as a user and create a new application.

Once you have created a new application, go to the security tab in the application administration section and copy your application key and secret.

<img src="http://wiki.tr8nhub.com/images/thumb/f/f7/Application_Settings.png/800px-Application_Settings.png">



Setup
========================

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


Basics
========================

    tre("Hello World")

    tre("Invite", "An invitation"),
    tre("Invite", "Action to invite someone")


Data Tokens
========================

    tre("Hello {user}", array("user" => "Michael"))
    tre("Hello {user}", array("user" => array($male, "Michael B.")))
    tre("Hello {user}", array("user" => array($male, "@name")))
    tre("Hello {user}", array("user" => array($male, "@@fullName")))

    tre("Hello {user}", array("user" => array($male, function($obj) { return $obj->name; } )))

    tre("Hello {user}", array("user" => array("object" => $male)))
    tre("Hello {user}", array("user" => array("object" => $male, "value" => "Tom")))

    tre("Hello {user}", array("user" => array("object" => $male, "attribute" => "name")))
    tre("Hello {user}", array("user" => array("object" => $male, "method" => "fullName")))
    tre("Hello {user}", array("user" => array("object" => array("name" => "Alex"), "attribute" => "name")))


Method Tokens
========================

    tre("Hello {user.name}, you are a {user.gender}", array("user" => $male))


Piped Tokens
========================

    tre("You have {count|| one: message, other: messages}", array("count" => 5))
    tre("You have {count|| message, messages}", array("count" => 1))
    tre("You have {count|| message}", array("count" => 1))
    tre("{user|| male: родился, female: родилась, other: родился/лась } в Россие.", array("user" => $male), array("locale" => "ru"))
    tre("{user|| male: родился, female: родилась, other: родился/лась } в Россие.", array("user" => $female), array("locale" => "ru"))


Implied Tokens
========================

    tre("{user| He, She} likes this movie. ", array("user" => $male))
    tre("{user| He, She} likes this movie. ", array("user" => $female))
    tr("{user| male: He, female: She} likes this movie.", array("user" => $male))
    tr("{user| Born on}: ", array("user" => $male))


Decoration Tokens
========================

    tre("Hello [bold: World]", array("bold" => function($value) { return "<strong>" . $value . "</strong>";} ))
    tre("Hello [bold: World]", array("bold" => '<strong>{$0}</strong>'))
    tre("Hello [bold: World]")


Nested Tokens
========================

    tre("You have [link: {count||message}]", array(
                            "count" => 10,
                            "link" => function($value) { return "<a href='http://www.google.com'> $value </a>"; }
                        )
    )

    tre("[bold: {user}], you have [italic: [link: [bold: {count}] {count|message}]]!", array(
                            "user" => $male,
                            "count" => 10,
                            "italic" => '<i>{$0}</i>',
                            "bold" => '<strong>{$0}</strong>',
                            "link" => function($value) { return "<a href='http://www.google.com'> $value </a>"; }
                        )
    )

HTML to TML Converter
========================

    trh("
        <p>Tr8n can even <b>convert HTML to TML</b>, <i>translate TML</i> and <u>substitute it back into HTML</u>.</p>
    ")


    trh("
        <p>Tr8n can even <b style='font-size:20px;'>convert HTML to TML</b>, <i style='color:blue'>translate TML</i> and <u>substitute it back into HTML</u>.</p>
    ")


Numeric Context Rules
========================

    for($i=0; $i<10; $i++) {
        tre("You have {count||message}", array("count" => $i))
    }


Gender Context Rules
========================

    tre("{actor} tagged {target} in a photo {target|he, she} just uploaded.", array("actor" => $male, "target" => $female))
    tre("{actor} tagged {target} in a photo {target|he, she} just uploaded.", array("actor" => $female, "target" => $male))


Language Cases
========================

    tre("This is {user::pos} photo", array("user" => $male))

