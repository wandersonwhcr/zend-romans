# zend-romans

Zend Framework Romans Integration

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
use Zend\Romans\Filter\RomanToInt;
use Zend\Romans\Filter\IntToRoman;

$value = 'MCMXCIX';

$filter = new RomanToInt();
$value  = $filter->filter($value); // 1999

$filter = new IntToRoman();
$value  = $filter->filter($value); // MCMXCIX
```
