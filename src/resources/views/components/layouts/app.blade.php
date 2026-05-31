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
          --bg:#050d1a;--surf:#0a1628;--surf2:#0e1f38;
          --acc:#3b82f6;--acc2:#60a5fa;
          --txt:#e2eaf7;--muted:#6b88b5;--muted2:#4a6490;
          --bdr:rgba(59,130,246,0.13);--bdr2:rgba(59,130,246,0.28);
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
        .nl{font-family:var(--mono);font-size:10px;color:var(--muted);padding:6px 14px;border-radius:4px;
          letter-spacing:.07em;text-transform:uppercase;transition:all .2s;text-decoration:none;display:inline-block;border:1px solid transparent;}
        .nl:hover{color:var(--acc2);background:rgba(59,130,246,0.08);}
        .nl.active{color:var(--acc);background:rgba(59,130,246,0.08);border-color:var(--bdr2);}
        .nav-dot{width:6px;height:6px;border-radius:50%;background:var(--acc);display:inline-block;margin-right:6px;animation:pulse 2s infinite;}
        @keyframes pulse{0%,100%{opacity:1;}50%{opacity:.4;}}
        .hire-btn{font-family:var(--mono);font-size:10px;color:var(--bg);background:var(--acc);
          padding:7px 18px;border-radius:5px;text-decoration:none;transition:all .2s;letter-spacing:.07em;}
        .hire-btn:hover{background:var(--acc2);}
        main{position:relative;z-index:1;min-height:calc(100vh - 57px);}
        footer{border-top:1px solid var(--bdr);padding:1.5rem 2rem;text-align:center;position:relative;z-index:1;}
        footer p{font-family:var(--mono);font-size:10px;color:var(--muted2);letter-spacing:.05em;}
        footer span{color:var(--acc2);}
        .wrap{max-width:1060px;margin:0 auto;padding:0 2rem;}
        .sec-pad{padding:3.5rem 2rem;}
        .sec-label{font-family:var(--mono);font-size:10px;color:var(--acc);letter-spacing:.15em;text-transform:uppercase;
          margin-bottom:.8rem;display:flex;align-items:center;gap:10px;}
        .sec-label::before{content:'';width:28px;height:1px;background:var(--acc);display:block;}
        .sec-title{font-size:2rem;font-weight:700;letter-spacing:-.025em;margin-bottom:.6rem;}
        .sec-sub{font-size:14px;color:var(--muted);line-height:1.8;max-width:500px;margin-bottom:2.5rem;}
        .tags{display:flex;gap:5px;flex-wrap:wrap;margin-bottom:.8rem;}
        .tag{font-family:var(--mono);font-size:9px;color:var(--acc);background:rgba(59,130,246,.08);
          border:1px solid rgba(59,130,246,.18);padding:2px 7px;border-radius:3px;letter-spacing:.05em;text-transform:uppercase;}
        .tag.g{color:var(--green);background:var(--green-bg);border-color:var(--green-bdr);}
        .tag.a{color:var(--amber);background:var(--amber-bg);border-color:var(--amber-bdr);}
        .badge{font-family:var(--mono);font-size:9px;padding:3px 10px;border-radius:20px;}
        .badge.active{color:var(--green);background:var(--green-bg);border:1px solid var(--green-bdr);}
        .badge.done{color:var(--acc2);background:rgba(59,130,246,.08);border:1px solid var(--bdr2);}
        .badge.wip{color:var(--amber);background:var(--amber-bg);border:1px solid var(--amber-bdr);}
        .btn-p{font-family:var(--mono);font-size:11px;color:var(--bg);background:var(--acc);
          padding:11px 26px;border-radius:5px;border:none;cursor:pointer;letter-spacing:.07em;transition:all .2s;text-decoration:none;display:inline-block;}
        .btn-p:hover{background:var(--acc2);transform:translateY(-1px);}
        .btn-o{font-family:var(--mono);font-size:11px;color:var(--acc2);background:none;
          border:1px solid var(--bdr2);padding:11px 26px;border-radius:5px;cursor:pointer;letter-spacing:.07em;transition:all .2s;text-decoration:none;display:inline-block;}
        .btn-o:hover{background:rgba(59,130,246,.07);}
        .hero-sec{padding:5rem 2rem 4rem;max-width:1060px;margin:0 auto;}
        .hero-badge{font-family:var(--mono);font-size:10px;color:var(--acc);letter-spacing:.15em;text-transform:uppercase;
          margin-bottom:1.5rem;display:flex;align-items:center;gap:10px;}
        .hero-badge::before{content:'';width:28px;height:1px;background:var(--acc);display:block;}
        .hero h1{font-size:clamp(2.5rem,6vw,5rem);font-weight:800;line-height:1.05;letter-spacing:-.03em;margin-bottom:1.2rem;}
        .hero h1 .solid{display:block;color:var(--txt);}
        .hero h1 .outline{display:block;color:transparent;-webkit-text-stroke:1.5px rgba(59,130,246,.4);}
        .typing-wrap{font-family:var(--mono);font-size:13px;color:var(--acc);margin-bottom:2rem;min-height:20px;}
        .cursor{display:inline-block;width:2px;height:.9em;background:var(--acc);animation:blink 1s step-end infinite;vertical-align:-.05em;margin-left:2px;}
        @keyframes blink{50%{opacity:0;}}
        .hero-p{font-size:15px;line-height:1.85;color:var(--muted);max-width:540px;margin-bottom:3rem;}
        .btns{display:flex;gap:12px;flex-wrap:wrap;}
        .hero-stats{display:flex;gap:2.5rem;margin-top:3.5rem;padding-top:2rem;border-top:1px solid var(--bdr);}
        .stat .n{font-family:var(--mono);font-size:1.8rem;font-weight:700;color:var(--acc2);}
        .stat .l{font-family:var(--mono);font-size:9px;color:var(--muted2);letter-spacing:.1em;text-transform:uppercase;margin-top:3px;}
        .stack-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(120px,1fr));gap:10px;margin-top:2rem;}
        .sk{background:var(--surf);border:1px solid var(--bdr);border-radius:8px;padding:1.1rem;transition:all .2s;cursor:default;}
        .sk:hover{border-color:var(--bdr2);background:var(--surf2);transform:translateY(-2px);}
        .sk-icon{width:30px;height:30px;background:rgba(59,130,246,.1);border-radius:6px;
          display:flex;align-items:center;justify-content:center;font-size:15px;margin-bottom:8px;}
        .sk-name{font-family:var(--mono);font-size:11px;color:var(--txt);}
        .sk-role{font-family:var(--mono);font-size:9px;color:var(--muted2);margin-top:2px;}
        .proj-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1.25rem;}
        .pc{background:var(--surf);border:1px solid var(--bdr);border-radius:12px;overflow:hidden;
          transition:all .25s;text-decoration:none;display:block;color:inherit;}
        .pc:hover{border-color:var(--bdr2);transform:translateY(-3px);}
        .pc-thumb{height:140px;background:var(--surf2);display:flex;align-items:center;justify-content:center;
          border-bottom:1px solid var(--bdr);overflow:hidden;}
        .pc-thumb img{width:100%;height:100%;object-fit:cover;}
        .pc-thumb-txt{font-family:var(--mono);font-size:9px;color:var(--muted2);letter-spacing:.1em;}
        .pc-body{padding:1.25rem;}
        .pc-title{font-size:1rem;font-weight:700;margin-bottom:.4rem;}
        .pc-desc{font-size:12px;color:var(--muted);line-height:1.7;}
        .pc-foot{padding:.9rem 1.25rem;border-top:1px solid var(--bdr);display:flex;align-items:center;justify-content:space-between;}
        .pc-arr{font-family:var(--mono);font-size:14px;color:var(--muted2);transition:color .2s;}
        .pc:hover .pc-arr{color:var(--acc2);}
        .view-all{display:flex;justify-content:center;margin-top:2rem;}
        .filter-bar{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:2rem;}
        .filter-btn{font-family:var(--mono);font-size:10px;padding:5px 14px;border-radius:20px;cursor:pointer;
          border:1px solid var(--bdr);background:none;color:var(--muted);transition:all .2s;letter-spacing:.05em;}
        .filter-btn:hover,.filter-btn.active{color:var(--acc);border-color:var(--bdr2);background:rgba(59,130,246,.08);}
        .empty-state{text-align:center;padding:4rem 2rem;font-family:var(--mono);color:var(--muted2);}
        .empty-state .big{font-size:2.5rem;margin-bottom:1rem;}
        .empty-state p{font-size:11px;letter-spacing:.07em;}
        .detail-hero{padding:3rem 2rem 2rem;max-width:1060px;margin:0 auto;}
        .back-btn{font-family:var(--mono);font-size:10px;color:var(--muted);letter-spacing:.07em;
          display:inline-flex;align-items:center;gap:6px;margin-bottom:2rem;transition:color .2s;text-decoration:none;}
        .back-btn:hover{color:var(--acc2);}
        .detail-header{display:grid;grid-template-columns:1fr auto;gap:2rem;align-items:start;margin-bottom:2.5rem;}
        .detail-title{font-size:2.2rem;font-weight:800;letter-spacing:-.03em;margin-bottom:.8rem;}
        .detail-desc{font-size:14px;color:var(--muted);line-height:1.85;max-width:580px;}
        .detail-meta{background:var(--surf);border:1px solid var(--bdr);border-radius:10px;padding:1.5rem;min-width:200px;}
        .meta-row{display:flex;flex-direction:column;gap:3px;margin-bottom:1rem;padding-bottom:1rem;border-bottom:1px solid var(--bdr);}
        .meta-row:last-child{margin-bottom:0;padding-bottom:0;border-bottom:none;}
        .meta-label{font-family:var(--mono);font-size:9px;color:var(--muted2);letter-spacing:.1em;text-transform:uppercase;}
        .meta-val{font-family:var(--mono);font-size:11px;color:var(--txt);}
        .detail-body{max-width:1060px;margin:0 auto;padding:0 2rem 4rem;}
        .detail-sections{display:grid;grid-template-columns:1fr;gap:1.25rem;}
        .ds{background:var(--surf);border:1px solid var(--bdr);border-radius:10px;overflow:hidden;}
        .ds-head{padding:1rem 1.5rem;border-bottom:1px solid var(--bdr);display:flex;align-items:center;gap:10px;}
        .ds-num{font-family:var(--mono);font-size:10px;color:var(--acc);background:rgba(59,130,246,.1);
          border:1px solid var(--bdr2);width:26px;height:26px;border-radius:4px;display:flex;align-items:center;justify-content:center;}
        .ds-htitle{font-size:.95rem;font-weight:700;}
        .ds-body{padding:1.5rem;}
        .ds-body p{font-size:13px;color:var(--muted);line-height:1.85;margin-bottom:.8rem;}
        .ds-body p:last-child{margin-bottom:0;}
        .req-grid{display:grid;grid-template-columns:1fr 1fr;gap:1rem;}
        .req-box{background:var(--surf2);border:1px solid var(--bdr);border-radius:8px;padding:1rem;}
        .req-box h4{font-family:var(--mono);font-size:10px;color:var(--acc);letter-spacing:.07em;text-transform:uppercase;margin-bottom:.6rem;}
        .req-item{font-size:12px;color:var(--muted);padding:4px 0;border-bottom:1px solid var(--bdr);display:flex;gap:8px;}
        .req-item:last-child{border-bottom:none;}
        .req-item::before{content:'→';color:var(--acc);font-size:11px;flex-shrink:0;}
        .feat-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:10px;}
        .feat-item{background:var(--surf2);border:1px solid var(--bdr);border-radius:8px;padding:1rem;}
        .feat-item i{font-size:18px;color:var(--acc2);margin-bottom:8px;display:block;}
        .feat-item .ft{font-size:12px;font-weight:600;margin-bottom:3px;}
        .feat-item .fd{font-size:11px;color:var(--muted);}
        .diagram-placeholder{background:var(--surf2);border:1px dashed var(--bdr2);border-radius:8px;
          min-height:180px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:8px;}
        .diagram-placeholder i{font-size:32px;color:var(--muted2);}
        .diagram-placeholder span{font-family:var(--mono);font-size:11px;color:var(--muted2);letter-spacing:.07em;}
        .diagram-placeholder small{font-family:var(--mono);font-size:9px;color:var(--muted2);opacity:.6;}
        .diagram-img{width:100%;border-radius:8px;border:1px solid var(--bdr);}
        .two-col{display:grid;grid-template-columns:1fr 1fr;gap:1rem;}
        .erd-table{background:var(--surf);border:1px solid var(--bdr2);border-radius:6px;overflow:hidden;}
        .erd-th{background:rgba(59,130,246,.12);padding:6px 10px;font-family:var(--mono);font-size:10px;
          color:var(--acc2);letter-spacing:.05em;border-bottom:1px solid var(--bdr2);font-weight:700;}
        .erd-tr{display:flex;border-bottom:1px solid var(--bdr);}
        .erd-tr:last-child{border-bottom:none;}
        .erd-pk{font-family:var(--mono);font-size:9px;color:var(--amber);padding:5px 8px;min-width:28px;
          border-right:1px solid var(--bdr);display:flex;align-items:center;}
        .erd-field{font-family:var(--mono);font-size:9px;color:var(--txt);padding:5px 8px;flex:1;}
        .erd-type{font-family:var(--mono);font-size:9px;color:var(--muted2);padding:5px 8px;text-align:right;}
        .erd-rel{display:flex;align-items:center;justify-content:center;gap:8px;padding:8px 0;
          font-family:var(--mono);font-size:10px;color:var(--muted2);}
        .progress-section{background:var(--surf2);border:1px solid var(--bdr);border-radius:8px;padding:1.25rem;}
        .prog-label{font-family:var(--mono);font-size:9px;color:var(--muted2);letter-spacing:.1em;text-transform:uppercase;margin-bottom:.5rem;}
        .prog-val{font-family:var(--mono);font-size:1.1rem;color:var(--acc2);font-weight:700;margin-bottom:.6rem;}
        .prog-bar{height:6px;background:var(--surf);border-radius:3px;overflow:hidden;}
        .prog-fill{height:100%;background:var(--acc);border-radius:3px;}
        .contact-layout{display:grid;grid-template-columns:1fr 1.3fr;gap:2.5rem;margin-top:2rem;}
        .ci h3{font-size:1.3rem;font-weight:700;margin-bottom:.8rem;}
        .ci p{font-size:13px;color:var(--muted);line-height:1.85;margin-bottom:1.5rem;}
        .cl{display:flex;align-items:center;gap:10px;padding:10px 0;border-bottom:1px solid var(--bdr);
          font-family:var(--mono);font-size:11px;color:var(--muted);text-decoration:none;transition:color .2s;}
        .cl:hover{color:var(--acc2);}
        .cl-ico{width:30px;height:30px;background:var(--surf2);border:1px solid var(--bdr);border-radius:6px;
          display:flex;align-items:center;justify-content:center;font-size:14px;}
        .cf{background:var(--surf);border:1px solid var(--bdr);border-radius:12px;padding:1.75rem;}
        .fl{font-family:var(--mono);font-size:10px;color:var(--muted2);letter-spacing:.08em;text-transform:uppercase;
          display:block;margin-bottom:7px;}
        .fi{width:100%;background:var(--surf2);border:1px solid var(--bdr);border-radius:6px;
          padding:9px 13px;color:var(--txt);font-family:var(--sans);font-size:13px;outline:none;
          transition:border-color .2s;margin-bottom:1rem;display:block;}
        .fi:focus{border-color:var(--bdr2);}
        .fi::placeholder{color:var(--muted2);}
        textarea.fi{resize:vertical;min-height:90px;}
        .fsub{width:100%;font-family:var(--mono);font-size:11px;color:var(--bg);background:var(--acc);
          padding:11px;border-radius:6px;border:none;cursor:pointer;letter-spacing:.07em;transition:all .2s;margin-top:.5rem;}
        .fsub:hover{background:var(--acc2);}
        .fsub:disabled{opacity:.6;cursor:not-allowed;}
        .success-msg{font-family:var(--mono);font-size:11px;color:var(--green);
          background:var(--green-bg);border:1px solid var(--green-bdr);border-radius:6px;padding:10px;
          text-align:center;margin-top:.8rem;}
        .error-msg{font-family:var(--mono);font-size:10px;color:var(--amber);margin-top:4px;margin-bottom:8px;}
        @media(max-width:700px){
          .detail-header,.two-col,.req-grid,.contact-layout{grid-template-columns:1fr;}
          .hero-stats{gap:1.5rem;flex-wrap:wrap;}
        }
    </style>

    @livewireStyles
