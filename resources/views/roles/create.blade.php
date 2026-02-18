<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Role - User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">User Management</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('roles.index') }}">Manage Roles</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card shadow-sm" style="max-width: 800px; margin: 0 auto;">
            <div class="card-header">
                <h4>Create New Role</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="form-label">Role Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required
                            autofocus placeholder="e.g. Manager">
                    </div>

                    <h5 class="mb-3">Permissions</h5>
                    <div class="row">
                        @foreach($features as $feature)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-header text-capitalize bg-secondary text-white">
                                    {{ $feature->name }}
                                </div>
                                <div class="card-body">
                                    @foreach($feature->permissions as $permission)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permissions[]"
                                            value="{{ $permission->id }}" id="perm_{{ $permission->id }}">
                                        <label class="form-check-label text-capitalize"
                                            for="perm_{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-success">Create Role</button>
                        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>