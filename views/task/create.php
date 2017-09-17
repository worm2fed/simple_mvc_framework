<div class="title-block">
    <h3 class="title"> Add new task
        <span class="sparkline bar" data-type="bar"></span>
    </h3>
</div>

<form name="item">
    <div class="card card-block">
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Name: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control boxed" placeholder=""> </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Email: </label>
            <div class="col-sm-10">
                <input type="email" class="form-control boxed" placeholder=""> </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Text: </label>
            <div class="col-sm-10">
                <div class="wyswyg">
                    <div class="toolbar">
                        <span class="ql-format-group">
                            <select title="Size" class="ql-size">
                                <option value="10px">Small</option>
                                <option value="13px" selected>Normal</option>
                                <option value="18px">Large</option>
                                <option value="32px">Huge</option>
                            </select>
                        </span>
                        <span class="ql-format-group">
                            <span title="Bold" class="ql-format-button ql-bold"></span>
                            <span class="ql-format-separator"></span>
                            <span title="Italic" class="ql-format-button ql-italic"></span>
                            <span class="ql-format-separator"></span>
                            <span title="Underline" class="ql-format-button ql-underline"></span>
                            <span class="ql-format-separator"></span>
                            <span title="Strikethrough" class="ql-format-button ql-strike"></span>
                        </span>
                        <span class="ql-format-group">
                            <select title="Text Color" class="ql-color">
                                <option value="rgb(0, 0, 0)" label="rgb(0, 0, 0)" selected></option>
                                <option value="rgb(230, 0, 0)" label="rgb(230, 0, 0)"></option>
                                <option value="rgb(255, 153, 0)" label="rgb(255, 153, 0)"></option>
                                <option value="rgb(255, 255, 0)" label="rgb(255, 255, 0)"></option>
                                <option value="rgb(0, 138, 0)" label="rgb(0, 138, 0)"></option>
                                <option value="rgb(0, 102, 204)" label="rgb(0, 102, 204)"></option>
                                <option value="rgb(153, 51, 255)" label="rgb(153, 51, 255)"></option>
                                <option value="rgb(255, 255, 255)" label="rgb(255, 255, 255)"></option>
                                <option value="rgb(250, 204, 204)" label="rgb(250, 204, 204)"></option>
                                <option value="rgb(255, 235, 204)" label="rgb(255, 235, 204)"></option>
                                <option value="rgb(255, 255, 204)" label="rgb(255, 255, 204)"></option>
                                <option value="rgb(204, 232, 204)" label="rgb(204, 232, 204)"></option>
                                <option value="rgb(204, 224, 245)" label="rgb(204, 224, 245)"></option>
                                <option value="rgb(235, 214, 255)" label="rgb(235, 214, 255)"></option>
                                <option value="rgb(187, 187, 187)" label="rgb(187, 187, 187)"></option>
                                <option value="rgb(240, 102, 102)" label="rgb(240, 102, 102)"></option>
                                <option value="rgb(255, 194, 102)" label="rgb(255, 194, 102)"></option>
                                <option value="rgb(255, 255, 102)" label="rgb(255, 255, 102)"></option>
                                <option value="rgb(102, 185, 102)" label="rgb(102, 185, 102)"></option>
                                <option value="rgb(102, 163, 224)" label="rgb(102, 163, 224)"></option>
                                <option value="rgb(194, 133, 255)" label="rgb(194, 133, 255)"></option>
                                <option value="rgb(136, 136, 136)" label="rgb(136, 136, 136)"></option>
                                <option value="rgb(161, 0, 0)" label="rgb(161, 0, 0)"></option>
                                <option value="rgb(178, 107, 0)" label="rgb(178, 107, 0)"></option>
                                <option value="rgb(178, 178, 0)" label="rgb(178, 178, 0)"></option>
                                <option value="rgb(0, 97, 0)" label="rgb(0, 97, 0)"></option>
                                <option value="rgb(0, 71, 178)" label="rgb(0, 71, 178)"></option>
                                <option value="rgb(107, 36, 178)" label="rgb(107, 36, 178)"></option>
                                <option value="rgb(68, 68, 68)" label="rgb(68, 68, 68)"></option>
                                <option value="rgb(92, 0, 0)" label="rgb(92, 0, 0)"></option>
                                <option value="rgb(102, 61, 0)" label="rgb(102, 61, 0)"></option>
                                <option value="rgb(102, 102, 0)" label="rgb(102, 102, 0)"></option>
                                <option value="rgb(0, 55, 0)" label="rgb(0, 55, 0)"></option>
                                <option value="rgb(0, 41, 102)" label="rgb(0, 41, 102)"></option>
                                <option value="rgb(61, 20, 102)" label="rgb(61, 20, 102)"></option>
                            </select>
                        </span>
                        <span class="ql-format-group">
                            <span title="List" class="ql-format-button ql-list"></span>
                            <span class="ql-format-separator"></span>
                            <span title="Bullet" class="ql-format-button ql-bullet"></span>
                        </span>
                    </div>
                    <!-- Create the editor container -->
                    <div class="editor"></div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Image: </label>
            <div class="col-sm-10">
                <div class="upload-container">
                    <div class="col-xs-2">
                        <button type="button" id="uploadBtn" class="btn btn-large btn-primary-outline">Choose File</button>
                        <input type="hidden" name="image_name" id="image_name" value="">
                    </div>
                    <div class="col-xs-10">
                        <div id="progressOuter" class="progress progress-striped active" style="display:none;">
                            <div id="progressBar" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top:10px;">
                    <div class="col-xs-10">
                        <div id="msgBox"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="button" class="btn btn-primary"> Preview </button>
                <button type="submit" class="btn btn-warning"> Submit </button>
            </div>
        </div>
    </div>
