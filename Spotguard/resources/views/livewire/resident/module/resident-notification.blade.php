<div>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <div wire:poll.2s="refreshNotification">
                @if ($notifications)
                    @if ($notifications->count() > 0)
                        <span class="badge badge-warning navbar-badge">{{ $notifications->count() }}</span>
                    @endif
                @endif
            </div>
        </a>


        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right {{ $show }}"
            style=" width:18rem; position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-25px, 35px, 0px);">


            <div class="dropdown-divider"></div>

            @if ($notifications)
                @foreach ($notifications as $key => $value)
                    <a href="#" wire:key="{{ $value->id }}" wire:click.prevent="toggleSeen({{ $value->id }})"
                        style="cursor: pointer;" class="dropdown-item">
                        <i class="fas fa-bell mr-2"></i> {{ $value->message }} <br>
                        @if ($value->created_at instanceof \Carbon\Carbon)
                            <span
                                class="float-right text-muted text-sm">{{ $value->created_at->diffForHumans() }}</span>
                        @endif
                    </a>
                    <br>
                @endforeach
            @endif
</ul>
</li>
</div>
