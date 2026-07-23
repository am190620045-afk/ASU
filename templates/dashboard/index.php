<h1>ASU Dashboard</h1>

<p>Authenticated runtime area.</p>

<p>User: <?= htmlspecialchars((string) ($user?->username() ?? ''), ENT_QUOTES, 'UTF-8') ?></p>

<a href="/logout">Logout</a>
