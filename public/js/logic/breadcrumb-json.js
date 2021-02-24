
    // declare counter for data-id
    var counter = 2;

    // declare first two json-ld breadcrumbs component
    var main = {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "",
                "item": "",
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "",
                "item": "",
            }
        ]
    }

    function jsonFormat() {
        $("#json-format").val("<script type=\"application/ld+json\">\n" + JSON.stringify(main, undefined, 4) + "\n<\/script>");
    }

    let deletes = lang ==='en'? 'Delete' : 'Hapus';
    let pageName = lang ==='en'? 'PageName': 'Nama Halaman';
    let url = lang === 'en'?'Url':'Url';

    // call JsonFormat for showing json-ld script
    jsonFormat();

    function addBreadcrumb(){
        counter++;
        main.itemListElement.push({
            "@type": "ListItem",
            "position": counter,
            "name": "",
            "item": "",
        });
        jsonFormat();
        $('#formbreadcrumb').append("<div class='row form-cotainer' data-id='"+(counter)+"'><input type='hidden' id='itemListLength' value='"+(main.itemListElement.length)+"'><div class='col-10 col-sm-11'><div class='row'><div class='col-sm-5'><label for='pageName' class='font-weight-bold'>Page #"+(counter)+" name</label><input type='text' id='pageName' class='form-control  mb-5 pageName' name='' placeholder='Type your name here..' value='' data-id='"+(counter)+"'></div><div class='col-sm-7'><label for='url' class='font-weight-bold'>URL #"+(counter)+"</label><input type='text' id='url' class='form-control mb-5 url' name='' placeholder='Type your URL here..' value='' data-id='"+(counter)+"'></div></div></div><div class='col-2 col-sm-1'><div class='d-flex justify-content-center mt-9'><i class='bx bxs-x-circle bx-md delete' data-id='"+(counter)+"'></i></div></div></div>");
        let row = parseInt(jQuery('#json-format').val().split('\n').length);
        $('#json-format').attr('rows',row);
        sticky.update();
    }

    function deleteBreadcrumb(index){
        if(index > 2){
            main.itemListElement.splice($('#itemListLength').val() - 1, 1);
            jsonFormat();
            $('.form-cotainer[data-id=' + (counter) + ']').remove();
            let row = parseInt(jQuery('#json-format').val().split('\n').length);
            $('#json-format').attr('rows',row);
            counter--;
        }
        sticky.update();
    }

    function updateJSON_item(index, url){

        /*
        *
        * Adding regex url
        * */

        var expression = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi;
        var regex = new RegExp(expression);

        if(counter > 2){
            if (url.match(regex)) {
                main.itemListElement[index-1].item = url;
                jsonFormat();
            } else {
                console.log('no match')
                // alert("No match");
            }
        }else{
            if (url.match(regex)) {
                main.itemListElement[index].item = url;
                jsonFormat();
            } else {
                console.log('no match')
                // alert("No match");
            }
        }
    }

    function updateJSON_name(index, value){
        if(counter > 2){
            main.itemListElement[index-1].name = value;
            jsonFormat();
        }else{
            main.itemListElement[index].name = value;
            jsonFormat();
        }

    }


    $('#add-breadcrumb').click(function () {
        addBreadcrumb();
    });

    $(document).on('click', '.delete', function () {
        deleteBreadcrumb(parseInt($(this).data('id')));
    });

    $(document).on('keyup', '.url', function () {
        updateJSON_item(parseInt($(this).data('id')), $(this).val());
    });

    $(document).on('keyup', '.pageName', function () {
        updateJSON_name(parseInt($(this).data('id')), $(this).val());
    });

    $('#copy').click(function () {
        var copyText = jQuery('#json-format');
        copyText.select();
        document.execCommand("copy");
    });
