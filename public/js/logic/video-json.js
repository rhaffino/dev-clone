var imageUrlCounter = 0;

let invalid_url = lang === "en" ? "Invalid URL" : "URL Tidak Valid";
let label_image = lang === "en" ? "Image URL" : "URL Gambar";
let placeholder_image = lang ==='en'? 'Type image url here..' : 'Ketik url gambar di sini..';

const videoSchema = class {
    constructor() {
        this.name = '';
        this.description = '';
        this.thumbnailUrl = [""];
        this.uploadDate = "";
        this.duration = "";
        this.contentUrl = "";
        this.embedUrl = "";
        this.potentialAction = undefined; 

        // Temp
        this.tempDurationMinutes = 0;
        this.tempDurationSeconds = 0;
    }

    resetrender(){
        imageUrlCounter = 0;

        this.name = "";
        this.description = "";
        this.thumbnailUrl = [""];
        this.uploadDate = "";
        this.duration = "";
        this.contentUrl = "";
        this.embedUrl = "";
        this.potentialAction = undefined;
        
        // Temp
        this.tempDurationMinutes = 0;
        this.tempDurationSeconds = 0;
        
        const obj = {
            "@context": "https://schema.org",
            "@type": "VideoObject",
            "name": this.name,
            "description": this.description,
            "thumbnailUrl": this.thumbnailUrl.length === 1 ? this.thumbnailUrl[0] : this.thumbnailUrl,
            "uploadDate": this.uploadDate,
        }

        obj.name = this.name;
        obj.description = this.description;
        
        if (this.thumbnailUrl) {
            if (this.thumbnailUrl.length > 0) {
                if (this.thumbnailUrl.length === 1) {
                    obj.thumbnailUrl = this.thumbnailUrl[0];
                } else {
                    obj.thumbnailUrl = this.thumbnailUrl;
                }
            }
        }

        obj.uploadDate = this.uploadDate;
        if (this.duration) obj.duration = this.duration;
        if (this.contentUrl) obj.contentUrl = this.contentUrl;
        if (this.embedUrl) obj.embedUrl = this.embedUrl;
        if (this.potentialAction) obj.potentialAction = this.potentialAction;

        $("#json-format").val("<script type=\"application/ld+json\">\n" + JSON.stringify(obj, undefined, 4) + "\n<\/script>");

        return obj;
    }

    temp(){

        const tempObj = {};
        
        tempObj.tempDurationMinutes = this.tempDurationMinutes;
        tempObj.tempDurationSeconds = this.tempDurationSeconds;

        return tempObj;
    }

    render(){
        const obj = {
            "@context": "https://schema.org",
            "@type": "VideoObject",
            "name": this.name,
            "description": this.description,
            "thumbnailUrl": this.thumbnailUrl.length === 1 ? this.thumbnailUrl[0] : this.thumbnailUrl,
            "uploadDate": this.uploadDate,
        }


        obj.name = this.name;
        obj.description = this.description;
        
        if (this.thumbnailUrl) {
            if (this.thumbnailUrl.length > 0) {
                if (this.thumbnailUrl.length === 1) {
                    obj.thumbnailUrl = this.thumbnailUrl[0];
                } else {
                    obj.thumbnailUrl = this.thumbnailUrl;
                }
            }
        }

        obj.uploadDate = this.uploadDate;   
        if (this.duration) obj.duration = this.duration;  
        if (this.contentUrl) obj.contentUrl = this.contentUrl;
        if (this.embedUrl) obj.embedUrl = this.embedUrl; 
        if (this.potentialAction) obj.potentialAction = this.potentialAction;  

        $("#json-format").val("<script type=\"application/ld+json\">\n" + JSON.stringify(obj, undefined, 4) + "\n<\/script>");

        return obj;

    }
}

let videoFormat = new videoSchema();
videoFormat.render();

/*
 * Adding regex url
 * */
var expression =
    /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi;
var regex = new RegExp(expression);

