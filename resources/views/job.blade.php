<x-layout>
    <x-slot:heading>
        Job Page
    </x-slot:heading>
    <h2>Jobs</h2>

    <h2>{{ $job['title'] }}</h2>
    <p>Salary: {{ $job['salary'] }}</p>

    <a href="/jobs">Back to Jobs</a>

    {{ request()->url() }}

</x-layout>