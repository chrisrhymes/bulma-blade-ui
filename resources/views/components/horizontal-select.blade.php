@php($value = $value ?? null)
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label" for="">{{ $label}}</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control is-expanded">
                <div class="select is-fullwidth">
                    <select name="{{ $name }}">
                        @foreach($options as $key => $option)
                            <option value="$key" @if($key == $value) selected @endif>
                                {{ $option }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>