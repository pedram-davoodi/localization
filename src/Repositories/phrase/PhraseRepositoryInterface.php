<?php

namespace PedramDavoodi\Localization\Repositories\phrase;

use PedramDavoodi\Localization\Requests\PhraseStoreRequest;
use PedramDavoodi\Localization\Requests\PhraseUpdateRequest;

interface PhraseRepositoryInterface
{
    /**
     * store a new phrase
     */
    public function store(PhraseStoreRequest $request);

    /**
     * show list of phrases of a specific lang
     */
    public function index(int $lang_id, int $paginate = null);

    /**
     * delete an existing phrase
     */
    public function delete(int $phrase_id);

    /**
     * update an existing phrase
     */
    public function update(PhraseUpdateRequest $request, int $phrase_id);
}
