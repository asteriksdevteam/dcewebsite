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
            <div data-aos="fade-up" data-aos-duration="1000" class='col-lg-7 col-md-6 col-xs-12 my-auto'>

                <h3 class='subtitle4'>WHO WE ARE?</h3>
                {!! $WhoWeAre->about_content !!}
            </div>
            <div data-aos="flip-right" data-aos-duration="1000" class='col-lg-5 col-md-6 col-xs-12'>
                <div class='whoweare-img'>
                    <img src="{{asset($WhoWeAre->image)}}" class="imground" alt="dce-image" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class='mission-section'> 
    <div class="container">
        <div class="row">
                <div data-aos="flip-left" data-aos-duration="1000" class="col-lg-5 col-md-5 col-xs-12">
                <div class='whoweare-img'>
                    <img src="{{asset($MissionVision->image)}}" class="imground" alt="dce-image" />
                </div>
            </div>
            <div data-aos="fade-down" data-aos-duration="1000" class="col-lg-7 col-md-6 col-xs-12 my-auto">
                {!! $MissionVision->about_content!!}
            </div>
            
        </div>
    </div>
</section>

<section class='ourloyal-section'>
    <div data-aos="zoom-in" data-aos-duration="1000" class="container">
    <div class='row justify-content-center text-center'>
        <h2 class='title'>{{ $LoyalCustomers->heading }}</h2>
        <p class='para'>{{ $LoyalCustomers->content }}</p>
    </div>
        <div class='row mt-4'>

            <div class="owl-carousel ourloyalcarousel">
                @foreach($LoyalCustomersImages as $item)
                <div class='item'>
                    <img src="{{asset($item->images)}}" class='ly1' alt="dce-image" />
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="core-section">
    <div class="container">
        <div class="row">
            <div data-aos="fade-up" data-aos-duration="1000" class="col-md-6 my-auto">
                <h2 class="title mb-3">Core Values</h2>
             <div class="owl-carousel core-carousel">
                <div class="item">
                 <div class="mb-3">
                    <h6 class="smalltitle">{{ $OurPhilosophy->first_heading }}</h6>
                    <p>{{ $OurPhilosophy->first_content }}</p>
                </div>
                <div class="mb-3">
                    <h6 class="smalltitle">{{ $OurPhilosophy->second_heading }}</h6>
                    <p>{{ $OurPhilosophy->second_content }}</p>
                </div>
                <div class="mb-3">
                    <h6 class="smalltitle">{{ $OurPhilosophy->third_heading }}</h6>
                    <p>{{ $OurPhilosophy->third_content }}</p>
                </div>
                </div>
                <div class="item">
                     <div class="mb-3">
                    <h6 class="smalltitle">{{ $OurPhilosophy->fourth_heading }}</h6>
                    <p>{{ $OurPhilosophy->fourth_content }}</p>
                </div>
                <div class="mb-3">
                    <h6 class="smalltitle">{{ $OurPhilosophy->fifth_heading }}</h6>
                    <p>{{ $OurPhilosophy->fifth_content }}</p>
                </div>
                <div class="mb-3">
                    <h6 class="smalltitle">{{ $OurPhilosophy->sixth_heading }}</h6>
                    <p>{{ $OurPhilosophy->sixth_content }}</p>
                </div>
                </div>
             </div>
            </div>
            <div data-aos="flip-right" data-aos-duration="1000" class="col-md-6">
                <div class="whoweare-img mob-whoweare-img">
                    <img src="{{ asset($OurPhilosophy->image) }}" class="imground" alt="dce-image">
                </div>
            </div>
        </div>
    </div>
</section>

