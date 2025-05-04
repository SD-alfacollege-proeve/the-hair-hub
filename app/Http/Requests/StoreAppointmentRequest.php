<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "customer_name" => ["required", "string", "min:3", "max:100"],
            "email" => ["required", "max:100", "email"],
            "phone_number" => 'required',
            "date" => "required",
            "time" => "required",
            "user_id" => "required",
            "treatment_id" => "required"
        ];
    }

    public function messages()
    {
        return [
            "customer_name.required" => "Naam is verplicht",
            "customer_name.string" => "Naam mag geen cijfers bevatten",
            "customer_name.min" => "Naam moet meer dan 3 cijfers bevatten",
            "customer_name.max" => "Naam mag niet meer dan 100 karakters bevatten",
            
            "email.required" => "Email is verplicht",
            "email.max" => "Email mag niet meer dan 100 karakters bevatten",
            "email.email" => "Email moet een geldig email zijn",

            "phone_number.dutch-phone-number" => "Telefoonnummer moet een geldig nederlands telefoonnummer zijn",

        ];
    }
}
