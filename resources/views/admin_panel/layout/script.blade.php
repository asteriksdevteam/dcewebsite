<script>
    $(document).ready(function() {
        tinymce.init({
            selector: '.textarea_tinyMice',
            height: 900,
            menubar: 'file edit view insert format tools table help',
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount',
                'toc',
                'emoticons',
                'media',
                'mention',
                'powerpaste',
                'tinymcespellchecker',
                'a11ychecker',
                'advtable',
                'casechange',
                'export',
                'formatpainter',
                'pageembed',
                'permanentpen',
                'footnotes',
                'advtemplate',
                'advcode',
                'editimage',
                'tableofcontents',
                'mergetags',
                'powerpaste',
                'tinymcespellchecker',
                'autocorrect',
                'a11ychecker',
                'typography',
                'inlinecss',
                'fullpage',
                'code',
                'textpattern',
                'hr',
                'nonbreaking',
                'contextmenu',
                'directionality',
                'autoresize',
                'image imagetools',
                'linkchecker',
                'quickbars',
                'noneditable',
                'help',
                'visualchars',
                'charmap',
                'emoticons',
                'mediaembed',
                'wordcount',
                'template',
                'paste',
                'colorpicker',
                'legacyoutput',
                'advlist',
                'autolink',
                'autosave',
                'imagetools',
                'lineheight',
                'preview',
                'tabfocus',
                'textcolor',
                'toc',
                'wordcount',
                'casechange',
                'save',
                'saveasc',
                'searchreplace',
                'media',
                'paste',
                'lists',
                'image',
                'table',
                'help',
                'code',
                'visualchars',
                'visualblocks',
                'wordcount',
                'charmap',
                'hr',
                'emoticons',
                'media',
                'link',
                'fullscreen'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help | code | image link | charmap emoticons mediaembed | lineheight preview | forecolor backcolor | toc wordcount | casechange save saveasc searchreplace media paste lists image table help code visualchars visualblocks wordcount charmap hr emoticons media link fullscreen',
            content_style: 'body { font-family: "Helvetica", Arial, sans-serif; font-size: 14px; line-height: 1.6; }',
            setup: function (editor) {
                editor.ui.registry.addButton('customButton', {
                    text: 'Custom Button',
                    onAction: function (_) {
                        editor.insertContent('Hello World!');
                    }
                });
            }
        });

        //This script for home banner start
            $(document).on('click','.getHomePageSliderIdLink', function() {
                var val = $(this).find('.getHomePageSliderId').val();
            
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('delete_home_banner_images') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        val: val,
                    },
                    success: function(result){

                        if (result.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted Successfully!',
                                showConfirmButton: false,
                                timer: 2000,
                                onClose: function() {
                                    window.location.reload();
                                }
                            });
                        } 
                        else if (result.status === 'error') 
                        {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                            });
                        }
                    }
                });
            });
        //This script for home banner end

        //This script for home technologies start 
            $(document).ready(function() {
                $('#imageInput1').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imageContainer1').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#imageContainer1').empty();
                    }
                });
            });

            $(document).ready(function() {
                $('#imageInput2').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imageContainer2').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#imageContainer2').empty();
                    }
                });
            });

            $(document).ready(function() {
                $('#imageInput3').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imageContainer3').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#imageContainer3').empty();
                    }
                });
            });

            $(document).ready(function() {
                $('#imageInput4').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imageContainer4').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#imageContainer4').empty();
                    }
                });
            });

            $(document).ready(function() {
                $('#imageInput5').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imageContainer5').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#imageContainer5').empty();
                    }
                });
            });

            $(document).ready(function() {
                $('#imageInput6').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imageContainer6').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#imageContainer6').empty();
                    }
                });
            });
        //This script for home technologies end

        //This script for home Content start 
            $(document).ready(function() {
                $('#HomeContentOne1').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#HomeContentOne').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#HomeContentOne').empty();
                    }
                });
            });
        //This script for home Content end

        //This script for Service Detail Data Start
            $(document).ready(function() {
                $('#edit_images').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#edit_images_show').html('<img width="10%" src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#edit_images_show').empty();
                    }
                });
            });

            $(document).on('click','.edit_Services', function() {
                var id = $(this).data("id");
                var name = $(this).data("name");
                var description = $(this).data("description");
                var image = $(this).data("image");

                console.log(description);


                $("#edit_service_id").val(id);
                $("#edit_service_name").val(name);
                $("#edit_service_description").val(description);

                $("#edit_image_display").attr("src", image);
            });
        //This script for Service Detail Data End

        //This script for Second Content Section Data start

            $(document).ready(function() {
                $('#Second_Content_Section_Data1').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_Second_Content_Section_Data1').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#image_Second_Content_Section_Data1').empty();
                    }
                });
            });

            $(document).ready(function() {
                $('#Second_Content_Section_Data2').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_Second_Content_Section_Data2').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#image_Second_Content_Section_Data2').empty();
                    }
                });
            });

            $(document).ready(function() {
                $('#Second_Content_Section_Data3').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_Second_Content_Section_Data3').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#image_Second_Content_Section_Data3').empty();
                    }
                });
            });
        //This script for Second Content Section Data end

        //This script for Second Content Section Data start

            $(document).ready(function() {
                $('#third_Content_Section_Data1').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_third_Content_Section_Data1').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#image_third_Content_Section_Data1').empty();
                    }
                });

                $('#third_Content_Section_Data2').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_third_Content_Section_Data2').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#image_third_Content_Section_Data2').empty();
                    }
                });

                $('#third_Content_Section_Data3').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_third_Content_Section_Data3').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#image_third_Content_Section_Data3').empty();
                    }
                });

                $('#third_Content_Section_Data4').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_third_Content_Section_Data4').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#image_third_Content_Section_Data4').empty();
                    }
                });

            });

        //This script for Second Content Section Data end

        //This script for home loyal Customers start
            $(document).on('click','.getHomeLoyalCustomersLink', function() {
                var val = $(this).find('.getHomeLoyalCustomersId').val();
            
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('delete_home_loyal_customers_images') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        val: val,
                    },
                    success: function(result){

                        if (result.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted Successfully!',
                                showConfirmButton: false,
                                timer: 2000,
                                onClose: function() {
                                    window.location.reload();
                                }
                            });
                        } 
                        else if (result.status === 'error') 
                        {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                            });
                        }
                    }
                });
            });
        //This script for home loyal Customers end

        //This script for Fourth Content Section Data start
            $(document).ready(function() {
                $('#fourth_Content_Section_Data1').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_fourth_Content_Section_Data1').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#image_fourth_Content_Section_Data1').empty();
                    }
                });

                $('#fourth_Content_Section_Data2').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_fourth_Content_Section_Data2').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#image_fourth_Content_Section_Data2').empty();
                    }
                });

                $('#fourth_Content_Section_Data3').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_fourth_Content_Section_Data3').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#image_fourth_Content_Section_Data3').empty();
                    }
                });

                $('#fourth_Content_Section_Data4').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_fourth_Content_Section_Data4').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#image_fourth_Content_Section_Data4').empty();
                    }
                });

                $('#fourth_Content_Section_Data5').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_fourth_Content_Section_Data5').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#image_fourth_Content_Section_Data5').empty();
                    }
                });

                $('#fourth_Content_Section_Data6').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_fourth_Content_Section_Data6').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#image_fourth_Content_Section_Data6').empty();
                    }
                });

                $('#fourth_Content_Section_Data7').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_fourth_Content_Section_Data7').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#image_fourth_Content_Section_Data7').empty();
                    }
                });

                $('#fourth_Content_Section_Data8').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#image_fourth_Content_Section_Data8').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#image_fourth_Content_Section_Data8').empty();
                    }
                });
            });
        //This script for Fourth Content Section Data end

        //This script for Testimonails Section Data start

            $(document).on('click','.testimonails', function() {
                var name = $('#name').val();
                var designation = $('#designation').val();
                var comments = $('#comments').val();                
                var testimonialImagesInput = $('#testimonial_images').prop('files')[0];
            
                let formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('name', name);
                formData.append('designation', designation);
                formData.append('comments', comments);
                formData.append('testimonial_images', testimonialImagesInput);

                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('add_testimonials_to_db') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(result){
                        console.log(result);
                        if (result.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted Successfully!',
                                showConfirmButton: false,
                                timer: 2000,
                                onClose: function() {
                                    window.location.reload();
                                }
                            });
                        } 
                        else if (result.status === 'error') 
                        {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                            });
                        }
                    }
                });
            });

            $('#testimonial_images').on('change', function(event) {
                var selectedImage = event.target.files[0];

                if (selectedImage) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#testimonial_images_show').html('<img src="' + e.target.result + '">');
                };

                reader.readAsDataURL(selectedImage);
                } else {
                $('#testimonial_images_show').empty();
                }
            });

            $('#edit_testimonial_images').on('change', function(event) {
                var selectedImage = event.target.files[0];

                if (selectedImage) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#edit_testimonial_images_show').html('<img width="20%" src="' + e.target.result + '">');
                };

                reader.readAsDataURL(selectedImage);
                } else {
                $('#edit_testimonial_images_show').empty();
                }
            });

            $(document).on('click','.edit_testimonials', function() {
                var id = $(this).data("id");
                var name = $(this).data("name");
                var designation = $(this).data("designation");
                var comment = $(this).data("comment");
                var image = $(this).data("image");
                var imageUrl = "{{ asset('') }}" + image;

                $("#edit_id").val(id);
                $("#edit_name").val(name);
                $("#edit_designation").val(designation);
                $("#edit_comments").val(comment);
                $("#testimonialImage").attr("src", imageUrl);
            });
        //This script for Testimonails Section Data end

        //This script for Services Category Section Data start
            $(document).on('click','.edit_category', function() {
                var id = $(this).data("id");
                var category_name = $(this).data("category_name");
                $("#edit_category_id").val(id);
                $("#edit_category_name").val(category_name);
            });
        //This script for Services Category Section Data end

        //This script for Services Sub Category Section Data start
            $(document).on('click','.edit_sub_category', function() {
                var id = $(this).data("id");
                var category_name = $(this).data("category_name");
                var sub_category_name = $(this).data("sub_category_name");
                var edit_slug = $(this).data("slug");
                console.log(id, category_name,edit_slug ,sub_category_name);

                $("#id").val(id);
                $("#edit_sub_category_name").val(sub_category_name);
                $("#edit_slug").val(edit_slug);
                $("#edit_Category_name").val(category_name);

            });
        
        //This script for Services Sub Category Section Data end

        //This script for Services Sub Category items Section Data start

            $(document).ready(function() {
                $("#picture").change(function() {
                    var $imagePreview = $("#imagePreview");

                    $imagePreview.empty();

                    for (var i = 0; i < this.files.length; i++) {
                        var file = this.files[i];

                        if (file.type.match('image.*')) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                var imageElement = $("<img width='50%'>").attr("src", e.target.result);

                                $imagePreview.append(imageElement);
                            }
                            reader.readAsDataURL(file);
                        }
                    }
                });
            });

            $(document).on('click','.edit_sub_category_item', function() {
                var id = $(this).data("id");
                var sub_category_id = $(this).data("sub_category_id");
                var item_name = $(this).data("item_name");
                console.log(id, sub_category_id, item_name);

                $("#id").val(id);
                $("#edit_item_name").val(item_name);
                $("#edit_sub_Category_name").val(sub_category_id);

                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('get_images_on_edit_work') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id,
                    },
                    success: function(result){
                        $('.append').empty();
                        $('.append').append(result);
                        console.log(result);
                    }
                });

            });

        //This script for Services Sub Category items Section Data end

        //This script for Service Detail Data Start
            var counter = 2;
            $(document).on('click','.add_more', function() {
                var newFields = '<tr>'+
                                    '<th scope="row">'+counter+'</th>'+
                                    '<input type="hidden" class="row_number" name="row_number" id="row_number" value="'+counter+'">'+
                                    '<td>'+
                                        '<input type="file" name="process_image[]" id="process_image" class="form-control" value="">'+

                                        '@error("process_image")'+
                                        '<div class="alert alert-danger">{{ $message }}</div>'+
                                            '@enderror '+
                                        '</td>'+
                                    '<td>'+
                                        '<input type="text" name="process_heading[]" id="process_heading[]" class="form-control" required>'+
                                        '@error("process_heading")'+
                                        '<div class="alert alert-danger">{{ $message }}</div>'+
                                        '@enderror '+
                                    '</td>'+
                                    '<td>'+
                                        '<textarea name="process_content[]" id="process_content[]" class="form-control" rows="5" required></textarea>'+
                                        '@error("process_content")'+
                                        '<div class="alert alert-danger">{{ $message }}</div>'+
                                        '@enderror '+
                                    '</td>'+
                                    '<td><a href="javascript:void(0);" class="btn btn-danger btn-sm remove" data-id="'+counter+'">Remove</a></td>'+
                                '</tr>';

                $(".append").append(newFields);
                counter++;
            });

            $(document).on('click','.remove', function() {
                var id  = $(this).data("data_id");
                // alert(id);

                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('delete_specific_process') }}",
                    type: 'get',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id,
                    },
                    success: function(result){
                        if (result.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted Successfully!',
                                showConfirmButton: false,
                                timer: 2000,
                                onClose: function() {
                                    window.location.reload();
                                }
                            });
                        } 
                        else if (result.status === 'error') 
                        {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                            });
                        }
                    }
                });
                // $('data_id')
                // $(this).closest('tr').remove();
            });

            $(document).ready(function() {
                $('#banner_image_service_detail').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) 
                    {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('#banner_image_service_detail_display').html('<img src="' + e.target.result + '">');
                        };

                        reader.readAsDataURL(selectedImage);
                    } 
                    else 
                    {
                        $('#banner_image_service_detail_display').empty();
                    }
                });
            });

            $(document).on('click','.edit_Services_details', function() {
                var id = $(this).data("id");
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('edit_service_detail') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id,
                    },
                    success: function(result){
                        console.log(result.ServiceDetail);
                    }
                });
            });

            $('#first_banner_image').on('change', function(event) {
                var selectedImage = event.target.files[0];

                if (selectedImage) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#first_banner_image_service_detail_display').html('<img width="50%" src="' + e.target.result + '">');
                };

                reader.readAsDataURL(selectedImage);
                } else {
                $('#first_banner_image_service_detail_display').empty();
                }
            });

            $('#info_banner_image').on('change', function(event) {
                var selectedImage = event.target.files[0];

                if (selectedImage) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#info_banner_image_service_detail_display').html('<img width="50%" src="' + e.target.result + '">');
                };

                reader.readAsDataURL(selectedImage);
                } else {
                $('#info_banner_image_service_detail_display').empty();
                }
            });
        //This script for Service Detail Data end

        //This script for About Us Data Start
            $(document).ready(function() {
                $('#about_image_who_we_are').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#who_we_are_Image').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#who_we_are_Image').empty();
                    }
                });

                $('#insert_philosophy_Image').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#philosophy_Image').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#philosophy_Image').empty();
                    }
                });
            });

            $(document).on('click','.edit_Services_details', function() {
                var id = $(this).data("id");
                var question  = $(this).data("question");
                var answer  = $(this).data("answer");

                $("#edit_id").val(id);
                $("#edit_question").val(question);
                $("#edit_answer").val(answer);
            });

            $(document).ready(function() {
                $('#last_banner_image').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) 
                    {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('#show_last_banner_image').html('<img src="' + e.target.result + '">');
                        };

                        reader.readAsDataURL(selectedImage);
                    } 
                    else 
                    {
                        $('#show_last_banner_image').empty();
                    }
                });
            });
            
        //This script for About Us Data End
        
        //This script for blog data start
            function validateDropdown() {
                var dropdown = document.getElementById('blog_Category');
                if (dropdown.value === 'Select') {
                    alert('Please select a category.');
                    return false;
                }
                return true;
            }

            $('#blog_images').on('change', function(event) {
                var selectedImage = event.target.files[0];

                if (selectedImage) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blog_images_show').html('<img src="' + e.target.result + '">');
                };

                reader.readAsDataURL(selectedImage);
                } else {
                $('#blog_images_show').empty();
                }
            });

            $('#blog_image_thumb').on('change', function(event) {
                var selectedImage = event.target.files[0];

                if (selectedImage) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blog_image_thumb_show').html('<img src="' + e.target.result + '">');
                };

                reader.readAsDataURL(selectedImage);
                } else {
                    $('#blog_image_thumb_show').empty();
                }
            });

            $('#edit_edit_blog_images').on('change', function(event) {
                var selectedImage = event.target.files[0];

                if (selectedImage) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#edit_blog_images_show').html('<img width="100px" src="' + e.target.result + '">');
                };

                reader.readAsDataURL(selectedImage);
                } else {
                    $('#edit_blog_images_show').empty();
                }
            });

            $('#edit_blog_image_thumb').on('change', function(event) {
                var selectedImage = event.target.files[0];

                if (selectedImage) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#edit_blog_image_thumb_show').html('<img width="100px" src="' + e.target.result + '">');
                };

                reader.readAsDataURL(selectedImage);
                } else {
                    $('#edit_blog_image_thumb_show').empty();
                }
            });

            $(document).ready(function () {
                $("#slug").on('input', function () {
                    var text = $(this).val();
                    var maxLength = 30;
                    if (text.length > maxLength) {
                        $("#error").text("Slug Character must be less then " + maxLength);
                    } else {
                        $("#error").text("");
                    }
                });
            });

            $(document).ready(function () {
                $('#meta_keyword').select2({
                    tags: true,
                    tokenSeparators: [',', '\n'],
                });
            });
        //This script for blog data end

        //This script for Counter data start

                $('#counter_Image').on('change', function(event) {
                    var selectedImage = event.target.files[0];

                    if (selectedImage) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#show_counter_Image').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                    } else {
                    $('#show_counter_Image').empty();
                    }
                });

        //This script for Counter data end

        $(document).on('click','.edit_tag',function()
        {
                var id = $(this).data("id");
                var page  = $(this).data("page");
                var meta_title  = $(this).data("meta_title");
                var meta_keyword  = $(this).data("meta_keyword");
                var meta_description  = $(this).data("meta_description");

                console.log(id, page, meta_title, meta_keyword, meta_description);
                $("#id").val(id);
                $("#edit_page").val(page);
                $("#edit_meta_title").val(meta_title);
                $("#edit_meta_description").val(meta_description);
        })
        
        $(document).ready(function() {
            $('#discountImage').on('change', function(event) {
                var selectedImage = event.target.files[0];

                if (selectedImage) {
                    var reader = new FileReader();

                reader.onload = function(e) {
                    $('#showDiscountImage').html('<img src="' + e.target.result + '">');
                };

                reader.readAsDataURL(selectedImage);
                } else {
                $('#showDiscountImage').empty();
                }
            });
        });
        

        $(document).ready(function() {
            $('#testimonial_image_1').on('change', function(event) {
                var selectedImage = event.target.files[0];

                if (selectedImage) 
                {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#services_testimonial_image_1').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                } 
                else 
                {
                    $('#services_testimonial_image_1').empty();
                }
            });

            $('#testimonial_image_2').on('change', function(event) {
                var selectedImage = event.target.files[0];

                if (selectedImage) 
                {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#services_testimonial_image_2').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                } 
                else 
                {
                    $('#services_testimonial_image_2').empty();
                }
            });
            $('#testimonial_image_3').on('change', function(event) {
                var selectedImage = event.target.files[0];

                if (selectedImage) 
                {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#services_testimonial_image_3').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                } 
                else 
                {
                    $('#services_testimonial_image_3').empty();
                }
            });
            $('#testimonial_image_4').on('change', function(event) {
                var selectedImage = event.target.files[0];

                if (selectedImage) 
                {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#services_testimonial_image_4').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                } 
                else 
                {
                    $('#services_testimonial_image_4').empty();
                }
            });
            $('#process_image').on('change', function(event) {
                var selectedImage = event.target.files[0];

                if (selectedImage) 
                {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#services_process_image').html('<img src="' + e.target.result + '">');
                    };

                    reader.readAsDataURL(selectedImage);
                } 
                else 
                {
                    $('#services_process_image').empty();
                }
            });
        });

        //This Script for currency start

            $('#currncy_flag').on('change', function(event) {
                var selectedImage = event.target.files[0];

                if (selectedImage) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.show_currncy_flag').html('<img width="100px" src="' + e.target.result + '">');
                };

                reader.readAsDataURL(selectedImage);
                } else {
                    $('.show_currncy_flag').empty();
                }
            });

            $("#currncy_symbol").on('input', function () 
            {
                var text = $(this).val();
                var regex = /^[^A-Za-z0-9]$/; 
                // && regex.test(text)
                if (text.length <= 3 ) 
                {
                    $(".currncy-symbol").text(""); 
                } 
                else 
                {
                    $(".currncy-symbol").text("Please enter exactly one symbol");
                }
            });

            $(document).on('click','.currency_button', function()
            {
                var currncy_name = $('.currncy_name').val();

                if(currncy_name === "")
                {
                    $(".currncy-name").text("Please enter name here...");
                }

                var currncy_flag = $('.currncy_flag').val();

                if(currncy_flag === "")
                {
                    $(".currncy-flag").text("Please enter image here...");
                }

                var currncy_symbol = $('.currncy_symbol').val();
                var regex = /^[^A-Za-z0-9]$/; 

                if(currncy_symbol === "" && regex.test(currncy_symbol))
                {
                    $(".currncy-symbol").text("Please enter Symbol here...");
                }


                if(currncy_name !== "" || currncy_flag !== "" || currncy_symbol !== "" && regex.test(currncy_symbol))
                {
                    var formData = new FormData();

                    formData.append('_token', "{{ csrf_token() }}");

                    var imageInput = $(".currncy_flag")[0];

                    if (imageInput.files.length > 0) 
                    {
                        formData.append('image', imageInput.files[0]);
                    }

                    formData.append('id', $(".currncy_id").val());
                    formData.append('name', $(".currncy_name").val());
                    formData.append('symbol', $(".currncy_symbol").val());

                    $.ajax({
                        url: "{{ url('create_currency') }}",
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (result) {

                            if (result.status === 'success') 
                            {
                                if(result.Currency === 1) 
                                {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Edit Successfully!',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        onClose: function() {
                                            window.location.reload();
                                        }
                                    });

                                    $('.currncy_name').val("");
                                    $('.currncy_flag').val("");
                                    $('.currncy_symbol').val("");

                                    $(".currncy-name").text("");
                                    $(".currncy-flag").text("");
                                    $(".currncy-symbol").text("");
                                    $('.show_currncy_flag').empty();
                                }
                                else
                                {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Created Successfully!',
                                        showConfirmButton: false,
                                        timer: 2000,
                                    });

                                    $('.currncy_name').val("");
                                    $('.currncy_flag').val("");
                                    $('.currncy_symbol').val("");

                                    $(".currncy-name").text("");
                                    $(".currncy-flag").text("");
                                    $(".currncy-symbol").text("");
                                    $('.show_currncy_flag').empty();

                                    if(result.Currency !== 1)
                                    {
                                        $('.display_currency').append(
                                            '<tr><td><img width="10%" src=' + result.Currency.image + '></td><td>' + result.Currency.name  + '</td><td>' + result.Currency.symbol  + '</td><td><a href="" class="btn btn-outline-primary btn-sm">Edit</a> <a href="" class="btn btn-outline-danger btn-sm">Delete</a></td></tr>'
                                        );
                                    }
                                }
                            } 
                            else if (result.status === 'error') 
                            {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                });
                            }
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                }
            })

            $(document).ready(function () {
                $.ajax({
                    url: "{{ url('get_currency') }}",
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) 
                    {
                        $('.display_currency').append(data.data);
                    },
                    error: function (error) 
                    {
                        console.log(error);
                    }
                });
            });

            $(document).on('click','.edit_currency', function(){
                $('.currncy_id').val($(this).data("id"));
                $('.currncy_name').val($(this).data("name"));
                $('.currncy_symbol').val($(this).data("symbol"));
                $('.show_for_edit_currency_image').attr('src',$(this).data("image"));
            })
                
            $(document).on('click','.delete_currency', function() {
                var id = $(this).data("id");
                console.log(id);
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('delete_currency') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id,
                    },
                    success: function(result){
                        Swal.fire({
                            icon: 'success',
                            title: 'Delete Successfully!',
                            showConfirmButton: false,
                            timer: 2000,
                            onClose: function() {
                                window.location.reload();
                            }
                        });
                    }
                });
            });

        //This Script for currency end


        $(".actual_price").on('input', function (){

            var price = $(this).val();
            var cur = $(this).data('val');
            var calculatedPrice = price * 12;

            $(".yearly_price_"+cur).val(calculatedPrice);
        });
        
        $(document).on("change", ".subcategory", function(){
            var subcategory = $(this).val();
            $.ajax({
                url: "{{ url('check_subcategory_select_other') }}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: subcategory,
                },
                success: function(result){
                    if(result.data == "others")
                    {
                        $("#package_type_basic").hide();
                        $("#package_type_intermediate").hide();
                        $("#package_type_advance").hide();
                    }
                    else
                    {
                        $("#package_type_basic").show();
                        $("#package_type_intermediate").show();
                        $("#package_type_advance").show();
                    }
                }
            });
        })

        $(window).on("load", function() {
            var subcategory = $("#EditSubcategoryForPackages").val();
            $.ajax({
                url: "{{ url('check_subcategory_select_other') }}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: subcategory,
                },
                success: function(result){
                    if(result.data == "others")
                    {
                        $("#package_type_basic").hide();
                        $("#package_type_intermediate").hide();
                        $("#package_type_advance").hide();
                    }
                    else
                    {
                        $("#package_type_basic").show();
                        $("#package_type_intermediate").show();
                        $("#package_type_advance").show();
                    }
                }
            });
        })
        
        $(document).on("change", "#EditSubcategoryForPackages", function(){
            var subcategory = $(this).val();
            $.ajax({
                url: "{{ url('check_subcategory_select_other') }}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: subcategory,
                },
                success: function(result){
                    if(result.data == "others")
                    {
                        $("#package_type_basic").hide();
                        $("#package_type_intermediate").hide();
                        $("#package_type_advance").hide();
                    }
                    else
                    {
                        $("#package_type_basic").show();
                        $("#package_type_intermediate").show();
                        $("#package_type_advance").show();
                    }
                }
            });
        })
        
        $("#want_pricing_or_not").click(function(){
            var want_pricing_or_not = $("#want_pricing_or_not").is(":checked");
            if(want_pricing_or_not == true)
            {
                $(".currency-fields").hide();
                $('.price').prop('required',false);
                $('.actual_price').prop('required',false);
                $('.yearly_price').prop('required',false);
                $('.price').val("");
                $('.actual_price').val("");
                $('.yearly_price').val("");
            }
            if(want_pricing_or_not == false)
            {
                $(".currency-fields").show();
                $('.price').prop('required',true);
                $('.actual_price').prop('required',true);
                $('.yearly_price').prop('required',true);
            }
        });

        $(".Select-2").select2({
            tags: true
        });

        $(document).ready(function(){
            var edit_want_pricing_or_not = $("#edit_want_pricing_or_not").is(":checked");

            if(edit_want_pricing_or_not == true)
            {
                $(".currency-fields").hide();
                $('.price').prop('required',false);
                $('.actual_price').prop('required',false);
                $('.yearly_price').prop('required',false);
                $('.price').val("");
                $('.actual_price').val("");
                $('.yearly_price').val("");
            }
            if(edit_want_pricing_or_not == false)
            {
                $(".currency-fields").show();
                $('.price').prop('required',true);
                $('.actual_price').prop('required',true);
                $('.yearly_price').prop('required',true);
            }
        })

        $("#edit_want_pricing_or_not").click(function(){
            var edit_want_pricing_or_not = $("#edit_want_pricing_or_not").is(":checked");
            if(edit_want_pricing_or_not == true)
            {
                $('.edit_price').prop('required',false);
                $('.edit_actual_price').prop('required',false);
                $('.edit_yearly_price').prop('required',false);
                $('.edit_price').val("");
                $('.edit_actual_price').val("");
                $('.edit_yearly_price').val("");
                $(".currency-fields").hide();
            }
            if(edit_want_pricing_or_not == false)
            {
                $(".currency-fields").show();
                $('.price').prop('required',true);
                $('.actual_price').prop('required',true);
                $('.yearly_price').prop('required',true);
            }
        });
        
        $("#customize_packages").click(function(){
            var customize_packages = $("#customize_packages").is(":checked");

            if(customize_packages == true)
            {
                $('.price').prop('required',false);
                $('.actual_price').prop('required',false);
                $('.yearly_price').prop('required',false);
                $('.package_type').prop('required',false);
                $('.name').prop('required',false);
                $('.discription').prop('required',false);
        
                $('.price').val("");
                $('.actual_price').val("");
                $('.yearly_price').val("");
                $('.package_type').val("");
                $('.name').val("");
                $('.discription').val("");
                
                $(".customize_packages_div_one").show();
                $(".customize_packages_div_two").hide();
            }
            if(customize_packages == false)
            {
                $(".customize_packages_div_two").show();
            }
        });

        $(document).on('click','.create_roles_managers', function() {
            var roles  = $(".roles").val();
            var name  = $(".create_name").val();
            var email  = $(".email").val();
            var password  = $(".password").val();
            var confirm_password  = $(".confirm_password").val();

            if (roles.length === 0) 
            {
                $(".invalid-tooltip-roles").text("Please select role for this user here...");
            }
            if (name === "") 
            {
                $(".invalid-tooltip-name").text("Please enter name here...");
            }
            if (email === "") 
            {
                $(".invalid-tooltip-email").text("Please enter email here...");
            }
            if (password === "") 
            {
                $(".invalid-tooltip-email").text("Please enter password here...");
            }
            if (confirm_password === "") 
            {
                $(".invalid-tooltip-password").text("Please enter confirm password here...");
            }
            if(password !== confirm_password)
            {
                $(".invalid-tooltip-confirmPassword").text("Your confirmed password does not match; please enter the same password in both fields");
            }
            if(roles.length !== 0 && name !== "" && email !== "" && password !== "" && confirm_password !== "" && password === confirm_password)
            {
                let formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('roles', roles);
                formData.append('name', name);
                formData.append('email', email);
                formData.append('password', password);
                formData.append('confirm_password', confirm_password);

                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('create_roles_managers') }}",
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(result)
                    {
                        if(result.message === "The email has already been taken")
                        {
                            $(".invalid-tooltip-email").text(result.message);
                        }
                        if (result.success) 
                        {
                            Swal.fire({
                                icon: 'success',
                                title: 'Manager Created Successfully!',
                                showConfirmButton: false,
                                timer: 2000,
                                onClose: function() {
                                    window.location.reload();
                                }
                            });
                        } 
                    }
                });
            }
        });

        $(document).on('click', '.editManagers', function(){

            var roles1 = $(this).data("roles1");

            var rolesArray = roles1.split(',').map(function(id) {
                return id.trim();
            });

            console.log(rolesArray);

            // $('.edit_roles').val(rolesArray);

            // $('.edit_roles').select2({
            //     theme: 'bootstrap4',
            //     width: '100%' 
            // });

            $('.edit_roles').val(rolesArray);

            $('.edit_id').val($(this).data("id"));
            $('.edit_name').val($(this).data("name"));
            $('.edit_email').val($(this).data("email"));
            // $('.edit_roles').val($(this).data("roles"));
        })

        $(document).on('click', '.update_roles_managers', function(){
            var id = $(".edit_id").val();
            var roles  = $(".edit_roles").val();
            var name  = $(".edit_name").val();

            if (roles.length === 0) 
            {
                $(".invalid-tooltip-roles").text("Please select role for this user here...");
            }
            if (name === "") 
            {
                $(".invalid-tooltip-name").text("Please enter name here...");
            }
            if(roles.length !== 0 && name !== "")
            {
                let formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('id', id);
                formData.append('roles', roles);
                formData.append('name', name);

                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('update_roles_managers') }}",
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(result)
                    {
                        if (result.success) 
                        {
                            Swal.fire({
                                icon: 'success',
                                title: 'Manager Updated Successfully!',
                                showConfirmButton: false,
                                timer: 2000,
                                onClose: function() {
                                    window.location.reload();
                                }
                            });
                        } 
                    }
                });
            }
        })

        $(document).on('click', '.editManagersPassword', function(){
            $('.edit_password_id').val($(this).data("id"));
        })

        $(document).on('click', '.updatepassword_roles_managers', function(){
            var id = $(".edit_password_id").val();
            var password  = $(".edit_password").val();
            var confirm_password  = $(".edit_confirm_password").val();

            if (password === "") 
            {
                $(".invalid-tooltip-edit-password").text("Please enter password here...");
            }
            if (confirm_password === "") 
            {
                $(".invalid-tooltip-edit-confirmPassword").text("Please enter confirm password here...");
            }
            if(password !== confirm_password)
            {
                $(".invalid-tooltip-edit-confirmPassword").text("Your confirmed password does not match; please enter the same password in both fields");
            }
            if(password !== "" && confirm_password !== "" && password === confirm_password)
            {
                let formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('id', id);
                formData.append('password', password);

                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('update_roles_managers_password') }}",
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(result)
                    {
                        console.log(result);
                        if (result.success) 
                        {
                            Swal.fire({
                                icon: 'success',
                                title: 'Manager Password Created Successfully!',
                                showConfirmButton: false,
                                timer: 2000,
                                onClose: function() {
                                    window.location.reload();
                                }
                            });
                        } 
                    }
                });
            }
        })
    });
</script>