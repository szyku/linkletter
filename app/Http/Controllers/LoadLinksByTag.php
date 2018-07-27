<?php declare(strict_types=1);


namespace App\Http\Controllers;


use App\Tag;
use Illuminate\Http\Request;

class LoadLinksByTag extends SingleTag
{
    public function __invoke(Request $request, Tag $tag)
    {
        $offset = (int) $request->get('offset', 0);
        $links = $this->getLinksByTag($offset, $tag->id);
        if ($links->count() === 0) {
            return view('no-more');
        }
        return view('link.link-load', ['links' => $links, 'tag' => $tag, 'offset' => $offset + config('view.tag_links_per_batch')]);
    }

}