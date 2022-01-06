//Preview Image
$(function () {
    $("#imageInput").change(function (event) {
        var x = URL.createObjectURL(event.target.files[0]);
        $("#uploadImg").attr("src", x);
        console.log(event);
    });
});
