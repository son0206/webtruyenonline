<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Session;


class CommentController extends Controller
{
    public function store(Request $request, $chapter_id)
    {
        $request->validate([
            'content' => 'required',
        ]);
        $id=Session::get('publisher_id');
        Comment::create([
            'user_id' => $id,
            'chapter_id' => $chapter_id,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('status', 'Bình luận thành công !');
    }
}