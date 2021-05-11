<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StateController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $search = $request->get('search');

    $query = State::query();

    if ($search) {
      $query->where('name', 'like', '%'. $search .'%')->orWhere('abbreviation', 'like', '%' . $search . '%');
    }

    $states = $query->paginate(8);

    return Inertia::render('Dashboard', ['states' => $states]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\State  $state
   * @return \Illuminate\Http\Response
   */
  public function show(State $state)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\State  $state
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, State $state)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\State  $state
   * @return \Illuminate\Http\Response
   */
  public function destroy(State $state)
  {
    //
  }
}
