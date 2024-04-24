<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'ingredient' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,jpe,webp,heif,bmp,tiff,tif,xbm,png,svg', 'max:2000'],
            'price' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'exists:App\Models\Category,id'],
            'visible' => ['nullable', 'min:0', 'max:1'],
        ];
    }

    public function messages(): array
    {
        return [
            //messaggi di errore personalizzati per il nome del piatto
            'name.required' => ':attribute è un campo obbligatorio',
            'name.string' => 'Inserisci almeno una lettera',
            'name.max' => 'Hai inserito una parola troppo lunga',
            //messaggi di errore personalizzati per la descrizione del piatto
            'description.required' => ':attribute è un campo obbligatorio',
            'description.string' => 'Inserisci almeno una lettera',
            'description.max' => 'Hai inserito una parola troppo lunga',

            //messaggi di errore personalizzati per gli ingredienti del piatto
            'ingredient.required' => ':attribute è un campo obbligatorio',
            'ingredient.string' => 'Inserisci almeno una lettera',
            'ingredient.max' => 'Hai inserito una parola troppo lunga',

            //messaggi di errore personalizzati per la foto del piatto
            'image.image' => 'Puoi inserire soltato un file di tipo Immagine',
            'image.mime' => 'Estensione della immagine non ammessa.',
            'image.max' => "Peso dell'immagine troppo elevato.",

            //messaggi di errore personalizzati per il prezzo del piatto
            'price.required' => ':attribute è un campo obbligatorio',
            'price.numeric' => 'Inserisci un numero',
            'price.min' => 'Numero troppo basso',

            'category_id.required' => 'Inserisci la Categoria del piatto',
            'category_id.exists' => 'Inserisci una categoria valida',

            'visible.min' => 'Valori accettati: 0 e 1',
            'visible.max' => 'Valori accettati: 0 e 1'
        ];
    }
}
