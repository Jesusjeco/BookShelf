<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;
use App\Http\Controllers\Controller;
use App\Models\Test;

class TestController extends Controller
{


    public function index()
    {
        return Test::all();
    }

    public function show(Request $request, Test $test)
    {
        return $test;
    }

    public function store(TestRequest $request)
    {
        $data = $request->validated();
        $test = Test::create($data);
        return $test;
    }

    public function update(TestRequest $request, Test $test)
    {
        $data = $request->validated();
        $test->fill($data);
        $test->save();

        return $test;
    }

    public function destroy(Request $request, Test $test)
    {
        $test->delete();
        return $test;
    }

}
