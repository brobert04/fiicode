<!-- jQuery -->
<script src="{{ asset('../assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('../assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('../assets/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(function () {
      bsCustomFileInput.init();
    });
</script>
<script>
    const preview = (file) => {
        const fr = new FileReader();
        fr.onload = () => {
        const img = document.createElement("img");
        img.src = fr.result;  // String Base64 
        img.alt = file.name;
        img.style.maxHeight = "100px";
        img.classList.add('img-thumbnail');
        document.querySelector('#preview-image').append(img);
        };
        fr.readAsDataURL(file);
    };

    document.querySelector("#customFile1").addEventListener("change", (ev) => {
        if (!ev.target.files) return; // Do nothing.
        [...ev.target.files].forEach(preview);
    });
    document.querySelector("#customFile2").addEventListener("change", (ev) => {
        if (!ev.target.files) return; // Do nothing.
        [...ev.target.files].forEach(preview);
    });
    document.querySelector("#customFile3").addEventListener("change", (ev) => {
        if (!ev.target.files) return; // Do nothing.
        [...ev.target.files].forEach(preview);
    });
</script>