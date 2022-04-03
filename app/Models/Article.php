<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use function Symfony\Component\Translation\t;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['header', 'content', 'source'];

    //Metodas gauna duomenys ir juos įrašo
    public function storeData($data){
        //Duomenų validacija
        $validator = Validator::make($data,[
            'header' => 'unique:articles',
        ]);
        if($validator->fails()){
            return false;
        }else{
            //Duomenų išsaugojimas
            $article = Article::create([
                'header' => $data['header'],
                'content' => $data['content'],
                'source' => $data['source'],
            ]);
            return true;
        }
    }
}
