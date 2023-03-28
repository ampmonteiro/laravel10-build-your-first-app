<footer>
    <p class="environment">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} || PHP v{{ PHP_VERSION }} ||
    Env:
        @env('local')
            Local
        @else
            Prod
        @endenv
        
    </p>

    <section class="copyrights">
        <p>&copy; {{ date('Y') }}
            <a style="color:black" href="https://github.com/ampmonteiro">AMPM</a>
        </p>
    </section>
</footer>