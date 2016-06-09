# php-oo-json
An object oriented wrapper for internal PHP json support

Contains methods for parsing JavaScript Object Notation (JSON)
and converting values to JSON. It can't be constructed and contains
no properties or constants of its own. Aside from its two method properties
it has no interesting functionality of its own.

The `Json::parse` and `Json::stringify` methods are mere OO wrappers around
`json_decode` and `json_encode` PHP functions.

See http://php.net/manual/en/book.json.php

## Usage

### Simple JSON parsing
````php
require 'vendor/autoload.php'

use OOJson\JSON;

$json = <<<JSON
{
    "name": "John Doe",
    "number": "12345"
}
JSON

$object = JSON::parse($json);

echo $object->name;     // John Doe
echo $ojject->number;   // 12345
````

### Simple JSON stringify
````php
require 'vendor/autoload.php'

use OOJson\JSON;

class User {

    public $name;
    public $number;

    public function __construct(/* string */ $name, /* number */ $number) {
        $this->name = $name;
        $this->number = $number;
    }
}

$object = new User("John Doe", 123456);

$json = JSON::stringify($object);

echo $json;     // {"name":"John Doe","number":"12345"}
````
## LICENSE

Copyright (c) 2016, Amitosh Swain Mahapatra

Permission to use, copy, modify, and/or distribute this software for any
purpose with or without fee is hereby granted, provided that the above
copyright notice and this permission notice appear in all copies.

THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES
WITH REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF
MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR
ANY SPECIAL, DIRECT, INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES
WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER IN AN
ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF
OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFTWARE.
