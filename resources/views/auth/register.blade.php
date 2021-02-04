<x-dynamic-component component="{{ config('bulma-blade-ui.auth_extends') }}">
    <x-bbui::card title="Register">
        <form method="post" action="{{ route('register') }}">
            @csrf
            <x-bbui::input label="Name" name="name"></x-bbui::input>
            <x-bbui::input label="Email" name="email" type="email"></x-bbui::input>
            <x-bbui::input label="Password" name="password" type="password"></x-bbui::input>
            <x-bbui::input label="Confirm Password" name="password_confirmation" type="password"></x-bbui::input>
            <x-bbui::submit value="Submit"></x-bbui::submit>
        </form>
    </x-bbui::card>
</x-dynamic-component>
