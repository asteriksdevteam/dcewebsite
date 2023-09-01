@extends('user_panel.layout.app')
@section('content')

<section class='servicebanner'>
    <div class='container centercontainer'>
        <div class="row">
            <div class="col-lg-8">
                <div class='bannercontnet'>
                    <h1><span class='highlight'>WE ARE USAs TOP RATED WEBSITE DESIGN COMPANY</span></h1>
                    <p>Step into a world where creativity meets innovation, where we blend the limitless potential of imagination with the power of technology to elevate brands to new heights in this digital transformation era.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class='technologies'>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-xs-12">
                <h2 class='title'>Technologies we work with.</h2>
                <p class='para'>We build readymade websites, mobile applications, and elaborate online business services</p>
            </div>
            <div class="col-lg-7 col-md-7 col-xs-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <img src="{{ url('user_assets/images/t1.png') }}" class="t1" alt="">
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <img src="{{ url('user_assets/images/t2.png') }}" class="t1" alt="">
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <img src="{{ url('user_assets/images/t3.png') }}" class="t1" alt="">
                    </div>
                </div>
                <div class='row mt-5'>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <img src="{{ url('user_assets/images/t4.png') }}" class="t1" alt="">
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <img src="{{ url('user_assets/images/t5.png') }}" class="t1" alt="">
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <img src="{{ url('user_assets/images/t6.png') }}" class="t1" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ourwork-section">
    <div class="container">
     <div class="row">

        <div class="col-lg-4 col-md-6">
            <div class="ourwork-content">
             <h2 class="title">
                Our <span class="highlight">Work</span>
             </h2>
             <p>
                Experience a world of design possibilities - with over 100 categories, we have got everything you need
                to create the perfect web design and beyond. No matter your business need or budget, we are here to
                help bring your vision to life.
             </p>
            </div>
         </div>
         <div class="col-lg-8 col-md-6 my-auto">
            <div class="custom-tabs nav nav-tabs" id="myTab" role="tablist">

                <li class="nav-item" role="presentation">
                    <button class="nav-link active custom-title" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane" type="button" role="tab" aria-controls="all-tab-pane" aria-selected="true">all</button>
                 </li>
                 <li class="nav-item" role="presentation">
                    <button class="nav-link custom-title" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">ecommerce</button>
                 </li>
                 <li class="nav-item" role="presentation">
                    <button class="nav-link custom-title" id="logodesign-tab" data-bs-toggle="tab" data-bs-target="#logodesign-tab-pane" type="button" role="tab" aria-controls="logodesign-tab-pane" aria-selected="false">logo design</button>
                 </li>
                 <li class="nav-item" role="presentation">
                    <button class="nav-link custom-title" id="article-tab" data-bs-toggle="tab" data-bs-target="#article-tab-pane" type="button" role="tab" aria-controls="article-tab-pane" aria-selected="false" >article</button>
                 </li>
                 <li class="nav-item" role="presentation">
                    <button class="nav-link custom-title" id="webapp-tab" data-bs-toggle="tab" data-bs-target="#webapp-tab-pane" type="button" role="tab" aria-controls="webapp-tab-pane" aria-selected="false" >web app</button>
                 </li>
                 <li class="nav-item" role="presentation">
                    <button class="nav-link custom-title" id="blogsite-tab" data-bs-toggle="tab" data-bs-target="#blogsite-tab-pane" type="button" role="tab" aria-controls="blogsite-tab-pane" aria-selected="false" >blog site</button>
                 </li>
                 <li class="nav-item" role="presentation">
                    <button class="nav-link custom-title" id="videoanimation-tab" data-bs-toggle="tab" data-bs-target="#videoanimation-tab-pane" type="button" role="tab" aria-controls="videoanimation-tab-pane" aria-selected="false" >video animation</button>
                 </li>
            </div>
         </div>
     </div>

     <div class="row">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="window">
                            <img src="{{url('user_assets/images/ourwork01.png')}}" style="width: 300px; height: 200px;" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="window">
                            <img src="{{url('user_assets/images/ourwork02.png')}}" style="width: 300px; height: 200px;" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="window">
                            <img src="{{url('user_assets/images/ourwork03.png')}}" style="width: 300px; height: 200px;" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="window">
                            <img src="{{url('user_assets/images/ourwork04.png')}}" style="width: 300px; height: 200px;" alt="">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="window">
                            <img src="{{url('user_assets/images/ourwork05.png')}}" style="width: 300px; height: 200px;" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="window">
                            <img src="{{url('user_assets/images/ourwork06.png')}}" style="width: 300px; height: 200px;" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="window">
                            <img src="{{url('user_assets/images/ourwork07.png')}}" style="width: 300px; height: 200px;" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="window">
                            <img src="{{url('user_assets/images/ourwork08.png')}}" style="width: 300px; height: 200px;" alt="">
                        </div>
                    </div>
                </div>
            </div>
         </div>
     </div>
    </div>
</section>

