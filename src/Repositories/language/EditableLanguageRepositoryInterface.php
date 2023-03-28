<?php


namespace PedramDavoodi\Localization\Repositories\language;


interface EditableLanguageRepositoryInterface
{
    /**
     * get list of available languages
     */
    public function index(int $paginate = null);

    /**
     * edit a language
     */
    public function edit(int $lang_id);
}
