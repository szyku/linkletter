<?php

namespace App\Http\Controllers;

use App\Group;

class SingleGroup extends Controller
{
    public function __invoke(Group $group)
    {
        return view('dispatch-group.single-group', ['group' => $group]);
    }

}