// All Function
function updateJSON_name(value) {
    videoFormat.name = value;
    videoFormat.render();
}

function updateJSON_desc(value) {
    videoFormat.description = value;
    videoFormat.render();
}

function updateJSON_uploadDate(value) {
    videoFormat.uploadDate = value;
    videoFormat.render();
}

function updateJSON_minutes(value) {
    if(value){
        if(value < 0 || value == null){
            $(".minutes").addClass("is-invalid")
            videoFormat.tempDurationMinutes = 0;
        }else{
            $(".minutes").removeClass("is-invalid");
            videoFormat.tempDurationMinutes = value;
            videoFormat.duration = "PT" + videoFormat.tempDurationMinutes + "M"+ videoFormat.tempDurationSeconds +"S";
            
            videoFormat.temp();
            videoFormat.render();
        }
    }else{
        videoFormat.tempDurationMinutes = 0;
        videoFormat.duration = "PT" + videoFormat.tempDurationMinutes + "M"+ videoFormat.tempDurationSeconds +"S";
        videoFormat.render();
    }
}

function updateJSON_seconds(value) {
    if(value){
        if(value < 0 || value == null){
            $(".seconds").addClass("is-invalid");
            videoFormat.tempDurationSeconds = 0;
        }else{
            $(".seconds").removeClass("is-invalid");
            videoFormat.tempDurationSeconds = value;
            videoFormat.duration = "PT" + videoFormat.tempDurationMinutes + "M"+ videoFormat.tempDurationSeconds +"S";
            
            videoFormat.temp();
            videoFormat.render();
        }
    }else{
        videoFormat.tempDurationSeconds = 0;
        videoFormat.duration = "PT" + videoFormat.tempDurationMinutes + "M"+ videoFormat.tempDurationSeconds +"S";
        videoFormat.render();
    }
}

function updateJSON_image(id, value){
    if(value){
        if (value.match(regex)) {
            $(".image[data-id="+ id +"]").removeClass("is-invalid");
            $(".invalid-feedback.image[data-id=" + id + "]").hide();
        } else {
            $(".image[data-id="+ id +"]").addClass("is-invalid");
            $(".invalid-feedback.image[data-id=" + id + "]").show();
        }
    
        if (videoFormat.thumbnailUrl === 1) {
            videoFormat.thumbnailUrl[0] = value;
        } else {
            videoFormat.thumbnailUrl[id] = value;
        }
    
        videoFormat.render();
    }
}

function deleteJSON_image(id){
    videoFormat.thumbnailUrl.splice(id, 1);
    videoFormat.render();

    for (let i = id + 1; i < videoFormat.thumbnailUrl.length + 1; i++) {
        $(".image[data-id=" + (i - 1) + "]").val(
            $(".image[data-id=" + (i) + "]").val()
        );
        $(".deleteImageButton[data-id=" + (i - 1) + "]").val(
            $(".deleteImageButton[data-id=" + (i) + "]").val()
        );
        $(".image-url-data[data-id=" + (i - 1) + "]").val(
            $(".image-url-data[data-id=" + (i) + "]").val()
        );
    }

    $(".image-url-data[data-id=" + videoFormat.thumbnailUrl.length + "]").remove();
    $(".deleteImageButton[data-id=" + videoFormat.thumbnailUrl.length + "]").remove();

    imageUrlCounter--;
}

function updateJSON_contentUrl(value){
    if (value.match(regex)) {
        videoFormat.contentUrl = value;
        $(`.contentUrl`).removeClass("is-invalid");
        $(".invalid-feedback.contentUrl").hide();
    } else {
        videoFormat.contentUrl = value;
        $(`.contentUrl`).addClass("is-invalid");
        $(".invalid-feedback.contentUrl").show();
    }

    videoFormat.render();
}

function updateJSON_embedUrl(value){
    if (value.match(regex)) {
        videoFormat.embedUrl = value;
        $(`.embedUrl`).removeClass("is-invalid");
        $(".invalid-feedback.embedUrl").hide();
    } else {
        videoFormat.embedUrl = value;
        $(`.embedUrl`).addClass("is-invalid");
        $(".invalid-feedback.embedUrl").show();
    }

    videoFormat.render();
}

