<!-- Sidebar -->
<div class="sidebar">

</div>

<nav id="sidebar"
    class="hidden md:flex flex-col bg-gray-50 border-t border-gray-200 md:border-r md:border-t-0 w-full md:w-56 min-w-0 md:min-w-[14rem] overflow-x-auto md:overflow-y-auto text-xs text-gray-700">
    <ul class="flex flex-col px-3 py-2 md:py-4 space-y-1 whitespace-nowrap md:whitespace-normal">
        <li>
            <a href="{{ url('Dashboard') }}" class="flex items-center gap-2 px-2 py-1 rounded text-blue-600 font-semibold">
                <i class="fas fa-home text-xs"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ url('admin_user') }}" class="flex items-center gap-2 px-2 py-1 rounded hover:bg-gray-100">
                <i class="fas fa-file-alt text-xs"></i> User/Applicant
            </a>
        </li>
        <li>
            <a href="{{ url('admin_agent') }}" class="flex items-center gap-2 px-2 py-1 rounded hover:bg-gray-100">
                <i class="fas fa-shopping-cart text-xs"></i> Agents_Applicant's
            </a>
        </li>
        <li>
            <a href="{{ url('AgentDetails') }}" class="flex items-center gap-2 px-2 py-1 rounded hover:bg-gray-100">
                <i class="fas fa-user-friends text-xs"></i> Agent_Detail's
            </a>
        </li>
    </ul>
</nav>
