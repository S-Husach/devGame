<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vote;
use App\Models\Category;

class VoteRepository
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getVoteList()
    {
        return User::all();
        // orderBy('fulltime', 'desc')
        //     ->take(21)
        //     ->get();
    }

    public function getResultsList()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request, $value)
    {
        //counter for vote value

        // $count = 0;
        // foreach ($request->all() as $req) {
        //     foreach ($req as $el) {
        //         if ($el === true) {
        //             ++$count;
        //         }
        //     }
        // }
        // $value = 12/$count;

        //add new vote

        foreach ($request->all() as $req) {

            if ($req["mentoring"]) {
                Vote::create([
                    'voter_id' => auth()->user()->id,
                    'voted_for_id' => $req["id"],
                    'category_id' => Category::whereName("mentoring")->first()->id,
                    'vote_value' => $value
                ]);
            }

            if ($req["responsibility"]) {
                Vote::create([
                    'voter_id' => auth()->user()->id,
                    'voted_for_id' => $req["id"],
                    'category_id' => Category::whereName("responsibility")->first()->id,
                    'vote_value' => $value
                ]);
            }

            if ($req["codestyle"]) {
                Vote::create([
                    'voter_id' => auth()->user()->id,
                    'voted_for_id' => $req["id"],
                    'category_id' => Category::whereName("codestyle")->first()->id,
                    'vote_value' => $value
                ]);
            }
        }
    }
}
