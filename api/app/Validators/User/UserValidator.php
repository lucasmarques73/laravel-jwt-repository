<?php

namespace App\Validators\User;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators\User;
 */
class UserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required',
            'cpf' => 'required|unique:users,cpf',
            'password' => 'required',
            'email' => 'required|unique:users,cpf',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required',
            'cpf' => 'required|unique:users,cpf',
            'email' => 'required|unique:users,cpf',
        ],
    ];

    protected $messages = [
        'required' => 'The :attribute field is required.',
        'unique' => 'The :attribute field must be unique'
    ];

}
