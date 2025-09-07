const image = document.getElementById("image");
    const imageName = document.getElementById("imageName");
    const imagePreview = document.getElementById("imagePreview");
    const previewImg = document.getElementById("previewImg");
    const btnSubmit = document.getElementById("btnSubmit");

    image.addEventListener("change", function() {
        const file = this.files[0];

        if (file) {
            // Mostrar nome do arquivo
            imageName.textContent = file.name;

            // Mostrar preview da imagem
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                imagePreview.style.display = 'block';
                btnSubmit.disabled = false;
            };
            reader.readAsDataURL(file);
        } else {
            imageName.textContent = "Nenhum arquivo selecionado";
            imagePreview.style.display = 'none';
            btnSubmit.disabled = true;
        }
    });

    function removeImage() {
        image.value = '';
        imageName.textContent = "Nenhum arquivo selecionado";
        imagePreview.style.display = 'none';
        btnSubmit.disabled = true;
    }