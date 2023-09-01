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






    const tabimgs = {
        CustomWebsiteDevelopment: '{{url('user_assets/images/tabs01.png')}}',
        eCommerceDevelopment: '{{url('user_assets/images/tabs2.png')}}',
        Branding: '{{url('user_assets/images/tabs3.png')}}',
        WebApps: '{{url('user_assets/images/tabs4.png')}}',
        MotionGraphics: '{{url('user_assets/images/tabs5.png')}}',
        ContentWriting: '{{url('user_assets/images/tabs6.png')}}'
    };

    const tabContent = {
        CustomWebsiteDevelopment: {
            textdescription: 'From Pixels to Profits: Creating Websites That Drive Your Business Forward.',
            listitems: [
                'PHP Development',
                'Front End Development',
                'Drupal Development',
                'Back End Development',
                'Minimum Viable Products',
                'Open Source Development',
                'CMS Development',
            ],
        },
        eCommerceDevelopment: {
         textdescription: 'Your eCommerce Solutions Partner.',
         listitems: [
            'Taha Ali',
            'Front End Development',
            'Drupal Development',
            'Back End Development',
            'Minimum Viable Products',
            'Open Source Development',
            'CMS Development',
         ],
        },
        Branding: {
         textdescription: 'Crafting Brands That Resonate.',
         listitems: [
            'PHP Development',
            'Front End Development',
            'Drupal Development',
            'Back End Development',
            'Minimum Viable Products',
            'Open Source Development',
            'CMS Development',
         ],
        },
        WebApps: {
         textdescription: 'Web Apps for Enhanced User Experience.',
         listitems: [
            'PHP Development',
            'Front End Development',
            'Drupal Development',
            'Back End Development',
            'Minimum Viable Products',
            'Open Source Development',
            'CMS Development',
         ],
        },
        MotionGraphics: {
         textdescription: 'Motion Graphics that Captivate Your Audience.',
         listitems: [
            'PHP Development',
            'Front End Development',
            'Drupal Development',
            'Back End Development',
            'Minimum Viable Products',
            'Open Source Development',
            'CMS Development',
         ],
        },
        ContentWriting: {
         textdescription: 'Compelling Content that Engages.',
         listitems: [
            'PHP Development',
            'Front End Development',
            'Drupal Development',
            'Back End Development',
            'Minimum Viable Products',
            'Open Source Development',
            'CMS Development',
         ],
        },
    };

    const tabLinks = document.querySelectorAll('.ourservices2-tabs a');
    const tabImg = document.getElementById('tabImg');
    const tabDescription = document.getElementById('tabDescription');
    const tabList = document.getElementById('tabList');

    const initialActiveTab = 'CustomWebsiteDevelopment';
    tabImg.src = tabimgs[initialActiveTab];
    tabDescription.textContent = tabContent[initialActiveTab].textdescription;

    tabList.innerHTML = '';
    tabContent[initialActiveTab].listitems.forEach(item => {
        const li = document.createElement('li');
        li.textContent = item;
        tabList.appendChild(li);
    });

    tabLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const activeTab = this.getAttribute('data-bs-target').replace('#', '');
            tabImg.src = tabimgs[activeTab];
            tabDescription.textContent = tabContent[activeTab].textdescription;

            tabList.innerHTML = '';
            tabContent[activeTab].listitems.forEach(item => {
                const li = document.createElement('li');
                li.textContent = item;
                tabList.appendChild(li);
            });
        });
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
</script>