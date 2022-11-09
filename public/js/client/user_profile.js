$(document).ready(function() {
    var getImageLink;

    function showImage() {
        const fileInput = document.querySelector('input[type="file"]');
        const preview = document.querySelector('img.preview');
        const reader = new FileReader();

        function handleEvent(event) {
            if (event.type === "load") {
                preview.src = reader.result;
                getImageLink = uploadServer();
                console.log(getImageLink.getAll('file'));
            }
        }

        function addListeners(reader) {
            reader.addEventListener('load', handleEvent);
            reader.addEventListener('change', handleEvent);
        }

        function handleSelected(e) {
            const selectedFile = fileInput.files[0];
            if (selectedFile) {
                addListeners(reader);
                reader.readAsDataURL(selectedFile);
            }
        }
        fileInput.addEventListener('change', handleSelected);
    }
    showImage();
    // document.getElementById("avatar").addEventListener ("click", uploadServer);
    function uploadServer() {
        let check = document.querySelector('input[type="file"]').files[0];
        let formData = new FormData();
        formData.append('file', document.querySelector('input[type="file"]').files[0]);
        formData.append('name', document.querySelector('input[type="file"]').files[0].name);
        return formData;
    };
    $('#saveFormAccount').click(function() {
        let settings = {
            headers: {
                'content-type': 'multiart / form-data'
            }
        }
        if (getImageLink == undefined) {
            getImageLink = "";
        }
        axios
            .post('/customer/account/updateImage', getImageLink, settings)
            .then((res) => {})
            .catch((res) => {
                var listError = res.response.data.errors;
                $.each(listError, function(key, value) {
                    toastr.error(value[0]);
                });
            });
    });
    $('#editFormAccount').click(function() {
        if ($('#edit_form .form-control').attr('readonly') == 'readonly') {
            $('#edit_form .form-control').removeAttr("readonly");
            $('#edit_form select').removeAttr("disabled");
        } else {
            $('#edit_form .form-control').attr('readonly', 'readonly');
            $('#edit_form select').attr('disabled', 'disabled');
        }
        $('input[type="email"]').attr('readonly', 'readonly');
        if ($('#edit_form .form-control').attr('readonly') == 'readonly') {
            $('#saveFormAccount').attr('disabled', 'disabled');
        } else {
            $('#saveFormAccount').removeAttr('disabled');
        }
    });

    $('#edit_form').submit(function(e) {
        e.preventDefault();
        let payLoad = window.getFormData($(this));
        console.log(payLoad);
        axios
            .post('/customer/account/updateAccount', payLoad)
            .then((res) => {
                if (res.data.status) {
                    toastr.success('Cập nhập thành công!');
                }
            })
            .catch((res) => {
                var listError = res.response.data.errors;
                $.each(listError, function(key, value) {
                    toastr.error(value[0]);
                });
            });
    });
});
