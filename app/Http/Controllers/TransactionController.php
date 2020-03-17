<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Blockchain;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Blockchain $blockchain)
    {
        return view('transactions.create', compact('blockchain'));
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

        $blockchain->createTransaction($request->data);

        return redirect()->route('transactions.index')
                         ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blockchain  $blockchain
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('projects.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blockchain  $blockchain
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
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
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blockchain  $blockchain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}