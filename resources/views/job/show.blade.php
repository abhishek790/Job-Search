<x-layout>
    <x-job-card :job="$job">
        <p>{!!nl2br(e($job->description))!!}</p>
    </x-job-card>
</x-layout>