</form>

<script src="/static/js/SimpleAjaxUploader.js"></script>
<script>
    function escapeTags( str ) {
        return String( str )
            .replace( /&/g, '&amp;' )
            .replace( /"/g, '&quot;' )
            .replace( /'/g, '&#39;' )
            .replace( /</g, '&lt;' )
            .replace( />/g, '&gt;' );
    }
    window.onload = function() {
        var btn = document.getElementById('uploadBtn'),
            progressBar = document.getElementById('progressBar'),
            progressOuter = document.getElementById('progressOuter'),
            msgBox = document.getElementById('msgBox');
        var uploader = new ss.SimpleUpload({
            button: btn,
            url: '/?image',
            name: 'image',
            multipart: true,
            hoverClass: 'hover',
            focusClass: 'focus',
            responseType: 'json',
            startXHR: function() {
                progressOuter.style.display = 'block'; // make progress bar visible
                this.setProgressBar( progressBar );
            },
            onSubmit: function() {
                msgBox.innerHTML = ''; // empty the message box
                btn.innerHTML = 'Uploading...'; // change button text to "Uploading..."
            },
            onComplete: function( filename, response ) {
                btn.innerHTML = 'Choose Another File';
                progressOuter.style.display = 'none'; // hide progress bar when upload is completed
                if ( !response ) {
                    msgBox.innerHTML = 'Unable to upload file';
                    return;
                }
                if ( response.success === true ) {
                    $('#image_name').val(response.image_name);
                    msgBox.innerHTML = '<strong>' + escapeTags( filename ) + '</strong>' + ' successfully uploaded.';
                } else {
                    $('#image_name').val('');
                    if ( response.msg )  {
                        msgBox.innerHTML = escapeTags( response.msg );
                    } else {
                        msgBox.innerHTML = 'An error occurred and the upload failed.';
                    }
                }
            },
            onError: function() {
                progressOuter.style.display = 'none';
                msgBox.innerHTML = 'Unable to upload file';
            }
        });
    };
</script>