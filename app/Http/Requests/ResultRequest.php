<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Result;

class ResultRequest extends Request {

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
            'scoreTotal' => 'required_without',
            'matches' => 'required_without',
            'sets' => 'required_without',
            'points' => 'required_without',
            'wins' => 'required_without',
            'loss' => 'required_without',
            'draw' => 'required_without'
        ];
    }

}