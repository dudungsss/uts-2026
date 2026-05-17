<x-layouts.app title="Home — Yuliadhy Nugraha">
<div>
<style>
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
.btn-p{font-family:var(--mono);font-size:11px;color:var(--bg);background:var(--acc);
  padding:11px 26px;border-radius:5px;border:none;cursor:pointer;letter-spacing:.07em;transition:all .2s;text-decoration:none;display:inline-block;}
.btn-p:hover{background:var(--acc2);transform:translateY(-1px);}
.btn-o{font-family:var(--mono);font-size:11px;color:var(--acc2);background:none;
  border:1px solid var(--bdr2);padding:11px 26px;border-radius:5px;cursor:pointer;letter-spacing:.07em;transition:all .2s;text-decoration:none;display:inline-block;}
.btn-o:hover{background:rgba(59,130,246,.07);}
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
  transition:all .25s;cursor:pointer;text-decoration:none;display:block;color:inherit;}
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
</style>

  {{-- HERO --}}
  <div class="hero-sec">
    <div class="hero-badge">available for work</div>
    <div class="hero">
      <h1><span class="solid">Yuliadhy</span><span class="outline">Nugraha.</span></h1>
      <div class="typing-wrap"><span id="typed"></span><span class="cursor"></span></div>
      <p class="hero-p">Membangun aplikasi web modern dengan Laravel, Filament V3, dan Livewire. Spesialis arsitektur MVC, admin panel dinamis, dan dark mode aesthetic.</p>
      <div class="btns">
        <a href="/projects" class="btn-p">lihat projects →</a>
        <a href="/contact" class="btn-o">hubungi saya</a>
      </div>
      <div class="hero-stats">
        <div class="stat"><div class="n">{{ $totalProjects }}+</div><div class="l">projects</div></div>
        <div class="stat"><div class="n">7</div><div class="l">tech stack</div></div>
        <div class="stat"><div class="n">MVC</div><div class="l">architecture</div></div>
        <div class="stat"><div class="n">100%</div><div class="l">dark mode</div></div>
      </div>
    </div>
  </div>

  {{-- TECH STACK --}}
  <div class="wrap" style="padding-bottom:3.5rem;">
    <div class="sec-label">tech stack</div>
    <h2 class="sec-title">Tools & Teknologi</h2>
    <p class="sec-sub">Stack yang digunakan dalam project UTS ini, dari backend hingga deployment.</p>
    <div class="stack-grid">
      <div class="sk"><div class="sk-icon">🐘</div><div class="sk-name">Laravel 11</div><div class="sk-role">MVC Framework</div></div>
      <div class="sk"><div class="sk-icon">⚡</div><div class="sk-name">Filament V3</div><div class="sk-role">Admin Panel</div></div>
      <div class="sk"><div class="sk-icon">🔥</div><div class="sk-name">Livewire</div><div class="sk-role">Reactive UI</div></div>
      <div class="sk"><div class="sk-icon">🎨</div><div class="sk-name">TailwindCSS</div><div class="sk-role">UI Styling</div></div>
      <div class="sk"><div class="sk-icon">🗄️</div><div class="sk-name">MariaDB</div><div class="sk-role">Database</div></div>
      <div class="sk"><div class="sk-icon">🐋</div><div class="sk-name">Docker</div><div class="sk-role">Environment</div></div>
      <div class="sk"><div class="sk-icon">🔷</div><div class="sk-name">AlpineJS</div><div class="sk-role">Interactivity</div></div>
    </div>
  </div>

  {{-- FEATURED PROJECTS --}}
  <div class="wrap" style="padding-bottom:4rem;">
    <div class="sec-label">featured projects</div>
    <h2 class="sec-title">Project Terbaru</h2>
    <p class="sec-sub">Project unggulan yang ditampilkan dari database — kelola via Filament Admin.</p>
    <div class="proj-grid">
      @forelse($featuredProjects as $project)
        <a href="/projects/{{ $project->slug }}" class="pc">
          <div class="pc-thumb">
            @if($project->thumbnail)
              <img src="/storage/{{ $project->thumbnail }}" alt="{{ $project->title }}">
            @else
              <span class="pc-thumb-txt">[ NO THUMBNAIL ]</span>
            @endif
          </div>
          <div class="pc-body">
            <div class="tags">
              @foreach(explode(',', $project->tech_stack) as $tech)
                <span class="tag">{{ trim($tech) }}</span>
              @endforeach
            </div>
            <div class="pc-title">{{ $project->title }}</div>
            <div class="pc-desc">{{ Str::limit($project->short_description, 100) }}</div>
          </div>
          <div class="pc-foot">
            @php
              $statusClass = match($project->status) {
                'active' => 'active',
                'done', 'completed' => 'done',
                default => 'wip',
              };
            @endphp
            <span class="badge {{ $statusClass }}">{{ $project->status }}</span>
            <span class="pc-arr">→</span>
          </div>
        </a>
      @empty
        <div style="font-family:var(--mono);font-size:12px;color:var(--muted2);padding:2rem 0;">
          Belum ada project. Tambahkan via Filament Admin → Projects.
        </div>
      @endforelse
    </div>
    @if($featuredProjects->count() > 0)
      <div class="view-all">
        <a href="/projects" class="btn-o">lihat semua projects →</a>
      </div>
    @endif
  </div>
</div>

<script>
const texts=['Laravel Developer','Fullstack Engineer','MVC Architect','Dark Mode Enthusiast','Building UTS.test'];
let ti=0,ci=0,del=false;
const el=document.getElementById('typed');
function type(){
  const t=texts[ti];
  if(!del){
    el.textContent=t.slice(0,++ci);
    if(ci===t.length){del=true;setTimeout(type,1800);return;}
  } else {
    el.textContent=t.slice(0,--ci);
    if(ci===0){del=false;ti=(ti+1)%texts.length;}
  }
  setTimeout(type,del?38:75);
}
type();
</script>
</x-layouts.app>