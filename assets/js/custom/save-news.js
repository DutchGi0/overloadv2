tinymce.init({
    selector: 'textarea#tinymce',
    plugins: [
        "advlist",
        "lists",
        "anchor",
        "autolink",
        "autosave",
        "link",
        "image",
        "preview",
        "table",
        "wordcount",
        "autoresize",
        "searchreplace",
        "pagebreak",
        "action",
        "section"
    ],
    a_plugin_option: true,
    visualchars_default_state: true,
    toolbar1:
        "undo redo | fontselect styleselect fontsizeselect  | bold italic underline | alignleft aligncenter alignright alignjustify | restoredraft bullist numlist outdent indent | wordcount searchreplace |  action section  ",
    toolbar2:
        "link anchor image | preview | forecolor backcolor pagebreak | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol",
    font_formats:"Segoe UI=Segoe UI;",
    fontsize_formats: "8px 9px 10px 11px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px 52px 54px 56px 58px 60px 62px 64px 66px 68px 70px 72px 74px 76px 78px 80px 82px 84px 86px 88px 90px 92px 94px 94px 96px",
    height: 400,
});

$(document).ready(function() {
    $('#save-content-form').on('submit', function(e) {
        e.preventDefault();

        var data = $('#save-content-form').serializeArray();
        data.push({name: 'content', value: tinyMCE.get('tinymce').getContent()});

        $.ajax({
            type: 'POST',
            url: window.location.origin+'/newoverload/pages/write-save.php',
            data: data,
            success: function (response, textStatus, xhr) {
                console.log(response)
                alert("News created successfully, publish the news article to make it visible to the public.");
                window.location.href = "all-news.php";
            },
            complete: function (xhr) {

            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                var response = XMLHttpRequest;

            }
        });
    });
});