<?php

namespace App\Http\Controllers;

use App\Link;
use App\Tag;
use Illuminate\Http\Request;


class SingleTag extends Controller
{
    public function __invoke(Request $request, Tag $tag)
    {
        $links = $this->getLinksByTag(0, $tag->id);

        return view('link.by-tag', ['links' => $links, 'tag' => $tag, 'offset' => config('view.tag_links_per_batch')]);
    }

    protected function getLinksByTag(int $offset, int $tagId)
    {
        return Link::whereHas('group.dispatchJob', function ($query) {
            $query->whereDispatched(true);
        })->whereHas('tags', function ($query) use ($tagId) {
            $query->whereId($tagId);
        })->take(config('view.tag_links_per_batch'))->offset($offset)->orderBy('id', 'desc')->get();
    }

}
