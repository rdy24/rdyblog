<script>
  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    const blob = URL.createObjectURL(image.files[0]);
    imgPreview.src = blob;
  }
</script>