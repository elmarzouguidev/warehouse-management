<?php

namespace App\Http\Requests\Settings;

use App\Rules\ValidateDomainRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SettingsFormRequest extends FormRequest
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
            'app_name' => ['required', 'string'],
            'app_version' => ['required', 'string'],
            'app_url' => ['required', 'string', new ValidateDomainRule()],
            'app_timezone' => ['required', 'string'],
            'app_active' => ['required', Rule::in([1, '1', true, 'on', 'yes', 'oui', '0', 'no', 'non', false])],
            'app_logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:1024'],
        ];
    }
}