</head>
<body>
    <div class="grid-bg"></div>
    <div class="orb orb1"></div>
    <div class="orb orb2"></div>

    <nav>
        @php
            $githubContact = \App\Models\Contact::query()
                ->where('contact_type', 'github')
                ->where('is_system_contact', true)
                ->orderBy('display_order')
                ->first();

            $githubUrl = $githubContact?->url ?? 'https://github.com/dudungsss';
            $githubName = $githubContact?->name ?? 'dudungsss';
        @endphp

        {{-- <a 
            href="{{ $githubUrl }}" 
            target="_blank" 
            rel="noopener noreferrer" 
            class="logo"
        >
            <em>~/</em>github.com/{{ $githubName }}
        </a> --}}

        <div class="nav-left"></div>

        <div class="nav-links">
            <a href="/" class="nl {{ request()->is('/') ? 'active' : '' }}">
                @if(request()->is('/'))
                    <span class="nav-dot"></span>
                @endif
                home
            </a>

            <a href="/projects" class="nl {{ request()->is('projects*') ? 'active' : '' }}">
                @if(request()->is('projects*'))
                    <span class="nav-dot"></span>
                @endif
                projects
            </a>

            <a href="/contact" class="nl {{ request()->is('contact') ? 'active' : '' }}">
                @if(request()->is('contact'))
                    <span class="nav-dot"></span>
                @endif
                contact
            </a>
        </div>

        <a 
            href="{{ $githubUrl }}" 
            target="_blank" 
            rel="noopener noreferrer" 
            class="hire-btn"
        >
            GitHub
        </a>
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