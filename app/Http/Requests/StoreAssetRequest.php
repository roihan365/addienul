<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssetRequest extends FormRequest
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
            'kode' => ['required', 'string', 'max:255', 'unique:assets'],
            'category' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string', 'max:255'],
            'tahun_pembelian' => ['required', 'integer'],
            'jumlah' => ['required', 'integer'],
            'satuan' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'max:5120', 'mimes:jpg,jpeg,png'],
        ];
    }
}
