<?php

namespace App\Http\Controllers\Dashboard\Parent;

use App\Models\Babysitting\SavedBabysitter;

class SavedBabysittersController
{
    public function index()
    {
        $savedBabysitters = SavedBabysitter::with('babysitterProfile.user')
            ->where('parent_id', auth()->id())
            ->orderByDesc('created_at')
            ->get();

        return view('dashboard.parent.saved-babysitters.index', compact('savedBabysitters'));
    }

    public function save($id)
    {
        SavedBabysitter::firstOrCreate([
            'parent_id' => auth()->id(),
            'babysitter_id' => $id,
        ]);

        return redirect()->back()->with('success', 'Babysitter saved to your list.');
    }

    public function remove($id)
    {
        SavedBabysitter::where('parent_id', auth()->id())
            ->where('babysitter_id', $id)
            ->delete();

        return redirect()->back()->with('success', 'Babysitter removed from your list.');
    }
}
