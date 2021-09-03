<x-guest-layout>

<div class="container mx-auto py-8">
    <div class="grid md:grid-cols-3">
        <div class="mb-4 mx-4">
            <h1 class="mb-4 text-blue-500 text-3xl font-bold"> Test</h1>
            @if($errors->any())
            <ul class="list-disc list-inside text-sm text-red-500">
                @foreach($errors->all() as $error)
                <li class="">{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="col-span-2 bg-white shadow rounded-lg overflow-auto">
            <form action="{{route('tests.update',['test'=>$test->id])}}" method="POST" novalidate>
                <div class="space-y-3 p-4">

                    <div class="">
                        <label class="block text-sm font-semibold text-gray-700" for="name">Name</label>
                                                <input readonly name="name"                         type="text"
                        maxlength="255"
                                                class="mt-1 block w-full sm:text-sm border-transparent focus:ring-transparent focus:outline-none focus:border-transparent rounded String"
                                                required="required"
                                                value="{{old('name',$test->name)}}"
                        >
                        @if($errors->has('name'))
                        <p class="mt-0.5 text-sm text-red-500">{{$errors->first('name')}}</p>
@endif
                    </div>
                </div>
                <div class="bg-gray-100 flex items-center justify-between px-4 py-5 space-x-3">
                    <a class="text-blue-500" href="{{ url()->previous() }}">Back</a>
                    <a href="{{route('tests.edit',$test)}}" class="px-6 py-1.5 border-lg bg-blue-500 text-blue-50 font-semibold rounded hover:bg-blue-700">Edit Test </a>
                </div>
            </form>
        </div>
        </div>
        <!-- Relations -->
        <div class="container mx-auto mt-24">
                </div>
        <!-- //Relations -->
        </x-guest-layout>
    