<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('受注入力更新') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="flex justify-end mb-4 ml-4">
                            <a href="{{ url('/juchus') }}" class="px-6 py-4 bg-green-500 text-white rounded">{{ __('戻る') }}</a>
                        </div>
                    </div>
                </div>
    
                <div class="my-4 mx-auto max-w-2xl">
                    <form action="{{ route('juchu.update', ['juchu' => $juchu->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                         
                        <div class="grid grid-cols-1 gap-4">
                            <div class="col-12 mb-2 mt-2">
                                <div class="form-group">
                                    <select name="kyakusaki_id" class="form-select rounded-md shadow-sm w-full">
                                        <option>客先を選択してください</option>
                                        @foreach ($kyakusakis as $kyakusaki)
                                            <option value="{{ $kyakusaki->id }}"@if($kyakusaki->id==$juchu->kyakusaki_id) selected @endif>{{ $kyakusaki->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('kyakusaki_id')
                                    <span style="color:red;">客先を選択してください</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mb-2 mt-2">
                                <div class="form-group">
                                    <select name="item_id" class="form-select rounded-md shadow-sm w-full">
                                        <option>商品を選択してください</option>
                                        @foreach ($items as $item)
                                            <option value="{{ $item->id }}"@if($item->id==$juchu->item_id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('item_id')
                                    <span style="color:red;">商品を選択してください</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mb-2 mt-2">
                                <div class="form-group">
                                    <input type="text" name="kosu" value="{{ $juchu->kosu }}" class="form-control rounded-md shadow-sm w-full"  placeholder="個数">
                                    @error('kosu')
                                    <span style="color:red;">個数を1～12までの数値で入力してください</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mb-2 mt-2">
                                <div class="form-group">
                                    <select name="joutai_id" class="form-select rounded-md shadow-sm w-full">
                                        <option>状態を選択してください</option>
                                        @foreach ($joutais as $joutai)
                                            <option value="{{ $joutai->id }}"@if($joutai->id==$juchu->joutai) selected @endif>{{ $joutai->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('joutai_id')
                                    <span style="color:red;">状態を選択してください</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mb-2 mt-2">
                                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">変更</button>
                            </div>
                        </div>      
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
