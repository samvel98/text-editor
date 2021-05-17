<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class EditorDocument extends Model
{
  protected $table = 'editor_docs';

  protected $fillable = ['user_id', 'text'];
}
