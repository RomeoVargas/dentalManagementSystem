<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class AppModel extends Model
{
    /**
     * Remove pluralization of table name
     *
     * @return string
     */
    final public function getTable()
    {
        if (isset($this->table)) {
            return $this->table;
        }

        return str_replace('\\', '', Str::snake(class_basename($this)));
    }
}