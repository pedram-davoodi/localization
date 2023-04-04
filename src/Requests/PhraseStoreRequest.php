<?php

namespace PedramDavoodi\Localization\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhraseStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'item'  => 'required|string|unique:lc_phrases,value',
            'lang'  => 'required|string|exists:lc_langs,lang',
            'value' => 'required|string',
        ];
    }
}
