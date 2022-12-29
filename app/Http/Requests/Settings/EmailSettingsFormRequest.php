<?php

namespace App\Http\Requests\Settings;

use App\Rules\RealEmailValidator;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidateDomainRule;
use Illuminate\Validation\Rule;

class EmailSettingsFormRequest extends FormRequest
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

            'mail_mailer' => ['required', 'string', Rule::in(['smtp', 'sendmail', 'mailgun', 'mandrill'])],
            'mail_host' => ['required', 'string', new ValidateDomainRule()],
            'mail_port' => ['required', 'integer'],
            'mail_encryption' => ['required', 'string', Rule::in(['ssl', 'tls', 'non'])],

            'mail_from_name' => ['required', 'string'],
            'mail_from_address' => ['required', 'email', new RealEmailValidator()],
            'mail_username' => ['required', 'string'],
            'mail_password' => ['required', 'string'],
        ];
    }
}
