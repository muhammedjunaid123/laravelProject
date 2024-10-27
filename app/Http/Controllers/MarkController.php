<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\User;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $user = User::find($id);
        return view('mark', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mathematics' => 'required|integer|min:0|max:100',
            'science' => 'required|integer|min:0|max:100',
            'english' => 'required|integer|min:0|max:100',
            'history' => 'required|integer|min:0|max:100',
            'std_id' => 'required|exists:users,id' // Ensure std_id is valid
        ]);

        try {
            Mark::create([
                'mathematics' => $request['mathematics'],
                'std_id' => $request['std_id'],
                'science' => $request['science'],
                'english' => $request['english'],
                'history' => $request['history'],
            ]);
            return redirect('list')->with('success', 'Marks added successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to add marks.'])->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mark $mark)
    {
        $request->validate([
            'mathematics' => 'required|integer|min:0|max:100',
            'science' => 'required|integer|min:0|max:100',
            'english' => 'required|integer|min:0|max:100',
            'history' => 'required|integer|min:0|max:100',
            'std_id' => 'required|exists:users,id' // Ensure std_id is valid
        ]);

        try {
            $mark = Mark::find($request['id']);

            $mark->mathematics = $request['mathematics'];
            $mark->science =  $request['science'];
            $mark->english =  $request['english'];
            $mark->history =  $request['history'];
            $mark->save();
            return redirect('list')->with('success', 'Marks updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update marks.'])->withInput();
        }
    }
}
