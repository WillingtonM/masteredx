  <!-- <script src="https://cdn.tiny.cloud/1/pyxhldi7tlm3orj3sorroa9hzpcqrn24fc3frplxuk7sonz0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->

<div class="container">

  <br><br><br><br><br>
  <textarea id="mytextarea" cols="80">
    Welcome to your TinyMCE premium trial!
  </textarea>
  <script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'a11ychecker advcode casechange formatpainter linkchecker lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
    toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
    toolbar_drawer: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name'
  });
  </script>
</div>
