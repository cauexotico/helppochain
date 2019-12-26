<?php

namespace App\Http\Controllers;

use App\Blockchain;
use Illuminate\Http\Request;

class BlockchainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $blockchains = Blockchain::latest()->paginate(12);

        dd($blockchains);

        return view('blockchain.index',compact('blockchains'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blockchain.create');
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
            'difficulty' => 'required|numeric|min:1|max:8',
            'type' => 'required',
        ]);
  
        $blockchain = Blockchain::create($request->all());
        $blockchain->createGenesisBlock();

        return redirect()->route('blockchains.index')
                        ->with('success','Blockchain created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blockchain  $blockchain
     * @return \Illuminate\Http\Response
     */
    public function show(Blockchain $blockchain)
    {
        dd($blockchain);
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
