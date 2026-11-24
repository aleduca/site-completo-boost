<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class, 'email')],
            'password' => ['required', 'string', 'min:6'],
            'avatar' => ['nullable', 'image', 'mimes:png,jpeg,jpg', 'max:2048'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Por favor, informe um endereço de e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado em nosso sistema.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve conter pelo menos 6 caracteres.',
            'avatar.image' => 'O arquivo enviado deve ser uma imagem válida.',
            'avatar.mimes' => 'O avatar deve ser uma imagem nos formatos .png, .jpeg ou .jpg.',
            'avatar.max' => 'A imagem do avatar não pode ser maior que 2MB.',
        ];
    }
}
