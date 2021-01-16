<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('デバイス一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('index') }}">
                    <div class="p-6 bg-white border-b border-gray-200">
                        asd
                    </div>
                </a>
            </div>
            {{ $devices }}
        </div>
    </div>
</x-app-layout>
