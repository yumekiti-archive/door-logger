<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="post">
            <p class="text-center">デバイス名を入力してしてください。</p>
            <div class="text-center">
                @csrf
                <input type="text" name="device_name" />
                <input class="text-center text-white rounded-full hover:bg-blue-500 bg-blue-600 p-3" type="submit" value="確定" />
            </div>
            <div class="text-left">
                <a href="{{ route('index') }}">戻る</a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
