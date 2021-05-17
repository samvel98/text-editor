@extends('layouts.app')

@section('content')
<div class="text-area-container">
  <?php if ($user ?? ''): ?>
    <div class="user-texts">
      @foreach($editorDocs as $doc)
        <user-docs text-field='{{$doc->text}}' doc-id='{{$doc->id}}'> </user-docs>
      @endforeach
      <div class="plus" id="plus" onclick="createNewDoc()">
        <div class="plus__line plus__line--v"></div>
        <div class="plus__line plus__line--h"></div>
      </div>
    </div>
  <?php endif ?>
  <div><?php $asd ?></div>
  <textarea id="#textarea"></textarea>
  <?php if ($user ?? ''): ?>
    <form action="{{ route('editor.store') }}" method="post">
       {{ @csrf_field() }}
       <input type="hidden" name="userId" value="{{ $user->id }}">
       <input type="hidden" name="selectedDocId" id="selectedDocId">
       <input type="hidden" name="text" id="textareaInput">
       <button type="submit" class="btn btn-primary save-text"> Save changes </button>
    </form>
  <?php endif ?>
  <example-component ></example-component>
</div>
<script type="application/javascript">
  function createNewDoc() {
    tinymce.get('#textarea').resetContent();
    document.getElementById('selectedDocId').value = null;
  }
</script>
@endsection

  
