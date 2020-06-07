<?php


namespace App\Helper;


use App\Models\Comment;
use Carbon\Carbon;

class CommentHelper
{
    public static function comments($id){
        $commentsSql = Comment::where('article_id', $id)->get()->toArray();
        $comments = array();
        if(count($commentsSql)>0){
            foreach ($commentsSql as $key=>$item){
                if($item['sub_comment_id'] == 0){
                    $comments[$item['id']]['id'] = $item['id'];
                    $comments[$item['id']]['full_name'] = $item['full_name'];
                    $comments[$item['id']]['email'] = $item['email'];
                    $comments[$item['id']]['content'] = $item['content'];
                    $comments[$item['id']]['created_date'] = Carbon::parse($item['created_at'])->format('d/m/Y H:i:s');
                }else{
                    $comments[$item['sub_comment_id']]['sub_comment']['id'] = $item['id'];
                    $comments[$item['sub_comment_id']]['sub_comment']['full_name'] = $item['full_name'];
                    $comments[$item['sub_comment_id']]['sub_comment']['email'] = $item['email'];
                    $comments[$item['sub_comment_id']]['sub_comment']['content'] = $item['content'];
                    $comments[$item['sub_comment_id']]['sub_comment']['created_date'] = Carbon::parse($item['created_at'])->format('d/m/Y H:i:s');
                }
            }
            return $comments;
        }
        return 0;
    }
}
