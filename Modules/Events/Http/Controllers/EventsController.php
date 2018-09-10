<?php

namespace Modules\Events\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Auth;

use Modules\Events\Entities\Event as Event;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        return view('events::index');
    }


    public function feed()
    {
    $events = Event::all();

    $data = [];

    foreach ($events as $key => $event) {

      // IMPLEMENT :: if url is empty, slug is url.

      $data[] = [
            'id' => $event->id,
            'title' => $event->title,
            'allDay' => $event->allday,
            'start'  => $event->start,
            'end'  => $event->end,
            'lead'  => $event->lead,
            'description'  => $event->description,
            'url'  => route('event.display', ['slug' => $event->slug ]),
            'website' => $event->url

          ];
    }
    return $data;
    }

    public function adminIndex()
    {

      $events = Event::orderBy('start', 'desc')->get();
      return view('events::admin.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('events::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {


      $slug = str_slug($request['title'], '-');
      $event = new Event();
      $event->title = $request['title'];
      $event->location = $request['location'];
      $event->lead = $request['lead'];
      $event->slug = $slug;
      $event->description = $request['description'];
      $event->allDay = 0;
      $event->title = $request['title'];
      $event->start = $request['start'];
      $event->end = $request['end'];
      $event->url = $request['url'];
      $event->filepath = $request['filepath'];


      $event->save();

      return redirect()->route('event.index')
          ->with('flash_message',
           'Page "'. $event->title.'" added!');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
     public function display($slug)
     {

         $event = Event::where('slug', $slug)->first();
         if(!$event){ abort(404); }

         return view('events::display')->with( 'event', $event);
     }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
     public function edit($id)
     {
       $event = Event::findOrFail($id);
       return view('events::admin.edit', compact('event'));
     }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
      $event = Event::findOrFail($id);

      // VALIDATE!

      $input = $request->all();
      $event->fill($input)->save();

      return redirect()->route('event.index')
          ->with('flash_message',
           'Event "'. $event->name.'" updated!');

    }

    public function rsvp(Request $request)
    {
      //Add RSVP
      $event = Event::where('id', $request['event_id'])->first();
      $event->attending()->attach(Auth::id());
      return redirect()->back()
          ->with('flash_message',
           'You have RSVPed to'. $event->name);


    }
    public function rsvp_cancel(Request $request)
    {
      // Cancel RSVP
      $event = Event::where('id', $request['event_id'])->first();
      $event->attending()->detach(Auth::id());
      return redirect()->back()
          ->with('flash_message',
           'Canceled RSVP to '. $event->name);


    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
      $event = Event::findOrFail($id);

      $event->delete();

      return redirect()->route('event.index')
          ->with('flash_message',
           'Event Deleted!');
    }
}