function updateJSON_targetUrl(value) {
    if(value){
        if (value.match(regex)) {
            $(`.targetUrl`).removeClass("is-invalid");
            $(".invalid-feedback.targetUrl").hide();
        } else {
            $(`.targetUrl`).addClass("is-invalid");
            $(".invalid-feedback.targetUrl").show();
        }
        
        videoFormat.potentialAction = {
            "@type": "SeekToAction",
            target: ""+ value +"={seek_to_second_number}",
            "startOffset-input": "required name=seek_to_second_number",
        };
        videoFormat.render();
    }else{
        $(`.targetUrl`).removeClass("is-invalid");
        $(".invalid-feedback.targetUrl").hide();

        videoFormat.potentialAction = undefined;
        videoFormat.render();
    }
}

// Interaction
$(document).on("keyup", ".nameVideo", function () {
    updateJSON_name($(this).val());
});

$(document).on("keyup", ".descriptionVideo", function () {
    updateJSON_desc($(this).val());
});

$(document).on("change", ".uploadDate", function () {
    updateJSON_uploadDate($(this).val());
});

$(document).on("keyup", ".minutes", function () {
    updateJSON_minutes($(this).val());
});

$(document).on("keyup", ".seconds", function () {
    updateJSON_seconds($(this).val());
});

$(document).on("click", "#add-imageUrl", function () {
    imageUrlCounter++;
    videoFormat.thumbnailUrl.push("");

    $(".imageurlList").append(
        `<div class="col-10 col-sm-11 image-url-data mb-5" data-id="${imageUrlCounter}"> <label class="text-black font-weight-bold" for="image">` +
            label_image +
            ` # ${
                imageUrlCounter + 1
            }</label> <input type="text" name="" class="form-control image" placeholder="` +
            placeholder_image +
            `" value="" data-id="${imageUrlCounter}"><div class="invalid-feedback image" data-id="${imageUrlCounter}">` +
            invalid_url +
            `</div></div><div class="col-2 col-sm-1 deleteImageButton" data-id="${imageUrlCounter}"><div class="d-flex justify-content-center mt-9"> <i class='bx bxs-x-circle bx-md delete deleteImage' data-id="${imageUrlCounter}"></i></div></div></div>`
    );

    videoFormat.render();
});

$(document).on("keyup", ".image", function () {
    updateJSON_image(parseInt($(this).data("id")), $(this).val());
});

$(document).on("click", ".deleteImage", function () {
    deleteJSON_image(parseInt($(this).data("id")))
});

$(document).on("keyup", ".contentUrl", function () {
    updateJSON_contentUrl($(this).val());
});

$(document).on("keyup", ".embedUrl", function () {
    updateJSON_embedUrl($(this).val());
});

$(document).on("keyup", ".targetUrl", function () {
    updateJSON_targetUrl($(this).val());
});

// Layout Action
$(document).on("change", "#schema-json-ld", function () {
    if ($(this).val() !== "home") {
        window.location = "json-ld-" + $(this).val() + "-schema-generator";
    } else {
        window.location = "json-ld-schema-generator";
    }
});

$("#copy").click(function () {
    var copyText = jQuery("#json-format");
    copyText.select();
    document.execCommand("copy");
    toastr.success("Copied to Clipboard", "Information");
});

$(".reset").click(function (e) {
    $("#form-video").trigger("reset");
    $(".imageurlList").parent().find(".image-url-data").remove();
    $(".imageurlList").parent().find(".deleteImageButton").remove();
    $(".invalid-feedback").hide();
    $(".form-control.image").removeClass("is-invalid");
    $(".contentUrl").removeClass("is-invalid");
    $(".embedUrl").removeClass("is-invalid");
    $(".targetUrl").removeClass("is-invalid");
    videoFormat.resetrender();
});