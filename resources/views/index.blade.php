<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('商品マスター') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="p-2">
                    <div class="text-right">
                        @auth
                        <a href="{{ route('item.create') }}" class="px-2 py-4 bg-green-500 text-white rounded">{{ __('新規登録') }}</a>
                        @endauth
                    </div>
                </div>

                <div class="p-4">
                    <div class="text-left">
                        @auth
                        <p class="text-sm text-gray-500">{{ __('ログイン者') }}: {{ $user_name }}</p>
                        @endauth
                    </div>
                </div>

                <div class="p-1">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">{{ __('No') }}</th>
                                <th class="border px-4 py-2">{{ __('名前') }}</th>
                                <th class="border px-4 py-2">{{ __('価格') }}</th>
                                <th class="border px-4 py-2">{{ __('分類') }}</th>
                                @auth<th class="border px-4 py-2">{{ __('変更') }}</th>@endauth
                                @auth('admin')<th class="border px-4 py-2">{{ __('削除') }}</th>@endauth
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ $item->id }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('item.show', $item->id) }}?page={{ $page }}">{{ $item->name }}</a>
                                </td>
                                <td class="border px-4 py-2 text-center">{{ $item->kakaku }}円</td>
                                <td class="border px-4 py-2 text-center">{{ $item->bunrui }}</td>
                                @auth
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{ route('item.edit', $item->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded">{{ __('変更') }}</a>
                                </td>
                                @endauth
                                @auth('admin')
                                <td class="border px-4 py-2 text-center">
                                    <form action="{{ route('item.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('削除しますか？');">{{ __('削除') }}</button>
                                    </form>
                                </td>
                                @endauth
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="p-6">
                    <div class="flex justify-between items-center">
                        <div class="text-sm">
                            @if ($items->currentPage() == 1)
                                {{ $items->firstItem() }} {{ __('to') }} {{ $items->perPage() < $items->total() ? $items->perPage() : $items->total() }}
                            @else
                                {{ __('Showing') }} {{ $items->firstItem() }} {{ __('to') }} {{ $items->lastItem() }}
                            @endif
                            {{ __('of') }} {{ $items->total() }} {{ __('results') }}
                        </div>
                        <div class="flex items-center">
                            {!! $items->previousPageUrl() ? '<a href="' . $items->previousPageUrl() . '" class="px-3 py-1 bg-gray-200 text-gray-600 rounded" aria-label="Previous">&lsaquo;</a>' : '' !!}
                            @foreach ($items->getUrlRange($items->currentPage() - 1, $items->currentPage() + 1) as $page => $url)
                                <a href="{{ $url }}" class="px-3 py-1 bg-gray-200 text-gray-600 rounded @if ($page == $items->currentPage()) font-semibold @endif">{{ $page }}</a>
                            @endforeach
                            {!! $items->nextPageUrl() ? '<a href="' . $items->nextPageUrl() . '" class="px-3 py-1 bg-gray-200 text-gray-600 rounded" aria-label="Next">&rsaquo;</a>' : '' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
