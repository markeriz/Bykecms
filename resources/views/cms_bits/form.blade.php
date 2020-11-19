

<div class="form-group">
   <label>Pavadinimas</label>
   {{ Form::text('name', $cms_bit->name) }}
</div>
<?php 
// Tag is Defined 
?>
@if (!empty($cms_tag))
    <div class="form-group">
        <?php 
        $tags = \App\Models\CmsTag::where('parent_id', NULL)->orderBy('position', 'asc')->get();
        $smags = array();
        
        foreach ($tags as $tag) {
            $smags[$tag->id] = $tag->name;
            // CHilds
            $child_tags = \App\Models\CmsTag::where('parent_id', $tag->id)->orderBy('position', 'asc')->get();
            foreach($child_tags as $child) {
                $smags[$child->id] = '  - '.$child->name;
            }
        }
        ?>
        {!! Form::label('tag_id', 'Žymė') !!}
        {{ Form::select('tag_id', $smags, $cms_tag->id, ['class'=>'select']) }}
    </div>
<?php 
// parent_id is Defined 
?>
@elseif (!empty($parent_cms_bit))
    <div class="form-group">
        {!! Form::label('parent_id', 'Priklauso blokeliui') !!}
        {!! Form::hidden('parent_id', $parent_cms_bit->id) !!}
        {{$parent_cms_bit->name}}
    </div>
@endif
<div class="form-group">
   <label>Tekstas</label>
   {{ Form::textarea('text', $cms_bit->text, ['id'=>'trumbowyg-demo', 'style'=>'width:100%;']) }}
</div>

