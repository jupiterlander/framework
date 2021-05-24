<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HighScore extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['acronym', 'score'];


    // public static function store(string $acronym, int $score)
    // {
    //     $highscore = self::make();
    //     $highscore->akronym = strtoupper($acronym);
    //     $highscore->score = $score;
    //     $highscore->save();
    // }
}
