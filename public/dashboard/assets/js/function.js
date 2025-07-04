//Image Cropping Function
function cropImage(inputObj, newInputID='',cropHeight=150, cropWidth=150, viewImgID='', minWidth = 0, minHeight = 0, maxWidth = 0, maxHeight = 0, allowedTypes = ['image/jpeg', 'image/png', 'image/gif'],maxFileSize = 5) {
    var modalHTML = `
        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h1 class="modal-title fs-5" id="modalLabel">Crope Image
                            <span class="text-info fs-5">NB:Height:`+cropHeight+`,Width:`+cropWidth+`</span>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><button>
                    </div>
                    <div class="modal-body">
                        <div class="img-container">
                            <div class="row">
                                <div class="col-md-8">
                                    <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                </div>
                                <div class="col-md-4">
                                    <div class="cropper-preview"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                    </div>
                </div>
            </div>
        </div>
    `;
    $('body').append(modalHTML);
    var files = inputObj.files;
    var oldInputImgId = inputObj.id;
    var $modal = $('#modal');
    var image = document.getElementById('image');
    var cropper;
    // console.log( inputObj);

    if (files && files.length > 0) {
        var file = files[0];

        // Check file size
        if (file.size > (maxFileSize* 1024 * 1024)) {
            alert('The file size exceeds the ' + (maxFileSize) + ' MB limit.');
            inputObj.value = '';
            return;
        }

        // Check MIME type
        if (!allowedTypes.includes(file.type)) {
            alert('Invalid file type. Only ' + allowedTypes.join(', ') + ' files are allowed.');
            inputObj.value = '';
            return;
        }

        var reader = new FileReader();
        reader.onload = function (e) {
            var img = new Image();
            img.src = e.target.result;

            img.onload = function() {

                var imgWidth = img.width;
                var imgHeight = img.height;

                if (minWidth>0 && maxWidth==0)      { maxWidth = minWidth; }    //Dafault max-Width will be min-Width
                if (minHeight>0 && maxHeight==0)    { maxHeight = minHeight; } //Dafault max-Height will be min-Height

                // Check image dimensions
                if (minWidth>0 && (imgWidth < minWidth || imgHeight < minHeight)) {
                    alert('Image dimensions are too small. Minimum width and height are ' + minWidth + 'x' + minHeight + '.');
                    inputObj.value = '';
                    return;
                }
                if (maxWidth>0 && (imgWidth > maxWidth || imgHeight > maxHeight)) {
                    alert('Image dimensions are too large. Maximum width and height are ' + maxWidth + 'x' + maxHeight + '.');
                    inputObj.value = '';
                    return;
                }

                image.src = e.target.result;
                $modal.modal('show');

                // Initialize Cropper when the modal is shown
                $modal.on('shown.bs.modal', function () {
                    cropper = new Cropper(image, {
                        aspectRatio: cropWidth / cropHeight,
                        viewMode: 2,    // Adjust the view mode as needed
                        preview: '.cropper-preview',
                        cropBoxResizable: false, // Disable crop box resizing
                        dragMode: 'none', // Disable dragging of the crop box
                    });
                }).on('hidden.bs.modal', function () {
                    cropper.destroy();
                    cropper = null;
                });

                // Handle the crop button click
                $("#crop").click(function(){
                    var canvas = cropper.getCroppedCanvas({
                        width: cropWidth,
                        height: cropHeight,
                    });

                    canvas.toBlob(function(blob) {
                        var url = URL.createObjectURL(blob);
                        var reader = new FileReader();
                        reader.readAsDataURL(blob);
                        reader.onloadend = function() {
                            var base64data = reader.result;
                            // console.log(inputObj);

                            if (newInputID) { // Update hidden input value
                                $(`#${newInputID}`).val(base64data);
                            } else {
                                $(`#${oldInputImgId}`).val(base64data);
                            }


                            if (viewImgID!='') { //Image Viewer
                                $(`#${viewImgID}`).show();
                                $(`#${viewImgID}`).attr("src", base64data);
                            }
                            $modal.modal('toggle');
                        }
                    });
                });
            };
        };
        reader.readAsDataURL(file);
    }
}

// Upload image Preview
let loadFile = function(event,previewClass) {
    var output = document.getElementById(previewClass);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};
