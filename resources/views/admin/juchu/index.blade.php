<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('受注入力') }}
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
                                <th class="border px-4 py-2">{{ __('ID') }}</th>
                                <th class="border px-4 py-2">{{ __('客先') }}</th>
                                <th class="border px-4 py-2">{{ __('商品名') }}</th>
                                <th class="border px-4 py-2">{{ __('個数') }}</th>
                                <th class="border px-4 py-2">{{ __('状態') }}</th>
                                @auth<th class="border px-4 py-2">{{ __('変更') }}</th>@endauth
                                @auth<th class="border px-4 py-2">{{ __('削除') }}</th>@endauth
                                <th class="border px-4 py-2">{{ __('編集者') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($juchus as $juchu)
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ $juchu->id }}</td> 
                                <td class="border px-4 py-2 text-center">{{ $juchu->kyakusaki_name }}</td>
                                <td class="border px-4 py-2 text-center">{{ $juchu->item_name }}</td>
                                <td class="border px-4 py-2 text-center">{{ $juchu->kosu }}</td>
                                <td class="border px-4 py-2 text-center">{{ $juchu->joutai }}</td>
                                <td class="border px-4 py-2 text-center">
                                    @auth
                                        <a href="{{ route('juchu.edit',$juchu->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded">変更</a>
                                    @endauth
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    @auth
                                        <form action="{{ route('juchu.destroy',$juchu->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded" onclick="return confirm('削除しますか？');">削除</button>
                                        </form>
                                    @endauth
                                </td>
                                <td class="border px-4 py-2 text-center">{{ $juchu->user_name}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            
                {!! $juchus->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
</x-admin-layout>
