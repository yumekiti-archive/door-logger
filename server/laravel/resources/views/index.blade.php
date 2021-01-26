<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('デバイス一覧') }}
        </h2>
    </x-slot>

    <div class="flex float-right mr-20">
        <div class="text-center text-white rounded-full hover:bg-blue-500 bg-blue-600 p-2">
            <a href="{{ route('addDevices') }}">デバイス追加</a>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($devices as $device)
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('doorlog',['deviceId' => $device->id] )}}">
                    <ul>
                        <li>
                            デバイス名：{{ $device->device_name }}
                        </li>
                        <li>
                            トークン：{{ $device->token }}
                        </li>
                        <li>
                            状態：<?php if (isset($device->latest_log->is_open)) {
                                echo "OPEN";
                            }else{
                                echo "CLOSE";
                            } ?>
                        </li>
                    </ul>
                    </a>
                </div>
                @endforeach
            </div>
            @foreach ($devices as $device)
            <br><p>{{ $device }}</p>
            @endforeach
            <br><p>{{ $user }}</p>
            <br><p>{{ $door }}</p>
        </div>
    </div>
</x-app-layout>
