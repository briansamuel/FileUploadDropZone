<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    .dropzone {
        border:2px dashed #999999;
        border-radius: 10px;
    }
    .dropzone .dz-default.dz-message {
        height: 171px;
        background-size: 132px 132px;
        margin-top: -101.5px;
        background-position-x:center;

    }
    .dropzone .dz-default.dz-message span {
        display: block;
        margin-top: 145px;
        font-size: 20px;
        text-align: center;
    }
</style>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-default">
        <div class="card-header">
          <div class="row">
            <div class="col-md-12">
              <strong>Laravelcode - Multiple files uploading using dropzoneJs</strong>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('multifileupload') }}" enctype="multipart/form-data" class="dropzone needsclick dz-clickable" id="fileupload" method="POST">
            @csrf
            <div class="fallback">
              <input name="file" type="files" multiple accept="image/jpeg, image/png, image/jpg" />
            </div>
          </form>
          <button id="uploadfiles" type="button" class="btn btn-primary">Upload File</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script src="https://www.dropzonejs.com/js/dropzone.js?v=1533562669"></script>
<script type="text/javascript">
  Dropzone.options.fileupload = {
    accept: function (file, done) {
      if (file.type != "application/vnd.ms-excel" && file.type != "image/jpeg, image/png, image/jpg") {
        done("Error! Files of this type are not accepted");
      } else {
        done();
      }
    }
  }

Dropzone.options.fileupload = {
  acceptedFiles: "image/jpeg, image/png, image/jpg"
}
Dropzone.options.myDropzone = {
  autoProcessQueue: false,

}
if (typeof Dropzone != 'undefined') {
  Dropzone.autoDiscover = false;

}

;
(function ($, window, undefined) {
  "use strict";

  $(document).ready(function () {
    // Dropzone Example
    if (typeof Dropzone != 'undefined') {
      if ($("#fileupload").length) {
        var dz = new Dropzone("#fileupload", { 
         autoProcessQueue: false,
         addRemoveLinks: true,
         previewsContainer: ".dropzone",
         parallelUploads: 10 // Number of files process at a time (default 2)
        });
        var $f = $('<tr><td class="name"></td><td class="size"></td><td class="type"></td><td class="status"></td></tr>');
        $('#uploadfiles').click(function(){
           dz.processQueue();
        });
        dz.on("success", function (file, responseText) {

            console.log('success');
            console.log(responseText);
            // console.log(file);
            // var _$f = $f.clone();

            // _$f.addClass('success');

            // _$f.find('.name').html(file.name);
            // if (file.size < 1024) {
            //   _$f.find('.size').html(parseInt(file.size) + ' KB');
            // } else {
            //   _$f.find('.size').html(parseInt(file.size / 1024, 10) + ' KB');
            // }
            // _$f.find('.type').html(file.type);
            // _$f.find('.status').html('Uploaded <i class="entypo-check"></i>');

            // dze_info.find('tbody').append(_$f);

            // status.uploaded++;

            // dze_info.find('tfoot td').html('<span class="label label-success">' + status.uploaded + ' uploaded</span> <span class="label label-danger">' + status.errors + ' not uploaded</span>');

            // toastr.success('Your File Uploaded Successfully!!', 'Success Alert', {
            //   timeOut: 50000000
            // });

          }).on("complete", function (file, responseText) {
            console.log('complete');
            console.log(responseText);
            // var _$f = $f.clone();

            // _$f.addClass('success');

            // _$f.find('.name').html(file.name);
            // if (file.size < 1024) {
            //   _$f.find('.size').html(parseInt(file.size) + ' KB');
            // } else {
            //   _$f.find('.size').html(parseInt(file.size / 1024, 10) + ' KB');
            // }
            // _$f.find('.type').html(file.type);
            // _$f.find('.status').html('Uploaded <i class="entypo-check"></i>');

            // dze_info.find('tbody').append(_$f);

            // status.uploaded++;

            // dze_info.find('tfoot td').html('<span class="label label-success">' + status.uploaded + ' uploaded</span> <span class="label label-danger">' + status.errors + ' not uploaded</span>');

            // toastr.success('Your File Uploaded Successfully!!', 'Success Alert', {
            //   timeOut: 50000000
            // });

          })
          .on('error', function (file) {
            var _$f = $f.clone();

            dze_info.removeClass('hidden');

            _$f.addClass('danger');

            _$f.find('.name').html(file.name);
            _$f.find('.size').html(parseInt(file.size / 1024, 10) + ' KB');
            _$f.find('.type').html(file.type);
            _$f.find('.status').html('Uploaded <i class="entypo-cancel"></i>');

            dze_info.find('tbody').append(_$f);

            status.errors++;

            dze_info.find('tfoot td').html('<span class="label label-success">' + status.uploaded + ' uploaded</span> <span class="label label-danger">' + status.errors + ' not uploaded</span>');

            // toastr.error('Your File Uploaded Not Successfully!!', 'Error Alert', {
            //   timeOut: 5000
            // });
          });
      }
    }
  });
})(jQuery, window); 
</script>