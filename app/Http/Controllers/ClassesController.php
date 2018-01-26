<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Season;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Instructor;
use App\ClassType;
use App\ClassDate;
use App\ClassDay;
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
        $request->offsetUnset('mode');
        $request->offsetUnset('weeklySeason');
        $request->offsetUnset('dateSpecificSeason');
        $seasonData = $request['season_id'];
        $season_id = explode("|", $seasonData)[0];
        $SeasonType = explode("|", $seasonData)[1];
        $DayHeldOn = null;
        $CreateClassDates = false;
        $CreateClassDays = false;
        $DaysArray = array();

        if ($SeasonType == '1') {
          if ($request['monday']) {
            $DaysArray[] = 'Monday';
          }
          if ($request['tuesday']) {
            $DaysArray[] = 'Tuesday';
          }
          if ($request['wednesday']) {
            $DaysArray[] = 'Wednesday';
          }
          if ($request['thursday']) {
            $DaysArray[] = 'Thursday';
          }
          if ($request['friday']) {
            $DaysArray[] = 'Friday';
          }
          if ($request['saturday']) {
            $DaysArray[] = 'Saturday';
          }
          if ($request['sunday']) {
            $DaysArray[] = 'Sunday';
          }
          $CreateClassDays = true;
        } else {
          $CreateClassDates = true;
        }
        $request->offsetUnset('monday');
        $request->offsetUnset('tuesday');
        $request->offsetUnset('wednesday');
        $request->offsetUnset('thursday');
        $request->offsetUnset('friday');
        $request->offsetUnset('saturday');
        $request->offsetUnset('sunday');
        $request->offsetUnset('DayHeldOn');

        $StartTime = $request['selectedHour'] . ":" . $request['selectedMinute'] . " " . $request['selectedAMPM'];
        $StartTime = DateTime::createFromFormat('H:i A', $StartTime);
        $StartTime = $StartTime->format('H:i:s');
        $request->offsetUnset('selectedHour');
        $request->offsetUnset('selectedMinute');
        $request->offsetUnset('selectedAMPM');

        $Length = $request['selectedHourLength'] * 60 + $request['selectedMinuteLength'];
        $request->offsetUnset('selectedHourLength');
        $request->offsetUnset('selectedMinuteLength');
        
        $selectedDates = explode(",", $request['selectedDates']);
        $request->offsetUnset('selectedDates');

        $class = new Classes;
        $class->fill($request->all());
        $class->season_id = $season_id;
        if ($SeasonType == '1') {
          $class->StartTime = $StartTime;
          $class->Length = $Length;
        } else {
          $class->StartTime = null;
          $class->Length = null;
        }
        $class->created_by = Auth::id();
        $class->created_at = date('Y-m-d H:i:s');
        $class->save();
        if ($CreateClassDates) {
          foreach ($selectedDates as $date) {
            $classdate = new ClassDate;
            $classdate->classes_id = $class->id;
            $classdate->HeldOn = date('Y-m-d H:i:s', strtotime($date));
            $classdate->save();
          }
        }

        if ($CreateClassDays) {
          foreach ($DaysArray as $day) {
            $classday = new ClassDay;
            $classday->classes_id = $class->id;
            $classday->DayHeldOn = $day;
            $classday->save();
          }
        }
                
        $request->session()->flash('alert-success', 'Saved class successfully!');
        //$instructors = Instructor::all();
        return redirect()->route('classes');
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
