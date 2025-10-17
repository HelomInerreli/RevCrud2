<nav class="navbar navbar-expand-lg text-white bg-dark fixed-top">
    <a class="navbar-brand text-white " href="#">Helom Valentim</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('schools') ? 'active text-white' : 'text-secondary' }}"
                    href="{{ url('/schools') }}">
                    Schools
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('teachers') ? 'active text-white' : 'text-secondary' }}"
                    href="{{ url('/teachers') }}">
                    Teachers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('courses') ? 'active text-white' : 'text-secondary' }}"
                    href="{{ url('/courses') }}">
                    Courses
                </a>
            </li>
        </ul>

    </div>
</nav>
