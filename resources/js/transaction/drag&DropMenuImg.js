
const menuItemStoreForm = document.querySelector('#menu_item_store');
const dropAreaLabel = document.querySelector('#drop-area'); // <label>
const uploadFileInput = document.querySelector('#input-upload-item'); // <input type="file">
const imgViewContainer = document.querySelector('#image-view-container');


menuItemStoreForm.addEventListener('submit', (e) => {
    const file = uploadFileInput.files[0];

    if (!file) {
        e.preventDefault(); // Stop the form from submitting
        alert("Upload an image first");
    }
});


const uploadFile = () => {
    let imgLink = URL.createObjectURL(uploadFileInput.files[0]);
    console.log(imgLink);
    if(imgLink) {
        imgViewContainer.style.backgroundImage = `url(${imgLink})`;
        imgViewContainer.textContent = "";
    }
};


uploadFileInput.addEventListener('change', uploadFile);

dropAreaLabel.addEventListener('dragover', (e) => {
    e.preventDefault();
});

dropAreaLabel.addEventListener('drop', (e) => {
    e.preventDefault();
    uploadFileInput.files = e.dataTransfer.files;
    uploadFile();
});