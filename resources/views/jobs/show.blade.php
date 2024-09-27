<x-layout>
    <x-slot:heading>
        Job Page
    </x-slot:heading>
    <h2>Jobs</h2>

    <h2>{{ $job->title }}</h2>
    <p>This job pays: {{ $job->salary }}</p>

    <p class="mt-4">
        <x-button href="/jobs/{{$job->id}}/edit">Edit job</x-button>
    </p>

        <a href="/jobs">Back to Jobs</a>

    {{ request()->url() }}

</x-layout>