<script>
    $(document).ready(function() {

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

                $("#edit_id").val(id);
                $("#edit_name").val(name);
                $("#edit_designation").val(designation);
                $("#edit_comments").val(comment);
                $("#testimonialImage").attr("src", image);
            });
        //This script for Testimonails Section Data end
    });
</script>