<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class SupportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:120',
            'company' => 'nullable|string|max:160',
            'email' => 'required|email',
            'subject' => 'required|string|max:160',
            'message' => 'required|string|min:10',
        ];
    }
}