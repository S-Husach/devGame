<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vote;
use App\Models\Category;

class VoteRepository
{

    /**
     * Return a listing of users for the vote table.
     *
     * @return void
     */
    public function getVoteList()
    {
        return User::all();
    }

    /**
     * Return a listing of users for the dashboard table.
     *
     * @return void
     */
    public function getResultsList()
    {
        return User::all();
    }

    /**
     * Add votes to DB
     *
     * @param \Illuminate\Http\Request $request
     * @param float $value
     * @return void
     */
    public function submit(Request $request, $value)
    {
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
