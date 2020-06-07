<?php

namespace App\Http\Controllers\BackController;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContentStoreRequest;
use App\Http\Requests\ContentUpdateRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Models\ContactUs;
use App\Models\Page;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{
    public function index(){
        $pages = Page::get();
        return view('back_office.index', compact('pages'));
    }

    public function list($id){
        $page_name = Page::find($id);
        $articles = Article::where('page_id', $id)->get();
        return view('back_office.list', compact('articles', 'page_name', 'id'));
    }

    public function create($id){
        $page = Page::find($id);
        if($page->sub_page == 1){
            $main_page = Page::find($page->sub_page_id);
        }else{
            $main_page = "";
        }
        return view('back_office.create', compact('id', 'page', 'main_page'));
    }

    public function store(ContentStoreRequest $request){
        $filename = "empty_img.png";
        if ($request->image->getClientOriginalName()) {
            $name = md5(rand(100, 200));
            $ext = explode('.', $request->image->getClientOriginalName());
            $filename = $name . '.' . $ext[1];
            $destination = public_path('/front_assets/img/subject_img/' . $filename);
            $location = $request->image->getPathName();
            move_uploaded_file($location, $destination);
        }

        try{
            $article = new Article();
            $article->page_id       = $request->page_id;
            $article->keywords      = $request->keywords;
            $article->description   = $request->descriptions;
            $article->title         = $request->title;
            $article->content       = $request->contents;
            $article->read_count    = 0;
            $article->order         = 1;
            $article->status        = 1;
            $article->site_url      = $request->site_url;
            $article->image         = $filename;
            $article->save();

            $request->session()->flash('status_success', 'Kayıt işlemi başarıyla gerçekleştirildi.');
            return redirect(url('/admin/pages/list/'.$request->page_id));
        }catch (\Exception $e){
            $request->session()->flash('status_error', $e->getMessage());
            return redirect(url('/admin/pages/list/'.$request->page_id));
        }
    }

    public function edit($article_id){
        $article = Article::find($article_id);
        $page = Page::where('id', $article->page_id)->first();
        if($page->sub_page == 1){
            $main_page = Page::find($page->sub_page_id);
        }else{
            $main_page = "";
        }
        $page_id = $page->id;
        return view('back_office.edit', compact('article','page','main_page', 'article_id', 'page_id'));
    }

    public function update(ContentUpdateRequest $request){
        $filename = "empty_img.png";
        if ($request->image) {
            $name = md5(rand(100, 200));
            $ext = explode('.', $request->image->getClientOriginalName());
            $filename = $name . '.' . $ext[1];
            $destination = public_path('/front_assets/img/subject_img/' . $filename);
            $location = $request->image->getPathName();
            move_uploaded_file($location, $destination);


            $article = Article::find($request->article_id);
            $file = public_path('/front_assets/img/subject_img/' . $article->image);
            if(file_exists($file))
                unlink($file);
        }
        try{
            Article::where('id', $request->article_id)
                ->update([
                        'title'         => $request->title,
                        'content'       => $request->contents,
                        'description'   => $request->descriptions,
                        'keywords'      => $request->keywords,
                        'site_url'      => $request->site_url,
                        'image'         => $filename,
                    ]);
            $request->session()->flash('status_success', 'Update işlemi başarıyla gerçekleştirildi.');
            return redirect(url('/admin/pages/list/'.$request->page_id));
        }catch (\Exception $e){
            $request->session()->flash('status_error', $e->getMessage());
            return redirect(url('/admin/pages/list/'.$request->page_id));
        }
    }

    public function delete($id){
        try{
            $article = Article::find($id);
            $file = public_path('/front_assets/img/subject_img/' . $article->image);
            if(file_exists($file))
                unlink($file);
            $article->delete();
            Session::flash('status_success', 'Silme işlemi başarıyla gerçekleştirildi.');
            return redirect()->back();
        }catch (\Exception $e){
            Session::flash('status_error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function add_images(Request $request){
        if ($request->image->getClientOriginalName()) {
            $name = md5(rand(100, 200));
            $ext = explode('.', $request->image->getClientOriginalName());
            $filename = $name . '.' . $ext[1];
            $destination = public_path('/front_assets/img/' . $filename);
            $location = $request->image->getPathName();
            move_uploaded_file($location, $destination);
            echo '/front_assets/img/' . $filename;
        }
    }

    public function change_status(Request $request){
        $article_id = $request['id'];
        $article = Article::find($article_id);
        if($article->status == 0)
            $article->status = 1;
        else
            $article->status = 0;

        try{
            $data = ['status' => $article->status, 'message' => 'Makale durumu değiştirildi', 'id' => $request['id']];
            Article::where('id', $article_id)
                ->update(['status' => $article->status]);
            return Response::json(array(
                'success' => true,
                'data'   => $data
            ));
        }catch (\Exception $e){
            return Response::json(array(
                'success' => true,
                'data'   => $e->getMessage()
            ));
        }
    }

    public function comment_list(){
        $comments = Comment::get();
        return view('back_office.comments.list', compact('comments'));
    }

    public function comment_delete($id){
        try{
            $comment = Comment::find($id);
            $comment->delete();
            return redirect()->back();
        }catch (\Exception $exception){
            return redirect()->back();
        }
    }

    public function contact_us_list(){
        $contacts = ContactUs::get();
        return view('back_office.contact_us.list', compact('contacts'));
    }

    public function contact_us_delete($id){
        try{
            $contact = ContactUs::find($id);
            $contact->delete();
            return redirect()->back();
        }catch (\Exception $exception){
            return redirect()->back();
        }
    }

    public function subscriber_list(){
        $subscribers = Subscriber::get();
        return view('back_office.subscribers.list', compact('subscribers'));
    }

    public function subscriber_delete($id){
        try{
            $subscriber = Subscriber::find($id);
            $subscriber->delete();
            return redirect()->back();
        }catch (\Exception $exception){
            return redirect()->back();
        }
    }
}
