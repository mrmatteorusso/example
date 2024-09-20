<x-layout>
    <x-slot:heading>
        Job Page
    </x-slot:heading>
    <h2>Jobs</h2>
    <ul>
        @foreach ($jobs as $job)
        <li>
            <a href="/jobs/{{ $job['id'] }}">
                <strong>{{$job['title']}}</strong> => {{$job['salary']}}
            </a>
        </li>

        @endforeach

    </ul>
    {{ request()->url() }}

</x-layout>