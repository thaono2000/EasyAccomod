<?php

namespace Modules\Owner\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'image.*' => 'image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            'image' => 'required|min:3|max:7',
        ];
    } 

    public function messages() {
        return [
            'image.*.max' => 'Image size should be less than 2mb',
            'image.*.mimes' => 'Only jpeg, png, bmp,tiff files are allowed.',
            'image.max' => 'Only 7 images are allowed',
            'image.min' => 'Only 3 images are allowed',
            'image.required' => 'Must not be left blank'
        ];
    }
}
