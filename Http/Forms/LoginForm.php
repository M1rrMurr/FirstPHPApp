<?php


namespace Http\Forms;

use Core\FormException;
use Core\Validator;

class LoginForm
{

    protected $errors = [];

    public function __construct(protected array $attributes)
    {
        if (! Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please give a valid email address';
        };

        if (! Validator::string($attributes['password'])) {
            $this->errors['password'] = 'Please give a valid password';
        }
    }

    public static function validate($attributes)
    {

        $instance = new static($attributes);

        if ($instance->failed()) {

            $instance->throw();
        }

        return $instance;
    }

    public function throw()
    {
        FormException::throw($this->error(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function error()
    {
        return $this->errors;
    }

    public function add($key, $value)
    {
        $this->errors[$key] = $value;

        return $this;
    }
}
