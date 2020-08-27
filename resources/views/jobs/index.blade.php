<ul>
    @foreach ($jobs as $job)
        <li>
            <a href="/jobs/{{ $job->id }}">
                {{ $job->name }}
            </a>
        </li>
    @endforeach
</ul>