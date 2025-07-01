## Prosopo Procaptcha Integration for PrestaShop

Welcome to the GitHub repository for
the [Prosopo Procaptcha](https://prosopo.io/) Integration for PrestaShop!

We ensure this repository is kept up-to-date with the latest version. Feel free to open issues or submit pull requests
directly here — any changes made will be included in the next official release.

## 1. Installation

Minimum requirements:

* PHP 7.4+
* PrestaShop 8.0.0+

## 2. Supported forms

In the Classic (default) theme:

* `/registration`
* `/login`
* `/password-recovery`
* `/contact-us`

## 3. Custom form integrations

This module aims to support the core forms, but also it can simplify Procaptcha integration in your custom form.

### 3.1) Add field to your form

```php
use Io\Prosopo\Procaptcha\Widget\Widget;

echo '<form>'; // your opening form tag
// ... your form inputs go here
echo Widget::renderWidget(); // added call that will render the Procaptcha widget
echo '</form>'; // your closing form tag
```

### 3.2) Add validation to your processing code

```php
use Io\Prosopo\Procaptcha\Widget\Widget;

// your inputs validation logic goes here

if(! Widget::verifyToken()) {
 // todo accommodate to your fail handling
 echo Widget::getValidationError();
 exit;
}
```

## 4. Related Resources

* [Prosopo Procaptcha Website](https://prosopo.io/)

## 5. Contribution

We would be excited if you decide to contribute 🤝

Please read the **for-devs.md** file for project guidelines and agreements.