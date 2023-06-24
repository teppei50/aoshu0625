<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('受注登録画面') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4 text-right">
                    <a href="{{ url('/juchus') }}" class="px-4 py-3 bg-green-500 text-white rounded">{{ __('戻る') }}</a>
                </div>

                <form action="{{ route('juchu.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="kyakusaki_id" class="block font-medium text-sm text-gray-700">客先</label>
                            <select name="kyakusaki_id" id="kyakusaki_id" class="form-select rounded-md shadow-sm w-full">
                                <option>客先を選択してください</option>
                                @foreach ($kyakusakis as $kyakusaki)
                                    <option value="{{ $kyakusaki->id }}">{{ $kyakusaki->name }}</option>
                                @endforeach
                            </select>
                            @error('kyakusaki_id')
                                <span style="color:red;">客先を選択してください</span>
                            @enderror
                        </div>

                        <div>
                            <label for="item_id" class="block font-medium text-sm text-gray-700">商品</label>
                            <select name="item_id" id="item_id" class="form-select rounded-md shadow-sm w-full">
                                <option>商品を選択してください</option>
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('item_id')
                                <span style="color:red;">商品を選択してください</span>
                            @enderror
                        </div>

                        <div>
                            <label for="kosu" class="block font-medium text-sm text-gray-700">個数</label>
                            <input type="text" name="kosu" id="kosu" class="form-input rounded-md shadow-sm w-full">
                            @error('kosu')
                                <span style="color:red; float:left;">個数を1～12までの数値で入力してください</span>
                            @enderror
                        </div>

                        <div>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">{{ __('登録') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-admin-layout>
