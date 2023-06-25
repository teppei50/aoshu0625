<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('商品登録') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4 text-right">
                <a href="{{ route('admin.item.index') }}" class="px-4 py-3 bg-green-500 text-white rounded">{{ __('戻る') }}</a>
                </div>

                <form action="{{ route('admin.item.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">名前</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm w-full">
                            @error('name')
                                <span style="color:red; float:left;">名前を20文字以内で入力してください</span>
                            @enderror
                        </div>

                        <div>
                            <label for="kakaku" class="block font-medium text-sm text-gray-700">価格</label>
                            <input type="text" name="kakaku" id="kakaku" class="form-input rounded-md shadow-sm w-full">
                            @error('kakaku')
                                <span style="color:red; float:left;">価格を数値で入力してください</span>
                            @enderror
                        </div>

                        <div>
                            <label for="bunrui" class="block font-medium text-sm text-gray-700">分類</label>
                            <select name="bunrui" id="bunrui" class="form-select rounded-md shadow-sm w-full">
                                <option>分類を選択してください</option>
                                @foreach ($bunruis as $bunrui)
                                    <option value="{{ $bunrui->id }}">{{ $bunrui->str }}</option>
                                @endforeach
                            </select>
                            @error('bunrui')
                                <span style="color:red; float:left;">分類を選択してください</span>
                            @enderror
                        </div>

                        <div>
                            <label for="shosai" class="block font-medium text-sm text-gray-700">詳細</label>
                            <textarea class="form-textarea rounded-md shadow-sm w-full" style="height:100px" name="shosai" id="shosai" placeholder="詳細"></textarea>
                            @error('shosai')
                                <span style="color:red; float:left;">詳細を入力してください</span>
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
