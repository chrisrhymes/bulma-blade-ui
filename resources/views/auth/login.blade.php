<x-dynamic-component component="{{ config('bulma-blade-ui.auth_extends') }}">
    <x-bbui::card title="Login">
        @if (session('status'))
            <x-bbui::notification>
                {{ session('status') }}
            </x-bbui::notification>
        @endif

        <form method="post" action="{{ route('login') }}">
            @csrf
            <x:bbui::input label="Email" name="email" type="email"></x:bbui::input>
            <x:bbui::input label="Password" name="password" type="password" ></x:bbui::input>

            <x-bbui::submit value="Login"></x-bbui::submit>

            <a href="{{ route('password.request') }}" class="link">Forgot password?</a>
        </form>
    </x-bbui::card>
</x-dynamic-component>
