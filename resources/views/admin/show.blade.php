<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('商品詳細') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="p-2">
                    <div class="text-left">
                        <h2 class="text-base font-semibold">{{ __('商品詳細') }}</h2>
                    </div>
                    <div class="text-right mx-3">]
                    <a href="{{ route('admin.item.index') }}?page={{ $page }}" class="px-4 py-3 bg-green-500 text-white rounded">{{ __('戻る') }}</a>
                    </div>
                </div>
                <div class="flex justify-center">
                    <table class="table table-bordered border-4" style="width: 85%;">
                        <tr>
                            <th class="border px-4 py-2">{{ __('項目名') }}</th>
                            <th class="border px-4 py-2"></th>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">{{ __('名前') }}</td>
                            <td class="border px-4 py-2">{{ $item->name }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">{{ __('価格') }}</td>
                            <td class="border px-4 py-2">{{ $item->kakaku }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">{{ __('分類') }}</td>
                            <td class="border px-4 py-2">{{ $bunruis->str }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">{{ __('詳細') }}</td>
                            <td class="border px-4 py-2">{{ $item->shosai }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
