<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncomingLetterRequest extends FormRequest
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
            'letter_number' => 'required|string|max:255|unique:incoming_letters,letter_number',
            'sender' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'content' => 'nullable|string',
            'received_date' => 'required|date',
            'letter_date' => 'required|date',
            'attachment_path' => 'nullable|string',
            'category_id' => 'required|exists:letter_categories,id',
            'status_id' => 'required|exists:letter_statuses,id',
            'notes' => 'nullable|string',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'letter_number.required' => 'Nomor surat wajib diisi.',
            'letter_number.unique' => 'Nomor surat sudah ada.',
            'sender.required' => 'Pengirim surat wajib diisi.',
            'subject.required' => 'Perihal surat wajib diisi.',
            'received_date.required' => 'Tanggal diterima wajib diisi.',
            'letter_date.required' => 'Tanggal surat wajib diisi.',
            'category_id.required' => 'Kategori surat wajib dipilih.',
            'status_id.required' => 'Status surat wajib dipilih.',
        ];
    }
}