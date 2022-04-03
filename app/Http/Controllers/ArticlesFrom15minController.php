<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Goutte\Client;

class ArticlesFrom15minController extends Controller
{
    private $data = array();
    private $counter = 0; //kintamasis naudojamas apriboti naujienu skaičiui

    public function getArticles(){
        $client = new Client();
        $url = 'https://www.15min.lt/naujienos';
        $page = $client->request('GET', $url);
        $page->filter('.vl-title a')->each(function ($item){
            if($this->counter<10){
                //funkcija, kuri gauna straipsnio duomenis
                $this->getData($item->attr('href'));
                $this->counter++;
            }
        });

        //return view with articles
        $articles = Article::Where('source', '15min.lt')->get();
        return view('Articles', compact('articles'));
    }
    public function getData($url){
        //Get all data
        $client = new Client();
        $page = $client->request('GET', $url);
        $this->data['header'] = $page->filter('.article-top h1')->text();
        $this->data['content'] = $page->filter('.intro')->text();
        $page->filter('.article-content .text p')->each(function ($item){
            $this->data['content'] .= $item->text();
        });
        $this->data['source'] = "15min.lt";
        $article = Article::storeData($this->data);
    }
}
