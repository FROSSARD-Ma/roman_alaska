
tinymce.init({
  selector: '#chapter_content',  // chapter writing by admin
  menubar: false,
  style_formats:
  [
    { title: 'Headings', items:
      [
        { title: 'Titre 1', format: 'h1' },
        { title: 'Titre 2', format: 'h2' },
        { title: 'Titre 3', format: 'h3' }
      ]
    }
  ],
  toolbar: 'styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent',
  browser_spellcheck: true, // correcteur orthographe du navigateur
  spellchecker_languages: 'French=fr_FR',
  height : 500
});
