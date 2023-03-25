@if (session('updated'))
    <div id="updated" class="alert alert-success">{{ session('updated') }}</div>
@elseif(session('error-updated'))
    <div id="updated" class="alert alert-danger">{{ session('error-updated') }}</div>
@elseif(session('not-found'))
    <div id="updated" class="alert alert-info">{{ session('not-found') }}</div>
@endif

@if (session('deleted'))
    <div id="deleted" class="alert alert-success">{{ session('deleted') }}</div>
@elseif(session('error'))
    <div id="deleted" class="alert alert-danger">{{ session('error-delete') }}</div>
@elseif(session('not-found'))
    <div id="deleted" class="alert alert-info">{{ session('not-found') }}</div>
@endif

@if (session('new-user'))
    <div id="new-user" class="alert alert-success">{{ session('new-user') }}</div>
@elseif(session('error-new-user'))
    <div id="new-user" class="alert alert-danger">{{ session('error-new-user') }}</div>
@endif

@if (session('info'))
    <div id="email-exists" class="alert alert-danger">{{ session('info') }}</div>
@endif