<section class='countup-section'>
    <div class="container">
        <div class='row position-relative'>
            <div data-aos="zoom-in-up" data-aos-duration="1000" class="col-lg-4 col-md-6 col-xs-12">
                <div class='countup-img'>
                    <img src="{{asset($AboutCounter->counter_image)}}" alt="dce-image" />
                </div>
            </div>
            <div data-aos="flip-down" data-aos-duration="1000" class="col-lg-8 col-md-6 col-xs-12 my-auto">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class='count-scontent'>
                            <input type="hidden" value="{{$AboutCounter->counter1}}" name="counter1" class="counter1">
                            <h2 class='title'><span class='highlight'><div class="counter" id="counter1"></div> </span> </h2> <p class='para'> {{$AboutCounter->counter1_name}}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class='count-scontent'>
                            <input type="hidden" value="{{$AboutCounter->counter2}}" name="counter2" class="counter2">
                            <h2 class='title'><span class='highlight'><div class="counter" id="counter2"></div></span> </h2> <p class='para'>{{$AboutCounter->counter2_name}}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class='count-scontent'>
                            <input type="hidden" value="{{$AboutCounter->counter3}}" name="counter3" class="counter3">
                            <h2 class='title'><span class='highlight'><div class="counter" id="counter3"></div></span> </h2> <p class='para'>{{$AboutCounter->counter3_name}}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class='count-scontent'>
                            <input type="hidden" value="{{$AboutCounter->counter4}}" name="counter4" class="counter4">
                            <h2 class='title'><span class='highlight'><div class="counter" id="counter4"></div></span> </h2> <p class='para'>{{$AboutCounter->counter4_name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="meetpioneer">
    <div class="container">
        <div class="row mb-5 justify-content-center text-center">
            <div data-aos="fade-down" data-aos-duration="1000" class="col-md-8">
                <h2 class="title title-meet-pioneer">meet <strong>pioneer</strong></h2>
                <p class="para">The Architect of Tomorrow’s Marketing Solutions Crafting Marketing Magic At Digi Content Experts- Turning Challenges Into Success.</p>
            </div>
        </div>
        <div class="row">
            <div data-aos="fade-right" data-aos-duration="1000" class="col-md-6">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="meetdiv1">
                            <img src="{{ asset('user_assets/images/picture1.png') }}" class="img-fluid" alt="dce-image" />
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <h3 class="subtitle text-start meet-heading">Muhammad Junaid</h3>
                        <p class="meet-text">ceo</p>
                        <p class="para meet-para">
                            Junaid Muhammad, the visionary CEO and Co-founder of DCE, boasts an impressive academic background, holding degrees in Marketing, International Business, and Project Management. With an illustrious
                            13-year career, Junaid has consistently exhibited dedication and enthusiasm. His leadership shines as he's led senior teams and collaborated with Fortune 500 giants showcasing his expertise in.
                        </p>
                    </div>
                </div>
            </div>
            <div data-aos="fade-left" data-aos-duration="1000" class="col-md-6">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="meetdiv2">
                            <img src="{{ asset('user_assets/images/picture2.png') }}" class="img-fluid" alt="dce-image" />
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <h3 class="subtitle text-start meet-heading">Fahad Khan</h3>
                        <p class="meet-text">cco</p>
                        <p class="para meet-para">
                            Fahad Khan, an accomplished CCO and co-founder of DCE, brings a unique blend of expertise to the table. With a background in Food Science and a decade-long career, he is a dedicated and enthusiastic
                            professional. Notably, Fahad's role as a food auditor showcases his attention to detail and commitment to quality. Beyond the corporate realm, he's also a talented actor and entrepreneur.
                        </p>
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
                <h2 class='title'>Frequently <br/> Asked <span class='highlight'>Question’s</span></h2>
            </div>
        </div>
        <div class='row mt-5'>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <p class="para mobile-faqtext">Welcome to our FAQ page! At Digi Content Experts, we believe in transparent communication and ensuring our clients have a clear understanding of what we offer. We've curated a list of the most commonly asked questions about our digital marketing services, processes, and more. If you're looking for quick answers or just want to learn more about how we operate, you're in the right place. We're passionate about empowering our clients with knowledge, ensuring you feel confident and informed at every step of our partnership.</p> 
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                @foreach($QuestionAnswer as $key => $item)
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse{{$item->id}}">
                                    <h4 class='faq-heading'>{{ $item->question }}</h4>
                                </button>
                            </h2>
                            <div id="collapse{{$item->id}}" class="accordion-collapse collapse {{ $key == '0' ? 'show' : null}}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class='para'>{{ $item->answer }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
</section>

@include('user_panel.cta')

@include('user_panel.feedback')


@push('scripts')
<script>
    // countup js
    $(document).ready(function(){
        const counter1 = parseInt($(".counter1").val());
        const counter2 = parseInt($(".counter2").val());
        const counter3 = parseInt($(".counter3").val());
        const counter4 = parseInt($(".counter4").val());

        const duration = 3000;

        const counters = [
            { id: "counter1", startValue: 0, endValue: counter1 },
            { id: "counter2", startValue: 0, endValue: counter2 },
            { id: "counter3", startValue: 0, endValue: counter3 },
            { id: "counter4", startValue: 0, endValue: counter4 },
        ];

        function updateCounter(counterElement, currentValue) 
        {
            counterElement.textContent = Math.round(currentValue);
        }

        function countUp(timestamp, start, end, counterElement) 
        {
            const currentTime = Math.min(timestamp - start, duration);
            const progress = currentTime / duration;

            const currentValue = start + progress * (end - start);
            updateCounter(counterElement, currentValue);

            if (currentTime < duration) 
            {
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
    });
</script>
@endpush



@endsection