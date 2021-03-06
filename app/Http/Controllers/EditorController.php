<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EditorDocument;

class EditorController extends Controller
{
  public function index() {
    $user = Auth::user();
    $editorDocs = $user ? EditorDocument::where('user_id', $user->id)->get() : [];
    return view('editor', compact('editorDocs'))->with('user',$user);
  }

  public function store(Request $request)
  {

    $user = Auth::user();
    if ($request->selectedDocId) {
      $doc = EditorDocument::find($request->selectedDocId);
      $doc->text = $request->text;
      $doc->save();

    } else {
      $newDoc = new EditorDocument;
      $newDoc->user_id = $request->userId;
      $newDoc->text = $request->text;
      $newDoc->save();
    }

    return redirect()->route('editor.index');
  }
}
