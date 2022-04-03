<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Goutte\Client;
use Illuminate\Support\Str;
use Ramsey\Collection\Collection;

class ArticlesFromDelfiController extends Controller
{
    private $data = array();
    private $counter = 0; //kintamasis naudojamas apriboti naujienu skaičiui

    public function getArticles(){

        $client = new Client();
        $url = 'https://www.delfi.lt/archive/latest.php';
        $page = $client->request('GET', $url);
        $page->filter('.CBarticleTitle')->each(function ($item){
            if($this->counter<10){
                //delfi premium login niuansas...
                if(!Str::contains($item->attr('href'), ['login','verslasplius', 'plius', 'video'])) {
                    //funkcija, kuri gauna straipsnio duomenis
                    $this->getData($item->attr('href'));
                }
                $this->counter++;
            }
        });

        //vaizdas su straipsniais
        $articles = Article::Where('source', 'Delfi.lt')->get();
        return view('Articles', compact('articles'));
    }
    public function getData($url){
        //Gauti duomenis
        $client = new Client();
        $page = $client->request('GET', $url);
        $this->data['header'] = $page->filter('.article-title h1')->text();
        $this->data['content'] = $page->filter('.delfi-article-lead > b')->text();
        $page->filter('.col-xs-8 > div > p')->each(function ($item){
            $this->data['content'] .= $item->text();
        });
        $this->data['source'] = "Delfi.lt";
        $article = Article::storeData($this->data);
    }
}
