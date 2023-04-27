<div class="sidebar">
    <a href="/profile" class="sidebar-link {{ Request::is('profile') ? 'active' : '' }}">My
        Profile</a>
    @can('admin')
        <a href="/dashboard"
            class="sidebar-link {{ Request::is('dashboard*') && !Request::is('dashboard/create*') ? 'active' : '' }}">Manage
            Products</a>
        <a href="/dashboard/create" class="sidebar-link {{ Request::is('dashboard/create*') ? 'active' : '' }}">Add Product</a>
        <a href="/manage-categories" class="sidebar-link {{ Request::is('manage-categories*') ? 'active' : '' }}">Manage
            Categories</a>
    @endcan

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
