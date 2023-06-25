<?php

namespace App\Http\Controllers\Admin;

use App\Models\Juchu;
use App\Models\Item;
use App\Models\Kyakusaki;
use App\Models\Joutai;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JuchuController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
{
    $juchus = Juchu::select([
        'j.id',
        'j.kyakusaki_id',
        'j.item_id',
        'j.kosu',
        'j.joutai',
        'j.user_id',
        'k.name as kyakusaki_name',
        'b.name as item_name',
        'u.name as user_name',
        'g.name as joutai',
    ])
        ->from('juchus as j')
        ->join('kyakusakis as k', function ($join) {
            $join->on('j.kyakusaki_id', '=', 'k.id');
        })
        ->join('items as b', function ($join) {
            $join->on('j.item_id', '=', 'b.id');
        })
        ->join('users as u', function ($join) {
            $join->on('j.user_id', '=', 'u.id');
        })
        ->join('joutais as g', function ($join) {
            $join->on('j.joutai', '=', 'g.id');
        })
        ->orderBy('j.id', 'DESC')
        ->paginate(5);
    

    $user = Auth::user();
    $user_name = $user ? $user->name : '';

    if (Auth::guard('admin')->check()) {
        // 管理者の場合
        $user_name = Auth::guard('admin')->user()->name;
    }

    return view('admin.juchu.index', compact('juchus'))
        ->with('user_name', $user_name)
        ->with('page', request()->page)
        ->with('i', (request()->input('page', 1) - 1) * 5);
}


        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $items = Item::all();
            $kyakusakis = kyakusaki::all();
            $page = request()->page; // 追加
            return view('admin.juchu.create', compact('items','kyakusakis'));
     
        }
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
         $validatedData = $request->validate([
            'kyakusaki_id' => 'required',
            'item_id' => 'required',
            'kosu' => 'required|integer|min:1|max:12',
            ]);

            $juchu = new Juchu;
            $juchu->kyakusaki_id = $validatedData['kyakusaki_id'];
            $juchu->item_id = $validatedData['item_id'];
            $juchu->kosu = $validatedData['kosu'];
            $juchu->joutai = 1;
            $juchu->user_id = auth()->user()->id;
            $juchu->save();

        return redirect()->route('admin.juchu.index')
            ->with('success', '受注が正常に登録されました');
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Juchu  $juchu
         * @return \Illuminate\Http\Response
         */
        public function show(Juchu $juchu)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Juchu  $juchu
         * @return \Illuminate\Http\Response
         */
        public function edit(Juchu $juchu)
        {
            $items = Item::all();
            $kyakusakis = Kyakusaki::all();
            $joutais = Joutai::all();
            return view('admin.juchu.edit', compact('juchu','items','joutais','kyakusakis'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\Juchu  $juchu
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Juchu $juchu)
        {//storeと一緒なのでまとめる
            $request->validate([
                'kyakusaki_id' => 'required|integer',
                'item_id' => 'required|integer',
                'kosu' => 'required|integer|min:1|max:12',
            ]);
                $juchu->kyakusaki_id = $request->input("kyakusaki_id");
                $juchu->item_id = $request->input("item_id");
                $juchu->kosu = $request->input("kosu");
                $juchu->joutai = $request->input("joutai_id");
                $juchu->user_id = \Auth::user()->id;
                $juchu->save();
                
                return redirect()->route('admin.juchu.index')
                    ->with('success', '受注入力を変更しました');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Juchu  $juchu
         * @return \Illuminate\Http\Response
         */
        public function destroy(Juchu $juchu)
        {
            $juchu->delete();
            return redirect()->route('admin.juchu.index')
                ->with('success', '受注ID'.$juchu->id.'を削除しました');
        }
    }
