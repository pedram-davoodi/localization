<?php


namespace PedramDavoodi\Localization\Repositories\language;

use PedramDavoodi\Localization\Models\Lang;
use PedramDavoodi\Localization\Models\Phrase;
use PedramDavoodi\Localization\Models\Setting;
use PedramDavoodi\Localization\Requests\LanguageStoreRequest;
use PedramDavoodi\Localization\Requests\LanguageUpdateRequest;

class DBLanguageRepository implements LanguageRepositoryInterface,EditableLanguageRepositoryInterface
{

    /**
     * get default language
     */
    public function getDefaultLang(): string
    {
        $default_lang = Setting::getDefaultLang();

        return $default_lang ? $default_lang->values : "en";
    }

    /**
     * get message
     */
    public function get(string $key , string $lang = null): string
    {
        $lang = $lang ?? $this->getDefaultLang();

        $message = Phrase::where('lang' , $lang)->firstWhere('item' , $key);

        return $message ? $message->value : $key;
    }

    /**
     * get list of available languages
     */
    public function index(int $paginate = null)
    {
        return Lang::when(!is_null($paginate), function ($q) use ($paginate) {
            return $q->paginate($paginate);
        } , function ($q){
            return $q->get();
        });
    }

    /**
     * edit a language
     */
    public function update(LanguageUpdateRequest $request, $lang_id): bool
    {
        try {
            return Lang::findOrFail($lang_id)->first()->update($request->validated());
        }catch (\Exception $exception){
            return false;
        }
    }

    /**
     * create a new language
     */
    public function store(LanguageStoreRequest $request):bool
    {
        try {
            Lang::create($request->validated());
            return true;
        }catch (\Exception $exception){
            return false;
        }
    }

    /**
     * delete an existing language
     */
    public function delete($lang_id):bool
    {
        return Lang::findOrFail($lang_id)->delete();
    }


    /**
     * show an existing language
     */
    public function show(int $lang_id): ?Lang
    {
        return Lang::findOrFail($lang_id);
    }
}
