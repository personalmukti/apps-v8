<li class="nav-item">
    <a href="{{ route('modtests.index') }}"
       class="nav-link {{ Request::is('modtests*') ? 'active' : '' }}">
        <p>@lang('models/modtests.singular')</p>
    </a>
</li>

