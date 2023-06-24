<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Bunrui;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Item::select([
            'b.id',
            'b.name',
            'b.kakaku',
            'b.shosai',
            'b.user_id',
            'r.str as bunrui',
        ])
        ->from('items as b')
        ->join('bunruis as r', function($join) {
            $join->on('b.bunrui', '=', 'r.id');
        })
        ->orderBy('b.id', 'DESC')
        ->paginate(5);  

        
            //itemsテーブルのデータを渡す
            if (\Auth::check()) {
                return view('index', compact('items'))
                    ->with('user_name', \Auth::user()->name)
                    ->with('page', request()->page)
                    ->with('i', (request()->input('page', 1) - 1) * 5);
            } else {
                return view('index', compact('items'))
                    ->with('user_name', null)
                    ->with('page', request()->page)
                    ->with('i', (request()->input('page', 1) - 1) * 5);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //bunruiテーブルのデータすべて渡す
        $bunruis = Bunrui::all();
        return view('create', compact('bunruis'));
        //bunruisテーブルのデータを一緒に表示
            // ->with('bunruis', $bunruis);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'kakaku' => 'required|integer',
            'bunrui' => 'required|integer',
            'shosai' => 'required|max:140',
        ]);

        $item = new Item;
        $item->name = $request->input(["name"]);
        $item->kakaku = $request->input(["kakaku"]);
        $item->bunrui = $request->input(["bunrui"]);
        $item->shosai = $request->input(["shosai"]);
        $item->user_id = \Auth::user()->id;
        $item->updated_at = date("Y-m-d H:i:s");
        $item->save();

        return redirect()->route('item.index')
            ->with('success','受注登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Item $item)
    {
        $bunruis = Bunrui::find($item->bunrui);
        $page = request()->page; // ページIDを取得する
        return view('show', compact('item', 'bunruis', 'page'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $bunruis = Bunrui::all();
        return view('edit', compact('item', 'bunruis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
    $request->validate([
        'name' => 'required|max:20',
        'kakaku' => 'required|integer',
        'bunrui' => 'required|integer',
        'shosai' => 'required|max:140',
    ]);

    $item->name = $request->input("name");
    $item->kakaku = $request->input("kakaku");
    $item->bunrui = $request->input("bunrui");
    $item->shosai = $request->input("shosai");
    $item->user_id = \Auth::user()->id;
    $item->save();

        return redirect()->route('item.index')
            ->with('success', '受注入力を変更しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('item.index')
            ->with('success', '商品の'.$item->name.'を削除しました');
    }
}