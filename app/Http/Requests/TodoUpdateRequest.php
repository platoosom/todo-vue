<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TodoUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'tasktype' => ['required', 'string', Rule::in(['todo', 'inprogress', 'done'])],
            'company' => ['required', 'string'],
            'contact' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'assignto' => ['required', 'integer'],
            'duedate' => ['required', 'date'],
            'duetime' => ['required'],
            'priority' => ['required', 'string', Rule::in(['low', 'medium', 'high'])]
        ];
    }
}
