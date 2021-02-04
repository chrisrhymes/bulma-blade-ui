@props(['name'])
@error($name)
    <p class="help is-danger">{{ $message }}</p>
@enderror
