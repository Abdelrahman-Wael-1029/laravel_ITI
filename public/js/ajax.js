async function Ajax(method, url, data, image = false) {
    let respo = null;
    await $.ajax({
        url: url,
        method: method,
        data: data,
        dataType: "JSON",
        contentType: !image ? "application/x-www-form-urlencoded" : false,
        cache: !image ? true : false,
        processData: false,
        success: function (response) {
            respo = response;
        },
        error: function (error) {
            respo = error;
        },
    });
    return respo;
}
