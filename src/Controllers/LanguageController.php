<?php

namespace PedramDavoodi\Localization\Controllers;

use App\Http\Controllers\Controller;
use PedramDavoodi\Localization\Repositories\language\EditableLanguageRepositoryInterface;
use PedramDavoodi\Localization\Repositories\phrase\PhraseRepository;
use PedramDavoodi\Localization\Repositories\phrase\PhraseRepositoryInterface;
use PedramDavoodi\Localization\Requests\LanguageStoreRequest;
use PedramDavoodi\Localization\Requests\LanguageUpdateRequest;

class LanguageController extends Controller
{
    private EditableLanguageRepositoryInterface $language_repository;
    private PhraseRepositoryInterface $phrase_repository;

    public function __construct(EditableLanguageRepositoryInterface $editableLanguageRepository)
    {
        $this->language_repository = $editableLanguageRepository;
        $this->phrase_repository = new PhraseRepository();
    }

    /**
     * Display a listing of the language.
     */
    public function index()
    {
        return view('localization::language.index')->withLangs($this->language_repository->index(10));
    }

    /**
     * Show the form for creating a new language.
     */
    public function create()
    {
        return view('localization::language.create');
    }

    /**
     * Store a newly created language in storage.
     */
    public function store(LanguageStoreRequest $request)
    {
        $this->language_repository->store($request);

        return redirect()->route('language.index')->withSuccess(___('successStore'));
    }

    /**
     * Display the specified language.
     */
    public function show(int $lang_id)
    {
        return view('localization::language.show')->withLang($this->language_repository->show($lang_id));
    }

    /**
     * Show the form for editing the specified language.
     */
    public function edit(int $lang_id)
    {
        return view('localization::language.edit')
            ->withLang($this->language_repository->show($lang_id))
            ->withPhrases($this->phrase_repository->index($lang_id));
    }

    /**
     * Update the specified language in storage.
     */
    public function update(LanguageUpdateRequest $request, int $lang_id)
    {
        $this->language_repository->update($request , $lang_id);

        return redirect()->route('language.edit' , $lang_id)->withSuccess(___('successUpdate'));
    }

    /**
     * Remove the specified language from storage.
     */
    public function destroy(int $lang_id)
    {
        $this->language_repository->delete($lang_id);

        return redirect()->route('language.index')->withSuccess(___('successDelete'));
    }
}
