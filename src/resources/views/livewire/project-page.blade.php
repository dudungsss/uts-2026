<div>
  <div class="wrap sec-pad">
    <div class="sec-label">projects</div>
    <h2 class="sec-title">Semua Project</h2>
    <p class="sec-sub">Daftar project yang dikelola via Filament Admin — data langsung dari database.</p>

    <div class="filter-bar">
      <button class="filter-btn {{ $filter === 'all' ? 'active' : '' }}" wire:click="setFilter('all')">all</button>
      <button class="filter-btn {{ $filter === 'active' ? 'active' : '' }}" wire:click="setFilter('active')">active</button>
      <button class="filter-btn {{ $filter === 'done' ? 'active' : '' }}" wire:click="setFilter('done')">done</button>
      <button class="filter-btn {{ $filter === 'wip' ? 'active' : '' }}" wire:click="setFilter('wip')">wip</button>
    </div>

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