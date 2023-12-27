<script>
   
    const d = new Date();
    let year = d.getFullYear();
    document.getElementById("currentYear").innerHTML = year;
   
   
    AOS.init({
        offset: 10,
        once: true,
    });

    $('.technologies-carousel').owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            margin: 20,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1000: {
                    items: 6,
                },
            },
    });

    $('.core-carousel').owlCarousel({
        loop: true,
        autoplay: true,
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
    });

    $('.ourloyalcarousel').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        margin: 20,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 2,
            },
            768: {
                items: 3,
            },
            1000: {
                items: 6,
            },
        },
    });

    $('.testimonialcarousel').owlCarousel({
        loop: true,
        autoplay: true,
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

    $('.blogtestimonial').owlCarousel({
        loop: true,
        autoplay: true,
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
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        margin: 20,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 3,
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

        var name = $('.contact_name').val();

        if(name === "")
        {
            $(".name-error").text("Please enter name here...");
        }
        else
        {
            var correct_name = name;
        }

        var email = $('.contact_email').val();
        var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if(emailPattern.test(email)) 
        {
            var correct_email = email;
        } 
        else 
        {
            $(".email-error").text("Please enter email here...");
        }

        var phone = $('.contact_phone').val();
        var phonePattern = /^\d{11}$/;

        if(phonePattern.test(phone)) 
        {
            var correct_phone = phone;
        }
        else 
        {
            $(".phone-error").text("Please enter phone here...");
        }
        
        var subject = $('.categories').val();
        if(subject === null)
        {
            $(".categories-error").text("Please select any category here...");
        }
        else
        {
            var correct_subject = subject;
        }

        var text = $('.contact_text').val();
        if(text === "")
        {
            $(".text-error").text("Please enter text here...");
        }
        else
        {
            var correct_text = text;
        }

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
                "name": correct_name,
                "email": correct_email,
                "phone": correct_phone,
                "subject": correct_subject,
                "text": correct_text,
            },
            success: function(result){
                Swal.fire({
                    icon: 'success',
                    title: 'Form Submitted Successfully!',
                    showConfirmButton: false,
                    timer: 2000,
                });
                $('.contact_name').val("");
                $('.contact_email').val("");
                $('.contact_phone').val("");
                $('.categories').val("select");
                $('.contact_text').val("");
            }
        });
    })

    $(document).on('click','.first_contact_us', function() {

        var name = $('.first_contact_name').val();

        if(name === "")
        {
            $(".first-name-error").text("Please enter name here...");
        }
        else
        {
            var correct_name = name;
        }

        var email = $('.first_contact_email').val();
        var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if(emailPattern.test(email)) 
        {
            var correct_email = email;
        } 
        else 
        {
            $(".first-email-error").text("Please enter email here...");
        }

        var phone = $('.first_contact_phone').val();
        var phonePattern = /^\d{11}$/;

        if(phonePattern.test(phone)) 
        {
            var correct_phone = phone;
        }
        else 
        {
            $(".first-phone-error").text("Please enter phone here...");
        }

        var subject = $('.first_categories').val();
        if(subject === null)
        {
            $(".first-categories-error").text("Please select any category here...");
        }
        else
        {
            var correct_subject = subject;
        }

        var text = $('.first_contact_text').val();
        if(text === "")
        {
            $(".first-text-error").text("Please enter text here...");
        }
        else
        {
            var correct_text = text;
        }

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
                "name": correct_name,
                "email": correct_email,
                "phone": correct_phone,
                "subject": correct_subject,
                "text": correct_text,
            },
            success: function(result){
                Swal.fire({
                    icon: 'success',
                    title: 'Form Submitted Successfully!',
                    showConfirmButton: false,
                    timer: 2000,
                });
                $('.first_contact_name').val("");
                $('.first_contact_email').val("");
                $('.first_contact_phone').val("");
                $('.first_categories').val("select");
                $('.first_contact_text').val("");
                
                $(".first-name-error").text("");
                $(".first-email-error").text("");
                $(".first-phone-error").text("");
                $(".first-text-error").text("");
                $(".first-categories-error").text("");
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
    
    $(document).ready(function()
    {
        $(document).on('change', '.HeaderCurrency', function()
        {
            var currencyValue = $(this).val();

            var isChecked = $('.yearlyCheckBox').is(':checked');

            if(isChecked === true)
            {
                isChecked = "on";
            }
            else
            {
                isChecked = "off";
            }

            var hiddenfieldofsubcategory = $('.hiddenfieldofsubcategory').val();

            var tab = $('.nav-link.getTabValue.active').data('tab');
            
            if(tab === undefined)
            {
                var isChecked = $('.HomeYearlyCheckBox').is(':checked');

                if(isChecked === true)
                {
                    isChecked = "on";
                }
                else
                {
                    isChecked = "off";
                }
                
                $.ajax({
                    url: "{{ url('HomePageCurrencyPackages') }}",
                    type: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id" : hiddenfieldofsubcategory,
                        "HomeYearlyCheckBox" : isChecked,
                        "currencyValue" : currencyValue,
                    },
                    success: function(result)
                    {
                        $('.homeappendpackage').html(result.data);
                    }
                });
            }
            else
            {
                if(tab === 'basic')
                {
                    $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ url('get_basic_packages_on_service') }}",
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "data" : 'basic',
                            "SubCategoryId" : hiddenfieldofsubcategory,
                            "isChecked" : isChecked,
                            "currencyValue" : currencyValue,
                        },
                        success:function(response){
                            $('.appendpackage').html(response.data);
                        },
                    });
                }
                else if(tab === 'intermediate')
                {
                    $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    
                    $.ajax({
                        url: "{{ url('get_intermediate_packages_on_service') }}",
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "data" : 'intermediate',
                            "SubCategoryId" : hiddenfieldofsubcategory,
                            "isChecked" : isChecked,
                            "currencyValue" : currencyValue,
                        },
                        success:function(response){
                            $('.appendpackage').html(response.data);
                        },
                    });
                }
                else if(tab === 'advance')
                {
                    $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    
                    $.ajax({
                        url: "{{ url('get_advance_packages_on_service') }}",
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "data" : 'advance',
                            "SubCategoryId" : hiddenfieldofsubcategory,
                            "isChecked" : isChecked,
                            "currencyValue" : currencyValue,
                        },
                        success:function(response){
                            $('.appendpackage').html(response.data);
                        },
                    });
                }
                else if(tab === 'others')
                {
                    $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    
                    $.ajax({
                        url: "{{ url('get_others_packages_on_service') }}",
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "data" : 'others',
                            "SubCategoryId" : hiddenfieldofsubcategory,
                            "isChecked" : isChecked,
                            "currencyValue" : currencyValue,
                        },
                        success:function(response){
                            $('.appendpackage').html(response.data);
                        },
                    });
                }
            }
        });

        $(document).on('click', '.yearlyCheckBox', function()
        {
            var currencyValue = $('.HeaderCurrency').val();

            var isChecked = $('.yearlyCheckBox').is(':checked');

            if(isChecked === true)
            {
                isChecked = "on";
            }
            else
            {
                isChecked = "off";
            }

            var hiddenfieldofid = $('.hiddenfieldofid').val();

            var hiddenfieldofsubcategory = $('.hiddenfieldofsubcategory').val();

            var tab = $('.nav-link.getTabValue.active').data('tab');

            if(tab === 'basic')
            {
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('get_basic_packages_on_service') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "data" : 'basic',
                        "SubCategoryId" : hiddenfieldofsubcategory,
                        "isChecked" : isChecked,
                        "currencyValue" : currencyValue,
                    },
                    success:function(response){
                        $('.appendpackage').html(response.data);
                    },
                });
            }
            else if(tab === 'intermediate')
            {
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('get_intermediate_packages_on_service') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "data" : 'intermediate',
                        "SubCategoryId" : hiddenfieldofsubcategory,
                        "isChecked" : isChecked,
                        "currencyValue" : currencyValue,
                    },
                    success:function(response){
                        $('.appendpackage').html(response.data);
                    },
                });
            }
            else if(tab === 'advance')
            {
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('get_advance_packages_on_service') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "data" : 'advance',
                        "SubCategoryId" : hiddenfieldofsubcategory,
                        "isChecked" : isChecked,
                        "currencyValue" : currencyValue,
                    },
                    success:function(response){
                        $('.appendpackage').html(response.data);
                    },
                });
            }
            else if(tab === 'others')
            {
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('get_others_packages_on_service') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "data" : 'others',
                        "SubCategoryId" : hiddenfieldofsubcategory,
                        "isChecked" : isChecked,
                        "currencyValue" : currencyValue,
                    },
                    success:function(response){
                        $('.appendpackage').html(response.data);
                    },
                });
            }
        });

        //Script For Basic Packages Start
        
            $(document).on('click','.basic', function()
            {
                var currencyValue = $('.HeaderCurrency').val();

                var isChecked = $('.yearlyCheckBox').is(':checked');

                if(isChecked === true)
                {
                    isChecked = "on";
                }
                else
                {
                    isChecked = "off";
                }

                var data = $(this).data("basic");

                var SubCategoryId = $(".SubCategoryId").val();
                
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('get_basic_packages_on_service') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "data" : data,
                        "SubCategoryId" : SubCategoryId,
                        "isChecked" : isChecked,
                        "currencyValue" : currencyValue,
                    },
                    success:function(response){
                        $('.appendpackage').html(response.data);
                    },
                });
            })

        //Script For Basic Packages End

        //Script For Intermediate Packages Start

            $(document).on('click','.intermediate', function(){

                var currencyValue = $('.HeaderCurrency').val();

                var isChecked = $('.yearlyCheckBox').is(':checked');

                if(isChecked === true)
                {
                    isChecked = "on";
                }
                else
                {
                    isChecked = "off";
                }
                var data = $(this).data("intermediate");

                var SubCategoryId = $(".SubCategoryId").val();

                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('get_intermediate_packages_on_service') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "data" : data,
                        "SubCategoryId" : SubCategoryId,
                        "isChecked" : isChecked,
                        "currencyValue" : currencyValue,
                    },
                    success:function(response){
                        $('.appendpackage').html(response.data);
                    },
                });
            })

        //Script For Intermediate Packages End

        //Script For Advance Packages Start

            $(document).on('click','.advance', function(){

                var currencyValue = $('.HeaderCurrency').val();

                var isChecked = $('.yearlyCheckBox').is(':checked');

                if(isChecked === true)
                {
                    isChecked = "on";
                }
                else
                {
                    isChecked = "off";
                }

                var data = $(this).data("advance");

                var SubCategoryId = $(".SubCategoryId").val();

                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ url('get_advance_packages_on_service') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "data" : data,
                        "SubCategoryId" : SubCategoryId,
                        "isChecked" : isChecked,
                        "currencyValue" : currencyValue,
                    },
                    success:function(response){
                        $('.appendpackage').html(response.data);
                    },
                });
            })

        //Script For Advance Packages End
        
        //Script for Footer Start
            $.ajax({
                url: "{{ url('get_services_for_footer') }}",
                type: 'get',
                success: function(result){
                    $(".footerLinksOne").append(result.HtmlOne);
                    $(".FooterContent").html(result.FooterContent);
                    $(".OfficeAddress").html(result.OfficeAddress);
                }
            });
        //Script for Footer End
        
        //Script for Home Packages Start

            $(document).on('click','.homepagepackages', function()
            {
                var currencyValue = $('.HeaderCurrency').val();

                var HomeYearlyCheckBox = $('.HomeYearlyCheckBox').is(':checked');
    
                if(HomeYearlyCheckBox === true)
                {
                    HomeYearlyCheckBox = "on";
                }
                else
                {
                    HomeYearlyCheckBox = "off";
                }
    
                var id = $(this).data('id');
                    
                $.ajax({
                    url: "{{ url('home_page_packages') }}",
                    type: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id" : id,
                        "HomeYearlyCheckBox" : HomeYearlyCheckBox,
                        "currencyValue" : currencyValue,
                    },
                    success: function(result)
                    {
                        var imageUrl = '/user_assets/images/Checkicon2.png';

                        var listItems = $('.pricingbody ul li');

                        listItems.each(function()
                        {
                            var imgElement = document.createElement('img');
                            imgElement.src = imageUrl;
                            $(this).prepend(imgElement);
                        });
                        
                        $('.homeappendpackage').html(result.data);
                    }
                });
            })

            $(document).on('click', '.HomeYearlyCheckBox', function()
            {
                var currencyValue = $('.HeaderCurrency').val();

                var HomeYearlyCheckBox = $('.HomeYearlyCheckBox').is(':checked');
    
                if(HomeYearlyCheckBox === true)
                {
                    HomeYearlyCheckBox = "on";
                }
                else
                {
                    HomeYearlyCheckBox = "off";
                }
    
                var SubCategoryId = $('.ChangeValueOnHomeYearlyCheckBoxSubcategory').val();

                var Id = $('.hiddenfieldofid').val();
        
                $.ajax({
                    url: "{{ url('home_page_packages_on_yearly_check_box') }}",
                    type: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "Id" : Id,
                        "SubCategoryId" : SubCategoryId,
                        "HomeYearlyCheckBox" : HomeYearlyCheckBox,
                        "currencyValue" : currencyValue,
                    },
                    success: function(result)
                    {
                        $('.homeappendpackage').html(result.data);
                    }
                });
            });

        //Script for Home Packages End
    })

    $(document).ready(function() {
        
        $(".blogeSearch").keyup(function()
        {
            var keyword = $(this).val();
            $.ajax({
                url: "{{ url('blogeSearch') }}",
                method: 'GET',
                data: { keyword: keyword },

                success: function(response) 
                {
                    $('.searchResults').html(response.data);
                }
            });
        });

        $(document).on('change', '.search_category', function() {
            var category = $(this).val();
            $.ajax({
                url: "{{ url('blogeSearch') }}",
                method: 'GET',
                data: { category: category },
                success: function(response) 
                {
                    $('.searchResults').html(response.data);
                }
            });
        });

        $(document).on('click', '.loadMoreBlogs', function() {
            var count = $(this).data('count');
            $.ajax({
                url: "{{ url('loadMoreBlogs') }}",
                method: 'GET',
                data: { count: count },
                success: function(response) 
                {
                    $('.searchResults').html(response.data);
                }
            });
        });

        
    });
    
    function formatState(state)
    {
        if (!state.id)
        {
            return state.text;
        }
        
        var domain = window.location.protocol + "//" + window.location.hostname + ":" + window.location.port;
        
        var imageBasePath = domain + "/public/currency/";
        var imageName = state.element.getAttribute('data-image');
        var imageUrl = imageName;
        
        var $state = $(
            '<span><img class="img-flag" src="' + imageUrl + '" alt="dce-image" /> <span>' + state.text + '</span></span>'
        );
        
        return $state;
    };

    $(".js-example-disabled-results").select2({
        templateResult: formatState,
        templateSelection: formatState
    });

    $(document).ready(function () {
        $.ajax({
            url: "{{ url('HeaderCurrency') }}",
            type: 'GET',
            dataType: 'json',
            success: function (data) 
            {
                $('.HeaderCurrency').html(data)
            },
            error: function (error) 
            {
                console.log(error);
            }
        });
    });
    
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        
        $.ajax({
            url: "{{ url('get_services_on_mobile') }}",
            type: 'get',
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function(result){
                $('.mobile_services').html(result)
            }
        }); 
    })
    
    // adding wright check icon
    $(document).on("click", ".get_start_button", function()
    {
        var package_id = $(this).data("package_id");
        var header_currency = $(".HeaderCurrency").val();

        var isChecked = $('.yearlyCheckBox').is(':checked');

        if(isChecked === true)
        {
            isChecked = "yearly";
        }
        else
        {
            isChecked = "monthly";
        }
        $(".set_package_id").val(package_id);
        $(".set_header_currency").val(header_currency);
        $(".set_yearly_or_monthly").val(isChecked);
    })

    var imageUrl = 'http://www.digicontentexperts.com/public/user_assets/images/checkicon2.png';
    
    var listItems = $('.pricingbody ul li');
    
    listItems.each(function()
    {
        var imgElement = document.createElement('img');
        imgElement.src = imageUrl;
        $(this).prepend(imgElement);
    });
    
    $(document).on('click','.perchasePackage', function() {

        var name = $('.package_name').val();
        if(name === "")
        {
            $(".name-error").text("Please enter name here...");
        }
        else
        {
            var correct_name = name;
        }

        var email = $('.package_email').val();
        var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if(emailPattern.test(email)) 
        {
            var correct_email = email;
        } 
        else 
        {
            $(".email-error").text("Please enter email here...");
        }

        var phone = $('.package_phone').val();
        var phonePattern = /^\d{11}$/;

        if(phonePattern.test(phone)) 
        {
            var correct_phone = phone;
        }
        else 
        {
            $(".phone-error").text("Please enter phone here...");
        }

        var subject = $('.package_categories').val();
        if(subject === null)
        {
            $(".categories-error").text("Please select any category here...");
        }
        else
        {
            var correct_subject = subject;
        }

        var text = $('.package_text').val();
        if(text === "")
        {
            $(".text-error").text("Please enter text here...");
        }
        else
        {
            var correct_text = text;
        }

        var package_id = $(".set_package_id").val();
        var set_header_currency = $(".set_header_currency").val();
        var yearly_or_monthly = $(".set_yearly_or_monthly").val();

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
                "name": correct_name,
                "email": correct_email,
                "phone": correct_phone,
                "subject": correct_subject,
                "text": correct_text,
                "package_id" : package_id, 
                "header_currency" : set_header_currency, 
                "yearly_or_monthly" : yearly_or_monthly, 
            },
            success: function(result){
                Swal.fire({
                    icon: 'success',
                    title: 'Form Submitted Successfully!',
                    showConfirmButton: false,
                    timer: 2000,
                }).then(() => {
                    location.reload(); // Reload the page
                });
                $('.contact_name').val("");
                $('.contact_email').val("");
                $('.contact_phone').val("");
                $('.categories').val("select");
                $('.contact_text').val("");
            }
        });
    })


</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6523e0a06fcfe87d54b7f202/1hca2at5s';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


@stack('scripts')