<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CreateController extends Controller
{
    public function create()
    {
        return view('crud.create');
    }
    public function post(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        // dd($request->all());

        $note = new Note();
        $note->title = $request->input('title');
        $note->content = $request->input('content');

        $note->noteCreator()->associate(auth()->user());

        $note->save();

        // return redirect()->route('notes');
        return redirect()->route('note');

    }
    public function Notes()
    {
        $notes = Note::where("user_id", Auth::user()->id)->get();
        return view('crud.index', compact('notes'));
    }
    public function Note()
    {
        // $notes = Note::where("user_id", Auth::user()->id)->orderBy('updated_at', 'desc')->get();
        $notes = Note::where("user_id", Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(4);
        return view('crud.index2', compact('notes'));
    }
    public function DetailsSet($noteId)
    {
        //$notes = Note::where("user_id", Auth::user()->id)->get();
        //return view('crud.index2', compact('notes'));
        //return "hello";
        Session::put('noteId', $noteId);
        return redirect()->route('details');
    }
    public function Details()
    {
        $noteId = Session::get('noteId');
        $note = Note::where('id', $noteId)->first();
        return view('crud.index3', compact('note'));
    }
    public function Delete(Request $request)
    {
        $note = Note::findOrFail($request->input('id'));
        $note->delete();
        //return redirect()->route('notes')->with('success', 'User deleted successfully');
        return redirect()->route('note')->with('error', 'Note deleted successfully');
    }
    public function Update(Request $request)
    {
        //dd($request->all());

        //dd($note->title);

        $request->validate([
            'id' => 'exists:notes,id',
            'title' => 'string',
            'content' => 'string',
        ]);

        // 2. Retrieve the note you want to update
        $note = Note::findOrFail($request->input('id'));

        // 3. Update the note with the new data from the request
        $note->title = $request->input('title');
        $note->content = $request->input('content');

        // 4. Save the updated note
        $note->save();

        // return redirect()->route('notes')->with('success', 'Note updated successfully');
        return redirect()->route('note')->with('success', 'Note updated successfully');
    }
    public function Search(Request $request)
    {
        $query = $request->input('query');
        $notes = Note::where('title', 'LIKE', "%$query%")
            ->orWhere('content', 'LIKE', "%$query%")
            ->orWhere('updated_at', 'LIKE', "%$query%")
            ->get();

        // return view('crud.index', compact('notes'));
        return view('crud.indexSearch', compact('notes'));
    }
}
