@php($value = $value ?? null)
<div class="field">
    <label class="label">{{ $label }}</label>
    <div class="control">
        <div class="select is-fullwidth">
            <select name="{{ $name }}">
                @foreach($options as $key => $option)
                    <option value="$key" @if($key === $value) selected @endif>
                        {{ $option }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>