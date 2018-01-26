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
            'Name' => 'required',
            'season_id' => 'required',
            'selectedHour' => 'required',
            'selectedMinute' => 'required',
            'selectedAMPM' => 'required',
            'selectedHourLength' => 'required',
            'selectedMinuteLength' => 'required',
            'instructor_id' => 'required|exists:instructors,id',
            'classtype_id' => 'required|exists:class_types,id',
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

    public function withValidator($validator)
    {
        $validator->after(
            function ($validator) {
                $AgeFrom = trim($this->request->get('AgeFrom'));
                if (isset($AgeFrom) === true && $AgeFrom === '') {
                    $AgeTo = trim($this->request->get('AgeTo'));
                    if (isset($AgeTo) === true && $AgeTo === '') {
                        $AgeFrom = (int)$AgeFrom;
                        $AgeTo = (int)$AgeTo;
                        if ($AgeTo < $AgeFrom) {
                            $validator->errors()->add(
                                'Age',
                                'Maximum age must be less than or equal to minimum age.'
                            );
                        }
                    } else {
                        $validator->errors()->add(
                            'Age',
                            'Maximum age is required.'
                        );
                    }
                } else {
    
                }
            }
        );
    }
}
