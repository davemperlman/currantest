<?php 
require_once 'header.php';
?>
<form method="post" id="imgupload" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="upload.php" runat="server">
    <h3>Complete Job</h3>
    <a class="close" href="#">Back</a>
    <fieldset>
        <label id="imgUploadLabel">
            Choose Images
            <input type="file" name="images[]" id="images" multiple onchange="readURL(this);" >
        </label>
        <div class="images_preview">

        </div>
    </fieldset>
    <fieldset>
        <label>
            Work Completed
            <textarea rows="5"></textarea>
        </label>
        <label>
            Inventory Used
            <input type="text">
        </label>
    </fieldset>
    <button>Submit</button>
</form>

<script type="text/javascript">
        function readURL(input) {

                $(this).next('.images_preview').empty();
                $.each(input.files, function(index, val) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.images_preview').append("<img class='thumbnail' src='" + e.target.result + "'>");
                    }

                reader.readAsDataURL(input.files[index]);
                });
            }

            $('.close').on('click', function(e){
                e.preventDefault();
                $('.completeOrder').removeClass('inView');
            })
</script>