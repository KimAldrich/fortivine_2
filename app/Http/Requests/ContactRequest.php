<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ContactRequest extends FormRequest
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
            'subject' => 'required|in:Sales Inquiry,Technical Support,Partnership Opportunity',
            'message' => 'required|string|min:10',
        ];
    }
}