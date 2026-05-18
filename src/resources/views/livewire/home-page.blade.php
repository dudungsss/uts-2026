<div>
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

  <script>
  const texts=['Mahasiswa Esa Unggul','Fullstack Learner','Vibe Coder'];
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
</div>