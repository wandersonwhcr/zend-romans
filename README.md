# zend-romans

Zend Framework Romans Integration

[![Latest Stable Version](https://poser.pugx.org/wandersonwhcr/zend-romans/v/stable?format=flat)](https://packagist.org/packages/wandersonwhcr/zend-romans)

## Description

This package provides a Zend Framework integration for
[Romans](https://github.com/wandersonwhcr/romans) library, providing tools to
filter a `string` with a Roman number to `int` and vice-versa, validate a
`string` that contains this type of number and, finally, hydrate the content to
`int`.

## Installation

This package uses Composer as default repository. You can install it adding the
name of package in `require` attribute of `composer.json`, pointing to the last
stable version.

```json
{
    "require": {
        "wandersonwhcr/zend-romans": "^1.0"
    }
}
```

## Usage

This package provide filters, validators and hydrators to use with Zend
Framework projects. Also, this package is provided as a Zend Framework module,
automatically configuring services inside application, but this action is not
required.

### Filters

Zend Romans provides a couple of filters to convert a `string` with Roman number
to `int` and a Integer to a `string` that represents the input as Roman number.

```php
use Zend\Romans\Filter\RomanToInt as RomanToIntFilter;
use Zend\Romans\Filter\IntToRoman as IntToRomanFilter;

$value = 'MCMXCIX';

$filter = new RomanToIntFilter();
$value  = $filter->filter($value); // 1999

$filter = new IntToRomanFilter();
$value  = $filter->filter($value); // MCMXCIX
```

### Validator

Also, this package include a validator to verify if a `string` contains a valid
Roman number.

```php
use Zend\Romans\Validator\Roman as RomanValidator;

$validator = new RomanValidator();

$result = $validator->isValid('MCMXCIX'); // true

$result   = $validator->isValid('IAI'); // false
$messages = $validator->getMessages();

/*
$messages = [
    'unknownToken' => 'Unknown token "A" at position 1',
];
*/

$result   = $validator->isValid('XIIIX'); // false
$messages = $validator->getMessages();

/*
$messages = [
    'invalidRoman' => 'Invalid Roman number "XIIX"',
];
 */
```

### Hydrator

Finally, there is a hydrator strategy, responsible to handle Roman numbers. Like
any other Zend Framework strategy, exceptions will be throw for errors.

```php
use InvalidArgumentException;
use Zend\Romans\Hydrator\Strategy\Roman as RomanHydratorStrategy;

$value    = 'MCMXCIX';
$strategy = new RomanHydratorStrategy();

try {
    $value = $strategy->hydrate($value); // 1999
    $value = $strategy->extract($value); // MCMXCIX
} catch (InvalidArgumentException $e) {
    // unable to convert
}
```

### Module

This package is provided as a Zend Framework module. To initialize this module,
add the package namespace into application loaded modules configuration.

```php
<?php
return [
    'modules' => [
        // ...
        'Zend\Romans',
        // ...
    ],
];
```

## License

This package is opensource and available under license MIT described in
[LICENSE](https://github.com/wandersonwhcr/zend-romans/blob/master/LICENSE).
