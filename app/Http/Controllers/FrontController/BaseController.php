<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Page;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->popular = Article::select('page_id','title', 'created_at', 'site_url')->where('status', 1)->orderBy('read_count', 'DESC')->take(3)->get();
        $this->recent = Article::select('page_id','title', 'created_at', 'site_url')->where('status', 1)->orderBy('created_at', 'DESC')->take(3)->get();
    }

    public function page_not_found(){
        $recent = $this->recent;

        return view('front_office.404', compact( 'recent'));
    }

    public function index(){
        $popular = $this->popular;
        $recent = $this->recent;

        $gramer_dersleri = Article::whereIn('page_id', ['3,4,5'])->orderBy('created_at', 'DESC')->take(3)->get();
        $kelime_dersleri = Article::whereIn('page_id', ['7,8,9,10'])->orderBy('created_at', 'DESC')->take(3)->get();

        return view('front_office.index', compact('popular', 'recent', 'gramer_dersleri', 'kelime_dersleri'));
    }

    public function gramer_list($site_url, $article_url = ""){
        $popular = $this->popular;
        $recent = $this->recent;
        $categoryName = 'Gramer';

        if($article_url){
            $article = Article::where('site_url', $article_url)->first();
            $page = Page::select('id', 'page_name', 'page_name_slug')->where('sub_page_id', 2)->where('id', $article->page_id)->first();
            if($page && $page->page_name_slug == $site_url)
                return view('front_office.detail', compact('site_url','article', 'popular', 'recent', 'categoryName', 'page'));
            else
                return redirect('/404-sayfa-bulunamadi');
        }
        else{
            $page = Page::select('id', 'page_name')->where('sub_page_id', 2)->where('page_name_slug', $site_url)->first();
            if($page){
                $article_list = Article::where('page_id', $page->id)
                    ->where('status', 1)
                    ->orderBy('order', 'ASC')
                    ->get();
                return view('front_office.list', compact('site_url','article_list', 'popular', 'recent', 'categoryName', 'page'));
            }
            else{
                return redirect('/404-sayfa-bulunamadi/');
            }
        }
    }

    public function kelime_list($site_url, $article_url = ""){
        $popular = $this->popular;
        $recent = $this->recent;
        $categoryName = 'Kelime';

        if($article_url){
            $article = Article::where('site_url', $article_url)->first();
            $page = Page::select('id', 'page_name', 'page_name_slug')->where('sub_page_id', 6)->where('id', $article->page_id)->first();
            if($page && $page->page_name_slug == $site_url)
                return view('front_office.detail', compact('site_url','article', 'popular', 'recent', 'categoryName', 'page'));
            else
                return redirect('/404-sayfa-bulunamadi');
        }
        else{
            $page = Page::select('id', 'page_name')->where('sub_page_id', 6)->where('page_name_slug', $site_url)->first();
            if($page){
                $article_list = Article::where('page_id', $page->id)
                    ->where('status', 1)
                    ->orderBy('order', 'ASC')
                    ->get();
                return view('front_office.list', compact('site_url','article_list', 'popular', 'recent', 'categoryName', 'page'));
            }
            else{
                return redirect('/404-sayfa-bulunamadi');
            }
        }
    }

    public function blog($article_url = ""){
        $popular = $this->popular;
        $recent = $this->recent;
        $categoryName = 'Blog';
        $site_url = 'blog';

        if($article_url){
            $article = Article::where('site_url', $article_url)->first();
            $page = Page::select('id', 'page_name', 'page_name_slug')->where('sub_page_id', 0)->where('id', $article->page_id)->first();
            if($page && $page->page_name_slug == 'blog')
                return view('front_office.detail', compact('site_url','article', 'popular', 'recent', 'categoryName', 'page'));
            else
                return redirect('/404-sayfa-bulunamadi');
        }
        else{
            $page = Page::select('id', 'page_name')->where('sub_page_id', 0)->where('page_name_slug', 'blog')->first();
            if($page){
                $article_list = Article::where('page_id', $page->id)
                    ->where('status', 1)
                    ->orderBy('order', 'ASC')
                    ->get();
                return view('front_office.list', compact('site_url', 'article_list',  'popular', 'recent', 'categoryName', 'page'));
            }
            else{
                return redirect('/404-sayfa-bulunamadi');
            }
        }
    }

    public function hikaye($article_url = ""){
        $popular = $this->popular;
        $recent = $this->recent;
        $categoryName = 'Hikaye';
        $site_url = 'hikaye';

        if($article_url){
            $article = Article::where('site_url', $article_url)->first();
            $page = Page::select('id', 'page_name', 'page_name_slug')->where('sub_page_id', 0)->where('id', $article->page_id)->first();
            if($page && $page->page_name_slug == 'hikaye')
                return view('front_office.detail', compact('site_url','article', 'popular', 'recent', 'categoryName', 'page'));
            else
                return redirect('/404-sayfa-bulunamadi');
        }
        else{
            $page = Page::select('id', 'page_name')->where('sub_page_id', 0)->where('page_name_slug', 'hikaye')->first();
            if($page){
                $article_list = Article::where('page_id', $page->id)
                    ->where('status', 1)
                    ->orderBy('order', 'ASC')
                    ->get();
                return view('front_office.list', compact('site_url', 'article_list',  'popular', 'recent', 'categoryName', 'page'));
            }
            else{
                return redirect('/404-sayfa-bulunamadi');
            }
        }
    }
}
