<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BaseModel extends Model
{
    const CREATED_AT = "CreatedAt";
    const UPDATED_AT = "UpdatedAt";
    const DELETED_AT = "DeletedAt";

    public function getTable()
    {
        return $this->table ?? Str::singular(class_basename($this));

        // Pluralize
        // return $this->table ?? Str::pluralStudly(class_basename($this));
        // Snake
        // return $this->table ?? Str::snake(Str::pluralStudly(class_basename($this)));
    }
}
