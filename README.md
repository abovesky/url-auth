# Create secured URLs with a limited lifetime

This package can create URLs with a limited lifetime. This is done by adding an expiration date and a signature to the URL.

```php
$urlAuth = new Md5UrlAuth('randomkey');

$urlAuth->sign('https://myapp.com', 30, 'days');

// => The generated url will be valid for 30 days
```

This will output an URL that looks like `https://myapp.com/?expires=xxxx&signature=xxxx`.

Imagine mailing this URL out to the users of your application. When a user clicks on a signed URL
your application can validate it with:

```php
$urlAuth->validate('https://myapp.com/?expires=xxxx&signature=xxxx');
```

Spatie is a webdesign agency in Antwerp, Belgium. You'll find an overview of all our open source projects [on our website](https://spatie.be/opensource).

## Installation

The package can installed via Composer:
```
composer require abovesky/url-auth
```

## Usage

A signer-object can sign URLs and validate signed URLs. A secret key is used to generate signatures.

```php
use abovesky\UrlAuth\Md5UrlAuth;

$urlAuth = new Md5UrlAuth('mysecretkey');
```

### Generating URLs

Signed URLs can be generated by providing a regular URL and an expiration date to the `sign` method.

```php
$expirationDate = (new DateTime)->modify('10 days');

$urlAuth->sign('https://myapp.com', $expirationDate);

// => The generated url will be valid for 10 days
```

If an integer is provided as expiration date, the url will be valid for that amount of days.

```php
$urlAuth->sign('https://myapp.com', 30, 'days');

// => The generated url will be valid for 30 days
```

### Validating URLs

To validate a signed URL, simply call the `validate()` method. This will return a boolean.

```php
$urlAuth->validate('https://myapp.com/?expires=1439223344&signature=2d42f65bd023362c6b61f7432705d811');

// => true

$urlAuth->validate('https://myapp.com/?expires=1439223344&signature=2d42f65bd0-INVALID-23362c6b61f7432705d811');

// => false
```

## Writing custom signers
This packages provides a signer that uses md5 to generate signature. You can create your own
signer by implementing the `abovesky\UrlAuth\iUrlAuth`-interface. If you let your signer extend
`abovesky\UrlAuth\BaseUrlAuth` you'll only need to provide the `createSignature`-method.

## Tests

The tests can be run with:

```
$ vendor/bin/phpspec run
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
