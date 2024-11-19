<h5>Navigation</h5>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('todos.form') ? 'active' : '' }}" href="{{ route('todos.form') }}">Add To-Do</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('todos.table') ? 'active' : '' }}" href="{{ route('todos.table') }}">View To-Dos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('products.table') ? 'active' : '' }}" href="{{ route('products.table') }}">View Products</a>
    </li>
</ul>
