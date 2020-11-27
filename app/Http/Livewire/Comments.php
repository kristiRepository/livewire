<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    // public $comments;

    public $newComment;




    public function mount()
    {
        // $initialComments = Comment::latest()->get();
        // $this->comments = $initialComments;
    }

    

    public function updated($field)
    {
        $this->validateOnly($field, [
            'newComment' => 'required|max:7'
        ]);
    }




    public function addComment()
    {
        $this->validate(['newComment' => 'required|max:7']);

        if ($this->newComment == '') return;

        $createdCommment = Comment::create([
            'body' => $this->newComment,
            'user_id' => 1
        ]);

        // $this->comments->prepend($createdCommment);

        // array_unshift($this->comments,[
        //     'body' => $this->newComment,
        //     'created_at' => Carbon::now()->diffForHumans(),
        //     'creator' => 'Kristi'
        // ]);

        $this->newComment = "";

        session()->flash('message','Comment added successfully');
    }


    public function remove($commentId){

        $comment=Comment::find($commentId);

        $comment->delete();

        // $this->comments=$this->comments->except($commentId);
        session()->flash('message','Comment deleted successfully');

    }




    public function render()
    {
        return view('livewire.comments',[
            'comments' => Comment::latest()->paginate(2)
        ]);
    }
}
