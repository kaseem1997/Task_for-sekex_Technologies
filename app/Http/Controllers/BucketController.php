<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bucket;

class BucketController extends Controller
{
    public function index()
    {
        $buckets = Bucket::all();
        return view('buckets.index', compact('buckets'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'volume' => 'required|numeric',
        ]);

        try {
            Bucket::create([
                'name' => $validatedData['name'],
                'volume' => $validatedData['volume'],
            ]);

            return redirect()->route('buckets.index')
                ->with('success', 'Bucket created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($e->errors());
        }
    }


    // public function suggestBuckets(Request $request)
    // {
    //     $balls = [
    //         'Pink' => 2.5,
    //         'Red' => 2,
    //         'Blue' => 1,
    //         'Orange' => 0.8,
    //         'Green' => 0.5,
    //     ];

    //     $bucketVolume = $request->input('volume');
    //     $suggestedBuckets = [];

    //     foreach ($balls as $ball => $ballVolume) {
    //         $numBalls = floor($bucketVolume / $ballVolume);
    //         if ($numBalls > 0) {
    //             $suggestedBuckets[$ball] = $numBalls;
    //             $bucketVolume -= $numBalls * $ballVolume;
    //         }
    //     }

    //     return response()->json($suggestedBuckets);
    // }
    public function suggestBuckets(Request $request)
    {
        $balls = [
            'Pink' => 2.5,
            'Red' => 2,
            'Blue' => 1,
            'Orange' => 0.8,
            'Green' => 0.5,
        ];

        $bucketVolume = $request->input('volume');
        $suggestedBuckets = [];

        foreach ($balls as $ball => $ballVolume) {
            $numBalls = floor($bucketVolume / $ballVolume);
            if ($numBalls > 0) {
                $suggestedBuckets[$ball] = $numBalls;
                $bucketVolume -= $numBalls * $ballVolume;
            }
        }

        return view('buckets.suggestion-result', compact('suggestedBuckets'));
    }
}
