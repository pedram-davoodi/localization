<?php


namespace PedramDavoodi\Localization\Repositories\phrase;


use PedramDavoodi\Localization\Models\Phrase;
use PedramDavoodi\Localization\Requests\PhraseStoreRequest;
use PedramDavoodi\Localization\Requests\PhraseUpdateRequest;

class PhraseRepository implements PhraseRepositoryInterface
{

    /**
     * store a new phrase
     */
    public function store(PhraseStoreRequest $request)
    {
        return Phrase::create($request->validated());
    }

    /**
     * show list of phrases of a specific lang
     */
    public function index(int $lang_id , int $paginate = null)
    {
        return Phrase::select('lc_phrases.*')
            ->join('lc_langs'  , 'lc_langs.lang' , 'lc_phrases.lang')
            ->where('lc_langs.id' , $lang_id)
            ->when(
                !is_null($paginate),
                function ($q) use ($paginate){ return $q->paginate($paginate); },
                function ($q){ return $q->get(); }
            );
    }

    /**
     * delete an existing phrase
     */
    public function delete(int $phrase_id)
    {
        return Phrase::findOrFail($phrase_id)->delete();
    }

    /**
     * update an existing phrase
     */
    public function update(PhraseUpdateRequest $request , int $phrase_id)
    {
        return Phrase::findOrFail($phrase_id)->update($request->validated());
    }

    /**
     * show existing phrase
     */
    public function show(int $phrase_id)
    {
        return Phrase::findOrFail($phrase_id);
    }
}
