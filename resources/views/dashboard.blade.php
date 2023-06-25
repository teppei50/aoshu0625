<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('受注管理・TOP') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center"> <!-- text-center クラスを追加 -->
                    <p class="text-2xl">{{ __("ようこそ！") }}</p>
                    <p class="text-2xl">{{ Auth::user()->name }} {{ __("さん！！今日も一日頑張りましょう！！") }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
