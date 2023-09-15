  @forelse ($schoolLists as $school)
      <div class="col-lg-6">
          <div class="sub-agent-content">
              <div>
                  <div class="sub-agent-icon">
                      <img src="{{ $school->university_gallery_url ?? 'https://archive.org/download/no-photo-available/no-photo-available.png' }}"
                          alt="" />
                  </div>
              </div>
              <div>
                  <div class="sub-agent-text">
                      <a href="{{ route('quick.school.detail', ['id' => $school->id, 'slug' => $school->slug]) }}"
                          target="_blank">{{ $school->university_name }}
                          , {{ $school->address }}</a>
                  </div>
              </div>
          </div>
      </div>

  @empty
  @endforelse
