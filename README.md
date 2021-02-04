# Bulma Blade UI

Work in progress.

A set of [Laravel Blade components](https://laravel.com/docs/8.x/blade#components) for the [Bulma](https://bulma.io) Frontend Framework. Built for Laravel 8.x and Bulma 0.9.x.

This package also contains some authentication views to use with [Laravel Fortify](https://laravel.com/docs/8.x/fortify).

```bash
composer require chrisrhymes/bulma-blade-ui
```

## Publishing Views

If you would like to publish the views you can do so with the `php artisan vendor:publish` command.

## Components

The package has the following components available:

* card
* checkbox
* error
* horizontal-input
* horizontal-select
* horizontal-textarea
* input
* media
* message
* notification
* select
* submit
* textarea

The components are in the `bbui` namespace. 

```html
<x-bbui::input label="Username" name="usermane" value="myusername"></x-bbui::input>
```

### Inputs

* All inputs expect a label, name and value (except submit)
* Select expect an array of options `:options="['value' => 'label', 'value2 => 'label2']"`
* Set the type on submit to override the 'is-primary' default button class

### Livewire Inputs (Experimental)

To use inputs with Livewire, set the `wire:model="modelName"` as an attribute with the relevant model name.

```html
<x-bbui::input label="Username" name="usermane" value="myusername" wire:model="modelName"></x-bbui::input>
```

### Card

The card allows a card with a title or with an image. The card also allows a footer by using the named slot. 

```html
<!-- Card with title -->
<x-bbui::card title="The card title">
    Card content goes here
</x-bbui::card>

<!-- Card with image -->
<x-bbui::card image="/path/to/image.png" alt="The image alt text">
    Card content goes here
</x-bbui::card>

<!-- Card with footer -->
<x-bbui::card title="The card title">
    Card content goes here
    
    <x-slot name="footer">
        <a href="#" class="card-footer-item">Footer item</a> 
    </x-slot>
</x-bbui::card>
```

### Media

Media accepts an image for the media-left, the content and an optional media right using the named slot.

```html
<x-bbui::media image="/path/to/image.png" alt="Image alt text">
    The media content
    
    <x-slot name="right">
        <button class="delete"></button>
    </x-slot>
</x-bbui::media>
```

### Message

The message allows you to override the type from the default 'is-info'

```html
<!-- Message -->
<x-bbui::message title="The message title">
    The message content
</x-bbui::message>

<!-- Message is-danger -->
<x-bbui::message type="is-danger" title="The message title">
    The message content
</x-bbui::message>
```

### Notification

The notification allows you to override the type from the default 'is-info'

```html
<!-- Notification -->
<x-bbui::notification>
    The notification content
</x-bbui::notification>

<!-- Notification is-danger -->
<x-bbui::notification type="is-danger">
    The notification content
</x-bbui::notification>
```

## Auth Views

If you use Laravel Fortify and want to make use of the package's authentication views then set the below in the boot() method of your `App\Providers\FortifyServiceProvider`

```php
Fortify::loginView(fn () => view('bbui::auth.login'));
Fortify::registerView(fn () => view('bbui::auth.register'));
Fortify::requestPasswordResetLinkView(function () {
    return view('bbui::auth.forgot-password');
});
Fortify::resetPasswordView(function ($request) {
    return view('bbui::auth.reset-password', ['request' => $request]);
});
```

Then set the view component you wish to extend by updating the `'auth_extends' => 'bbui::default-layout'` in the bulma-blade-ui.php config file.
