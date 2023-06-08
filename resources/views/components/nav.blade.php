@auth
<nav class="navbar shadow-[0_6px_55px_-15px_rgba(0,0,0,0.3)] bg-base-100">
    <div class="flex-1">
      <a href="{{ url('dashboard') }}" class="btn btn-ghost normal-case text-xl">{{ config('app.name') }}</a>
    </div>
    <div class="flex-none gap-2">
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img src="{{ auth()->user()->avatar }}" />
                </div>
            </label>
            <ul tabindex="0" class="mt-3 p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                <li>
                    <form action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
@endauth
