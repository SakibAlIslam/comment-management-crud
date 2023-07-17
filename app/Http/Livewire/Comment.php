<?php

namespace App\Http\Livewire;

use App\Models\Comment as CommentModel;
use Livewire\Component;

class Comment extends Component
{
    public $comments;
    public $newComment;
    public $editCommentId;
    public $editCommentBody;

    public function mount()
    {
        $this->comments = CommentModel::orderBy('created_at', 'desc')->get();
    }

    public function addComment()
    {
        $this->validate([
            'newComment' => 'required'
        ]);

        CommentModel::create([
            'body' => $this->newComment
        ]);

        $this->newComment = '';
        $this->comments = CommentModel::orderBy('created_at', 'desc')->get();
    }

    public function editComment($commentId)
    {
        $this->editCommentId = $commentId;
        $comment = CommentModel::find($commentId);
        $this->editCommentBody  = $comment->body;
    }

    public function updateComment()
    {
        $this->validate([
            'editCommentBody' => 'required'
        ]);

        $comment = CommentModel::find($this->editCommentId);
        $comment->body = $this->editCommentBody;
        $comment->save();

        $this->editCommentId = null;
        $this->editCommentBody = '';
        $this->comments = CommentModel::orderBy('created_at', 'desc')->get();
    }

    public function deleteComment($commentId)
    {
        $comment = CommentModel::find($commentId);
        
        if ($comment) {
            $comment->delete();
            $this->comments = CommentModel::orderBy('created_at', 'desc')->get();
        }
    }


    public function render()
    {
        return view('livewire.comment');
    }
}
