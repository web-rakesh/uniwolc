<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentDetailRequest extends FormRequest
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
            // 'user_id' => 'required|unique:student_details',
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            // 'country' => 'required',
            // 'mobile_number' => 'required',
            // 'alt_country' => 'required',
            // 'alt_mobile_number' => 'required',
            // 'address' => 'required',
            // 'city' => 'required',
            // 'pincode' => 'required',
            // 'passport_number' => 'required',
            // 'passport_expiry_date' => 'required',
            // 'marital_status' => 'required',
            // 'gender' => 'required',
            // 'dob' => 'required',
            // 'fast_language' => 'required',
        ];
    }
}
