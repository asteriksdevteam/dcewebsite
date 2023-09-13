<script>
    $('.ourloyalcarousel').owlCarousel({
        loop: false,
        autoplay: false,
        autoplayTimeout: 5000,
        margin: 20,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 3,
            },
            1000: {
                items: 4,
            },
        },
    });

    $('.philosphy-carousel').owlCarousel({
        loop: false,
        autoplay: false,
        autoplayTimeout: 5000,
        margin: 20,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    })

    $('.testimonialcarousel').owlCarousel({
        loop: false,
        autoplay: false,
        autoplayTimeout: 5000,
        margin: 20,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1, 
            },
            600: {
                items: 1, 
            },
            1000: {
                items: 1,
            },
        },
    });
    
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();

        if (scroll >= 10) {
            $(".desktopmenu").addClass("scrolled");
        } else {
            $(".desktopmenu").removeClass("scrolled");
        }
    });

    $(document).ready(function(){
        console.log("hello");
    })

    $('.blogtestimonial').owlCarousel({
        loop: false,
        autoplay: false,
        autoplayTimeout: 5000,
        margin: 20,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1, 
            },
            600: {
                items: 1, 
            },
            1000: {
                items: 1,
            },
        },
    });

    $('.banner-icons').owlCarousel({
        loop: false,
        autoplay: false,
        autoplayTimeout: 5000,
        margin: 20,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 3,
            },
            1000: {
                items: 4,
            },
        },
    });

    $(document).on('click','.OnClickToGetService', function() {
        var val = $(this).find('.getname').val();
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        
        $.ajax({
            url: "{{ url('get_services_for_home') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                val: val,
            },
            success: function(result){
                $('.mpad').html(result.image);
                $('.bluediv').html(result.content);
            }
        });

    });

    $(document).on('click','.service_name_li', function() {
        var id = $(this).find('.service_name').val();
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        
        $.ajax({
            url: "{{ url('get_work_on_home') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                id: id,
            },
            success: function(result){
                $('.workimages').html(result.image)
            }
        });

    })

    $(document).on('click','.all_work', function() {
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        
        $.ajax({
            url: "{{ url('get_all_work_on_home') }}",
            type: 'get',
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function(result){
                $('.workimages').html(result.image)
            }
        });

    })

    $(document).on('click','.contact_us', function() {
        var name = $('#contact_name').val();
        var email = $('#contact_email').val();
        var phone = $('#contact_phone').val();
        var subject = $('#contact_subject').val();
        var text = $('#contact_text').val();
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        
        $.ajax({
            url: "{{ url('contact_us') }}",
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "name": name,
                "email": email,
                "phone": phone,
                "subject": subject,
                "text": text,
            },
            success: function(result){
                Swal.fire({
                    icon: 'success',
                    title: 'Form Submitted Successfully!',
                    showConfirmButton: false,
                    timer: 2000,
                });
                $('#contact_name').val("");
                $('#contact_email').val("");
                $('#contact_phone').val("");
                $('#contact_subject').val("");
                $('#contact_text').val("");
            }
        });

    })
    
    $(document).on('click','.service_detail_name_li', function() {
        var id = $(this).find('.service_detail_name').val();
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ url('get_work_specific_service') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                id: id,
            },
            success: function(result){
                $('.spesificworkimages').html(result.image)
            }
        });
    })
    
</script>