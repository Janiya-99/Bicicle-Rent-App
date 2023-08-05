<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Card;
use Illuminate\Routing\Controller;
use App\Http\Requests\V1\StoreCardRequest;
use App\Http\Requests\V1\UpdateCardRequest;
use App\Http\Resources\V1\User\CardResource;
use App\Http\Resources\V1\User\CardCollection;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Card::all();

        if($cards->count() > 0){
            return response()->json([
                'status' => 200,
                'cards' => new CardCollection($cards)
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'No Card Records Found'
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCardRequest $request)
    {
        $card = Card::create($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Card created successfully',
            'user' => new CardResource($card)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($cardId)
    {
        $card = Card::find($cardId);

        if($card){
            return response()->json([
                'status' => 200,
                'cards' => new CardResource($card)
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'No Card Record Found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCardRequest $request, $cardId)
    {
        $card = Card::find($cardId);

        if ($card) {
            $card->update($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'Card Updated Successfully '
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Card Records Found '
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($cardId)
    {
        $card = Card::find($cardId);

        if ($card) {
            $card->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Card Deleted Successfully '
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Card Records Found '
            ], 404);
        }
    }
}
