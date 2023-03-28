@if (session('success'))
<p style="align-self: stretch; background: rgb(0, 60, 0); color: aliceblue; padding:1rem;">
    {{ session('success') }}
</p>
@endif