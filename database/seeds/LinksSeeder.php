<?php

use App\DispatchJob;
use App\Group;
use App\Link;
use App\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class LinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class, 20)->create();
        factory(DispatchJob::class, 9)->create();

        $jobs = DispatchJob::all();

        foreach ($jobs as $job) {
            /** @var Collection $groups */
            $groups = factory(Group::class, rand(3,5))->make();

            $job->groups()->saveMany($groups);
        }

        unset($jobs);

        $groups = Group::all();

        $tags = Tag::all();
        foreach ($groups as $group) {
            /** @var Collection $links */
            $links = factory(Link::class, rand(4, 7))->make();
            $group->links()->saveMany($links);
        }
        $links = Link::all();
        $links->each(function (Link $link) use ($tags) {
            $link->tags()->attach($tags->random(rand(1,2))->pluck('id')->toArray());
        });
    }
}
