<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;
use App\Models\Test;


class TestController extends Controller
{

    public function index()
    {
        $tests = Test::paginate(10);
        return view('tests.index', compact('tests'));
    }

    public function show(Request $request, Test $test)
    {
        return view('tests.show', compact('test'));
    }

    public function create()
    {
        return view('tests.create');
    }

    public function store(TestRequest $request)
    {
        $data = $request->validated();
        $test = Test::create($data);
        return redirect()->route('tests.index')->with('status', 'Test created!');
    }

    public function edit(Request $request, Test $test)
    {
        return view('tests.edit', compact('test'));
    }

    public function update(TestRequest $request, Test $test)
    {
        $data = $request->validated();
        $test->fill($data);
        $test->save();
        return redirect()->route('tests.index')->with('status', 'Test updated!');
    }

    public function destroy(Request $request, Test $test)
    {
        $test->delete();
        return redirect()->route('tests.index')->with('status', 'Test destroyed!');
    }
}
