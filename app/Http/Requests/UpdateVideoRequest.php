<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateVideoRequest extends StoreVideoRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /* public function authorize()
    {
        return true;
    } */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //dd(parent::rules());
        /* return [
            'name'=>['required'],
            'length'=>['required','integer'],
            'slug'=>['required',Rule::unique('videos')->ignore($this->video),'alpha_dash'],
            'url'=>['required','url'],
            'thumbnail'=>['required','url']
        ]; */

        return array_merge(parent::rules(),
            [
                'slug'=>['required',Rule::unique('videos')->ignore($this->video),'alpha_dash'],
                'file'=>['file','mimetypes:video/mp4','nullable']
            ]);
    }

    /* protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    } */

}
