<x-layouts.app title="Projects — Yuliadhy Nugraha">
<div>
<style>
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

.filter-bar{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:2rem;}
.filter-btn{font-family:var(--mono);font-size:10px;padding:5px 14px;border-radius:20px;cursor:pointer;
  border:1px solid var(--bdr);background:none;color:var(--muted);transition:all .2s;letter-spacing:.05em;}
.filter-btn:hover,.filter-btn.active{color:var(--acc);border-color:var(--bdr2);background:rgba(59,130,246,.08);}

.empty-state{text-align:center;padding:4rem 2rem;font-family:var(--mono);color:var(--muted2);}
.empty-state .big{font-size:2.5rem;margin-bottom:1rem;}
.empty-state p{font-size:11px;letter-spacing:.07em;}
</style>

  <div class="wrap sec-pad">
    <div class="sec-label">projects</div>
    <h2 class="sec-title">Semua Project</h2>
    <p class="sec-sub">Daftar project yang dikelola via Filament Admin — data langsung dari database.</p>

    {{-- Filter --}}
    <div class="filter-bar">
      <button class="filter-btn {{ $filter === 'all' ? 'active' : '' }}" wire:click="setFilter('all')">all</button>
      <button class="filter-btn {{ $filter === 'active' ? 'active' : '' }}" wire:click="setFilter('active')">active</button>
      <button class="filter-btn {{ $filter === 'done' ? 'active' : '' }}" wire:click="setFilter('done')">done</button>
      <button class="filter-btn {{ $filter === 'wip' ? 'active' : '' }}" wire:click="setFilter('wip')">wip</button>
    </div>

    {{-- Project Grid --}}
    <div class="proj-grid">
      @forelse($projects as $project)
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
              @foreach(array_slice(explode(',', $project->tech_stack), 0, 3) as $tech)
                <span class="tag">{{ trim($tech) }}</span>
              @endforeach
              @if($project->is_featured)
                <span class="tag g">featured</span>
              @endif
            </div>
            <div class="pc-title">{{ $project->title }}</div>
            <div class="pc-desc">{{ Str::limit($project->short_description, 110) }}</div>
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
        <div class="empty-state" style="grid-column:1/-1;">
          <div class="big">📂</div>
          <p>belum ada project untuk filter "{{ $filter }}"</p>
        </div>
      @endforelse
    </div>
  </div>
</div>
</x-layouts.app>