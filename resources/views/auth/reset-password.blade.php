<x-dynamic-component component="{{ config('bulma-blade-ui.auth_extends') }}">
    <x-bbui::card title="Reset Password">
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <x-bbui::input label="Email" name="email" type="email"></x-bbui::input>
            <x-bbui::input label="Password" name="password" type="password"></x-bbui::input>
            <x-bbui::input label="Confirm Password" name="password_confirmation" type="password"></x-bbui::input>
            <x-bbui::submit value="Reset password"></x-bbui::submit>
        </form>
    </x-bbui::card>
</x-dynamic-component>
