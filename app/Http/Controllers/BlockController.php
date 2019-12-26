<?php

namespace App\Http\Controllers;

use App\Block;
use App\Blockchain;

use App\Services\BlockchainService;
use App\Services\BlockService;

use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blocks = Block::latest()->paginate(12);

        return view('block.index',compact('blocks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Blockchain $blockchain)
    {

        //$latestBlock = $blockchain->blocks()->orderBy('created_at','desc')->get();

        // if (!isset($latestBlock[1])) {
        //     return view('blockchain.create')->withError('Não tem o primeiro');
        // }

        return view('block.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Blockchain $blockchain, Request $request)
    {

        $request->validate([
            'data' => 'required|json',
        ]);

        $args = [
            'blockchain_id' => $blockchain->id,
            'data'          => $request->data,
        ];

        $blockchain->newBlock($args);

        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blockchain  $blockchain
     * @return \Illuminate\Http\Response
     */
    public function show(Blockchain $blockchain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blockchain  $blockchain
     * @return \Illuminate\Http\Response
     */
    public function edit(Blockchain $blockchain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blockchain  $blockchain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blockchain $blockchain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blockchain  $blockchain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blockchain $blockchain)
    {
        //
    }
}