<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nestable\NestableTrait;
class Pages extends Model
{
    use NestableTrait;
    protected $table = 'pages';
    protected $parent = 'parent_id';
}
