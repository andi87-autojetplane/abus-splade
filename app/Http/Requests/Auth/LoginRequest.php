<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    protected $inputType;
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required_without:nik', 'string', 'email', 'exists:users,email'],
           // 'username' => ['required_without:email,nik', 'string', 'exists:users,username'],
            'nik' => ['required_without:email', 'string:16', 'exists:users,nik'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {
        $this->ensureIsNotRateLimited();

        if (! Auth::attempt($this->only($this->inputType, 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey(),300 );

            throw ValidationException::withMessages([
                $this->inputType => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 3)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::transliterate(Str::lower($this->input('email')).'|'.$this->ip());
    }

    protected function prepareForValidation()
    {
        $this->inputType = filter_var($this->input('input_type'), FILTER_VALIDATE_EMAIL) ? 'email' : 'nik';
        $this->merge([$this->inputType => $this->input('input_type')]);
        // $login = $this->input('input_type');
        // if(is_numeric($login)){
        //     $field = 'nik';
        // } elseif (filter_var($login, FILTER_VALIDATE_EMAIL)) {
        //     $field = 'email';
        // } else {
        //     $field = 'username';
        // }

        // $this->merge([$this->inputType => $field]);
        // request()->merge([$field => $login]);
        // return [
        //     $field => $login,
        //     'password' => $request->get('password'),
        // ];
    }
}
