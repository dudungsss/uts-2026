<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Portfolio — Yuliadhy Nugraha' }}</title>
 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Syne:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
 
    <style>
        *{margin:0;padding:0;box-sizing:border-box;}
        :root{
          --bg:#050d1a;--surf:#0a1628;--surf2:#0e1f38;--surf3:#112347;
          --acc:#3b82f6;--acc2:#60a5fa;--acc3:#93c5fd;
          --txt:#e2eaf7;--muted:#6b88b5;--muted2:#4a6490;
          --bdr:rgba(59,130,246,0.13);--bdr2:rgba(59,130,246,0.28);--bdr3:rgba(59,130,246,0.45);
          --green:#34d399;--green-bg:rgba(52,211,153,0.08);--green-bdr:rgba(52,211,153,0.2);
          --amber:#fbbf24;--amber-bg:rgba(251,191,36,0.08);--amber-bdr:rgba(251,191,36,0.2);
          --mono:'Space Mono',monospace;--sans:'Syne',sans-serif;
        }
        body{background:var(--bg);color:var(--txt);font-family:var(--sans);overflow-x:hidden;}
        .grid-bg{position:fixed;inset:0;pointer-events:none;z-index:0;
          background-image:linear-gradient(rgba(59,130,246,0.035) 1px,transparent 1px),linear-gradient(90deg,rgba(59,130,246,0.035) 1px,transparent 1px);
          background-size:44px 44px;}
        .orb{position:fixed;border-radius:50%;pointer-events:none;z-index:0;}
        .orb1{width:600px;height:600px;top:-150px;right:-150px;background:radial-gradient(circle,rgba(29,78,216,0.09) 0%,transparent 70%);}
        .orb2{width:500px;height:500px;bottom:100px;left:-200px;background:radial-gradient(circle,rgba(59,130,246,0.07) 0%,transparent 70%);}
 
        nav{display:flex;align-items:center;justify-content:space-between;padding:1rem 2rem;
          background:rgba(5,13,26,0.92);backdrop-filter:blur(10px);border-bottom:1px solid var(--bdr);
          position:sticky;top:0;z-index:100;}
        .logo{font-family:var(--mono);font-size:12px;color:var(--acc2);letter-spacing:.1em;text-decoration:none;}
        .logo em{color:var(--muted);font-style:normal;}
        .nav-links{display:flex;gap:4px;}
        .nl{font-family:var(--mono);font-size:10px;color:var(--muted);background:none;border:none;cursor:pointer;
          padding:6px 14px;border-radius:4px;letter-spacing:.07em;text-transform:uppercase;transition:all .2s;text-decoration:none;display:inline-block;}
        .nl:hover{color:var(--acc2);background:rgba(59,130,246,0.08);}
        .nl.active{color:var(--acc);background:rgba(59,130,246,0.08);border:1px solid var(--bdr2);}
        .nav-dot{width:6px;height:6px;border-radius:50%;background:var(--acc);display:inline-block;margin-right:6px;animation:pulse 2s infinite;}
        @keyframes pulse{0%,100%{opacity:1;}50%{opacity:.4;}}
 
        main{position:relative;z-index:1;min-height:calc(100vh - 57px);}
 
        footer{border-top:1px solid var(--bdr);padding:1.5rem 2rem;text-align:center;position:relative;z-index:1;}
        footer p{font-family:var(--mono);font-size:10px;color:var(--muted2);letter-spacing:.05em;}
        footer span{color:var(--acc2);}
 
        /* shared utils */
        .wrap{max-width:1060px;margin:0 auto;padding:0 2rem;}
        .sec-pad{padding:3.5rem 2rem;}
        .sec-label{font-family:var(--mono);font-size:10px;color:var(--acc);letter-spacing:.15em;text-transform:uppercase;
          margin-bottom:.8rem;display:flex;align-items:center;gap:10px;}
        .sec-label::before{content:'';width:28px;height:1px;background:var(--acc);display:block;}
        .sec-title{font-size:2rem;font-weight:700;letter-spacing:-.025em;margin-bottom:.6rem;}
        .sec-sub{font-size:14px;color:var(--muted);line-height:1.8;max-width:500px;margin-bottom:2.5rem;}
 
        /* tags / badges */
        .tags{display:flex;gap:5px;flex-wrap:wrap;margin-bottom:.8rem;}
        .tag{font-family:var(--mono);font-size:9px;color:var(--acc);background:rgba(59,130,246,.08);
          border:1px solid rgba(59,130,246,.18);padding:2px 7px;border-radius:3px;letter-spacing:.05em;text-transform:uppercase;}
        .tag.g{color:var(--green);background:var(--green-bg);border-color:var(--green-bdr);}
        .tag.a{color:var(--amber);background:var(--amber-bg);border-color:var(--amber-bdr);}
        .badge{font-family:var(--mono);font-size:9px;padding:3px 10px;border-radius:20px;}
        .badge.active{color:var(--green);background:var(--green-bg);border:1px solid var(--green-bdr);}
        .badge.done{color:var(--acc2);background:rgba(59,130,246,.08);border:1px solid var(--bdr2);}
        .badge.wip{color:var(--amber);background:var(--amber-bg);border:1px solid var(--amber-bdr);}
    </style>
 
    @livewireStyles
</head>
<body>
    <div class="grid-bg"></div>
    <div class="orb orb1"></div>
    <div class="orb orb2"></div>
 
    <nav>
        <a href="/" class="logo"><em>~/</em>yuliadhy.dev</a>
        <div class="nav-links">
            <a href="/" class="nl {{ request()->is('/') ? 'active' : '' }}">
                @if(request()->is('/')) <span class="nav-dot"></span> @endif
                home
            </a>
            <a href="/projects" class="nl {{ request()->is('projects*') ? 'active' : '' }}">projects</a>
            <a href="/contact" class="nl {{ request()->is('contact') ? 'active' : '' }}">contact</a>
        </div>
        <a href="/contact" style="font-family:var(--mono);font-size:10px;color:var(--bg);background:var(--acc);
          padding:7px 18px;border-radius:5px;border:none;cursor:pointer;letter-spacing:.07em;text-decoration:none;
          transition:all .2s;">hire_me</a>
    </nav>
 
    <main>
        {{ $slot }}
    </main>
 
    <footer>
        <p>built with <span>Laravel + Filament V3 + Livewire + MariaDB + Docker</span> &nbsp;|&nbsp; © 2025 <span>Yuliadhy Nugraha</span> &nbsp;|&nbsp; CSF412 UTS</p>
    </footer>
 
    @livewireScripts
</body>
</html>