<section class='our-process'>
    <div class="container">
        <div class="row">
            <h2 class='title'>Our <span class='highlight'>Process</span></h2>
            <p class='para'>Sed quisque et in commodo quisque ut. Sapien purus sed in cras donec leo aenean eu nec. Fringilla elementum eget est amet ut porttitor natoque. Curabitur lacus tristique id turpis odio neque tempor ornare. Adipiscing habitant adipiscing dolor proin nunc ornare eu. Nibh feugiat mi ut placerat suspendisse nisl vitae semper.</p>
        </div>
        <div class='row mt-4'>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class='whyus-conten1 process-conten1'>
                    <h1 class='mb-3 processlabel'>01</h1>
                    <div class='d-flex'>
                        <div class='whyus-leftcontent'>
                            <div class='whyus-leftimg'></div>
                        </div>
                        <div class='whyus-rightcontent'>
                            <h6 class='smalltitle'>Sed quisque et in commodo.</h6>
                            <p>Sapien purus sed in cras donec leo aenean eu nec. Fringilla elementum eget est amet ut porttitor natoque. Curabitur lacus tristique id turpis odio neque tempor ornare. Adipiscing habitant adipiscing dolor proin nunc ornare eu.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class='whyus-conten1 process-conten1'>
                <h1 class='mb-3 processlabel'>02</h1>
                    <div class='d-flex'>
                        <div class='whyus-leftcontent'>
                            <div class='whyus-leftimg'></div>
                        </div>
                        <div class='whyus-rightcontent'>
                            <h6 class='smalltitle'>Sed quisque et in commodo.</h6>
                            <p>Sapien purus sed in cras donec leo aenean eu nec. Fringilla elementum eget est amet ut porttitor natoque. Curabitur lacus tristique id turpis odio neque tempor ornare. Adipiscing habitant adipiscing dolor proin nunc ornare eu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='row mt-1'>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class='whyus-conten1 process-conten1'>
                <h1 class='mb-3 processlabel'>03</h1>
                    <div class='d-flex'>
                        <div class='whyus-leftcontent'>
                            <div class='whyus-leftimg'></div>
                        </div>
                        <div class='whyus-rightcontent'>
                            <h6 class='smalltitle'>Sed quisque et in commodo.</h6>
                            <p>Sapien purus sed in cras donec leo aenean eu nec. Fringilla elementum eget est amet ut porttitor natoque. Curabitur lacus tristique id turpis odio neque tempor ornare. Adipiscing habitant adipiscing dolor proin nunc ornare eu.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class='whyus-conten1 process-conten1'>
                <h1 class='mb-3 processlabel'>04</h1>
                    <div class='d-flex'>
                        <div class='whyus-leftcontent'>
                            <div class='whyus-leftimg'></div>
                        </div>
                        <div class='whyus-rightcontent'>
                            <h6 class='smalltitle'>Sed quisque et in commodo.</h6>
                            <p>Sapien purus sed in cras donec leo aenean eu nec. Fringilla elementum eget est amet ut porttitor natoque. Curabitur lacus tristique id turpis odio neque tempor ornare. Adipiscing habitant adipiscing dolor proin nunc ornare eu.</p>
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
                    <img src='{{ url('user_assets/images/laptop.png')}}' />
                </div>
            </div>
        </div>
    </div>
</section>

<section class='aboutsection'>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class='aboutcontent'>
                    <div class='about-content1'>
                        <h6 class='smalltitle'>Fusce sed fames aliquam mi</h6>
                        <h2 class='title'>Id viverra proin <br/> adipiscing et nisi ut</h2>
                        <p class='para'>Lorem ipsum dolor sit amet consectetur. Massa sodales in sed leo convallis at. Enim sollicitudin ullamcorper sollicitudin tincidunt sed volutpat sapien lorem tempor. Id viverra proin adipiscing et nisi ut aliquam lobortis commodo. Vulputate eget interdum consequat fames libero. Nibh consectetur mauris justo justo. Fusce sed fames aliquam mi eleifend aliquam phasellus. Sit aliquet felis sed vivamus neque tortor vestibulum adipiscing ut.</p>
                    </div>

                    <div class='about-content2'>
                        <h2 class='title'>Lorem ipsum dolor sit amet.</h2>
                        <p class='para'>Lorem ipsum dolor sit amet consectetur. Massa sodales in sed leo convallis at. Enim sollicitudin ullamcorper sollicitudin tincidunt sed volutpat sapien lorem tempor. Id viverra proin adipiscing et nisi ut aliquam lobortis commodo. Vulputate eget interdum consequat fames libero.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12 my-auto">
                <img  src='{{ url('user_assets/images/about.png')}}' class='img-fluid' alt='' />
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
                        <div class='row gx-3'>
                            <div class="col-lg-6">
                                <input type="text" placeholder='name*' class='form-control' required/>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder='email*' class='form-control' required/>
                            </div>
                        </div>
                        <div class='row mt-3 gx-3'>
                            <div class="col-lg-6">
                                <input type="text" placeholder='phone*' class='form-control' required/>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder='subject*' class='form-control' required/>
                            </div>
                        </div>
                        <div class='row mt-3 gx-3'>
                            <div class="col-lg-12">
                                <textarea class='form-control' rows={10} placeholder='messages*' required></textarea> 
                            </div>
                        </div>
                        <button type='submit' class='submit'>submit  <i class="fa fa-arrow-right angleicon"></i></button>
                    </form>
                    <div class='arrow1'><img src="{{ url('user_assets/images/arrow1.png')}}" alt="" /></div>
                    <div class='arrow2'><img src="{{ url('user_assets/images/arrow2.png')}}" alt="" /></div>
                    <div class='arrow3'><img src="{{ url('user_assets/images/arrow3.png')}}" alt="" /></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <img src="{{ url('user_assets/images/contactimage.png')}}" class='cimage-section' alt="" />
            </div>
        </div>
    </div>

</section>


@endsection