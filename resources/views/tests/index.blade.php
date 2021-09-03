<x-guest-layout>

<div class="container mx-auto">
    @if(session('status'))
    <div class="fixed z-20 inset-x-0" x-data="{show:true}" x-show="show" x-cloak>
        <div class="bg-gradient-to-r font-medium font-semibold from-green-500 max-w-4xl mx-auto my-4 px-8 py-4 rounded shadow text-center text-green-50 to-green-600" @click.away="show=false">
            {{ session('status') }}
        </div>
    </div>
    @endif
    <div class="py-8">
        <div class=" mx-auto">
            <h1 class="text-3xl text-blue-500 font-bold"> Tests </h1>
            <x-slot name="header"> Tests </x-slot>
        </div>
        <div class=" mx-auto flex justify-end my-8">
            <a class="text-blue-50 bg-blue-500 px-5 py-1.5 rounded hover:bg-blue-700" href="{{route('tests.create')}}">Create Test</a>
        </div>

        <div class=" mx-auto">
            <table class="w-full border-gray-200 rounded shadow overflow-hidden mx-auto">
                @if(count($tests))
                <thead class="bg-gray-200 uppercase text-sm text-gray-500">
                    <tr class="">
                        <th>&nbsp;</th>
                                                                                                                                                                                                                        <th class="px-6 py-3 whitespace-nowrap">Name</th>
                                                                    </tr>
                </thead>
                @endif
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($tests as $test)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-xs">
                            <div class="flex items-center space-x-1">
                                <a class=" text-blue-400 hover:text-blue-500" href="{{route('tests.show',['test'=>$test] )}}">Show</a>
                                <a class=" text-blue-400 hover:text-blue-500" href="{{route('tests.edit',['test'=>$test] )}}">Edit</a>
                                <a class=" text-blue-400 hover:text-blue-500" href="javascript:void(0)" onclick="event.preventDefault();
                            document.getElementById('delete-test-{{$test->id}}').submit();">
                                    Delete
                                </a>
                            </div>
                            <form id="delete-test-{{$test->id}}" action="{{route('tests.destroy',['test'=>$test])}}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                                                                                                                                                                                                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-600 truncate max-w-xs">{{$test->name}}</td>
                                                
                    </tr>
                    @empty
                    <p>No Tests</p>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class=" mx-auto my-8">
            {{ $tests->links() }}
        </div>
    </div>

</div>
</x-guest-layout>
