<button aria-labelby="Back to Top" onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<footer>
    <div class="text-center text-white">
        <p>&copy;2023 <span class="text-primary">Overload RSPS</span> | Design by Gio | Overload is not affiliated with Jagex or Runescape in any way</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous" type="text/javascript" ></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous" ></script>
<script src="https://cdn.tiny.cloud/1/x20ggc5jdqt93hhssiqbb14qis9g3ga3vlzcn3kafgwfpj32/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="../assets/js/tinymce/tinymce.min.js"></script>
<script>
    // Get the button:
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }

    function BackFunction() {
        window.history.back();
    }
</script>

<script>
    // Prevent Bootstrap dialog from blocking focusin
    document.addEventListener('focusin', (e) => {
        if (e.target.closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
            e.stopImmediatePropagation();
        }
    });
</script>

<script type="text/javascript">
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
</script>

<script type="text/javascript" rel="import" href="">
    tinymce.init({
        selector: 'textarea#update',
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
        ],
        a_plugin_option: true,
        visualchars_default_state: true,
        toolbar1:
            "undo redo | fontselect styleselect fontsizeselect  | bold italic underline | alignleft aligncenter alignright alignjustify | restoredraft bullist numlist outdent indent | wordcount searchreplace |  action section ",
        toolbar2:
            "link anchor image | preview | forecolor backcolor pagebreak | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol",
        font_formats:"Segoe UI=Segoe UI;",
        fontsize_formats: "8px 9px 10px 11px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px 52px 54px 56px 58px 60px 62px 64px 66px 68px 70px 72px 74px 76px 78px 80px 82px 84px 86px 88px 90px 92px 94px 94px 96px",
        height: 400,
    });

    $(document).ready(function() {
        $('#upadate-content-form').on('submit', function(e) {
            e.preventDefault();

            var data = $('#upadate-content-form').serializeArray();
            data.push({name: 'content', value: tinyMCE.get('update').getContent()});

            $.ajax({
                type: 'POST',
                url: window.location.origin+'/newoverload/pages/news-update.php',
                data: data,
                success: function (response, textStatus, xhr) {
                    console.log(response)
                    alert("News updated successfully");
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
</script>


</body>
</html>