<div class="row"> 
    <div class="col-md-6">
        <div class="form-group">
            <?php 
            $bit_templates = \App\Models\CmsBitTemplate::all()->pluck('name', 'id')->toArray();
            ?>
            {!! Form::label('bit_template_id', 'Atvaizdavimas') !!}
            {{ Form::select('bit_template_id', $bit_templates, $cms_bit->bit_template_id, ['class'=>'select']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <?php 
        $bit_types = \App\Models\CmsBitType::orderBy('id', 'asc')->get()->pluck('name', 'id')->toArray();
        ?>
        {!! Form::label('bit_type_id', 'Tipas') !!}
        {{ Form::select('bit_type_id', $bit_types, $cms_bit->bit_type_id, ['class'=>'select']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Kaina, &euro;</label>
            {{ Form::text('price', $cms_bit->price) }}
        </div>
    </div>
</div>

@if (!empty($parent_cms_bit) and $parent_cms_bit->bit_type_id==2)
    <hr/>
    <div class="form-group">
        
            Blokelis {{ $parent_cms_bit->name }} yra nustatytas kaip prekė, tad šio blokelio atvaizdavime galite įjungti mygtuką: 
        <br/>
        {!! Form::hidden('product_button', 0) !!}
        {!! Form::checkbox('product_button', 1, $cms_bit->product_button) !!}
        {!! Form::label('product_button', 'Įjungti mygtuką "Pirkti"') !!}
    </div>
@endif

<?php 
/*

<div class="form-group">
   <label>Nuoroda (/preke veda į lokalų turinį, https į globalų)</label>
   {{ Form::text('product_url', $cms_bit->product_url) }}
</div>
*/
?>

<hr/>

<div class="form-group">
   {!! Form::hidden('status', 0) !!}
   {!! Form::checkbox('status', 1, $cms_bit->status) !!}
   {!! Form::label('status', 'Šis blokelis rodomas viešai') !!}
</div>

<hr/>

<div class="form-group gray-area">
    <label for="multiple_files">
        Nuotraukų įkėlimas 
        <br/>
        <img src="{{url('/upload-photo.png')}}" style="width:80px; cursor: pointer;">
    </label>
    <input type="file" name="photos[]" multiple="1" id="multiple_files" style="border:none; background:none; padding:0; margin:0; display:none">
    <br/>
    Nuotraukos dydis iki <b>10MB</b>.<br/>
    Galimi formatai: <b>JPG</b>, <b>JPEG</b>, <b>PNG</b>.

    <script type="text/javascript">
    //
    // Script for Photos Upload
    //
    $("input:file").change(function (){
        $('.loading').show();
        var data = new FormData();
        var files = $('#multiple_files').prop("files");
        $.each(files, function(key, value) {
            // wrong file
            if (value['type']!='image/jpeg' && value['type']!='image/png' && value['type']!='image/gif') {
                alert('Pasirinkote netinkamą nuotraukos formatą');
            // success
            } else {
                data.append('photos[]', value);
            }
        });
        // data.append('file', $('#multiple_files').prop("files")[0]);
        data.append('_token', '{{{ csrf_token() }}}');
        @if (!empty($cms_bit->id) and $cms_bit->id>0)
            data.append('bit_id', {{$cms_bit->id}});
        @else
            <?php
            $random = substr( md5(rand()), 0, 7);
            ?>
            data.append('random', '{{$random}}');
        @endif
        // console.log('hi man');
        // console.log($('#multiple_files').prop("files")[0]);
        $.ajax({
            url: '{{url('/cms_photos/upload/')}}', // point to server-side PHP script
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: 'post',
            success: function(response){
                // alert(php_script_response); // display response from the PHP script, if any
                $('#sortable').prepend(response);
                // alert(response);
                // console.log(response);
                $('.loading').hide();
                $('input:file').val('');
                // Count how many photos there are
                $fields_nb = $( "#sortable li" ).length;
                //alert($fields_nb);
                if ($fields_nb>=40) {
                    $('.uploadPhotosButton').slideUp();
                    $('.uploadPhotosMessage').slideDown();
                }
            }
        });
    });
    </script>

</div>

<div class="form-group">
    <?php
    if (!empty($cms_bit->id)) {
        $cms_photos = DB::table('photos')->where('bit_id', $cms_bit->id)->orderBy('position','desc')->get();
    } else {
        $cms_photos = DB::table('photos')->where('random', $random)->orderBy('position','desc')->get();
    }
    ?>

    @if (!empty($random))
        {!! Form::hidden('random', $random) !!}
    @endif

    <div style="padding-top:14px; padding-bottom:7px;">
        <b>Įkeltos nuotraukos.</b>
        <br/>Rikiuoti galite paspaudę ant nuotraukos ir nutempę į norimą poziciją ir paspaudę "Išsaugoti".
    </div>

    <div class="loading" style="display:none; padding-bottom:1rem;"><img src="{{url('/loading.gif')}}"></div>

    <?php
    /*
    Attention!
    sortable.js conflicts with laravel app.js
    */
    ?>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
    $( function() {
      $( "#sortable" ).sortable();
      $( "#sortable" ).disableSelection();
    } );
    </script>
    <ul id="sortable" class="row inline-ul">
        @include('cms_photos.sortable_rows')
    </ul>

    <div style="clear:both"></div>

    <script type="text/javascript">

        // On Page Load: Count how many photos has been uploaded and show in console
        $(document).ready(function() {
            $fields_nb = $( "#sortable li" ).length;
            console.log('Uploaded photos: '+$fields_nb);
            if ($fields_nb>=40) {
                $('.uploadPhotosButton').slideUp();
                $('.uploadPhotosMessage').slideDown();
            }
        });

        // Clicked delete button
        $(document).on('click', '.delete-button' , function(e) {

            //
            // Delete Photo
            //
            var photo_id = $(this).attr('id');
            $.ajax({
                url: $(this).attr("href"),
                /*data: {"bookID": book_id},*/
                type: 'get',
                success: function(result)
                {
                    if (result == "success") {
                            $('.photo-'+photo_id ).remove();
                        }
                }
            });


            //
            // Max Uploads:20. Count Quantity Here.
            //
            $fields_nb = $( "#sortable li" ).length;
            if ($fields_nb<=40) {
                $('.uploadPhotosButton').slideDown();
                $('.uploadPhotosMessage').slideUp();
            }

            e.preventDefault();
        });
    </script>
</div> 

<div class="form-group">
   <button type="submit" class="btn">Išsaugoti</button>
</div>



<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.20.0/trumbowyg.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.20.0/ui/trumbowyg.min.css">
<script>
    $('#trumbowyg-demo').trumbowyg({
    btns: [
        ['undo', 'redo'], // Only supported in Blink browsers
        ['strong', 'em', 'del'],
        ['link'],
        ['insertImage'],
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['unorderedList', 'orderedList'],
        ['removeformat', 'viewHTML']
    ]
});
</script>
<style type="text/css">
.trumbowyg-box, .trumbowyg-editor {
margin-top:0;
}
.trumbowyg-editor, .trumbowyg-textarea {
padding:0.5rem;
}
</style>