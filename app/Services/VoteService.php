<?php

namespace App\Services;

use App\Repositories\VoteRepository;
use Illuminate\Http\Request;

class VoteService
{
    private $voteRepository;

    /**
     * Construct repository
     *
     * @param \App\Repositories\voteRepository $voteRepository
     */
    public function __construct(
        VoteRepository $voteRepository
    ) {
        $this->voteRepository = $voteRepository;
    }


    public function formatVoteList()
    {
        return $this->voteRepository->getVoteList();
    }

    public function formatResultsList()
    {
        return $this->voteRepository->getResultsList();
    }

    public function submitProcessing(Request $request)
    {
        $count = 0;
        foreach ($request->all() as $req) {
            foreach ($req as $el) {
                if ($el === true) {
                    ++$count;
                }
            }
        }
        $value = 12/$count;
        $this->voteRepository->submit($request, $value);
    }

}
