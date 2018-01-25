<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClass extends FormRequest
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
            'Name' => 'required|unique:classes,Name',
            'season_id' => 'required',
            'selectedHour' => 'required',
            'selectedMinute' => 'required',
            'selectedAMPM' => 'required',
            'selectedHourLength' => 'required',
            'selectedMinuteLength' => 'required',
            'instructor_id' => 'required|exists:instructors,id',
            'class_type_id' => 'required|exists:class_types,id',
            'PublicDescription' => 'nullable',
            'PrivateNotes' => 'nullable',
            'MaxSize' => 'nullable|integer',
            'location_id' => 'required|exists:locations,id',
            'AgeFrom' => 'nullable|integer',
            'AgeTo' => 'nullable|integer',
            'AgeNAFlag' => 'nullable|boolean',
            'Prerequisite' => 'nullable|boolean',
            'PrerequisiteNote' => 'nullable',
            'OnlineRegistrationAllowed' => 'nullable|boolean',
            'AllowIndividualDayRegistration' => 'nullable|boolean',
            'Password' => 'nullable',
            'ClassCharge' => 'nullable|numeric'
        ];
    }
}
