<x-app-layout>
    <x-slot name="content">
        <x-jet-authentication-card>
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>

            <div class="mb-4 text-sm text-gray-600">
                Забыли пароль? В таком случае просто введите ваш адрес электронной почты, указанный при регистрации, и мы вышлем вам ссылку для восстановленя пароля.
            </div>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="block">
                    <x-jet-label value="{{ __('Email') }}" />
                    <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button>
                        Восстановить пароль
                    </x-jet-button>
                </div>
            </form>
        </x-jet-authentication-card>
    </x-slot>
</x-app-layout>
