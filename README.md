# Bulma Blade UI

![Packagist Downloads](https://img.shields.io/packagist/dt/chrisrhymes/bulma-blade-ui)
![GitHub Repo stars](https://img.shields.io/github/stars/chrisrhymes/bulma-blade-ui?style=social)
![GitHub forks](https://img.shields.io/github/forks/chrisrhymes/bulma-blade-ui?style=social)
![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/chrisrhymes/bulma-blade-ui/php.yml?branch=master)

A set of [Laravel Blade components](https://laravel.com/docs/8.x/blade#components) for the [Bulma](https://bulma.io) Frontend Framework. Built for Laravel 8.x and Bulma 0.9.x.

This package also contains authentication views to use with [Laravel Fortify](https://laravel.com/docs/8.x/fortify).

## Contents

* [Getting Started](#getting-started)
  * [Alpine js](#alpine-js)
* [Publishing Views](#publishing-views)
* [Components](#components)
    * [Inputs](#inputs)
        * [Options](#options)
        * [Read Only](#read-only)
        * [Placeholder](#placeholder)
        * [Additional Classes](#additional-classes)
    * [Card](#card)
    * [Media](#media)
    * [Message](#message)
    * [Notification](#notification)
    * [Tabs](#tabs)
    * [Modal](#modal)
* [Views](#views)
    * [Pagination](#pagination)
    * [Simple Pagination](#simple-pagination)
* [Auth Views](#auth-views)
* [Tests](#tests)

## Getting Started

```bash
composer require chrisrhymes/bulma-blade-ui
```

The package should auto discover in Laravel 8. 

### Alpine JS

Some components have some interactivity, such as notifications being dismissed. The components in this package have been pre-configured to use [Alpine JS](https://github.com/alpinejs/alpine) as it is a small and easy to use JavaScript package. 

Therefore, to make use of this interactivity you will need to include Alpine JS within your Laravel app. 

## Publishing Views & Config

If you want to use the auth views in the package then you will need to publish the config so you can overwrite the default configuration.

`php artisan vendor:publish --tag=config --provider=BulmaBladeUi\\BulmaBladeUiServiceProvider`  

If you would like to publish the views you can do so with the following command. It may lead to difficulties updating at a later if you customise the components.

`php artisan vendor:publish --provider=BulmaBladeUi\\BulmaBladeUiServiceProvider`  

## Components

The package has the following components available:

* card
* checkbox
* error
* horizontal-input
* horizontal-multi-checkbox
* horizontal-radio
* horizontal-select
* horizontal-textarea
* input
* media
* message
* modal
* modal-card
* multi-checkbox
* notification
* radio
* select
* submit
* tabs
* textarea

The components are in the `bbui` namespace. 

```html
<x-bbui::input label="Username" name="usermane" value="myusername"></x-bbui::input>
```

### Inputs

* There are standard (with the label above the input) and horizontal inputs (with the label to the left of the input) available.
* All inputs expect a label, name and value (except submit).
* You can set `:required="true"` on the input to add the required tag.
* Set the type on submit to override the 'is-primary' default button class.

#### Options

Select, radio and multi-checkboxes expect an array of options `:options="['value' => 'label', 'value2 => 'label2']"`

```html
<!-- Select input, passing in the options -->
<x-bbui::select 
    label="Select a Tree" 
    name="tree" 
    :options="['oak' => 'Oak', 'ash' => 'Ash', 'maple' => 'Maple']"
></x-bbui::select>

<!-- Alternatively use a variable to pass in the options -->
@php($trees = ['oak' => 'Oak', 'ash' => 'Ash', 'maple' => 'Maple'])

<x-bbui::select 
    label="Select a Tree" 
    name="tree" 
    :options="$trees"
></x-bbui::select>
```

#### Read Only

The following input components can be made readonly by setting `:readonly="true"`

* horizontal-input
* horizontal-textarea
* input
* textarea

#### Placeholder

The following input components can have a placeholder set by setting the `placeholder="The placeholder text"`

* horizontal-input
* horizontal-select
* horizontal-textarea
* input
* select
* textarea

#### Additional Classes

Bulma allows you to set the colours, sizes and states for `input`, `textarea` and `select`. You can pass in the additional classes and they will be added to the component. 

```html
<x-bbui::input label="Username" name="usermane" value="myusername" class="is-primary is-large is-rounded is-loading"></x-bbui::input>
```

This applies to the following input components

* horizontal-input
* horizontal-select
* horizontal-textarea
* input
* select
* textarea

### Livewire Inputs (Experimental)

To use inputs with Livewire, set the `wire:model="modelName"` as an attribute with the relevant model name. You don't need to set the `value=""` if using the `wire:model`.

```html
<x-bbui::input label="Username" name="usermane" value="myusername" wire:model="modelName"></x-bbui::input>
```

You can also add `defer`, `lazy` or `debounce` to the following inputs:

* horizontal-input
* horizontal-textarea
* input
* textarea

```html
<x-bbui::input label="Username" name="usermane" value="myusername" wire:model.debounce.500ms="modelName"></x-bbui::input>
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
<!-- Media -->
<x-bbui::media image="/path/to/image.png" alt="Image alt text">
    The media content
</x-bbui::media>

<!-- Media with media-right -->
<x-bbui::media image="/path/to/image.png" alt="Image alt text">
    The media content

    <x-slot name="right">
        <button class="delete"></button>
    </x-slot>
</x-bbui::media>
```

### Message

The message allows you to override the type from the default 'is-info'. Alpine.js is required to dismiss the message. 

From v0.1.3 the title is optional. If no title is provided then the message-header will not be displayed.

```html
<!-- Message -->
<x-bbui::message title="The message title">
    The message content
</x-bbui::message>

<!-- Message is-danger -->
<x-bbui::message type="is-danger" title="The message title">
    The message content
</x-bbui::message>

<!-- Message title is optional -->
<x-bbui::message>
    The message content
</x-bbui::message>
```

### Notification

The notification allows you to override the type from the default 'is-info'. Alpine.js is required to dismiss the notification.

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

### Tabs

* Pass in an array of items, setting the 'key' => 'value' for each, where the value will be used as the tab label.
* Create an x-slot for each of the items, setting the slot name set as the 'key' from the items array. Place the tab content inside the slot.
* You can overwrite the type of tabs by setting the `type`.
* You can overwrite which tab displays by default by setting the `default`.

The tabs component uses Alpine.js to show and hide the tab content.

```html
<!-- Tabs -->
<x-bbui::tabs :items="['first' => 'The First Tab', 'second' => 'The Second Tab']">
    <x-slot name="first">
        The first tab content
    </x-slot>
    
    <x-slot name="second">
        The second tab content
    </x-slot>
</x-bbui::tabs>

<!-- Tabs overriding the type -->
<x-bbui::tabs :items="['first' => 'The First Tab', 'second' => 'The Second Tab']" type="is-boxed is-small">
    <x-slot name="first">
        The first tab content
    </x-slot>
    
    <x-slot name="second">
        The second tab content
    </x-slot>
</x-bbui::tabs>

<!-- Tabs overriding the default tab displayed -->
<x-bbui::tabs :items="['first' => 'The First Tab', 'second' => 'The Second Tab']" default="second">
    <x-slot name="first">
        The first tab content
    </x-slot>
    
    <x-slot name="second">
        The second tab content
    </x-slot>
</x-bbui::tabs>
```

### Modal

There are modal and modal-card components. Both require Alpine.js.

* Both require a `<x-slot name="trigger">` to define the content of the button that will trigger the modal.
* The modal component will display the content that is provided using the default `$slot`.
* You can override the trigger button class by setting the type. By default, it uses `is-primary`.
* Modal card requires a `title`
* Modal card has a footer slot that contains a Cancel button to close the modal. You can override the cancel text by setting `cancel="Cancel"` attribute.
* If you add a button to the footer that also closes the modal then ensure you add `@click="active = false"` to the button.

```html
<!-- Modal -->
<x-bbui::modal type="is-info">
    <x-slot name="trigger">
        <span class="icon"><i class="fas fa-eye"></i></span>
        <span>Open Modal</span>
    </x-slot>
    
    <!-- The modal content -->
    <div class="box">
        <p>Modal content</p>
    </div>
</x-bbui::modal>

<!-- Modal with image content -->
<x-bbui::modal>
    <x-slot name="trigger">
        <span class="icon"><i class="fas fa-eye"></i></span>
        <span>Open Modal</span>
    </x-slot>

    <!-- The modal content -->
    <figure class="image is-4by3">
        <img src="https://bulma.io/images/placeholders/1280x960.png" alt="">
    </figure>
</x-bbui::modal>

<!-- Modal Card -->
<x-bbui::modal-card type="is-danger" title="Are you sure?">
    <x-slot name="trigger">
        <span class="icon"><i class="fas fa-times"></i></span>
        <span>Delete</span>
    </x-slot>

    <!-- The modal content -->
    <p>Are you sure you want to delete this?</p>

    <x-slot name="footer">
        <button class="button" @click="active = false">
            <span class="icon"><i class="fas fa-check"></i></span>
            <span>Confirm</span>
        </button>
    </x-slot>
</x-bbui::modal-card>
```

## Views

### Pagination

The pagination view provides next, previous and a pagination list of page numbers. The page numbers are centered between the next and previous page buttons.

You can use the pagination view for the package by setting the view in the `->links()` method, as shown below, or using other methods described in the [Laravel docs](https://laravel.com/docs/8.x/pagination#customizing-the-pagination-view). 

```html
@php($users = User::paginate())

{{ $users->links('bbui::pagination') }}
```

For Livewire pagination, use the `bbui::livewire.pagination` view. This replaces the href with the relevant wire:click settings.

### Simple Pagination

The simple pagination view provides next and previous page buttons.

You can use the simple pagination view for the package by setting the view in the `->links()` method, as shown below, or using other methods described in the [Laravel docs](https://laravel.com/docs/8.x/pagination#customizing-the-pagination-view).

```html
@php($users = User::paginate())

{{ $users->links('bbui::simple-pagination') }}
```

For Livewire simple pagination, use the `bbui::livewire.simple-pagination` view. This replaces the href with the relevant wire:click settings.

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

## Tests

The package has basic tests for the components. To run the tests

```bash
composer test
```
