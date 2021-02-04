<x-dynamic-component component="{{ config('bulma-blade-ui.auth_extends') }}">
    <x-bbui::card title="Forgot Password">
        @if (session('status'))
            <x-bbui::notification>
                {{ session('status') }}
            </x-bbui::notification>
        @endif

        <form method="post" action="{{ route('password.email') }}">
            @csrf
            <x-bbui::input label="Password" name="email" type="email"></x-bbui::input>
            <x-bbui::submit value="Submit"></x-bbui::submit>
        </form>
    </x-bbui::card>
</x-dynamic-component>
