<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Inkwell — New Post</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
  <!-- Quill Rich Text Editor -->
  <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet"/>
  @vite('resources/css/post_page.css')

  <style>
    
  </style>
</head>
<body>

<!-- ═══ NAVBAR ═══ -->
<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container">
    <a class="navbar-brand" href="blog.html">Ink<span>well</span></a>
    <div class="ms-4">
      <a href="blog.html" class="nav-back"><i class="bi bi-arrow-left"></i> Back to Blog</a>
    </div>
    <div class="ms-auto d-flex align-items-center gap-3">
      <span class="text-muted" style="font-size:.8rem;" id="autosaveLabel">
        <i class="bi bi-cloud-check me-1"></i>Draft auto-saved
      </span>
      <button class="btn-draft" onclick="saveDraft()">Save Draft</button>
      <button class="btn-publish" onclick="submitPost()">
        <i class="bi bi-send me-1"></i>Publish
      </button>
    </div>
  </div>
</nav>

<!-- ═══ PAGE HEADER ═══ -->
<div class="container">
  <div class="page-header">
    <h1>Write New Post</h1>
    <p>Craft your story and publish it to the world.</p>
  </div>
</div>

<!-- ═══ MAIN LAYOUT ═══ -->
<div class="container pb-5">
  <div class="row g-4">

    <!-- ──── LEFT: Main Editor ──── -->
    <div class="col-lg-8">

      <!-- Title -->
      <div class="panel">
        <div class="panel-title"><i class="bi bi-pencil-square"></i> Post Title</div>
        <input type="text" id="postTitle" class="form-control"
               placeholder="Give your story a great title…" maxlength="120"
               oninput="updateTitle(this)">
        <div class="char-count" id="titleCount">0 / 120</div>

        <!-- Slug -->
        <label class="form-label mt-3">URL Slug</label>
        <div class="input-group">
          <span class="slug-prefix">inkwell.com/blog/</span>
          <input type="text" id="postSlug" class="form-control" placeholder="auto-generated-from-title">
        </div>
      </div>

      <!-- Content Editor -->
      <div class="panel">
        <div class="panel-title"><i class="bi bi-body-text"></i> Content</div>
        <div id="quillEditor"></div>
        <div class="d-flex justify-content-between align-items-center mt-2">
          <div class="char-count" id="wordCount">0 words</div>
          <div style="font-size:.75rem;color:var(--muted);">
            Target: <strong>800+</strong> words for SEO
          </div>
        </div>
        <div class="word-bar"><div class="word-bar-fill" id="wordBar"></div></div>
      </div>

      <!-- Excerpt -->
      <div class="panel">
        <div class="panel-title"><i class="bi bi-card-text"></i> Excerpt</div>
        <textarea class="form-control" id="postExcerpt" rows="3"
                  placeholder="A short summary shown on the blog listing page…"
                  maxlength="200" oninput="updateCount(this,'excerptCount',200)"></textarea>
        <div class="char-count" id="excerptCount">0 / 200</div>
      </div>

      <!-- SEO Panel -->
      <div class="panel">
        <div class="panel-title"><i class="bi bi-search"></i> SEO & Meta</div>

        <label class="form-label">Meta Title</label>
        <input type="text" id="metaTitle" class="form-control mb-1"
               placeholder="Optimised title for search engines…"
               maxlength="60" oninput="updateCount(this,'metaTitleCount',60); updateSEOPreview()">
        <div class="char-count" id="metaTitleCount">0 / 60</div>

        <label class="form-label mt-3">Meta Description</label>
        <textarea class="form-control mb-1" id="metaDesc" rows="2"
                  placeholder="Describe the article for search results…"
                  maxlength="160" oninput="updateCount(this,'metaDescCount',160); updateSEOPreview()"></textarea>
        <div class="char-count" id="metaDescCount">0 / 160</div>

        <label class="form-label mt-3">Search Preview</label>
        <div class="seo-preview">
          <div class="seo-url" id="seoUrl">inkwell.com/blog/your-post-slug</div>
          <div class="seo-title" id="seoTitle">Your Post Title</div>
          <div class="seo-desc" id="seoDesc">Your meta description will appear here…</div>
        </div>
      </div>

    </div>

    <!-- ──── RIGHT: Sidebar ──── -->
    <div class="col-lg-4">
      <div class="sidebar-sticky">

        <!-- Publish Settings -->
        <div class="panel">
          <div class="panel-title"><i class="bi bi-send-check"></i> Publish Settings</div>

          <label class="form-label">Status</label>
          <div class="status-toggle mb-3">
            <input type="radio" name="status" id="sDraft" value="draft" checked>
            <label for="sDraft"><i class="bi bi-file-earmark me-1"></i>Draft</label>
            <input type="radio" name="status" id="sPublished" value="published"
                   onchange="toggleSchedule(false)">
            <label for="sPublished"><i class="bi bi-globe me-1"></i>Live</label>
            <input type="radio" name="status" id="sScheduled" value="scheduled"
                   onchange="toggleSchedule(true)">
            <label for="sScheduled"><i class="bi bi-calendar-event me-1"></i>Schedule</label>
          </div>

          <div id="scheduleRow">
            <label class="form-label">Publish Date & Time</label>
            <input type="datetime-local" class="form-control mb-3" id="scheduleDate">
          </div>

          <label class="form-label">Author</label>
          <select class="form-select mb-3">
            <option>Sophia Laurent</option>
            <option>Marcus Chen</option>
            <option>Aya Nakamura</option>
            <option>Lena Hoffmann</option>
          </select>

          <label class="form-label">Category</label>
          <select class="form-select mb-3" id="postCategory">
            <option value="">— Select Category —</option>
            <option>Technology</option>
            <option>Design</option>
            <option>Science</option>
            <option>Culture</option>
            <option>Politics</option>
            <option>Photography</option>
          </select>

          <label class="form-label">Read Time (min)</label>
          <input type="number" class="form-control mb-3" id="readTime"
                 placeholder="Auto-calculated" min="1" max="60" readonly>

          <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" id="chkFeatured">
            <label class="form-check-label" for="chkFeatured" style="font-size:.88rem;">
              Feature on homepage
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="chkComments" checked>
            <label class="form-check-label" for="chkComments" style="font-size:.88rem;">
              Allow comments
            </label>
          </div>
        </div>

        <!-- Cover Image -->
        <div class="panel">
          <div class="panel-title"><i class="bi bi-image"></i> Cover Image</div>

          <div class="drop-zone" id="dropZone">
            <input type="file" id="coverInput" accept="image/*" onchange="previewCover(event)">
            <img id="coverPreview" alt="Cover preview">
            <div id="dropPlaceholder" class="text-center">
              <div class="drop-zone-icon"><i class="bi bi-cloud-arrow-up"></i></div>
              <div class="drop-zone-text">
                <strong>Click to upload</strong> or drag &amp; drop<br>
                PNG, JPG, WEBP up to 5 MB
              </div>
            </div>
          </div>

          <div class="mt-2" id="coverActions" style="display:none;">
            <button class="btn btn-sm w-100"
                    style="border:1px solid var(--border);font-size:.78rem;color:var(--muted);"
                    onclick="removeCover()">
              <i class="bi bi-x-circle me-1"></i>Remove Image
            </button>
          </div>

          <label class="form-label mt-3">Alt Text</label>
          <input type="text" class="form-control" placeholder="Describe the image for accessibility…">
        </div>

        <!-- Tags -->
        <div class="panel">
          <div class="panel-title"><i class="bi bi-tags"></i> Tags</div>
          <div class="tags-wrap" id="tagsWrap" onclick="document.getElementById('tagInput').focus()">
            <input type="text" id="tagInput" placeholder="Add tag, press Enter…"
                   onkeydown="handleTag(event)">
          </div>
          <div class="char-count mt-1">Up to 5 tags</div>
        </div>

        <!-- Action buttons (mobile) -->
        <div class="d-flex gap-2 d-lg-none mt-2">
          <button class="btn-draft w-50" onclick="saveDraft()">Save Draft</button>
          <button class="btn-publish w-50" onclick="submitPost()">
            <i class="bi bi-send me-1"></i>Publish
          </button>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- ═══ SUCCESS TOAST ═══ -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index:9999">
  <div id="toast" class="toast align-items-center text-bg-dark border-0" role="alert">
    <div class="d-flex">
      <div class="toast-body" id="toastMsg">Post published!</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto"
              data-bs-dismiss="toast"></button>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
  // ── Quill init ──
  const quill = new Quill('#quillEditor', {
    theme: 'snow',
    placeholder: 'Tell your story…',
    modules: {
      toolbar: [
        [{ header: [1, 2, 3, false] }],
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],
        [{ list: 'ordered' }, { list: 'bullet' }],
        ['link', 'image'],
        [{ align: [] }],
        ['clean']
      ]
    }
  });

  quill.on('text-change', () => {
    const text  = quill.getText().trim();
    const words = text ? text.split(/\s+/).filter(Boolean).length : 0;
    document.getElementById('wordCount').textContent = `${words} words`;
    document.getElementById('readTime').value = words > 0 ? Math.max(1, Math.round(words / 200)) : '';
    const pct = Math.min(100, (words / 800) * 100);
    document.getElementById('wordBar').style.width = pct + '%';
    triggerAutosave();
  });

  // ── Title → slug ──
  function updateTitle(el) {
    const val = el.value;
    const count = val.length;
    const c = document.getElementById('titleCount');
    c.textContent = `${count} / 120`;
    c.className = 'char-count' + (count > 100 ? ' warn' : '') + (count >= 120 ? ' over' : '');

    const slug = val.toLowerCase()
      .replace(/[^a-z0-9\s-]/g, '')
      .trim().replace(/\s+/g, '-');
    document.getElementById('postSlug').value = slug;
    document.getElementById('seoUrl').textContent = `inkwell.com/blog/${slug || 'your-post-slug'}`;
    document.getElementById('seoTitle').textContent = val || 'Your Post Title';
    triggerAutosave();
  }

  // ── Generic char counter ──
  function updateCount(el, countId, max) {
    const count = el.value.length;
    const c = document.getElementById(countId);
    c.textContent = `${count} / ${max}`;
    c.className = 'char-count' + (count > max * .85 ? ' warn' : '') + (count >= max ? ' over' : '');
  }

  // ── SEO preview ──
  function updateSEOPreview() {
    const t = document.getElementById('metaTitle').value;
    const d = document.getElementById('metaDesc').value;
    if (t) document.getElementById('seoTitle').textContent = t;
    if (d) document.getElementById('seoDesc').textContent = d;
  }

  // ── Cover image ──
  function previewCover(e) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = ev => {
      const img = document.getElementById('coverPreview');
      img.src = ev.target.result;
      img.style.display = 'block';
      document.getElementById('dropPlaceholder').style.display = 'none';
      document.getElementById('coverActions').style.display = 'block';
    };
    reader.readAsDataURL(file);
  }

  function removeCover() {
    document.getElementById('coverPreview').style.display = 'none';
    document.getElementById('dropPlaceholder').style.display = 'flex';
    document.getElementById('coverActions').style.display = 'none';
    document.getElementById('coverInput').value = '';
  }

  // Drag-over highlight
  const dz = document.getElementById('dropZone');
  dz.addEventListener('dragover',  e => { e.preventDefault(); dz.classList.add('dragover'); });
  dz.addEventListener('dragleave', () => dz.classList.remove('dragover'));
  dz.addEventListener('drop',      e => { e.preventDefault(); dz.classList.remove('dragover'); });

  // ── Tags ──
  const tags = [];
  function handleTag(e) {
    if (e.key !== 'Enter' && e.key !== ',') return;
    e.preventDefault();
    const val = e.target.value.trim().replace(/,/g, '');
    if (!val || tags.includes(val) || tags.length >= 5) return;
    tags.push(val);
    const chip = document.createElement('span');
    chip.className = 'tag-chip';
    chip.innerHTML = `${val} <button onclick="removeTag('${val}', this.parentElement)">×</button>`;
    document.getElementById('tagsWrap').insertBefore(chip, e.target);
    e.target.value = '';
  }
  function removeTag(val, chip) {
    tags.splice(tags.indexOf(val), 1);
    chip.remove();
  }

  // ── Schedule toggle ──
  function toggleSchedule(show) {
    document.getElementById('scheduleRow').style.display = show ? 'block' : 'none';
  }

  // ── Autosave indicator ──
  let saveTimer;
  function triggerAutosave() {
    clearTimeout(saveTimer);
    document.getElementById('autosaveLabel').innerHTML =
      '<i class="bi bi-arrow-repeat me-1"></i>Saving…';
    saveTimer = setTimeout(() => {
      document.getElementById('autosaveLabel').innerHTML =
        '<i class="bi bi-cloud-check me-1"></i>Draft auto-saved';
    }, 1200);
  }

  // ── Actions ──
  function showToast(msg) {
    document.getElementById('toastMsg').textContent = msg;
    new bootstrap.Toast(document.getElementById('toast')).show();
  }

  function saveDraft() {
    showToast('✓ Draft saved successfully.');
    document.getElementById('autosaveLabel').innerHTML =
      '<i class="bi bi-cloud-check me-1"></i>Draft saved';
  }

  function submitPost() {
    const title = document.getElementById('postTitle').value.trim();
    const cat   = document.getElementById('postCategory').value;
    if (!title) { alert('Please enter a post title.'); return; }
    if (!cat)   { alert('Please select a category.'); return; }
    const status = document.querySelector('input[name="status"]:checked').value;
    const msg = status === 'published' ? '🎉 Post published!' :
                status === 'scheduled' ? '📅 Post scheduled!' : '💾 Draft saved!';
    showToast(msg);
  }
</script>
</body>
</html>
