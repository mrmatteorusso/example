<x-layout>
    <x-slot:heading>
        Job Page
    </x-slot:heading>
    <h2>Jobs</h2>
    <div class="space-y-4">
        @foreach ($jobs as $job)
        <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 bg-white border border-gray-200  rounded-xl">
            <div class="font-bold text-blue-500">{{$job->employer->name}}</div>
            <div>
                <strong>{{$job['title']}}</strong>: {{$job['salary']}}
            </div>
        </a>

        @endforeach

    </div>

    <div>
        {{$jobs->links()}}
    </div>
    {{ request()->url() }}

</x-layout>