<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('デバイス詳細') }}
        </h2>
    </x-slot>

<style type="text/css">
    .border-size{
        width: 1050px;
    }
</style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ml-20 border-size" id="device-id-{{ $devices->id }}">
                    <ul>
                        <li class="p-1">
                            デバイス名：{{$devices->device_name}}
                        </li>
                        <li class="p-1 door-state">
                            状態：
                            @if(isset($devices->latest_log->is_open) && $devices->latest_log->is_open)
                                OPEN
                            @else
                                CLOSE
                            @endif
                        </li>
                        <li class="p-1">
                            作成日：{{ $devices->created_at->format('Y年m月d日') }}
                        </li>
                        <li class="p-1">
                            トークン：{{$devices->token}}
                        </li>
                    </ul>
                </div>
                <div id="door-logs">
                    @foreach ($devices->logs->reverse() as $deviceLog)
                    <div class="p-6 bg-white border-b border-gray-200 ml-20 border-size">
                        <ul>
                            <li>
                                {{ $deviceLog->created_at->format('Y年m月d日：G時i分s秒') }}
                            </li>
                            <li>
                                @if($deviceLog->is_open)
                                    OPEN
                                @else
                                    CLOSE
                                @endif
                            </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
            <!--<br><p>{{ $devices }}</p>-->
        </div>
    </div>
</x-app-layout>