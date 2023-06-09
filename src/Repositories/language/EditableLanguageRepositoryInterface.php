<?php


namespace PedramDavoodi\Localization\Repositories\language;

use PedramDavoodi\Localization\Requests\LanguageStoreRequest;
use PedramDavoodi\Localization\Requests\LanguageUpdateRequest;

interface EditableLanguageRepositoryInterface
{
    /**
     * get list of available languages
     */
    public function index(int $paginate = null);

    /**
     * update a language
     */
    public function update(LanguageUpdateRequest $request, $lang_id):bool;

    /**
     * create a new language
     */
    public function store(LanguageStoreRequest $request):bool;

    /**
     * delete an existing language
     */
    public function delete($lang_id):bool;

    /**
     * show an existing language
     */
    public function show(int $lang_id);
}
