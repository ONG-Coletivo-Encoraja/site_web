<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;


class VoluntaryController extends Controller
{ 
    public function index()
    {
        $users = User::with('permissions')->get();
        return view('voluntary.index', ['users' => $users]);

    }

    public function create()
    {
        return view('voluntary.create');
    }

    
    public function store(Request $request)
    {
        
        $voluntary = User::create([
            'name' => $request->input('name'),
            'email' =>  $request->input('email'),
            'date_birthday' =>  $request->input('date_birthday'),
            'cpf' =>  $request->input('cpf'),
            'password' =>  $request->input('password'),
            'availability' =>  $request->input('availability'),
            'course_experience' =>  $request->input('course_experience'),
            'how_know' =>  $request->input('how_know'),
            'expectations' =>  $request->input('expectations'),
        ]);

        $voluntary->addresses()->create([
            'street' =>  $request->input('street'),
            'number' =>  $request->input('number'),
            'neighbourhood' =>  $request->input('neighbourhood'),
            'city' => $request->input('city'),
            'zip_code' => $request->input('zip_code')
        ]);
        
        $voluntary->permissions()->create([
            'type' => 'voluntary'
        ]);
        
        return redirect('/voluntary');

    }

    public function edit(string $id)
    {
        $user = User::with(['addresses'])->findOrFail($id);
        return view('voluntary.edit', ['user' => $user]);
    }

    public function update(Request $request, string $id)
    {
        $user = User::with('addresses')->findOrFail($id);
        $user->update($request->all());
        
        $address = $user->addresses->first();
        $address->update($request->all());

        $permission = $user->permissions->first();
        $permission->update($request->all());
        
        return response()->redirectTo('/voluntary');
    }
    
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->redirectTo('/voluntary');
        
    }
    public function selectEvents()
    {
        
        $search = request('search');

        $event = new Event;
        $events = $event->search_event_by_name($search);

        return view('voluntary.events', ['events' => $events, 'search' => $search]);
    }
    // public function viewInscriptions()
    // {
        //     $search = request('search');
        
    //     if($search){
    //         $inscriptions = Inscription::with('user', 'event')->where([
    //             ['user_id','like', '%'.$search.'%']
    //         ])->get();
    //     }else{
    //         $inscriptions = Inscription::with('user', 'event')->get();
    //     }
    //     return view('voluntary.inscriptions', ['inscriptions' => $inscriptions]);
    // }

    // public function formEvent()
    // {
    //     return view('voluntary.formEvent');
    // }
    // public function eventsCreate(Request $request)
    // {
        //     if(Event::query()->create($request->all())) {
    //         return response()->redirectTo('/voluntary/events');
    //     }
    // }
}
