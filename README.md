ImmutioPHP
=============================

A PHP wrapper for the immut.io API.


Usage
-----------------------------

Installing it is easy, just require `turanct/immutio` as a dependency in your `composer.json` file. You'll also need one of the transports (e.g. BuzzTransport)

```json
{
    "require-dev": {
        "turanct/immutio": "dev-master"
    }
}
```

To create a blob on immut.io, do this:

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$browser = new Buzz\Browser();
$transport = new Immutio\BuzzTransport($browser);
$client = new Immutio\Client($transport);

$blob = new Immutio\Blob(
    '{"ramsamsam": "bla", "foo": "bar", "baz": true, "qux": 1}',
    'application/json'
);

$blobId = $client->sendBlob($blob);
var_dump($blobId);
```

To retreive a blob, do this:

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$browser = new Buzz\Browser();
$transport = new Immutio\BuzzTransport($browser);
$client = new Immutio\Client($transport);

$blob = $client->retrieveBlob($blobId);
```


Contributing
-----------------------------

Feel free to fork and send pull requests!


License
-----------------------------

This library is distributed under the MIT license.
