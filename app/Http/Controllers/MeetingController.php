<?php

namespace App\Http\Controllers;

use App\Events\MeetingSignalSent;
use App\Models\Meeting;
use Auth;
use Illuminate\Http\Request;


class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::with('user')->get();
        return view('meetings.index', ['meetings' => $meetings]);
    }

    public function create()
    {
        return view('meetings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);


        $meeting = new Meeting;
        $meeting->title = $request->title;
        $meeting->start_time = $request->start_time;
        $meeting->end_time = $request->end_time;
        $meeting->timezone = $request->timezone;
        $meeting->description = $request->description;
        $meeting->date = $request->date;
        $xirsysData = getXirsysIceConfig($meeting->id); // Assuming getXirsysMeetingUrl() is your helper function
        $meeting->ice_config = json_encode($xirsysData['v']['iceServers']);  // Store Xirsys ICE config
        $meeting->user_id = auth()->user()->id;
        $meeting->save();

        return redirect()->route('meetings.index')->with('success', 'Meeting created successfully.');
    }


    public function join($meetingId)
    {
        $meeting = Meeting::find($meetingId);
        return view('meetings.meeting', ['meeting' => $meeting]);
    }

    public function sendSignal(Request $request)
{
    $message = $request->get('message');
    $meetingId = $request->get('meetingId');
    $userId = auth()->id();

    event(new MeetingSignalSent($message, $meetingId, $userId));

    return response()->json(['status' => 'Signal sent']);
}


    public function show(Meeting $meeting)
    {
        $iceConfig = $meeting->ice_config; // Replace with how you actually get the ICE config
        return view('meeting', ['iceConfig' => json_encode($iceConfig)]);
    }

}
