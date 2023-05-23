let uploadPhoto = document.getElementById("file-upload");

if (uploadPhoto !== null) {
    uploadPhoto.addEventListener('change', (picture) => {
        let selectedFile = picture.target.files[0];
        changeImage(selectedFile);
    
        if (selectedFile) {
            let formData = new FormData();
            formData.append('file', selectedFile);
            let request = new XMLHttpRequest();
    
            request.open('POST', 'http://localhost:8888/templates/blocks/script/saveAvatar.php', true);
            request.send(formData);
    
        }
        else {
            console.log('No file selected');
        }
    });
}

let changeImage = (file) => {
    let reader = new FileReader();
    reader.onload = (picture) => {
      let imgElement = document.getElementById('avatar');
      imgElement.src = picture.target.result;
    };
    reader.readAsDataURL(file);
  }