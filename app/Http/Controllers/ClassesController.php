<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Season;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Instructor;
use App\ClassType;
use App\Location;
use App\Http\Requests\StoreClass;
use DateTime;
use Illuminate\Support\Facades\Auth;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Season $season)
    {
        if (isset($season->id)) {
            $classes = $season->classes()->orderBy('StartTime', 'asc')->get();
        } else {
            $classes = Classes::all();
        }

        $instructors = Instructor::where('Active', 1)->get();
        $classtypes = ClassType::all();
        $locations = Location::all();

        /*Get dates to display on calendar based on month passed in URL*/
        $defaultToCalendar = 0;
        if (null !== ($request->input('month'))) {
            $tempMonth = substr($request->input('month'), 0, 2);
            $tempYear = substr($request->input('month'), 2, 4);
            $monthToShow = Carbon::create($tempYear, $tempMonth, 1);
            $defaultToCalendar = 1;
        } else {
            $monthToShow = Carbon::parse('today');
        }

        $start = Carbon::parse($monthToShow)->startOfMonth();
        $end = Carbon::parse($monthToShow)->endOfMonth();
        $dates = [];

        while ($start->lte($end)) {
            $dates[] = $start->copy();
            $start->addDay();
        }

        $seasons = Season::where('Archived', 0)->orderBy('Order', 'asc')->get();
        $daysOfWeek = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
        $hours = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $lengthHours = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $minutes = [];
        for ($minute = 0; $minute < 60; $minute++) {
          if (preg_match('/^\d{2}$/', $minute)) {
            $temp = (string)$minute;
          } else {
            $temp = '0' . (string)$minute;
          }
          $lengthMinutes[] = $minute;
          $minutes[] = $temp;
        }
        $ampm = ['AM', 'PM'];

        /*  It's better to explicitly set the data being passed into the view
            If a variable that is undefined or null is passed to the compact function
            it will basically insert a null pointer into the compacted object and break
            everything compacted afterwards.
        */
        return view('classes.index', [
            'classes' => $classes,
            'seasons' => $seasons,
            'season' => $season,
            'instructors' => $instructors,
            'classtypes' => $classtypes,
            'locations' => $locations,
            'daysOfWeek' => $daysOfWeek,
            'defaultToCalendar' => $defaultToCalendar,
            'dates' => $dates,
            'monthToShow' => $monthToShow,
            'hours' => $hours,
            'minutes' => $minutes,
            'ampm' => $ampm,
            'lengthHours' => $lengthHours,
            'lengthMinutes' => $lengthMinutes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClass $request)
    {
        $seasonData = $request['season_id'];
        $season_id = explode("|", $seasonData)[0];
        $SeasonType = explode("|", $seasonData)[1];
        $DayHeldOn = null;
        $CreateClassDates = false;
        if ($SeasonType == '1') {
          $monday = $request['monday'] . "|";
          $tuesday = $request['tuesday'] . "|";
          $wednesday = $request['wednesday'] . "|";
          $thursday = $request['thursday'] . "|";
          $friday = $request['friday'] . "|";
          $saturday = $request['saturday'] . "|";
          $sunday = $request['sunday'] . "|";
          $DayHeldOn = $monday . $tuesday . $wednesday . $thursday . $friday . $saturday . $sunday;
        } else {
          $CreateClassDates = true;
        }

        $StartTime = $request['selectedHour'] . ":" . $request['selectedMinute'] . " " . $request['selectedAMPM'];
        $StartTime = DateTime::createFromFormat('H:i A', $StartTime);
        $StartTime = $StartTime->format('H:i:s');

        $Length = $request['selectedHourLength'] * 60 + $request['selectedMinuteLength'];
        
        $class = new Classes;
        $class->Name = $request->Name;
        $class->season_id = $season_id;
        if ($SeasonType == '1') {
          $class->DayHeldOn = $DayHeldOn;
          $class->StartTime = $StartTime;
          $class->Length = $Length;
        } else {
          $class->DayHeldOn = null;
          $class->StartTime = null;
          $class->Length = null;
        }
        $class->instructor_id = $request->instructor_id;
        $class->classtype_id = $request->class_type_id;
        $class->PublicDescription = $request->PublicDescription;
        $class->PrivateNotes = $request->PrivateNotes;
        $class->MaxSize = $request->MaxSize;
        $class->location_id = $request->location_id;
        $class->AgeFrom = $request->AgeFrom;
        $class->AgeTo = $request->AgeTo;
        $class->AgeNAFlag = $request->AgeNAFlag;
        $class->Prerequisite = $request->Prerequisite;
        $class->PrerequisiteNote = $request->PrerequisiteNote;
        $class->OnlineRegistrationAllowed = $request->OnlineRegistrationAllowed;
        $class->AllowIndividualDayRegistration = $request->AllowIndividualDayRegistration;
        $class->Password = $request->Password;
        $class->ClassCharge = $request->ClassCharge;
        $class->created_by = Auth::id();
        $class->created_at = date('Y-m-d H:i:s');
        $class->save();
        if ($CreateClassDates) {
          //foreach ($request['selectedDate'] as $date) {
           // $test = '';
          //}
        }
                
        $request->session()->flash('alert-success', 'Saved class successfully!');
        //$instructors = Instructor::all();
        return redirect()->action('ClassesController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $class)
    {
        return view('classes.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $class)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classes $class)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $classes)
    {
        //
    }
}
