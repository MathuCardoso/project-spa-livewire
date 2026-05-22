<div class="navbar bg-base-100 shadow-sm">
    <div class="flex-1">
        <a class="btn btn-primary btn-ghost text-xl"
           wire:navigate="{{ route('dashboard') }}">
            Ain Projetinhooo
        </a>
    </div>
    <div class="flex gap-2">
        <input type="text"
               placeholder="Search"
               class="input input-bordered w-24 md:w-auto" />
        <div class="dropdown dropdown-end z-60">
            <div tabindex="0"
                 role="button"
                 class="btn btn-ghost btn-circle avatar avatar-placeholder">
                <div class="w-10 rounded-full">
                    <span>{{ Auth::user()->getInitials() }}</span>
                </div>
            </div>
            <ul tabindex="-1"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                <li>
                    <a class="justify-between">
                        Profile
                        <span class="badge">New</span>
                    </a>
                </li>
                <li><a>Settings</a></li>
                @livewire('auth.logout')
            </ul>
        </div>
    </div>
</div>
