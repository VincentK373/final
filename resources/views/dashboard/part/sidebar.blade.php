<div class="sidebar">
    <a href="#" class="sidebar-link {{ Request::is('dashboard/profile') ? 'active' : '' }}">My Profile</a>
    <a href="/dashboard/create" class="sidebar-link {{ Request::is('dashboard/create') ? 'active' : '' }}">Add
        Posts</a>
    <a href="/dashboard" class="sidebar-link {{ Request::is('dashboard') ? 'active' : '' }}">Manage Posts</a>
    <a href="/dashboard/manage-users"
        class="sidebar-link {{ Request::is('dashboard/manage-users') ? 'active' : '' }}">Manage Users</a>
    <a href="/dashboard/manage-categories"
        class="sidebar-link {{ Request::is('dashboard/manage-user') ? 'active' : '' }}">Manage
        Categories</a>
</div>

<style>
    .sidebar {
        display: flex;
        flex-direction: column;
        background-color: rgb(83, 33, 120);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
    }

    .sidebar-link {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        width: 250px;
        height: 70px;
        color: white;
        font-size: 20px;
        font-weight: bold;
        text-decoration: none;
        transition: background-color 0.3s ease-in-out;
        border: 1px solid black;
    }

    .sidebar-link:hover {
        background-color: rgb(178, 78, 249);
        color: black;

    }

    .sidebar-link.active {
        background-color: rgb(229, 195, 254);
        color: black;
    }
</style>
