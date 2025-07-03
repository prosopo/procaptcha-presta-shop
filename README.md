## Prosopo Procaptcha Integration for PrestaShop

Welcome to the official GitHub repository for
the [Prosopo Procaptcha](https://prosopo.io/) Integration for PrestaShop!

## 1. Installation

Minimum requirements:

* PHP 7.4+
* PrestaShop 8.0.0+

Installation

1. Download the [latest module release](https://github.com/prosopo/procaptcha-presta-shop/releases)
2. Go to your Prestashop dashboard -> Modules -> Module Manager -> Upload a Module
3. Visit the Module Manager page -> Locate Prosopo Procaptcha in the list -> Click Enable
4. After enabling, click Configure and enter your Secret Key and Site Key (you can get these
   from [portal.prosopo.io](https://portal.prosopo.io/))
5. Enable protection for your target forms (e.g., registration, login, contact forms) and click Save
6. Make sure the captcha widget preview below the form is displayed correctly

Now you're all set! Enjoy enhanced anti-spam protection with Prosopo Procaptcha.

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