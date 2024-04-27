<nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
    <a href="{{route('statistics')}}" class="flex items-center active-nav-link {{ request()->routeIs('statistics') ? 'opacity-100' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-tachometer-alt mr-3"></i>
        Tableau de bord
    </a>
    <a href="{{route('showUsers')}}" class="flex items-center active-nav-link {{ request()->routeIs('showUsers') ? 'opacity-100' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fa-solid fa-users mr-3"></i>
        Les utilisateurs
    </a>
    <a href="{{route('showAgentRequests')}}" class="flex items-center active-nav-link {{ request()->routeIs('showAgentRequests') ? 'opacity-100' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fa-solid fa-bell mr-3"></i>     
        Demandes
    </a>
    <a href="{{route('DashboardProperties')}}" class="flex items-center text-white active-nav-link opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-table mr-3"></i>
        Les Proprietées
    </a>
    <a href="forms.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fas fa-align-left mr-3"></i>
        Les Categories
    </a>
    <a href="tabs.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fa-solid fa-location-dot mr-3"></i>
        Les villes 
    </a>
    <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
        <i class="fa-solid fa-layer-group mr-3"></i>
        Les types
    </a>
    <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
        <i class="fas fa-sign-out-alt mr-3"></i>
        Sign Out
    </a>

    
   
</nav>