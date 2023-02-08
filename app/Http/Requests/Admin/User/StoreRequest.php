<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'     => 'required|string|unique:users',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string',
            'role'     => 'required|integer'
        ];
    }

    /**
     * Получить сообщения об ошибках для определенных правил валидации.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.unique'    => 'Пользователь с таким именем уже существует',
            'name.required'  => 'Поле должно быть заполнено',
            'name.string'    => 'Имя должно быть строкой',
            'email.required' => 'Поле должно быть заполнено',
            // 'email.string'   => 'Почта должна быть строкой',
            'email.email'    => 'Почта должна соответствовать формату email@some.domain',
            'email.unique'   => 'Пользователь с такой почтой уже существует',
            'role.required'  => 'Необходимо назначить роль',
            'role.integer'   => 'Роль должна содержать целое число. Обратитесь к администратору сайта.'

            // 'password.required' => 'Поле должно быть заполнено',
            // 'password.string'   => 'Пароль должен быть строкой',
        ];
    }
}
