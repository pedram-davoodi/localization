<?php

namespace PedramDavoodi\Localization\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PedramDavoodi\Localization\Facades\LocalizationManager;
use PedramDavoodi\Localization\Repositories\LanguageRepositoryInterface;

class LanguageController extends Controller
{
    private LanguageRepositoryInterface $language_repository;

    public function __construct(LocalizationManager $localizationManager)
    {
        $this->language_repository = $localizationManager::getRepository('db');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('localization::language.index')->withLangs($this->language_repository->getLangsList(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
