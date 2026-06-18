<?php

namespace App\Http\Controllers\Dashboard\Support;

use App\Enums\FaqStatus;
use App\Models\Support\Faq;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FaqsController
{
    public function index()
    {
        $faqs = Faq::orderBy('order_index')->get();

        return view('dashboard.support.faqs.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category' => 'required|string|max:100',
            'status' => ['required', Rule::in([FaqStatus::Draft->value, FaqStatus::Published->value])],
        ]);

        Faq::create($request->only(['question', 'answer', 'category', 'status']));

        return redirect()->back()->with('success', 'FAQ created successfully.');
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $request->validate([
            'question' => 'sometimes|required|string|max:255',
            'answer' => 'sometimes|required|string',
            'category' => 'sometimes|required|string|max:100',
            'status' => ['sometimes', 'required', Rule::in([FaqStatus::Draft->value, FaqStatus::Published->value])],
        ]);

        $faq->update($request->only(['question', 'answer', 'category', 'status']));

        return redirect()->back()->with('success', 'FAQ updated successfully.');
    }

    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->back()->with('success', 'FAQ deleted successfully.');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:faqs,id',
        ]);

        foreach ($request->input('ids') as $index => $id) {
            Faq::where('id', $id)->update(['order_index' => $index]);
        }

        return response()->json(['success' => true]);
    }
}
