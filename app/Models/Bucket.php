<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bucket extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'volume'];
    public static function placeBallsInBuckets($balls)
    {
        $buckets = Bucket::orderBy('volume', 'desc')->get();

        foreach ($balls as $ball) {
            $quantity = $ball->quantity;
            $ballVolume = $ball->volume;

            while ($quantity > 0) {
                $placedQuantity = 0;
                $selectedBucket = null;
                $maxSpace = 0;

                foreach ($buckets as $bucket) {
                    $availableSpace = $bucket->volume - $bucket->filledVolume();

                    if ($availableSpace >= $ballVolume && $availableSpace > $maxSpace) {
                        $selectedBucket = $bucket;
                        $maxSpace = $availableSpace;
                    }
                }

                if ($selectedBucket === null) {
                    // Display an error message indicating no suitable bucket found
                    return false;
                }

                $maxQuantity = floor($maxSpace / $ballVolume);
                $placedQuantity = min($maxQuantity, $quantity);

                // Update the bucket's filled volume
                $selectedBucket->fillVolume($ballVolume, $placedQuantity);

                $quantity -= $placedQuantity;
            }
        }

        return true;
    }



    public static function emptyBucket()
    {
        self::query()->update(['volume' => null]);
    }
}
