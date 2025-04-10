
const dropAreaLabel = document.querySelector('#drop-area');
const uploadFileInput = document.querySelector('#input-upload-item');
const imgViewContainer = document.querySelector('#image-view-container');

// Handle preview
const uploadFile = () => {
    let imgLink = URL.createObjectURL(uploadFileInput.files[0]);
    console.log(imgLink);
    if(imgLink) {
        imgViewContainer.style.backgroundImage = `url(${imgLink})`;
        imgViewContainer.textContent = "";
    }
};

uploadFileInput.addEventListener('change', uploadFile);
