<?php

namespace PedramDavoodi\Localization\Controllers;

use App\Http\Controllers\Controller;
use PedramDavoodi\Localization\Repositories\phrase\PhraseRepositoryInterface;
use PedramDavoodi\Localization\Requests\PhraseStoreRequest;
use PedramDavoodi\Localization\Requests\PhraseUpdateRequest;

class PhraseController extends Controller
{
    private PhraseRepositoryInterface $phrase_repository;

    public function __construct(PhraseRepositoryInterface $phrase_repository)
    {
        $this->phrase_repository = $phrase_repository;
    }

    /**
     * Store a newly created phrase in storage.
     */
    public function store(PhraseStoreRequest $request)
    {
        $this->phrase_repository->store($request);

        return redirect()->back()->withSuccess(___('successStore'));
    }

    /**
     * Update the specified phrase in storage.
     */
    public function update(PhraseUpdateRequest $request, int $lang_id)
    {
        $this->phrase_repository->update($request , $lang_id);

        return redirect()->back()->withSuccess(___('successUpdate'));
    }

    /**
     * Remove the specified phrase from storage.
     */
    public function destroy(int $lang_id)
    {
        $this->phrase_repository->delete($lang_id);

        return redirect()->back()->withSuccess(___('successDelete'));
    }
}
