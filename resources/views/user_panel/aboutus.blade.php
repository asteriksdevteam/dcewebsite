@extends('user_panel.layout.app')
@section('content')

<section class='aboutbanner'>
    <div class='container centercontainer'>
        <div class="row">
            <div class='col-lg-8'>
                <div class='bannercontnet'>
                    <h1><span class='highlight'>{{ $AboutUsBanner->heading }}</span></h1>
                    <p>{{ $AboutUsBanner->content }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class='whoweare-section'> 
    <div class="container">
        <div class="row">
            <div class='col-lg-7 col-md-6 col-xs-12'>

                <h3 class='subtitle4'>WHO WE ARE?</h3>
                {!! $WhoWeAre->about_content !!}
            </div>
            <div class='col-lg-5 col-md-6 col-xs-12'>
                <div class='whoweare-img'>
                    <img src="{{url($WhoWeAre->image)}}" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class='mission-section'> 
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-xs-12">
                <h2 class='title'><span class='highlight'>Mission Vision</span></h2>
                {!! $MissionVision->about_content!!}
            </div>
            <div class="col-lg-5 col-md-5 col-xs-12">
                <div class='whoweare-img'>
                    <img src="{{url($MissionVision->image)}}" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class='ourloyal-section'>
    <div class="container">
    <div class='row justify-content-center text-center'>
        <h2 class='title'>{{ $LoyalCustomers->heading }}</h2>
        <p class='para'>{{ $LoyalCustomers->content }}</p>
    </div>
        <div class='row mt-4'>

            <div class="owl-carousel ourloyalcarousel">
                @foreach($LoyalCustomersImages as $item)
                <div class='item'>
                    <img src="{{url($item->images)}}" class='ly1' alt="" />
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class='philosphy-section'> 
    <div class="container">
        <div class="row">
             <div class="col-lg-5 col-md-6 col-xs-12">
                <div class='philosphy-img'>
                    <img src="{{url($OurPhilosophy->image)}}" />
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-xs-12" class='my-auto'>
                <h2 class='title'><span class='highlight'>Our Philosophy</span></h2>

                <div class='philosphy-content1'>
                    <h3>{{ $OurPhilosophy->first_heading }}</h3>
                    <p class='para'>{{ $OurPhilosophy->first_content }}</p>
                </div>
                <div class='philosphy-content1'>
                    <h3>{{ $OurPhilosophy->second_heading }}</h3>
                    <p class='para'>{{ $OurPhilosophy->second_content }}</p>
                </div>
                <div class='philosphy-content1'>
                    <h3>{{ $OurPhilosophy->third_heading }}</h3>
                    <p class='para'>{{ $OurPhilosophy->third_content }}</p>
                </div>
                <div class='philosphy-content1'>
                    <h3>{{ $OurPhilosophy->fourth_heading }}</h3>
                    <p class='para'>{{ $OurPhilosophy->fourth_content }}</p>
                </div>
                <div class='philosphy-content1'>
                    <h3>{{ $OurPhilosophy->fifth_heading }}</h3>
                    <p class='para'>{{ $OurPhilosophy->fifth_content }}</p>
                </div>
                <div class='philosphy-content1'>
                    <h3>{{ $OurPhilosophy->sixth_heading }}</h3>
                    <p class='para'>{{ $OurPhilosophy->sixth_content }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class='countup-section'>
    <div class="container">
        <div class='row position-relative'>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class='countup-img'>
                    <img src="{{url('user_assets/images/tabmobile.png')}}" alt="" />
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-xs-12 my-auto">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class='count-scontent'>
                            <h2 class='title'><span class='highlight'><div class="counter" id="counter1"></div> </span> </h2> <p class='para'> Website Developed</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class='count-scontent'>
                            <h2 class='title'><span class='highlight'><div class="counter" id="counter2"></div></span> </h2> <p class='para'> Logo Design</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class='count-scontent'>
                            <h2 class='title'><span class='highlight'><div class="counter" id="counter3"></div></span> </h2> <p class='para'> Mobile Application Developed</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class='count-scontent'>
                            <h2 class='title'><span class='highlight'><div class="counter" id="counter4"></div></span> </h2> <p class='para'> eCommerce Website Developed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class='faq-section'>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class='title'>Frequently Asked <span className='highlight'>Question’s</span></h2>
            </div>
        </div>
        <div class='row mt-5'>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h4 className='faq-heading'>Sapien purus sed in cras donec eu nec</h4>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p className='para'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                    culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-1">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <h4 className='faq-heading'>Sapien purus sed in cras donec eu nec</h4>
                            </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p className='para'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                    culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-1">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <h4 className='faq-heading'>Sapien purus sed in cras donec eu nec</h4>
                            </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p className='para'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                    culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-1">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <h4 className='faq-heading'>Sapien purus sed in cras donec eu nec</h4>
                            </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p className='para'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                    culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-1">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <h4 className='faq-heading'>Sapien purus sed in cras donec eu nec</h4>
                            </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p className='para'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                    culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                            <h4 className='faq-heading'>Sapien purus sed in cras donec eu nec</h4>
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p className='para'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                    </div>
                    
                    <div class="mt-4 pt-1">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                <h4 className='faq-heading'>Sapien purus sed in cras donec eu nec</h4>
                            </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p className='para'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                    culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-1">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                <h4 className='faq-heading'>Sapien purus sed in cras donec eu nec</h4>
                            </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p className='para'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                    culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-1">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                <h4 className='faq-heading'>Sapien purus sed in cras donec eu nec</h4>
                            </button>
                            </h2>
                            <div id="collapseNine" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p className='para'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                    culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-1">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                <h4 className='faq-heading'>Sapien purus sed in cras donec eu nec</h4>
                            </button>
                            </h2>
                            <div id="collapseTen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p className='para'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                    aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                    culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<section class='bluebanner-section mp'> 
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-xs-12 my-auto">

                <div class='bluebanner-content'>
                    <h2 class='title text-white'>PHP DEVELOPMENT</h2>
                    <p class='para text-white mt-4 mb-5 pb-1'>Our Team of Highly Skilled PHP Developers Enables Us to Deliver Creative and Result Oriented PHP Web Development Services to Serve Your Businesses.</p>
                    <div class='dlink'>
                        <a href='#' class='whitebtn'>Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-xs-12">
                <div class='bluebanner-img'>
                    <img src="{{url('user_assets/images/laptop.png')}}" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class='contact-section'>  
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12 my-auto m20">
                <div>
                    <h3 class="blackhighlight">feedback welcome:</h3>
                    <h2 class="title mt-2"><span class="highlight">we want to hear from you</span></h2>
                    <p class='para mt-4'>Attention! In order to benefit from the top-notch services and packages offered by Web Design LLC, signing up is a mandatory requirement. With our expertise and dedication, we ensure to turn all your ideas into a successful project that exceeds your expectations.</p>
                </div>

                <div class='form1 mt-4'>
                    <h2 class='title'><span class='highlight'>Get in touch.</span></h2>
                    <form action="#" class='mt-4'>
                        <div class='row'>
                            <div class="col-lg-6">
                                <input type="text" placeholder='name*' class='form-control' required/>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder='email*' class='form-control' required/>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-lg-6">
                                <input type="text" placeholder='phone*' class='form-control' required/>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder='subject*' class='form-control' required/>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-lg-12">
                                <textarea class='form-control' rows={10} placeholder='messages*' required></textarea> 
                            </div>
                        </div>
                        <button type='submit' class='submit'>submit  <i class="fa fa-arrow-right angleicon"></i></button>
                    </form>
                    <div class='arrow1'><img src="{{url('user_assets//images/arrow1.png')}}" alt="" /></div>
                    <div class='arrow2'><img src="{{url('user_assets//images/arrow2.png')}}" alt="" /></div>
                    <div class='arrow3'><img src="{{url('user_assets//images/arrow3.png')}}" alt="" /></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <img src="{{url('user_assets/images/contactimage.png')}}" class='cimage-section' alt="" />
            </div>
        </div>
    </div>

</section>


<script>

    // countup js

    const duration = 3000;

const counters = [
{ id: "counter1", startValue: 0, endValue: 987 },
{ id: "counter2", startValue: 0, endValue: 348 },
{ id: "counter3", startValue: 0, endValue: 74 },
{ id: "counter4", startValue: 0, endValue: 878 },
];

function updateCounter(counterElement, currentValue) {
counterElement.textContent = Math.round(currentValue);
}

function countUp(timestamp, start, end, counterElement) {
const currentTime = Math.min(timestamp - start, duration);
const progress = currentTime / duration;

const currentValue = start + progress * (end - start);
updateCounter(counterElement, currentValue);

if (currentTime < duration) {
    requestAnimationFrame((newTimestamp) => countUp(newTimestamp, start, end, counterElement));
}
}

function startCountUp() {
const startTimestamp = performance.now();
counters.forEach((counter) => {
    const counterElement = document.getElementById(counter.id);
    countUp(startTimestamp, counter.startValue, counter.endValue, counterElement);
});
}

startCountUp();
</script>

@endsection