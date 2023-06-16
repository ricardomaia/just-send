const uploadForm = document.querySelector('.upload-form');
const filesInput = uploadForm.querySelector('#files');
filesInput.onchange = () => {
    uploadForm.querySelector('label').innerHTML = '';
    for (let i = 0; i < filesInput.files.length; i++) {
        uploadForm.querySelector('label').innerHTML += '<span><i class="fa-solid fa-file"></i>' + filesInput.files[i].name + '</span>';
    }
};

uploadForm.onsubmit = event => {
    event.preventDefault();
    if (!filesInput.files.length) {
        uploadForm.querySelector('.result').innerHTML = 'Por favor selecione um arquivo!';
    } else {

        let uploadFormDate = new FormData(uploadForm);
        let request = new XMLHttpRequest();

        request.open('POST', uploadForm.action);

        request.upload.addEventListener('progress', event => {

            uploadForm.querySelector('button').innerHTML = 'Enviando... ' + '(' + ((event.loaded / event.total) * 100).toFixed(2) + '%)';
            // Update the progress bar
            uploadForm.querySelector('.progress').style.background = 'linear-gradient(to right, #25b350, #25b350 ' + Math.round((event.loaded / event.total) * 100) + '%, #e6e8ec ' + Math.round((event.loaded / event.total) * 100) + '%)';
            // Disable the submit button
            uploadForm.querySelector('button').disabled = true;
        });
        // The following code will execute when the request is complete
        request.onreadystatechange = () => {
            if (request.readyState == 4 && request.status == 200) {
                // Output the response message
                uploadForm.querySelector('.result').innerHTML = request.responseText;
            }
        };
        // Execute request
        request.send(uploadFormDate);
    }
};