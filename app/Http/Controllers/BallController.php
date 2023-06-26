<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ball;
use App\Models\Bucket;

class BallController extends Controller
{
    public function index()
    {
        $balls = Ball::all();
        return view('balls.index', compact('balls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'volume' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $ball = new Ball();
        $ball->name = $request->input('name');
        $ball->volume = $request->input('volume');
        $ball->save();

        $quantity = $request->input('quantity');

        // Perform further logic here, such as placing the balls in buckets
        // and handling success/error cases

        return redirect()->route('balls.index')->with('success', 'Ball created successfully.');
    }
}
