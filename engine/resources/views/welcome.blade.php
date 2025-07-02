<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Quill Editor Lengkap + Preview</title>

  <!-- Quill 2.0.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/quill-emoji@0.2.2/dist/quill-emoji.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/quill-mention@2.2.6/dist/quill.mention.min.css" rel="stylesheet">
  <style>
    #editor-container {
      height: 300px;
      margin-bottom: 20px;
    }
    .ql-editor img.float-left {
      float: left;
      margin: 0 10px 10px 0;
    }
    .ql-editor img.float-right {
      float: right;
      margin: 0 0 10px 10px;
    }
    #preview-container {
      border: 1px solid #ccc;
      padding: 15px;
      margin-top: 20px;
    }
    .ql-font-serif { font-family: serif; }
    .ql-font-monospace { font-family: monospace; }
    .ql-font-sans { font-family: sans-serif; }
  </style>
</head>
<body>
  <h2>Quill Editor Lengkap</h2>
  <div id="toolbar">
    <select class="ql-font">
      <option selected></option>
      <option value="serif"></option>
      <option value="monospace"></option>
      <option value="sans"></option>
    </select>
    <select class="ql-size">
      <option value="small"></option>
      <option selected></option>
      <option value="large"></option>
      <option value="huge"></option>
    </select>
    <button class="ql-bold"></button>
    <button class="ql-italic"></button>
    <button class="ql-underline"></button>
    <select class="ql-header">
      <option value="1"></option>
      <option value="2"></option>
      <option selected></option>
    </select>
    <button class="ql-list" value="bullet"></button>
    <button class="ql-image"></button>
    <button class="ql-video"></button>
    <button class="ql-emoji"></button>
    <button id="wrap-left-btn">⬅️ Wrap Left</button>
    <button id="wrap-right-btn">➡️ Wrap Right</button>
  </div>

  <div id="editor-container"></div>

  <button id="previewBtn">👁️ Preview</button>
  <button id="saveBtn">💾 Simpan Konten</button>

  <div id="preview-container" style="display: none;">
    <h3>Preview Konten:</h3>
    <div id="preview-content"></div>
  </div>

  @if(isset($content))
    <div style="margin-top:31px;">
      <h3>Konten dari Database:</h3>
      <div style="border:1px solid #ccc; padding:15px;">
        {!! $content->content !!}
      </div>
    </div>
  @endif

  <!-- Quill 2.0.3 JS & Plugins -->
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/quill-mention@2.2.6/dist/quill.mention.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/quill-emoji@0.2.2/dist/quill-emoji.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>

  <script>
    // Register imageResize for Quill 2
    if (!Quill.imports['modules/imageResize']) {
      Quill.register('modules/imageResize', window.ImageResize.default || window.ImageResize);
    }

    // Register font whitelist for Quill 2
    const Font = Quill.import('formats/font');
    Font.whitelist = ['serif', 'monospace', 'sans'];
    Quill.register(Font, true);

    // Quill 2.0.3 initialization
    const quill = new Quill('#editor-container', {
      theme: 'snow',
      placeholder: 'Tulis konten di sini...',
      modules: {
        toolbar: '#toolbar',
        imageResize: {},
        mention: {
          allowedChars: /^[A-Za-z\s]*$/,
          mentionDenotationChars: ["@"],
          source: function (searchTerm, renderList) {
            const values = [
              { id: 1, value: "admin" },
              { id: 2, value: "editor" },
              { id: 3, value: "user" },
            ];
            renderList(values.filter(v => v.value.toLowerCase().includes(searchTerm.toLowerCase())));
          }
        },
        'emoji-toolbar': true,
        'emoji-textarea': false,
        'emoji-shortname': true
      }
    });

    // Custom image upload handler (embed image as base64)
    quill.getModule('toolbar').addHandler('image', () => {
      const input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');
      input.click();

      input.onchange = () => {
        const file = input.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = () => {
          const range = quill.getSelection(true);
          quill.insertEmbed(range.index, 'image', reader.result, Quill.sources.USER);
          quill.setSelection(range.index + 1, Quill.sources.SILENT);
        };
        reader.readAsDataURL(file);
      };
    });

    // Fungsi wrap image kiri atau kanan
    function wrapImage(direction) {
      const range = quill.getSelection();
      if (!range) return;
      const [imgBlot] = quill.scroll.descendant(Quill.import('formats/image'), range.index);
      if (imgBlot) {
        const img = imgBlot.domNode;
        img.classList.remove('float-left', 'float-right');
        img.classList.add(`float-${direction}`);
      }
    }

    document.getElementById('wrap-left-btn').addEventListener('click', () => wrapImage('left'));
    document.getElementById('wrap-right-btn').addEventListener('click', () => wrapImage('right'));

    // Tombol preview
    document.getElementById('previewBtn').addEventListener('click', () => {
      const html = quill.root.innerHTML;
      const preview = document.getElementById('preview-content');
      const previewContainer = document.getElementById('preview-container');
      preview.innerHTML = html;
      previewContainer.style.display = 'block';
    });

    // Tombol simpan konten ke server
    document.getElementById('saveBtn').addEventListener('click', () => {
      const html = quill.root.innerHTML;
      const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      fetch('/save-editor', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({ content: html })
      })
      .then(res => res.text())
      .then(text => {
        console.log("Response from server:", text);
        alert('Cek console untuk respon dari server');
      })
      .catch(err => {
        console.error('Error:', err);
        alert('Gagal menyimpan konten');
      });
    });
  </script>
</body>
</html>

<p><img src="https://bpmpntb.kemendikdasmen.go.id/upload/berita/20250611005136.png"></p>