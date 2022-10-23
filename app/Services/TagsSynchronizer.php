<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class TagsSynchronizer
{
    static public function sync(Collection $tags, Model $model)
    {
        $articleTags    = $model->tags->keyBy('name');
        $syncIds        = $articleTags->intersectByKeys($tags)->pluck('id')->toArray();
        $tagsToAttach   = $tags->diffKeys($articleTags);

        foreach ($tagsToAttach as $tag) {
            if (!empty($tag)) {
                $tag        = Tag::firstOrCreate(['name' => trim($tag)]);
                $syncIds[]  = $tag->id;
            }
        }

        $model->tags()->sync($syncIds);
    }
}
