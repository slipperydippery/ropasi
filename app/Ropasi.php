<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Phpml\Classification\NaiveBayes;

class Ropasi extends Model
{
    protected $guarded = [];

    protected $casts = [
    ];

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public static function calculatewin($ropasi, $samplelength, $ownorall)
    {
        $lengthcolum = '';
        switch($samplelength) {
            case 1:
                $lengthcolum = 'lastone';
                break;
            case 2:
                $lengthcolum = 'lasttwo';
                break;
            case 3:
                $lengthcolum = 'lastthree';
                break;
            default:
                $lengthcolum = 'allguesses';
        }
        $samples = [];
        $labels = [];

        $ownorallarray = Result::orderBy('id', 'desc')->where('ropasi_id', $ropasi->id)->get();

        if($ownorall == 'all' || $ownorallarray->count() < 5) {
            $ownorallarray = Result::orderBy('id', 'desc')->get();
        }

        foreach($ownorallarray as $result){
            $samples[] = unserialize($result->$lengthcolum);
            $labels[] = $result->nexthumanmove;
        }

        if(count($samples) > 2){
            $classifier = new NaiveBayes();
            $classifier->train($samples, $labels);

            return $classifier->predict( unserialize($ropasi->$lengthcolum) );
        }
        return null;

    }

    public static function winner($input)
    {
        switch($input){
            case 1:
                return 2;
                break;
            case 2:
                return 3;
                break;
            case 3:
                return 1;
                break;
            default:
                return 1;
        }
    }

    public static function result($input)
    {
        switch($input){
            case 'a':
            case 'e':
            case 'i':
                return 0;
                break;
            case 'b':
            case 'f':
            case 'g':
                return 1;
                break;
            case 'c':
            case 'd':
            case 'h':
                return 2;
                break;
            default:
                return 5;

        }
    }
}
