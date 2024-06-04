<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item" style="border-bottom:1px solid #ddd;">
                <?php if(Auth::user()->role_id =='2'){ ?>
                <a href="javascript:void(0);" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt"></i>
                    {{ Auth::user()->name }}
                    <small style="margin:26px;">(Patients)</small>
                </a>
                <?php }else if(Auth::user()->role_id =='3'){ ?>
                <a href="javascript:void(0);" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt"></i>
                    {{ Auth::user()->name }}
                    <small style="margin:26px;">(Doctor)</small>
                </a>
                <?php }else{ ?>
                <a href="http://148.251.83.25/~leaveco1/admin" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt"></i>
                    {{ trans('global.dashboard') }}
                    <small style="margin:26px;">(Administrator)</small>
                </a>
                <?php } ?>
            </li>
            
             @can('user_access')
                            <li class="nav-item">
                                <?php if(Auth::user()->role_id=='2'){ ?>
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    View Profile
                                </a>
                                <?php }else{ ?>
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    Manage {{ trans('cruds.user.title') }}
                                </a>
                                <?php } ?>
                            </li>
                        @endcan
           {{-- @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan --}}
             {{-- @can('service_access')
                <li class="nav-item">
                    <a href="{{ route("admin.services.index") }}" class="nav-link {{ request()->is('admin/services') || request()->is('admin/services/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.service.title') }}
                    </a>
                </li>
            @endcan--}}
            
            @can('employee_access')
                <li class="nav-item">
                    <?php if(Auth::user()->role_id=='2'){ ?>
                    <a href="{{ route("admin.user-patients.index") }}" class="nav-link {{ request()->is('admin/user-patients') || request()->is('admin/user-patients/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-user  nav-icon">

                        </i>
                        Your Profile 
                    </a>
                    <?php }else{ ?>
                    <a href="{{ route("admin.user-patients.index") }}" class="nav-link {{ request()->is('admin/user-patients') || request()->is('admin/user-patients/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        Manage {{ trans('cruds.patient.title') }}
                    </a>
                    <?php } ?>
                </li>
            @endcan
            @can('employee_access')
            
                <li class="nav-item">
                    <?php if(Auth::user()->role_id=='2'){ ?>
                    <a href="{{ route("admin.patients.index") }}" class="nav-link {{ request()->is('admin/patients') || request()->is('admin/patients/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        Your Submission
                    </a>
                    <?php }else{ ?>
                    <a href="{{ route("admin.patients.index") }}" class="nav-link {{ request()->is('admin/patients') || request()->is('admin/patients/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        Manage Submission
                    </a>
                    <?php } ?>
                </li>
            @endcan
             {{-- @can('client_access')
                <li class="nav-item">
                    <a href="{{ route("admin.clients.index") }}" class="nav-link {{ request()->is('admin/clients') || request()->is('admin/clients/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.client.title') }}
                    </a>
                </li>
            @endcan
            @can('appointment_access')
                <li class="nav-item">
                    <a href="{{ route("admin.appointments.index") }}" class="nav-link {{ request()->is('admin/appointments') || request()->is('admin/appointments/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.appointment.title') }}
                    </a>
                </li>
            @endcan
            <li class="nav-item">
                <a href="{{ route("admin.systemCalendar") }}" class="nav-link {{ request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'active' : '' }}">
                    <i class="nav-icon fa-fw fas fa-calendar">

                    </i>
                    {{ trans('global.systemCalendar') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>--}}
            @if(Auth::user()->role_id!='3')
                @if(Auth::user()->role_id=='')
                <li class="nav-item">
                    <a href="{{ route("admin.transactions.index") }}" class="nav-link {{ request()->is('admin/transactions') || request()->is('admin/transactions/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-credit-card nav-icon"></i>
                        Manage Transactions
                    </a>
                </li> 
                @else
                 <li class="nav-item">
                     <a href="{{ route('admin.transactions.index') }}" class="nav-link {{ request()->is('admin/transactions') || request()->is('admin/transactions/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-credit-card nav-icon"></i>
                        Your Transactions
                    </a>
                </li>
                @endif
                
               
            <li class="nav-item">
                    <a href="{{ route("admin.cards.index") }}" class="nav-link {{ request()->is('admin/cards') || request()->is('admin/cards/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-credit-card nav-icon"></i>
                        Card Details
                    </a>
             </li>
             @endif
             @if(Auth::user()->role_id=='')
              <li class="nav-item">
                    <a href="{{ route("admin.manage-prescriptions.index") }}" class="nav-link {{ request()->is('admin/manage-prescriptions') || request()->is('admin/manage-prescriptions/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-credit-card nav-icon"></i>
                    Manage Templates
                    </a>
             </li>
            @endif 

            @if(Auth::user()->role_id=='')
                 <li class="nav-item">
                    <a href="/admin/manage-preferences" class="nav-link {{ request()->is('admin/manage-preferences') || request()->is('admin/manage-preferences/*') ? 'active' : '' }}">
                        <i class="fa-fw fa fa-gear nav-icon"></i>
                        Manage Preferences
                    </a>
                </li>
               @endif

              @if(Auth::user()->role_id=='')
                 <li class="nav-item">
                    <a href="{{ route('admin.manage-setting.settingEdit') }}" class="nav-link {{ request()->is('admin/manage-setting') || request()->is('admin/manage-setting/*') ? 'active' : '' }}">
                        <i class="fa-fw fa fa-gear nav-icon"></i>
                        Manage Settings
                    </a>
                </li>
               @endif
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>